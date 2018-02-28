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