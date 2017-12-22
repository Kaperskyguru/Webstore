<?php
session_start();
if(isset($_SESSION["uid"])){
	header("location: profile.php");
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
			
	           <?php require ('include/myHead.php'); ?>

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

                    <div class="row">
						<div id="get_product">
							
						</div>
                       <!-- <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="images/lights/20628446-headlight-car-done-in-3d-white-background.jpg" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$24.99</h4>
                                    <h4><a href="ProductPage.php">First Product</a>
                                    </h4>
                                    <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
									<button style="float: right;" class="btn btn-danger btn-xs">AddToCart</button>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">15 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">

                                <img src="images/brakes/11138785-new-two-brake-discs-isolated-on-white-background.jpg" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$64.99</h4>
                                    <h4><a href="ProductPage.php">Second Product</a>
                                    </h4>
                                    <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<button style="float: right;" class="btn btn-danger btn-xs">AddToCart</button>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">12 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="images/lights/2113484-rear-lights-of-a-red-car.jpg" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$74.99</h4>
                                    <h4><a href="ProductPage.php">Third Product</a>
                                    </h4>
                                    <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<button style="float: right;" class="btn btn-danger btn-xs">AddToCart</button>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">31 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="images/interior/32170204-modern-car-air-vent-closeup-air-quality-in-a-car-cooling-and-heating-car-vents.jpg" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$84.99</h4>
                                    <h4><a href="ProductPage.php">Fourth Product</a>
                                    </h4>
                                    <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<button style="float: right;" class="btn btn-danger btn-xs">AddToCart</button>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">6 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="images/brakes/Suspension.jpg" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$94.99</h4>
                                    <h4><a href="ProductPage.php">Fifth Product</a>
                                    </h4>
                                    <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<button style="float: right;" class="btn btn-danger btn-xs">AddToCart</button>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">18 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="images/interior/74368416-car-door-handles-and-central-locking.jpg" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$94.99</h4>
                                    <h4><a href="ProductPage.php">Fifth Product</a>
                                    </h4>
                                    <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<button style="float: right;" class="btn btn-danger btn-xs">AddToCart</button>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">18 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    </p>
                                </div>
                            </div>
                        </div> -->

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

    <?php include('include/modal.php'); ?>
            </body>
        </html>