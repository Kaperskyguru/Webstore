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





//
//if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['address'])) {
//    $error = array();
//
//    // Full name
//    if (empty($_POST['name'])) {
//        $error = 'Please Enter Your Full Name:';
//    } else if ($_POST['name']) {
//        $name = clean($_POST['name']);
//    } else {
//        $error = 'Name must consist of only Letters';
//    }
//
//    // Username
//    if (empty($_POST['username'])) {
//        $error = 'Please Enter Your username:';
//    } else if (ctype_alpha($_POST['username'])) {
//        $username = clean($_POST['username']);
//    } else {
//        $error = 'username must consist of only Letters and Numbers';
//    }
//
//    //email
//    if (empty($_POST['email'])) {
//        $error = 'Please Enter Your email:';
//    } else {
//        $email = clean($_POST['email']);
//    }
//
//    //Password
//    if (empty($_POST['password'])) {
//        $error = 'Please Enter Your password:';
//    } else if (ctype_alnum($_POST['password'])) {
//        $password = clean($_POST['password']);
//    } else {
//        $error = 'password must consist of only Letters';
//    }
//
//    //Address
//    if (empty($_POST['address'])) {
//        $error = 'Please Enter Your address:';
//    } else if ($_POST['address']) {
//        $address = clean($_POST['address']);
//    }
//
//    // Displaying the errors and check if data already exits
//    if (empty($error)) {
//        //	if(User_exist($email) === false){
//        if (insertData($name, $username, $password, $email, $address)) {
//            $error = 'Registration Successfull';
//        } else {
//            $error = 'Registration Failed';
//        }
//        //	}else{
//        //$error = 'Email or Username already exist!';
//        //	}
//    } else {
//        echo $error;
//    }
//} else {
//    echo 'Please fill out the form';
//}
//
//function insertData($name, $username, $pass, $email, $address) {
//    $query = "INSERT INTO users (f_name,l_name,user_password,user_email,user_address1,user_role) VALUES ('$name','$username','$pass','$email','$address', '0')";
//    return (mysql_query($query) or die(mysql_errorr() ? true : false));
//}
?>