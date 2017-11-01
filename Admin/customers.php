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
                <div class = "r">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Customers</h1>

                        </div>
                    </div>

                    <div class="container-fluid" id="dashboard">

                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2>Latest Customers</h2>
                                    </div>
                                    <div class="panel-body">
                                        <div class = "table-responsive">
                                            <table class="table table-hover table-striped">
                                                <thead class="">
                                                    <tr>
                                                        <td>S/N</td>
                                                        <td>Full Names</td>
                                                        <td>Email</td>
                                                        <td>Address</td>
                                                        <td>Date Created</td>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $data = array();
                                                    $data = getDBRows('users', 'User_ID');
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
                                                        <?php echo $query_run['f_name']; ?>
                                                        <?php echo '
                                                        </td>

                                                         <td>';
                                                        ?>
                                                        <?php echo $query_run['user_email']; ?>
                                                        <?php echo '
                                                        </td>

                                                         <td>';
                                                        ?>
                                                        <?php echo 'N ' . $query_run['user_address1']; ?>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <?php include('./include/notification.php'); ?>


                            </div>
                        </div>
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
