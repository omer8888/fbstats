<?php
if(isset($_POST['reg_submit'])) { // if the register button clicked
    $_SESSION['reg_username'] = $reg_username = ucfirst(strtolower(strip_tags($_POST['reg_username']))); //remove html, lowercase for all input, keeping only first upper
    $_SESSION['reg_fname'] = $reg_fname = ucfirst(strtolower(strip_tags($_POST['reg_fname'])));          //saving on session in order to keep the value if there is error
    $_SESSION['reg_lname'] = $reg_lname = ucfirst(strtolower(strip_tags($_POST['reg_lname'])));
    $_SESSION['reg_email'] = $reg_email = ucfirst(strtolower(strip_tags($_POST['reg_email'])));
    $_SESSION['reg_email2'] = $reg_email2 = ucfirst(strtolower(strip_tags($_POST['reg_email2'])));
    $_SESSION['reg_pass'] = $reg_pass = strip_tags($_POST['reg_pass']);
    $_SESSION['reg_pass2'] = $reg_pass2 = strip_tags($_POST['reg_pass2']);
    $reg_date = date("y/m/d");
    $_SESSION['reg_profile_pic'] = $reg_profile_pic = null;

    $error_array = array(); // this is the register error array

    //-----Length Validation
    if(strlen($reg_username)<4 || strlen($reg_username)> 25){
        array_push($error_array, USERNAME_LENGTH);
    }
    if(strlen($reg_fname)<4 || strlen($reg_fname)> 25){
        array_push($error_array, FNAME_LENGTH);
    }
    if(strlen($reg_lname)<4 || strlen($reg_lname)> 25){
        array_push($error_array, LNAME_LENGTH);
    }
    if(strlen($reg_pass)<4 || strlen($reg_pass)> 25){
        array_push($error_array,PASS_LENGTH);
    }


    //------Password Verification
    if($reg_pass != $reg_pass2){
        array_push($error_array,PASS_NOT_MATCH);
    }
    elseif (preg_match('/[^A-Za-z0-9]/', $reg_pass)){
        array_push($error_array, PASS_FORMAT);
    }

    //-----Email Verification
    if (!filter_var($reg_email, FILTER_VALIDATE_EMAIL)) {
        array_push($error_array, EMAIL_FORMAT);
    }
    if ($reg_email != $reg_email2) { //verify emails are the same
        array_push($error_array, EMAIL_NOT_MATCH);
    }
    $query = query("SELECT * FROM USERS WHERE EMAIL='$reg_email'");
    confirm($query);
    if (mysqli_num_rows($query) > 0) {
        array_push($error_array, EMAIL_EXIST);
    }

    //------verifying Username hasten been used
    $query = query("SELECT * FROM USERS WHERE USER_NAME='$reg_username'");
    confirm($query);
    if (mysqli_num_rows($query)!=0){ // username already exist
        array_push($error_array, USERNAME_EXIST);
    }


    //choosing photo, Encrypting pass and inserting the user info to the DB
    if(empty($error_array)){
        $rand_profile_num = rand(1,8); // setting random profile photo number
        $reg_profile_pic = "resources/images/profile_pics/defaults/default$rand_profile_num.png";

        $reg_pass = md5($reg_pass); // Encrypt the pass

        $query = query("INSERT INTO USERS (id,first_name,last_name,user_name,email,password,signup_date,profile_pic,num_posts,num_likes,user_closed,friends_array)
         VALUES ('', '{$reg_fname}', '{$reg_lname}', '{$reg_username}', '{$reg_email}', '{$reg_pass}', '{$reg_date}', '{$reg_profile_pic}', '0', '0', 'no', ',')");
        confirm($query);
        $reg_status_completed = true;
        clear_reg_sessions(); // cleaning the register form sessions
    }


}