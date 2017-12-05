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
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>Reviews</h3>
                            </div>
                            <div class = "table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="">
                                        <tr>
                                            <td>S/N</td>
                                            <td>Product Name</td>
                                            <td>Reviewed</td>
                                            <td>Reviewed By</td>
                                            <td>Date Ordered</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        $data1 = getAllFeedback();
                                        while ($data = mysqli_fetch_assoc($data1)) {
                                            $count + 2;
                                            echo '  
                                                        
                                                    <tr>
                                                        <td>'
                                            ?><?php
                                            echo $count++;
                                            echo '</td>
                                                            
                                                    <td>'
                                            ?><?php
                                            $i = $data["Prod_ID"];
                                            echo getProduct("prod_title", $i);
                                            echo '</td>
                                                            
                                                     <td>'
                                            ?><?php
                                            echo $data["feed_Desc"];
                                            echo '</td>
                                                            
                                                    <td>'
                                            ?><?php
                                            $userid = $data["User_ID"];
                                            echo getUsername($userid);
                                            echo '</td>
                                                        
                                                         <td>'
                                            ?><?php
                                            echo $data["DateCreated"];
                                            echo '</td>
                                                         
                                                    ';
                                        }
                                        ?>  
                                        </tr>        
                                    </tbody>
                                </table>
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

            $(document).ready(function () {
                $(".dropdown-toggle").dropdown();
            });


            $('#toggle').click(function (e) {
                e.preventDefault();
                $('#wrapper').toggleClass('menuWrapper');
            });

            $('#toggle1').click(function (e) {
                e.preventDefault();
                $('#wrapper').toggleClass('menuWrapper');
            });

        </script>
    </body>
</html>
