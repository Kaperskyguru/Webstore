<?php

require('include/sanitizer.php');
require_once('include/connect.inc.php');

function getProductDetails($id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE prod_id = '" . $id . "'";
    $run_query = mysqli_query($conn, $sql);
    return $run_query;
}

function getAllFeedback($id) {
    global $conn;
    $query = "SELECT * FROM `feedbacktable` WHERE  `Prod_ID` = $id";
    $result = mysqli_query($conn, $query);
    return $result;
}

// get Username
function getUsername($id) {
    global $con;
    $query = "SELECT `f_name` FROM users WHERE `user_id` = '$id'";
    $num = mysqli_fetch_assoc(mysqli_query($con, $query));
    return $num['f_name'];
}

function getRowNums($row, $col, $value) {
    global $con;
    if ($col == "" && ($value == "" || $value == 0)) {
        $result = $con->query("SELECT * FROM $row");
        $num = mysqli_num_rows($result);
    } else {
        $result = $con->query("SELECT * FROM $row WHERE $col = '$value'");
        $num = mysqli_num_rows($result);
    }
    return($num);
}

function getEmail($id) {
    global $con;
    //$email = sanitizer($email);
    $query = "SELECT `user_email` FROM users WHERE `user_id` = '$id'";
    $num = mysqli_fetch_array(mysqli_query($con, $query));
    return $num['user_email'];
}

function getName($id) {
    global $con;
    //$email = sanitizer($email);
    $query = "SELECT `f_name` FROM users WHERE `user_id` = '$id'";
    $num = mysqli_fetch_array(mysqli_query($con, $query));
    return $num['f_name'];
}

function getDeliveryAddress($id) {
    global $con;
    //$email = sanitizer($email);
    $query = "SELECT `user_address1` FROM users WHERE `user_id` = '$id'";
    $num = mysqli_fetch_array(mysqli_query($con, $query));
    return $num['user_address1'];
}

function getHomeAddress($id) {
    global $con;
    //$email = sanitizer($email);
    $query = "SELECT `user_address2` FROM users WHERE `user_id` = '$id'";
    $num = mysqli_fetch_array(mysqli_query($con, $query));
    return $num['user_address2'];
}

function getPhoneNumber($id) {
    global $con;
    //$email = sanitizer($email);
    $query = "SELECT `phone_number` FROM users WHERE `user_id` = '$id'";
    $num = mysqli_fetch_array(mysqli_query($con, $query));
    return $num['phone_number'];
}
