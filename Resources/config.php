<?php


error_reporting(E_ERROR | E_PARSE); //Only report fatal errors and parse errors.
ob_start(); //turn on output buffering
session_start();

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$conn = new mysqli($url["host"], $url["user"], $url["pass"], substr($url["path"], 1));

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to the Heroku database!";
$conn->close();

//$timezone = date_default_timezone_set("Europe/London");
//
//defined("DB_HOST") ? null : define("DB_HOST", "localhost");
//defined("DB_USER") ? null : define("DB_USER", "root");
//defined("DB_PASS") ? null : define("DB_PASS", "");
//defined("DB_NAME") ? null : define("DB_NAME", "FBstats");
//defined("DOMAIN") ? null : define("DOMAIN", "");
//
//$connection = null;
//$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//if (mysqli_connect_errno()) {
//    echo "db connction error" . mysqli_connect_errno();
//}

require_once("base_helper.php");


