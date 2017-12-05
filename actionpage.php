<?php
session_start();
require('include/sanitizer.php');
require_once('include/connect.inc.php');


$id = $_SESSION['uid'];
if (isset($_POST['username']) && isset($_POST['password'])) {
    //sanitizepost values from login form
    $username = clean($_POST['username']);
    $password = clean($_POST['password']);
    $sql = "SELECT * FROM users WHERE user_email= '" . $username . "' AND user_password= '" . $password . "' ";
    $run_query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($run_query);
    $row = mysqli_fetch_array($run_query);
    if ($count > 0) {
        if ($row["user_role"] == 0) {
            $_SESSION["uid"] = $row["user_id"];
            $_SESSION['name'] = $row["f_name"];
            echo "true";
        } else {
            // admin login
            $_SESSION["uid"] = $row["user_id"];
            $_SESSION['name'] = $row["f_name"];
            echo "true";
        }
    } else {
        echo "Incorrect username/password combination!";
    }
}



if (isset($_POST['oldpassword'])) {
//Sanitize the POST values
//$oldpasswor = md5($_POST['newpsw']);
    $oldpassword = clean($_POST['oldpassword']);
    $newpassword = clean($_POST['newpassword']);
    $confirmpass = clean($_POST['confirmpsw']);
    $query = "SELECT * FROM users WHERE user_password= '$oldpassword' AND user_id = '$id'";
    $result = mysqli_query($conn, $query);
    $res = mysqli_num_rows($result);
    if ($confirmpass === $newpassword) {
        if ($res > 0) {
            $update = "UPDATE users SET user_password= '$newpassword' WHERE user_id = '$id'";
            $new = mysqli_query($conn, $update);
            if ($new) {
                echo " <div class='alert alert-warning'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Update Success...</b>
                     </div>
                     ";
            }
        } else {
            echo "
                     <div class='alert alert-warning'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Password is incorrect...</b>
                     </div>
              ";
        }
    } else {
        echo "
                     <div class='alert alert-warning'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Password do not match...</b>
                     </div>
              ";
    }
}

if (isset($_POST["loginaction"])) {
    if (!isset($_SESSION["uid"])) {
        echo "Please Log in to add products to cart";
    }
}
