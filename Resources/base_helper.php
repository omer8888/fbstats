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

