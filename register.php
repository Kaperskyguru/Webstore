<?php

session_start();
require('include/sanitizer.php');
require_once('include/connect.inc.php');

if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['address'])) {
    $error = array();
    ///$name = $username = $email = $address = $password = "";
    $name = clean($_POST['name']);
    $username = clean($_POST['username']);
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);
    $address = clean($_POST['address']);
    if (is_email_exist($email) === false) {
        global $conn;
        $query = "INSERT INTO users (f_name,username,user_password,user_email,user_address1,user_role) VALUES ('$name','$username','$password','$email','$address', '0')";
        if (mysqli_query($conn, $query)) {
            echo 'true';
        } else {
            echo 'Registration Failed';
        }
    } else {
        echo "Email Alreay Exist";
    }
}
?>


<?php

function insertData($name, $username, $pass, $email, $address) {
    global $conn;
    $query = "INSERT INTO users (f_name,username,user_password,user_email,user_address1,phone_number,user_role) VALUES ('$name','$username','$password','$email','$address', '$phone', '0')";
    return (mysqli_query($conn, $query) or die(mysqli_errorr() ? true : false));
}

function is_email_exist($email) {
    global $conn;
    $sql = "SELECT COUNT(`user_email`) FROM users WHERE `user_email` = '$email' ";
    return mysqli_num_rows(mysqli_query($conn, $sql)) == 1 ? true : false;
}
