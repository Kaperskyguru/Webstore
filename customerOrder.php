<?php
session_start();
require('functions.php');
$info = "SELECT * FROM users WHERE user_id = {$_SESSION['uid']}";
$result = mysqli_query($conn, $info);
$rows = mysqli_fetch_assoc($result);

if (!isset($_SESSION["uid"])) {
    header("location: index.php");
} else {
    if ($_SESSION["uid"] == 2) {

        header("location: ./Admin/index.php");
    }
}
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Customer Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel = "stylesheet" href="css/main.css"/>
        <link href="css/shop-homepage.css" rel="stylesheet">
        <script type="text/javascript" src="jquery/1.12.0/jquery2.js"></script>
        <script type="text/javascript" src="jquery/1.12.0/bootstrap.min.js"></script>
        <script type="text/javascript" src="jquery/1.12.0/main.js"></script>
    </head>
    <style>
        table tr td{padding: 10px;}
    </style>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">SpareParts</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Services</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <form class="navbar-form navbar-right">
                            <div class="input-group">
                                <input type="text" placeholder="Search" id="search" class="form-control" />
                                <div class="input-group-btn">
                                    <button class="btn-btn-primary" style="margin-left: -2px; font-size: 20px; padding-bottom: 2px;" id="search_btn">
                                        <i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> <?php echo "Hello, " . $_SESSION['name']; ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="userpage.php" style="color: blue;">My Account</a></li>
                                <li class="divider"></li>
                                <li style=""><a href="#" style="color: blue;">My Orders</a</li>
                                <li class="divider"></li>
                                <li style=""><a href="#" style="color: blue;">My Reviews</a</li>
                                <li class="divider"></li>
                                <li><a href="logout.php" style="color: blue;"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <p><br/></p>

        <div class="container-fluid">
            <div class="row">
                <!--<div class="col-md-2"></div>-->
                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <h1>Customer Order Details</h1>
                            <hr>
                            <?php
                            $x = 0;
                            $total_amt = 0;
                            $uid = $_SESSION["uid"];
                            $sql = "SELECT * FROM cart WHERE user_id = '$uid'";
                            $run_query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($run_query)) {
                                $id = $row["id"];
                                $pro_id = $row["p_id"];
                                $pro_name = $row["product_title"];
                                $pro_image = $row["product_image"];
                                $qty = $row["qty"];
                                $pro_price = $row["price"];
                                $total = $row["total_amount"];
                                $price_array = array($total);
                                $total_sum = array_sum($price_array);
                                $total_amt = $total_amt + $total_sum;
                                $x++;
                                echo "
						<div class='row'>
							<div class='col-md-6'>
								<img style='float:right;' src='images/$pro_image' class='img-thumbnail' width='200px' height='100px' />
							</div>
							<div class='col-md-6'>
								<table>
									<tr><td>Product Name</td><td><b>$pro_name</b></td></tr>
									<tr><td>Product Price</td><td><b>N$pro_price</b></td></tr>
									<tr><td>Quantity</td><td><b>$qty</b></td></tr>
									<tr><td>Total Amount</td><td><b>N$total</b></td></tr>
								</table>
							</div>
						</div>
					";
                            }
                            ?>
                            <!--<div class="row">
                                    <div class="col-md-6">
                                            <img style="float:right;" src="img/lights/7260898-close-up-shot-of-car-head-lamp-in-blue-color-tone.jpg" class="img-thumbnail" />
                                    </div>
                                    <div class="col-md-6">
                                            <table>
                                                    <tr><td>Product Name</td><td><b>Toyota Light</b></td></tr>
                                                    <tr><td>Product Price</td><td><b>N40000.00</b></td></tr>
                                                    <tr><td>Quantity</td><td><b>3</b></td></tr>
                                                    <tr><td>Payment</td><td><b>Complete</b></td></tr>
                                                    <tr><td>Transaction ID</td><td><b>Toyota Light</b></td></tr>
                                            </table>
                                    </div>
                            </div> -->
                        </div>
                        <div class="panel-footer">
                            <?php
                            echo "
                    <div class='row'>
                                    
                                    <div class='col-md-4'>
                                        <h3>Total: N$total_amt</h3>
                                    </div>
									<div class='col-md-8'>
									<form method = 'post' action = 'customerOrder.php'>
										<input type='submit' name='bntpay' style='float:right; margin-right:50px;' class='btn btn-warning btn-lg' value='continue checkout' />
									</form>
									</div>
                    </div>
					
                ";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <h3>Customer Address</h3>
                            <hr>

                            <div class="col-sm-12" style="">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Default Delivery Address</div>
                                    <div class="panel-body">
                                        <p><span class="glyphicon glyphicon-envelope"></span> <?php echo $rows['user_address1']; ?></p>
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
        </div>



        <div class="container">
            <hr>
            <?php include ('include/footer.php'); ?>
        </div>


        <?php
        if (isset($_POST['bntpay'])) {
            $select = "SELECT * FROM cart WHERE user_id = {$_SESSION['uid']}";
            if ($result = mysqli_query($conn, $select)) {
                $row = mysqli_fetch_array($result);

                $user_id = $row['user_id'];
                $prod_id = $row['p_id'];
                $prod_name = $row['product_title'];
                $prod_price = $row['price'];
                $prod_qty = $row['qty'];
                $amt = $row['total_amount'];

              //  $insert = "INSERT INTO customer_order (uid,pid,p_name,p_price,p_qty,t_amount,p_status,trxn_id) VALUES ('$user_id','$prod_id','$prod_name','$prod_price','$prod_qty','$amt',1,1)";
                $insert = "INSERT INTO ordertable (User_ID,Prod_ID,Ord_Qty,Ord_TotalPrice,Sta_ID,TrackingID) VALUES ('$user_id','$prod_id','$prod_qty','$amt',2,76798)";

                $insert_query = mysqli_query($conn, $insert);

                if ($insert_query == true) {
                    moveToOrderTable($user_id);
                    clearCart($user_id);
                    header("Location:./paymentSuccess.php");
                } else {
                    
                }
            }
        }
        ?>

    </body>
</html>