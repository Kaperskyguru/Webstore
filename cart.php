<?php
session_start();
if (!isset($_SESSION["uid"])) {
    header("location: index.php");
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

                        <li><a href ="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span style ="" class = "glyphicon glyphicon-shopping-cart"> Cart <span class="badge"> 0</span></span></a>
                            </div>
                            </div>
                            </nav>

                            <div class="container">

                                <div class="row">

                                    <?php require ('include/sidebar.php'); ?>

                                    <div class="col-md-9">
                                        <div id="cart_msg">  </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">Cart Checkout</div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-2">Action</div>
                                                            <div class="col-md-2">Product Image</div>
                                                            <div class="col-md-2">Product Name</div>
                                                            <div class="col-md-2">Product Price</div>
                                                            <div class="col-md-2">Quantity</div>
                                                            <div class="col-md-2">Price (N)</div>
                                                        </div>
                                                        <div id="cart_checkout">

                                                        </div>
                                                        <!--<div class="row">
                                                            <div class="col-md-2">
                                                                <div class="btn-group">
                                                                    <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                                                    <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2"><img src='images/suspension.jpg' width='60px' height='50px'/></div>
                                                            <div class="col-md-2">Product Name</div>
                                                            <div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
                                                            <div class="col-md-2"><input type='text' class='form-control' value='1' disabled></div>
                                                            <div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
                                                        </div>-->
                                                    </div>
                                                    <div class="panel-footer"></div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12" id="product_msg">

                                        </div>
                                        <div class="row">
                                            <div id="get_product">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <ul class="pagination" id="pageno">
                                            <li><a href="#">1</a></li>
                                        </ul>
                                    </center>
                                </div>
                            </div>


                            <div class="container">
                                <hr>
                                <?php include ('include/footer.php'); ?>
                                <script>
                                    function clic() {
                                        //alert("Working");

                                        $("#checkout").click(function (event) {
                                            event.preventDefault();
                                            var total_amt = $(total_amt).val();
                                            alert("True");
                                            $.ajax({
                                                url: "action.php",
                                                method: "POST",
                                                data: {total_amt: total_amt},
                                                success: function (data, textStatus, jqXHR) {
                                                    if (data === "true") {
                                                        alert("True");
                                                    } else {
                                                        alert("False");
                                                    }
                                                }
                                            })
                                        })

                                    }

                                </script>
                            </div>