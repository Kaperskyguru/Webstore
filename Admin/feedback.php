<?php 
include ('./init.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('include/head.php'); ?>
        <?php include('include/head.php'); ?>
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role = "navigation" style="margin-bottom: 0px">
                <?php include ('./include/menuHeader.php'); ?>
            </nav>

            <div id="sidebar-menu-wrapper">
                <!--side-->
                <?php include('./include/sidebar.php'); ?>
            </div>





            <div id="page-content-wrapper" class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-9">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success">
                                    <form role ="form" class="form-inline">
                                        <div class="form-group">
                                            <label class="control-label">Search By Product </label>
                                            <input type="search" class="form-control" />
                                            <button type="submit" class="btn btn-default">Search</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <?php
                        for ($i = 1; $i < 6; $i++) {
                            echo '
                                    
                                    <div class="panel panel-primary">
                                        <div class = "panel-heading">
                                            <div class = "row">
                                                <div class="col-lg-3 col-md-3 col-xs-12">
                                                    <h5>Product</h5>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-xs-12">
                                                    <h5 class = "text-center">Reviewed</h5>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-xs-12">
                                                    <h5>Reviewed by</h5>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-xs-12">
                                                    <h5>Date Reviewed</h5>
                                                </div>
                                            </div>
                                           
                                                       
                                        </div>
                                        
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 ">
                                                    <p>'
                            ?> <?php echo getFeedback('products.prod_title', $i); ?><?php
                            echo '</p>
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                    <p class = "text-capitalize text-center"> '
                            ?> <?php echo getFeedback('feedbacktable.feed_Desc', $i); ?><?php
                            echo '</p>
                                                </div>
                                                <div class="col-lg-2 col-md-2">
                                                    <p>'
                            ?> <?php echo getFeedback('users.f_name', $i); ?><?php
                            echo '</p>
                                                </div>
                                                <div class="col-lg-2 col-md-2">
                                                    <p>'
                            ?> <?php echo getFeedback('feedbacktable.DateCreated', $i); ?><?php
                            echo '</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                            ';
                        }
                        ?>

                        <div class="panel panel-primary">
                            <div class = "panel-heading">
                                <div class = "row">
                                    <div class="col-lg-4 col-md-4 col-xs-4">
                                        <button type="button" class="btn btn-primary btn-block">Previous</button>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-4">
                                        <h5 class="text-center">Page 1 of 12 </h5>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-4">
                                        <button type="button" class="btn btn-primary btn-block">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <?php include('./include/notification.php'); ?>
                    </div>
                </div>

            </div>

        </div>


        <script>

            $(document).ready(function() {
                $(".dropdown-toggle").dropdown();
            });


            $('#toggle').click(function(e) {
                e.preventDefault();
                $('#wrapper').toggleClass('menuWrapper');
            });

            $('#toggle1').click(function(e) {
                e.preventDefault();
                $('#wrapper').toggleClass('menuWrapper');
            });

        </script>
    </body>
</html>
