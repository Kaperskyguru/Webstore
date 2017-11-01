<?php
session_start();

if (!isset($_SESSION["uid"])) {
    header("location: index.php");
} else {
    if ($_SESSION["uid"] == 2) {

        header("location: ./Admin/dashboard.php");
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
                                <li style=""><a href="cart.php" style="color: blue;"><span class="glyphicon glyphicon-shopping-cart"> Cart</span></a</li>
                                <li class="divider"></li>
                                <li><a href="logout.php" style="color: blue;"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                            </ul>
                        </li>
                        <li><a href ="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span style ="" class = "glyphicon glyphicon-shopping-cart"> Cart <span class="badge"> 0</span></span></a>
                            <div class="dropdown-menu scrollable-menu" style="height: auto; max-height: 200px; width: 400px; overflow-x: hidden;">
                                <div class="panel panel-success" >
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-3">S/N</div>
                                            <div class="col-md-3">Product Image</div>
                                            <div class="col-md-3">Product Name</div>
                                            <div class="col-md-3">Price(N)</div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div id="cart_product">

                                        </div>
                                    </div>
                                    <div class="panel-footer"></div>
                                </div>
                            </div>
                        </li> 

                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

            <div class="row">

                <?php require ('include/sidebar.php'); ?>

                <div class="col-md-9">

                    <div class="row carousel-holder">
                        <div class="col-md-12">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img class="slide-image" src="img/lights/7260898-close-up-shot-of-car-head-lamp-in-blue-color-tone.jpg" style="width: 100%; height: 350px;" alt="">
                                    </div>
                                    <div class="item">
                                        <img class="slide-image" src="img/lights/2113484-rear-lights-of-a-red-car.jpg" style="width: 100%; height: 350px;" alt="">
                                    </div>
                                    <div class="item">
                                        <img class="slide-image" src="img/brakes/34064451-car-steering-wheel.jpg" style="width: 100%; height: 350px;" alt="">
                                    </div>
                                    <div class="item">
                                        <img class="slide-image" src="img/body/39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg" style="width: 100%; height: 350px;" alt="">
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
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
        </div>

    </body>
</html>