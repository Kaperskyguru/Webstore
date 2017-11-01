<?php
include("./init.php");
?>
<?php
$title = $brand = $desc = $cat = $qty = $price = $thump = "";
for ($i = 0; $i <= 7; $i++) {
    $error[$i] = "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $thump = uploads();

    if (empty($_POST['title'])) {
        $error[0] = 'Title is required';
    } else {
        $title = sanitizer($_POST['title']);
    }

    if (empty($_POST['brand']) || $_POST['brand'] == "Select a Brand") {
        $error[1] = 'Brand is required';
    } else {
        $brand = getBrandId(sanitizer($_POST['brand']));
    }

    if (empty($_POST['desc'])) {
        $error[2] = 'Description is required';
    } else {
        $desc = sanitizer($_POST['desc']);
    }

    if (empty($_POST['cat']) || $_POST['cat'] == "Select a Category") {
        $error[3] = 'Category is required';
    } else {
        $cat = get_Category_Id(sanitizer($_POST['cat']));
    }

    if (empty($_POST['qty'])) {
        $error[4] = "Quantity is required";
    } else {
        $qty = sanitizer($_POST['qty']);
    }

    if (empty($_POST['price'])) {
        $error[5] = "Price is required";
    } else {
        $price = sanitizer($_POST['price']);
    }
    if (empty($thump)) {
        $error[6] = "Image Required";
    } else {
        //echo $thump;
    }

    if (!ctype_alpha($error)) {
        $query1 = "INSERT INTO products (prod_title,prod_desc,prod_cat,prod_brand,Prod_Qty,prod_price, prod_image) VALUES ('$title', '$desc', '$cat','$brand', '$qty', '$price', '$thump')";
        if (mysqli_query($con, $query1) == true) {
            $error[7] = '   Product added successfully';
        } else {
            $error[6] = "Image Required";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include('./include/head.php'); ?>
        <?php include('./include/head.php'); ?>

        <style>
            form i{
                color:red;
            }
        </style>

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

            <div class="container" id="page-content-wrapper">

                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel panel-heading">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <h2 class="page-heading">Add New Item</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-body">
                                <div class="col-lg-10">
                                    <form role = "form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" class="form-horizontal"> 

                                        <div class="form-group">
                                            <label for="title" class="control-label col-sm-2">Title:</label>
                                            <div class="col-sm-10">
                                                <i id="errorTitle"><?php print_r($error[0]); ?></i>
                                                <input class="form-control" id="title" type="text" name="title" placeholder="Add New Item"/>
                                            </div>
                                        </div>


                                        <br/>
                                        <div class="form-group">
                                            <label for="desc" class="control-label col-sm-2">Description:</label>
                                            <div class="col-sm-10">
                                                <i id="errorDesc"> <?php print_r($error[2]) ?></i>
                                                <textarea class="form-control form-control-lg" id="desc" name="desc" placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" id="cat">Category:</label>
                                            <div class="col-sm-10">
                                                <i id="errorCat"> <?php print_r($error[3]) ?></i>
                                                <select class="form-control" name="cat">
                                                    <option selected="selected">Select a Category</option>
                                                    <option>Brakes, Suspension and Steering</option>
                                                    <option>Headlights and Lighting</option>
                                                    <option>Body Parts</option>
                                                    <option>Engine</option>
                                                    <option>Accessories (Interior and External)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="brand">Brands:</label>
                                            <div class="col-sm-10">
                                                <i id="errorSubtitle"> <?php print_r($error[1]); ?></i>
                                                <select class="form-control" name="brand" id="brand">
                                                    <option selected="selected">Select a Brand</option>

                                                    <?php
                                                    $res = getBrands();
                                                    while ($res1 = $res->fetch_assoc()) {
                                                        echo "<option>"
                                                        ?> <?php echo $res1['brand_title'] ?></option>";
                                                    <?php }
                                                    ?>


                                                    <!--<option>Brembo</option>
                                                    <option>AC Delco</option>
                                                    <option>Akebono</option>
                                                    <option>General Electric</option>
                                                    <option>Universal Air Suspension</option>
                                                    <option> Air Lift</option>
                                                    <option>Torque</option>
                                                    <option>Honda</option>
                                                    <option>BMW</option>
                                                    <option>Mercedes-Benz</option>
                                                    <option>Toyota</option>
                                                    <option>Ford</option>
                                                    <option>Lycoming Engines</option>
                                                    <option>Sparco</option>
                                                    <option>GT Performance</option>
                                                    <option>Matrix Steering Wheels</option>
                                                    <option>Flaming River</option>-->
                                                </select>
                                            </div>
                                        </div>
                                        <br/><br/>
                                        <div class="form-group">
                                            <label for="qty" class="control-label col-sm-2">Quantity:</label>
                                            <div class="col-sm-10">
                                                <i id="errorQty"><?php print_r($error[4]) ?></i>
                                                <input class="form-control" type="number" id="qty" name="qty" placeholder="Enter Quantity" />
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group">
                                            <label for="price" class="control-label col-sm-2">Price:</label>
                                            <div class="col-sm-10">
                                                <i id="errorPrice"> <?php print_r($error[5]) ?></i>
                                                <input class="form-control" id="price" type="number" name="price" placeholder="Enter Price per Item"/>
                                            </div>
                                        </div>
                                        <br/>                              
                                        <div class="form-group">
                                            <label for="uploadFile" class="control-label col-sm-2">Thumbnail:</label>
                                            <div class="col-sm-10">
                                                <i id="errorImage"> <?php print_r($error[6]) ?></i>
                                                <input type="file"  name="uploadFile" id="uploadFile"/>
                                            </div>
                                        </div>
                                        <br/>                     

                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Add Item"/>
                                                <span class="text-right text-success"><?php print_r($error[7]) ?></span>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>

                        </div>


                    </div>

                    <div class="col-lg-4 col-md-4">
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
<?php

function uploads() {

    if (!empty(basename($_FILES["uploadFile"]["name"]))) {
        $target_dir = 'images/';
        $target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
        $uploadOK = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        global $error;

        if (getimagesize($_FILES["uploadFile"]["tmp_name"]) !== false) {
            $uploadOK = 1;
        } else {
            $error[6] = "File is not an image";
            $uploadOK = 0;
        }

// Check if the file already exist
        if (file_exists($target_file)) {
            $error[6] = "Sorry, file already exists";
            $uploadOK = 0;
        }

// Check file size
//        if ($_FILES["uploadFile"]["size"] > 500000) {
//            $error[6] = "Sorry, Your file is too large.";
//            $uploadOK = 0;
//        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error[6] = "Sorry, only JPG, JPEG, PNG, GIF files are allowed";
            $uploadOK = 0;
        }

// Check if $uploadOK is set to 0 by an error
        if ($uploadOK == 1) {
            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) {
                return dirname($target_file) . '/' . basename($_FILES["uploadFile"]["name"]);
            } else {
                $error[6] = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $error[6] = "Please Select an Image";
    }
}

function get_Category_Id($category_Name) {
    global $con;
    $sql = "SELECT cat_id FROM categories WHERE cat_title = '" . $category_Name . "'";
    $run_query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($run_query);
    return $row['cat_id'];
}
