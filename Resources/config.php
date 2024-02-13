<?php
// Define constants and DBconfigurations
defined("LOCAL_MODE") ? null : define("LOCAL_MODE", false);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start(); // Turn on output buffering
session_start();

$timezone = date_default_timezone_set("Europe/London");

// Database Configuration based on mode
if (LOCAL_MODE) {
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "FBstats");
} else {
    define("DB_HOST", "sql313.infinityfree.com");
    define("DB_USER", "if0_35931110");
    define("DB_PASS", "");
    define("DB_NAME", "if0_35931110_baznat");
}

// Connect to the database
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
    // Log error and display user-friendly message
    error_log("Database connection failed: " . mysqli_connect_error(), 0);
    // Redirect to a custom error page
    header("Location: error.php");
    exit;
}

// Include necessary helper files
require_once("base_helper.php");
