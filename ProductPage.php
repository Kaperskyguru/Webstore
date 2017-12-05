
<?php
require 'functions.php';
session_start();

if (isset($_SESSION["uid"])) {
    header("location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Product Page</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel = "stylesheet" href="css/main.css"/>
        <link href="css/shop-homepage.css" rel="stylesheet">


    </head>
    <body>
        <?php require ('include/menuHead.php'); ?>

        <div class="container">
            <div class="row">
                <?php require ('include/sidebar.php'); ?>

                
                    <div class="col-md-9">

                        <?php
                        $id = $_GET["id"];
                        $result = getProductDetails($id);
                        while ($data = mysqli_fetch_assoc($result)) {
                            $productName = $data["prod_title"];
                            $productPrice = $data["prod_price"];
                            $productDesc = $data["prod_desc"];
                            $product_image = $data['prod_image'];

//Search for how to resize Image in PHP
                            echo "


                    <div class='thumbnail'>
                        <img class='img-responsive' src='Admin/images/$product_image' alt=''>
                        <div class='caption-full'>
                            <h4 class='pull-right'>N$productPrice.00</h4>
                            <h3>$productName</h3>
                            <p>$productDesc</p>
                                
                        </div>
                             ";
                        }
                        ?>
                        <div class="ratings">
                            <p class="pull-right"><?php 
                            $id = $_GET["id"];
                            echo getRowNums("feedbacktable", "Prod_ID", $id);?> 
                            reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                                4.0 stars
                            </p>
                        </div>
                    </div>

                    <div class="well">
                        <div class="text-right">
                            <a class="btn btn-success" data-toggle = "modal" data-target = "#reviewModal">Leave a Review</a>
                        </div>

                        <hr>

                        <div>
                            <?php
                            $id = $_GET['id'];
                            $data1 = getAllFeedback($id);
                            while ($data = mysqli_fetch_assoc($data1)) {
                                echo '
                            <div class = "row">
                            <div class = "col-md-12">
                            <span class = "glyphicon glyphicon-star"></span>
                            <span class = "glyphicon glyphicon-star"></span>
                            <span class = "glyphicon glyphicon-star"></span>
                            <span class = "glyphicon glyphicon-star"></span>
                            <span class = "glyphicon glyphicon-star-empty"></span>
                            '
                                ?>
                                <?php
                                $id = $data["User_ID"];
                                echo getUsername($id);
                                echo '
                            <span class = "pull-right">10 days ago</span>
                            <p>'
                                ?><?php
                                echo $data["feed_Desc"];
                                echo '</p>
                            </div>
                            </div>

                            <hr>
';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container">
            <hr>
            <?php include('include/footer.php'); ?>
        </div>

        
        
        
        
        
       <!-- // Modal starts here-->
       
        <div id = "reviewModal" class = "modal fade" role = "dialog">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2>Write a review</h2>
                    </div>
                    <div class = "modal-body">
                        <form class = "form">
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea class="form-control" pid = "<?php echo $_GET['id'] ?>" rows="5" id="comment" name="comment"></textarea>
                            </div>
                        </form>
                    </div>

                    <div class = "modal-footer">
                        <button type="button" class="btn btn-primary" id="submitReview" name="submitReview">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="jquery/1.12.0/jquery2.js"></script>
        <script type="text/javascript" src="jquery/1.12.0/bootstrap.min.js"></script>
        <script type="text/javascript" src="jquery/1.12.0/main.js"></script>

        <?php include('include/modal.php'); ?>

    </body>
</html>
