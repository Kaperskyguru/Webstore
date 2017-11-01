	
<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("location: index.php");
}
include('include/connect.inc.php');
include('include/head.php');
?>
<div class="col-sm-9" style="">
    <h4 style="padding: 0px 0px 5px 15px;">Account Control Panel</h4>
    <div class=""style="margin-left: 14px; margin-right: 14px; margin-top: -16px; padding-top: 5px; padding-bottom: 30px; border-top: solid; border-top-width: thin;">
        <p>Hello <?php echo $_SESSION['name']; ?>,</p>
        <p>From your account dashboard, you have the ability to view your account and update your account
            information. Select a link below to view or edit your information.</p>
    </div>
    <div class="row" style="margin-top: -10px; margin-left: 0px; padding-bottom: 20px;">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-decoration: underline;">Contact Information</div>
                <div class="panel-body" style="height: 150px;">
                    <p><?php echo getName($_SESSION['uid']); ?></p>
                    <p><?php echo getEmail($_SESSION['uid']) ?>- <a href="changeemail.php">Change e-mail address</a></p>
                    <p>Change <a href="changepass.php">Password</a></p>
                </div>
                <div class="panel-footer">
                    <li style="list-style: none; text-align: right; "><a href="accountedit.php" style=""><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                </div>
            </div>
        </div>
        <div class="col-sm-6"> 
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-decoration: underline;">My Orders</div>
                <div class="panel-body"style="height: 150px;">
                    <p>You've not gotten any product yet.</p>
                </div>
                <div class="panel-footer">
                    <li style="list-style: none; text-align: right; "><a href="#" style=""><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                </div>
            </div>
        </div>
    </div>

    <li style="list-style: none; font-size: 18px; padding-bottom: 10px; padding-left: 6px;"><a href="address.php">Address Management</a></li>
    <div class="row" style="margin-top: -10px; margin-left: 0px; border-top-style:solid; border-top-width: thin; padding-bottom: 10px; padding-top: 15px;">
        <div class="col-sm-6" style="">
            <div class="panel panel-primary">
                <div class="panel-heading">Default Delivery Address</div>
                <div class="panel-body" style="height: 200px;">
                    <p><span class="glyphicon glyphicon-envelope"></span> <?php echo getDeliveryAddress($_SESSION['uid']); ?>
                    </p>
                    <p><span class="glyphicon glyphicon-phone"> 08122394432</span></p>
                </div>
                <div class="panel-footer">
                    <li style="list-style: none; text-align: right; "><a href="addressedit.php" style=""><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                </div>
            </div>
        </div>
        <div class="col-sm-6" style="">
            <div class="panel panel-primary">
                <div class="panel-heading">Default Billing Address</div>
                <div class="panel-body" style="height: 200px;">
                    <p><span class="glyphicon glyphicon-envelope"></span> No 2 Pinnacle close off Refinery road, beside Casa De Pedro Annex Effurun, Delta state Casa De Pedro annex, Refinery road WARRI-REFINERY ROAD Delta
                    </p>
                    <p><span class="glyphicon glyphicon-phone"> 08122394432</span></p>
                </div>
                <div class="panel-footer">
                    <li style="list-style: none; text-align: right; "><a href="addressedit.php" style=""><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php include('include/footer.php') ?>
</body>
</html>

<?php

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

function getPhoneNumber($id) {
    global $con;
    //$email = sanitizer($email);
    $query = "SELECT `user_address1` FROM users WHERE `user_id` = '$id'";
    $num = mysqli_fetch_array(mysqli_query($con, $query));
    return $num['user_address1'];
}
?>