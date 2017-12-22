<?php

require('include/sanitizer.php');
require_once('include/connect.inc.php');

function getProductDetails($id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE prod_id = '" . $id . "'";
    $run_query = mysqli_query($conn, $sql);
    return $run_query;
}

function getDateAdded($tableName,$Prod_ID){
     global $conn;
    $sql = "SELECT DateCreated FROM $tableName WHERE Prod_ID = '" . $Prod_ID . "'";
    $run_query = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    return $run_query["DateCreated"];
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

function clearCart($uid) {
    global $con;
    echo $uid;
    $delete = "DELETE FROM `cart` WHERE user_id = $uid";
    mysqli_query($con, $delete);
}

function moveToOrderTable($ID) {
    global $con;
    $sql = "SELECT * FROM cart WHERE user_id = '" + $ID + "'";
    $run_query = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($run_query)) {
        $prod_ID = $row["p_id"];
        $total_price = $row["total_amount"];
        $qty = $row["qty"];
    }
    addToOrderTable($prod_ID, $ID, $total_price, $qty);
}

function addToOrderTable($prod_ID, $user_ID, $total_price, $qty) {
    global $conn;
    $sql = "INSERT INTO ordertable(Prod_ID,User_ID, Ord_TotalPrice, Ord_Qty)VALUES($prod_ID,$user_ID,$total_price, $qty)";
    if (mysqli_query($conn, $sql)) {
        echo "successful";
        //$sql2 = "INSERT INTO ordertable (Sta_ID,Ord_TotalPrice, TrackingID, Items_No) VALUES (1,,,,$total_price)";
        //$run_query1 = mysqli_query($conn, $sql);
    } else {
        echo "Failed";
        mysqli_rollback($conn);
    }
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'second',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
