<?php
require_once("Resources/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        // Get form data
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $reg_date = date("y/m/d");
        $reg_profile_pic = 'path';

        //TODO: Perform validation here (e.g., check if username or email already exists)
        // If validation fails, send an error message
        if (false /* validation fails */) {
            echo "Validation failed.";
        } else {
            $userModel = (new UserModel())
                ->setFirstName($firstname)
                ->setLastName($lastname)
                ->setUserName($username)
                ->setEmail($email)
                ->setPassword($password)
                ->setSignupDate($reg_date)
                ->setProfilePic($reg_profile_pic)
                ->setFriends('0')
                ->setLikes(0);
            (new UsersService())->saveUser($userModel);
            $_SESSION['username'] = $username;
            echo "success"; //used in ajax
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>