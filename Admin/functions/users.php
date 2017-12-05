<?php

function User_exist($email) {
    global $con;
    $email = sanitizer($email);
    return(mysqli_field_count(mysqli_query($con, "SELECT COUNT (`user_id`) FROM users WHERE `user_email` = '$email' "), 0) == 1) ? true : false;
}

// get UserID
function getUserID($email) {
    global $con;
    $email = sanitizer($email);
    $query = "SELECT `user_id` FROM users WHERE `user_email` = '$email'";
    $num = mysqli_fetch_assoc(mysqli_query($con, $query));
    return $num['User_iD'];
}

// get Username
function getUsername($email) {
    global $con;
    $email = sanitizer($email);
    $query = "SELECT `l_name` FROM users WHERE `user_id` = '$email'";
    $num = mysqli_fetch_assoc(mysqli_query($con, $query));
    return $num['l_name'];
}

// Is Username Exist?
function isUsername_exist($username) {
    global $con;
    $username = sanitizer($username);
    $query = "SELECT COUNT(`l_name`) FROM users WHERE `l_name` = '$username'";
    return mysqli_num_rows(mysqli_query($con, $query)) == 1 ? true : false;
}

function getDBRows($row, $orderBy) {
    global $con;
    if ($row == "users") {
        $data1 = mysqli_query($con, "SELECT * FROM $row WHERE user_role = 0 ORDER BY $orderBy DESC LIMIT 10");
    } else {
        $data1 = mysqli_query($con, "SELECT * FROM $row ORDER BY $orderBy DESC LIMIT 20");
    }
    return($data1);
}

function getBrands() {
    global $con;
    $data1 = mysqli_query($con, "SELECT brand_title FROM brands");
    //while ($res = $data1->fetch_assoc()) {
    return $data1; //$res['brand_title'];
    //}
}

function getCatName($id) {
    global $con;
    $data1 = mysqli_query($con, "SELECT cat_title FROM categories WHERE cat_id = $id");
    while ($res = $data1->fetch_assoc()) {
        return $res['cat_title'];
    }
}

function getBrandId($name) {
    global $con;
    $sql = "SELECT brand_id FROM brands WHERE brand_title = '" . $name . "'";
    $run_query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($run_query);
    return $row['brand_id'];
}

function getStatusID($name) {
    global $con;
    $sql = "SELECT Sta_ID FROM statustable WHERE Sta_Name = '" . $name . "'";
    $data1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($data1);
    return $row['Sta_ID'];
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

function getProduct($col, $id) {
    global $con;
    $query = "SELECT $col FROM `products` WHERE prod_id = '" . $id . "' ";
    $num = mysqli_fetch_assoc(mysqli_query($con, $query));
    return $num[$col];
}

function getOrder($id) {
    global $con;
    $query = "SELECT * FROM `ordertable` WHERE `Sta_ID` = $id";
    $result = mysqli_query($con, $query);
    return $result;
}

function getFeedback($col, $id) {
    global $con;
    return(mysqli_fetch_assoc($con->query("SELECT $col"
                            . " FROM `feedbacktable` RIGHT JOIN `users` ON `users`.`user_id` = `feedbacktable`.`User_ID` "
                            . "RIGHT JOIN  `products` ON `products`.`prod_id`= `feedbacktable`.`feed_ID` "
                            . "WHERE `feed_ID` = $id")));
}
