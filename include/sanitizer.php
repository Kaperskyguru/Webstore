<?php
//Start session
//session_start();
 
//Include database connection details
require_once('include/connect.inc.php');
 
//Array to store validation errors
$errmsg_arr = array();
 
//Validation error flag
$errflag = false;
 
///Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    global $conn;
    $str = htmlentities($str);
    $str = trim($str);
    $str = stripcslashes($str);
    $str = stripcslashes($str);
    $str = htmlspecialchars($str);
    $str = mysqli_real_escape_string($conn,$str);
    $str = mysqli_real_escape_string($conn,$str);
     return $str;
}

?>