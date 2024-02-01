<?php

function get_connection(){
    global $connection;
    return $connection;
}

function query($sql){
    return mysqli_query(get_connection(), $sql);
}

function confirm($result){
    if(!$result){
        die("query failed with error:  ". mysqli_error(get_connection()));
    }
}

function get_last_id(){
    return mysqli_insert_id(get_connection());
}

function redirect($location){
    header("Location: $location ");
}

function clear_reg_sessions(){
    unset($_SESSION['reg_username']);
    unset($_SESSION['reg_fname']);
    unset($_SESSION['reg_lname']);
    unset($_SESSION['reg_email']);
    unset($_SESSION['reg_email2']);
    unset($_SESSION['reg_pass']);
    unset($_SESSION['reg_pass2']);
    unset($_SESSION['reg_date']);
    unset($_SESSION['reg_profile_pic']);
}
