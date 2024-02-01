<?php

use Cassandra\Date;

Class User{
        private $user_info;
        private $user_id;

        public function __construct($user_id){
            $this->user_id = $user_id;
            $query = query("SELECT * FROM users WHERE ID='$user_id'");
            $this->user_info =  mysqli_fetch_array($query);
        }

        public function get_user_info(){
            return $this->user_info;
        }

        public function get_user_id(){
            return $this->user_id;
        }


    public function getFirstAndLastName(){
            return $this->user_info["first_name"] ." ".$this->user_info["last_name"];
        }

        public function get_first_name(){
            return $this->user_info["first_name"];
        }

        public function get_last_name(){
            return $this->user_info["last_name"];
        }

        public function get_username(){
            return $this->user_info["user_name"];
        }

        public function get_email(){
            return $this->user_info["email"];
        }

        public function get_password(){
            return $this->user_info["password"];
        }

        public function get_signup_date(){
            return $this->user_info["signup_date"];
        }

        public function get_profile_pic(){
            return $this->user_info["profile_pic"];
        }

        public function get_friends_array(){
            $string= $this->user_info["friends_array"];
            return explode (",", $string);
        }

        public function get_user_posts_num(){ //in order to get update num, im taking it from the dm and not the user obj
            $query = query("SELECT NUM_POSTS FROM USERS WHERE ID='{$this->get_user_id()}'");
            $row = mysqli_fetch_array($query);
            return $row[0];
        }

        public function get_likes_num(){
            $query = query("SELECT NUM_LIKES FROM USERS WHERE ID='{$this->get_user_id()}'");
            $row = mysqli_fetch_array($query);
            return $row[0];
        }

        public function update_user_posts_count(){
            $new_post_num = $this->get_user_posts_num() + 1 ;
            $user_id = $this->get_user_id();
            $query = query("UPDATE USERS SET NUM_POSTS = '$new_post_num' WHERE ID='$user_id'");
            confirm($query);
        }

        public function is_friend($user_id){
            $friends_array = $this->get_friends_array();
            return in_array($user_id, $friends_array) || ($user_id == $this->get_user_id()); //im friend of myself
        }

        public function get_friends_posts($ajax_req, $limit)
        {
            $page = $ajax_req['page'];

            if ($page == 1) //each "page" is a LIMIT number of posts loaded
                $start = 0; //post index
            else
                $start = ($page - 1) * $limit; //setting "start" into last post index
            $str = "";

            $query = query("SELECT * FROM POSTS WHERE DELETED = 'no' ORDER BY POST_ID DESC"); //TODO: now its all posts but should support only friend posts
            confirm($query);

            if (mysqli_num_rows($query) > 0) {
                $num_iterations = 0;
                $count = 1;

                while ($row = mysqli_fetch_array($query)) { // running on all the posts
                    $post_sender_obj = new user($row['sender_user_id']);
                    $id = $row['post_id'];
                    $body = $row['body'];
                    $date_post = $row['date_post'];
                    //$likes = $row['likes'];
                    $post_receiver_link = '';

                    if ($row['receiver_user_id'] != '0') { // if there is a receiver
                        $receiver_obj = new User($row['receiver_user_id']);
                        $receiver_full_name = $receiver_obj->getFirstAndLastName();
                        $post_receiver_link = "<a href={$row['first_name']}>$receiver_full_name</a>";
                    }

                    if ($this->is_friend($post_sender_obj->get_user_id())) { //showing only friends posts

                        if ($num_iterations++ < $start) //skipping all the posts that already on screen
                            continue;

                        if ($count > $limit) { //showing posts until the limit
                            break;
                        } else {
                            $count++;
                        }

    ?>
                        <script>
                            function toggle<?php echo $id ?>(){
                                //alert("in");
                                var element = document.getElementById("toggleComment<?php echo $id ?>");
                                if (element.style.display == "block")
                                    element.style.display = "none";
                                else
                                    element.style.display = "block";
                            }
                        </script>

    <?php
                        // ----- calculating post time

                        //$current_date = new DateTime(); //Todo: solve date time issue - post time is not updating
                        $current_date = new DateTime("2022-02-11 16:25:31");
                        $date_post = new DateTime($date_post);
                        $time_diff = $date_post->diff($current_date);

                        $time_set = false;
                        if (($time_diff->y >= 1)) {
                            $time_msg = $time_diff->y . " years ago";
                            $time_set = true;
                        }
                        if (($time_diff->m >= 1) && ($time_set == false)) {
                            $time_msg = $time_diff->m . " months ago";
                            $time_set = true;
                        }
                        if (($time_diff->d >= 1) && ($time_set == false)) {
                            $time_msg = $time_diff->d . " days ago";
                            $time_set = true;
                        }
                        if (($time_diff->h >= 1) && ($time_set == false)) {
                            $time_msg = $time_diff->h . " hours ago";
                            $time_set = true;
                        }
                        if (($time_diff->i >= 1) && ($time_set == false)) {
                            $time_msg = $time_diff->i . " minutes ago";
                            $time_set = true;
                        }
                        if (($time_diff->s < 30) && ($time_set == false)) {
                            $time_msg = "just now";
                        }

                        $str .= " <div class='status_post' onClick='javascript:toggle$id()'>
                                            <div class='post_profile_pic'>
                                                <img src='{$post_sender_obj->get_profile_pic()}' width='60'>
                                            </div> 
                                            
                                            <div class='posted_by' style='color:#ACACAC;'>
                                                <a href='{$post_sender_obj->user_info['user_name']}'> {$post_sender_obj->getFirstAndLastName()} </a> $post_receiver_link &nbsp;&nbsp;&nbsp;&nbsp; {$time_msg}
                                            </div>   
                                            
                                            <div id='post_body'>
                                                $body
                                                <br>
                                            </div>     
                                      </div> 
                                      <div class='post_comment' id='toggleComment$id' style='display:none'>
                                        <iframe src='comment_frame.php?post_id=$id' id='comment_iframe' frameborder='0'></iframe>
                                      </div>  
                                      <hr>                        
                                    ";
                    }
                }
                    if ($count > $limit) {
                        $str .= "<input type ='hidden' class='nextPage' value='" . ($page + 1) . "'>
                                <input type ='hidden' class='no_more_posts' value='false'>";
                    } else {
                        $str .= "<input type ='hidden' class='no_more_posts' value='true'><p style='text-align: center;'>No more posts to show</p>";
                    }

                    echo $str;
                }

        }

    }
?>
