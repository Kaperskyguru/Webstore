
<?php
include('./init.php');


echo '
    <div class = "r">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>

            </div>
        </div>

        <div class="row" id="tabBox">
            <div class="col-lg-3 col-md-6 ">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i style="font-size: 5em"class="glyphicon glyphicon-comment"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 40px; text-align: right;"> '?>
                                    <?php 
                                           echo getRowNums('feedbacktable','',0);
                                    echo '
                                </div>
                                <div style="font-size: 1em; text-align: right;">Total Feedbacks</div>
                            </div>
                        </div>
                    </div>
                    <a href="feedback.php">
                        <div class="panel-footer">
                            <span class="pull-left"> View Details </span>.
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-forward"></i>
                            </span>
                            <div class="clear:both"></div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 ">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i style="font-size: 5em"class="glyphicon glyphicon-tasks"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 40px; text-align: right;">
                                '?>
                                 <?php 
                                        echo getRowNums('products','',0);
                                 echo '
                                
                                    
                                </div>
                                <div style="font-size: 1em; text-align: right;">New Products</div>
                            </div>
                        </div>
                    </div>
                    <a href="addProduct.php">
                        <div class="panel-footer">
                            <span class="pull-left"> Add New Product </span>.
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-forward"></i>
                            </span>
                            <div class="clear:both"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 ">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i style="font-size: 5em"class="glyphicon glyphicon-shopping-cart"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 40px; text-align: right;"> '?>
                                    <?php 
                                           echo getRowNums('ordertable','Sta_ID',2);
                                    echo '
                                </div>
                                <div style="font-size: 1em; text-align: right;">New Orders</div>
                            </div>
                        </div>
                    </div>
                    <a href="order.php?t=Pending">
                        <div class="panel-footer">
                            <span class="pull-left"> View Pending Orders </span>.
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-forward"></i>
                            </span>
                            <div class="clear:both"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 ">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i style="font-size: 5em"class="glyphicon glyphicon-user"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 40px; text-align: right;"> '?>
                                    <?php 
                                           echo getRowNums('users','user_role',0);
                                    echo '
                                </div>
                                <div style="font-size: 1em; text-align: right;">Total Customers</div>
                            </div>
                        </div>
                    </div>
                    <a href="customers.php">
                        <div class="panel-footer ">
                            <span class="pull-left"> View All Customers </span>.
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-forward"></i>
                            </span>
                            <div class="clear:both"></div>
                        </div>
                    </a>
                </div>
            </div>

        </div>



        <div class="container-fluid" id="dashboard">

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Latest Items</h2>
                        </div>
                        <div class="panel-body">
                            <div class = "table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="">
                                        <tr>
                                            <td>S/N</td>
                                            <td>Product Name</td>
                                            <td>Category</td>
                                            <td>Quantity</td>
                                            <td>Price</td>
                                            <td>Date Created</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            '
                                            ?>

                                              <?php
                                              $data = array();
                                                    $data = getDBRows('products', 'prod_id');
                                                    $count = 1;
                                                while($query_run = mysqli_fetch_assoc($data)){
                                                      $count+2;
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
                                                                <?php echo 'N '.$query_run['prod_price']; ?>
                                                          <?php echo '
                                                        </td>

                                                         <td>';
                                                            ?>
                                                                <?php echo $query_run['dateCreated']; ?>
                                                          <?php echo '
                                                        </td>
                                                    </tr>
                                                 ';
                                                }
                                              ?>  

                                         <?php echo '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">';
?>
<?php include('./include/notification.php'); ?>
<?php
echo '
    


                </div>
            </div>
        </div>
    </div>
';
