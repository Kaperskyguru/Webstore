<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JC SpareParts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include('./include/head.php'); ?>
        <?php include('./include/head.php'); ?>
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
                <?php
                include('./include/dashboard.php');
                ?>


            </div>
        </div>
        <script>




            $('#toggle').click(function(e) {
                e.preventDefault();
                $('#wrapper').toggleClass('menuWrapper');
            });

            $('#toggle1').click(function(e) {
                e.preventDefault();
                $('#wrapper').toggleClass('menuWrapper');
            });

            $(document).load(function() {
                $('#wrapper1').css('display', 'none');
            });


        </script>


    </body>
</html>