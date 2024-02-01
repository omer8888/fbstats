<?php
require_once("Resources/config.php"); //connection setup
require_once("resources/errors_msgs_copies_define.php");
require_once("Includes/FormHandlers/register_handler.php");
require_once("Includes/FormHandlers/login_handler.php");
?>

<html>
<head>
    <title>Register FootBall Stats Network</title>
    <link rel="stylesheet" href="/Resources/css/register_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/Resources/js/register.js"></script> <!-- js file for the Login animation -->
</head>

<body>
    <div class="wrapper">
        <div class="register_box">
            <div class="register_header">
                <h2>FootBall Stats Network</h2>
                <span id="register_first_line">Signup for free</span>
            </div>

            <form id="register_form" action="" method="POST">
                <input type="text" name="reg_username" placeholder="User Name" value="<?php if(isset($_SESSION['reg_username'])) echo $_SESSION['reg_username']; ?>">
                <div class="form_error">
                    <?php if(in_array( USERNAME_LENGTH, $error_array)) echo USERNAME_LENGTH; // checking if any of user name errors are in the form errors array
                          elseif (in_array( USERNAME_EXIST, $error_array)) echo USERNAME_EXIST; ?>
                </div>
                <input type="text" name="reg_fname" placeholder="First Name" required value="<?php if(isset($_SESSION['reg_fname'])) echo $_SESSION['reg_fname']; ?>">
                <div class="form_error">
                    <?php if(in_array(FNAME_LENGTH, $error_array)) echo FNAME_LENGTH; ?>
                </div>

                <input type="text" name="reg_lname" placeholder="Last Name" required value="<?php if(isset($_SESSION['reg_lname'])) echo $_SESSION['reg_lname']; ?>">
                <div class="form_error">
                    <?php if(in_array(LNAME_LENGTH, $error_array)) echo LNAME_LENGTH; ?>
                </div>

                <input type="email" name="reg_email" placeholder="Email" required value="<?php if(isset($_SESSION['reg_email'])) echo $_SESSION['reg_email']; ?>">
                <div class="form_error">
                      <?php if(in_array(EMAIL_FORMAT, $error_array)) echo EMAIL_FORMAT;
                            elseif(in_array(EMAIL_EXIST, $error_array)) echo EMAIL_EXIST; ?>
                </div>

                <input type="email" name="reg_email2" placeholder="Confirm Email" required value="<?php if(isset($_SESSION['reg_email2'])) echo $_SESSION['reg_email2']; ?>">
                <div class="form_error">
                        <?php if(in_array(EMAIL_NOT_MATCH, $error_array)) echo EMAIL_NOT_MATCH; ?>
                </div>

                <input type="password" name="reg_pass" placeholder="Password" required value="<?php if (isset($_SESSION['reg_pass'])) echo $_SESSION['reg_pass']; ?>">
                <div class="form_error">
                            <?php if(in_array(PASS_FORMAT, $error_array)) echo PASS_FORMAT;
                                  elseif (in_array(PASS_LENGTH, $error_array)) echo PASS_LENGTH; ?>
                </div>

                <input type="password" name="reg_pass2" placeholder="Confirm Password" required value="<?php if(isset($_SESSION['reg_pass2'])) echo $_SESSION['reg_pass2']; ?>">
                <div class="form_error">
                                <?php if(in_array(PASS_NOT_MATCH, $error_array)) echo PASS_NOT_MATCH; ?>
                </div>

                <input type="submit" name="reg_submit" id="reg_submit" value="Register">
                <?php if ($reg_status_completed == true) { // if signup completed: hiding the signup form ,showing green complete msg, showing the login form
                    echo '
                        <script>    
                            $("#register_form").hide();                        
                            document.getElementById("register_first_line").innerHTML = "Signup completed!";
                            document.getElementById("register_first_line").style.color = "#14CB00";   
                                           
                            $(document).ready(function (){
                                $("#login_form").show();
                            });
            
                        </script>
                          ';
                } ?>
            </form> <!-- end of register form -->


            <div class="login_header">
                <?php if(!isset($reg_status_completed)) // hiding "Already a member?" if user just finished signup
                    echo '<h3 id="login_form_title">Already a member?</h3>';
                ?>
                <a href="#" id="already_a_member_link">Login to your account!</a>
            </div>

            <div id="login_form">
                <form action="" method="POST">
                    <input type="text" name="login_email_or_username" placeholder="Email/Username" required value="<?php if(isset($_SESSION['login_email_or_username'])) echo $_SESSION['login_email_or_username']; ?>">
                    <br>
                    <input type="password" name="login_pass" placeholder="Password">
                    <br>
                    <input type="submit" name="login_submit" value="Login">
                    <div class="form_error"><?php if(isset($login_error)){echo $login_error; } ?></div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
