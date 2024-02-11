<?php
require_once("Resources/config.php");

// Check if the form data is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        // Get form data
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $reg_date = date("y/m/d");
        $reg_profile_pic = 'path';

        // Perform validation here (e.g., check if username or email already exists)
        // If validation fails, send an error message
        if (false /* validation fails */) {
            echo "Validation failed.";
        } else {
            // Validation successful, proceed with database insertion
            $query = query("INSERT INTO USERS (id,first_name,last_name,user_name,email,password,signup_date,profile_pic,num_posts,num_likes,user_closed,friends_array)
             VALUES ('', '{$firstname}', '{$lastname}', '{$username}', '{$email}', '{$password}', '{$reg_date}', '{$reg_profile_pic}', '0', '0', 'no', ',')");
            confirm($query);
            $_SESSION['username'] = $username;
            // Respond with "success" if registration was successful
            echo "success";
        }
    } else {
        // Respond with error message if form fields are not set
        echo "All fields are required.";
    }
} else {
    // Respond with error message for invalid request method
    echo "Invalid request method.";
}
?>