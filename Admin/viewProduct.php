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

                                            <!-- <label class="control-label">Search Product </label>-->
                                            <input type="text" class="form-control" size="65%"/>

                                            <select class="form-control" name="cat">
                                                <option selected="selected">Select a Category</option>
                                                <option>Brakes, Suspension and Steering</option>
                                                <option>Headlights and Lighting</option>
                                                <option>Body Parts</option>
                                                <option>Engine</option>
                                                <option>Accessories (Interior and External)</option>
                                            </select>
                                            <button type="submit" class="btn btn-default">Search</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-striped">
                            <thead class="">
                                <tr>
                                    <td>S/N </td>
                                    <td>Product Name</td>
                                    <td>Category</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>Date Created</td>
                                </tr>
                            </thead>
                            <?php
                            $data = array();
                            $data = getDBRows('products', 'prod_id');
                            $count = 1;
                            while ($query_run = mysqli_fetch_assoc($data)) {
                                $count + 2;
                                echo '<tr>
                                                        <td>';
                                ?>
                                <?php echo $count++; ?>
                                <?php echo '
                                                        </td>

                                                        <td>';
                                ?>
                                <?php echo $query_run['prod_title']; ?>
                                <?php echo '
                                                        </td>


                                                        <td>';
                                ?>
                                <?php echo getCatName($query_run['prod_cat']); ?>
                                <?php echo '
                                                        </td>


                                                         <td>';
                                ?>
                                <?php echo $query_run['prod_qty']; ?>
                                <?php echo '
                                                        </td>

                                                         <td>';
                                ?>
                                <?php echo 'N ' . $query_run['prod_price']; ?>
                                <?php echo '
                                                        </td>

                                                         <td>';
                                ?>
                                <?php echo $query_run['dateCreated']; ?>
                                <?php
                                echo '
                                                        </td>
                                                    </tr>
                                                 ';
                            }
                            ?>  

                            </tbody>
                        </table>

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
