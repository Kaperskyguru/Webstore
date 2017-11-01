<?php

session_start();
require('include/sanitizer.php');
require_once('include/connect.inc.php');
global $conn;
if (isset($_POST["category"])) {
    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($conn, $category_query);
    echo "
                <div class='list-group'>
                    <a href='#' class='list-group-item active'>Category</a>
        ";

    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $cid = $row["cat_id"];
            $cat_name = $row["cat_title"];
            echo "<a href='#' class='list-group-item category' cid='$cid'>$cat_name</a>";
        }
        echo "</div>";
    }
}

if (isset($_POST["brand"])) {
    $brand_query = "SELECT * FROM brands ORDER BY RAND() LIMIT 0,100";
    $run_query = mysqli_query($conn, $brand_query);
    echo "
                <div class='list-group'>
                    <a href='#' class='list-group-item active'>Brand</a>
        ";

    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $bid = $row["brand_id"];
            $brand_name = $row["brand_title"];
            echo "<a href='#' class='list-group-item brand' bid='$bid'>$brand_name</a>";
        }
        echo "</div>";
    }
}



if (isset($_POST["page"])) {
    $key = $_POST["key"];
    //echo $key;
    $split = explode(",", $key);
    $real_key = $split[0];
    $se_key = $split[1];
    //echo $real_key. "\n";
    //echo $se_key;
    switch ($real_key) {
        case "product":
            $sql = "SELECT * FROM products";
            $run_query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($run_query);
            $pageno = ceil($count / 9);
            for ($i = 1; $i <= $pageno; $i++) {
                echo "
						<li><a href='#' page='$i' id='page'>$i</a></li>
				";
            }
            break;
        case "search":
            //$sql = "SELECT * FROM users";
            $sql = "SELECT * FROM products WHERE prod_keywords LIKE '%$se_key%' OR prod_title LIKE '%$se_key%' OR  prod_desc LIKE '%$se_key%'";
            $run_query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($run_query);
            $pageno = ceil($count / 9);
            for ($i = 1; $i <= $pageno; $i++) {
                echo "
						<li><a href='#' searchy='$i' id='searchy'>$i</a></li>
				";
            }
            break;

        case "cat":
            $sql = "SELECT * FROM products WHERE prod_cat = '$se_key'";
            $run_query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($run_query);
            $pageno = ceil($count / 9);
            for ($i = 1; $i <= $pageno; $i++) {
                echo "
						<li><a href='#' cat='$i' id='cat'>$i</a></li>
				";
            }
            break;

        case "brand" :
            $sql = "SELECT * FROM products WHERE prod_brand = '$se_key'";
            $run_query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($run_query);
            $pageno = ceil($count / 9);
            for ($i = 1; $i <= $pageno; $i++) {
                echo "
						<li><a href='#' brand='$i' id='brand'>$i</a></li>
				";
            }
            break;
    }
}


if (isset($_POST["product"])) {
    $key = "";
    $limit = 9;
    if (isset($_POST["setPage"])) {
        $pageno1 = $_POST["pn"];
        $split = explode(",", $pageno1);
        $pageno = $split[0];
        $key = $split[1];
        $id = $split[2];
        $stert = ($pageno * $limit) - $limit;
    } else {
        $stert = 0;
    }
    $product_query = "SELECT * FROM products LIMIT $stert,$limit";
    if ($key == "product") {
        $product_query = "SELECT * FROM products  LIMIT $stert,$limit";
    } else if ($key == "cat") {
        $product_query = "SELECT * FROM products WHERE prod_cat = '$id' LIMIT $stert,$limit";
    } else if ($key == "brand") {
        echo $id;
        $product_query = "SELECT * FROM products WHERE prod_brand = '$id' LIMIT $stert,$limit";
    } else {
        $product_query = "SELECT * FROM products WHERE prod_keywords LIKE '%$key%' OR prod_title LIKE '%$key%' OR  prod_desc LIKE '%$key%' LIMIT $stert,$limit";
    }

    $run_query = mysqli_query($conn, $product_query);
    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $product_id = $row['prod_id'];
            $product_cat = $row['prod_cat'];
            $product_brand = $row['prod_brand'];
            $product_title = $row['prod_title'];
            $product_price = $row['prod_price'];
            $product_desc = $row['prod_desc'];
            $product_image = $row['prod_image'];


            echo "
                <div class='col-sm-4 col-lg-4 col-md-4'>
                            <div class='thumbnail'>
                                <img src='Admin/images/$product_image' alt=''>
                                <div class='caption'>
                                    <h4 class='pull-right'>N$product_price.00</h4>
                                    <h4><a href='ProductPage.php?id=$product_id'>$product_title</a>
                                    </h4>
                                    <p>$product_desc</p>
                                    <button pid='$product_id' style='float: right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
                                </div>
                                <div class='ratings'>
                                    <p class='pull-right'>15 reviews</p>
                                    <p>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                    </p>
                                </div>
                            </div>
                        </div>
            ";
        }
    }
}
if (isset($_POST["get_selected_category"]) || isset($_POST["get_selected_brand"]) || isset($_POST["search"])) {
    if (isset($_POST["get_selected_category"])) {
        $id = $_POST["cid"];
        $limit = 9;
        $stert = getLimit($limit);
        $sql = "SELECT * FROM products WHERE prod_cat = '$id' LIMIT $stert,$limit";
    } else if (isset($_POST["get_selected_brand"])) {
        $id = $_POST["bid"];
        $limit = 9;
        $stert = getLimit($limit);
        $sql = "SELECT * FROM products WHERE prod_brand = '$id' LIMIT $stert,$limit";
    } else {
        $keyword = $_POST["keyword"];
        $limit = 9;
        $stert = getLimit($limit);
        $sql = "SELECT * FROM products WHERE prod_keywords LIKE '%$keyword%' OR prod_title LIKE '%$keyword%' OR  prod_desc LIKE '%$keyword%' LIMIT $stert,$limit";
    }
    $run_query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_query)) {
        $product_id = $row['prod_id'];
        $product_cat = $row['prod_cat'];
        $product_brand = $row['prod_brand'];
        $product_title = $row['prod_title'];
        $product_price = $row['prod_price'];
        $product_desc = $row['prod_desc'];
        $product_image = $row['prod_image'];
        echo "
                <div class='col-sm-4 col-lg-4 col-md-4'>
                            <div class='thumbnail'>
                                <img src='Admin/images/$product_image' alt=''>
                                <div class='caption'>
                                    <h4 class='pull-right'>N$product_price.00</h4>
                                    <h4><a href='ProductPage.php?id=$product_id'>$product_title</a>
                                    </h4>
                                    <p>$product_desc</p>
                                    <button pid='$product_id' style='float: right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
                                </div>
                                <div class='ratings'>
                                    <p class='pull-right'>15 reviews</p>
                                    <p>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                        <span class='glyphicon glyphicon-star'></span>
                                    </p>
                                </div>
                            </div>
                        </div>
            ";
    }
}

if (isset($_POST["addProduct"])) {
    $p_id = $_POST["p_id"];
    $userid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$userid'";
    $run_query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($run_query) > 0) {
        echo "
								<div class='alert alert-warning'>
												<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product already added to Cart, continue shopping!...</b>
										 </div>
						";
    } else {
        $sql = "SELECT * FROM products WHERE prod_id = '$p_id'";
        $run_query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($run_query);
        $id = $row["prod_id"];
        $pro_name = $row["prod_title"];
        $pro_image = $row["prod_image"];
        $pro_price = $row["prod_price"];
        $sql = "INSERT INTO cart (id, p_id, ip_address, user_id, product_title, product_image, qty, price, total_amount) VALUES (NULL, '$p_id', '0', '$userid', '$pro_name', '$pro_image', '1',
								'$pro_price', '$pro_price')";
        if (mysqli_query($conn, $sql)) {
            echo "
										<div class='alert alert-success'>
												<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product is Added..!</b>
										 </div>
								";
        }
    }
}

if (isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])) {
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id = '$uid'";
    $run_query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($run_query) > 0) {
        $no = 1;
        $total_amt = 0;
        while ($row = mysqli_fetch_array($run_query)) {
            $id = $row["id"];
            $pro_id = $row["p_id"];
            $pro_name = $row["product_title"];
            $pro_image = $row["product_image"];
            $qty = $row["qty"];
            $pro_price = $row["price"];
            $total = $row["total_amount"];
            $price_array = array($total);
            $total_sum = array_sum($price_array);
            $total_amt = $total_amt + $total_sum;
            if (isset($_POST["get_cart_product"])) {
                echo "
                    <div class='row'>
                                    <div class='col-md-3'>$no</div>
                                    <div class='col-md-3'><img src='images/$pro_image' alt='' width='60px' height='50px'></div>
                                    <div class='col-md-3'>$pro_name</div>
                                    <div class='col-md-3'>N$pro_price.00</div>
                            </div>
                    ";
                $no = $no + 1;
            } else {
                echo "	
								<div class='row'>
                                        <div class='col-md-2'>
                                            <div class='btn-group'>
                                                <a href='#' remove_id='$pro_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
                                                <a href='#' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
                                            </div>
                                        </div>
                                        <div class='col-md-2'><img src='./Admin/images/$pro_image' width='60px' height='50px'/></div>
                                        <div class='col-md-2'>$pro_name</div>
                                        <div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
                                        <div class='col-md-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>
                                        <div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
                                    </div>
									
						";
            }
        }
        if (isset($_POST["cart_checkout"])) {
            echo "
                    <div class='row'>
                                    <div class='col-md-8'></div>
                                    <div class='col-md-4'>
                                                    <label id = 'total_amt'>Total: N$total_amt</label>
                                                        <button class = 'button-primary' onclick = 'clic()' tid = '$total_amt' id = 'checkout'> Checkout </button>
                                    </div>
                    </div>
                ";
        }
    }
}

if (isset($_POST["cart_count"])) {
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id = '$uid'";
    $run_query = mysqli_query($conn, $sql);
    echo $count = mysqli_num_rows($run_query);
}

if (isset($_POST["removeFromCart"])) {
    $pid = $_POST["pid"];
    $uid = $_SESSION["uid"];
    $sql = "DELETE FROM cart WHERE user_id = '$uid' AND p_id = '$pid'";
    $run_query = mysqli_query($conn, $sql);
    if ($run_query) {
        echo "
						<div class='alert alert-danger'>
                                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Item removed from cart, continue shopping..!</b>
						</div>
				";
    }
}

if (isset($_POST["updateProduct"])) {
    $uid = $_SESSION["uid"];
    $pid = $_POST["pid"];
    $qty = $_POST["qty"];
    $price = $_POST["price"];
    $total = $_POST["total"];

    $sql = "UPDATE cart SET qty = '$qty', price = '$price', total_amount = '$total' WHERE user_id = '$uid' AND p_id = '$pid'";
    $run_query = mysqli_query($conn, $sql);
    if ($run_query) {
        echo "
						<div class='alert alert-info'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product Updated, continue shopping..!</b>
								 </div>
				";
    }
}
if (isset($_POST["total_amt"])) {
    $total_amt = $_POST["total_amt"];
    checkOut($total_amt);
}

if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
    $id = $_SESSION['uid'];
    echo $comment;
    storeReview();
}

function getLimit($limit) {
    if (isset($_POST["setPage"])) {
        $pageno = $_POST["pn"];
        return $stert = ($pageno * $limit) - $limit;
    } else {
        return $stert = 0;
    }
}

function checkOut($totalPrice) {
    global $conn;
    $ID = $_SESSION["uid"];
    // Run Payment Verification with paypal
    // If true
    // Move items to Order table
    moveToOrderTable($ID);
    // Indicate Current Status
    // else
    // Rollback
    // mysqli_rollback($conn);
    // notify of error
}

function moveToOrderTable($ID) {
    //global $conn;
    $sql = "SELECT * FROM cat WHERE user_id = '" + $ID + "'";
    $run_query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($run_query)) {
        $prod_ID = $row["p_id"];
        $user_ID = $row["user_id"];
        $total_price = $row["total_amount"];
        $qty = $row["qty"];
        
    }
    addToOrderTable($prod_ID, $user_ID, $total_price, $qty);
}

function addToOrderTable($prod_ID, $user_ID, $total_price, $qty) {
    global $conn;
    $sql = "INSERT INTO ordertable(Prod_ID,User_ID, Ord_Qty)VALUES($prod_ID,$user_ID,$qty)";
    if (mysqli_query($conn, $sql)) {
        echo "successful";
        //$sql2 = "INSERT INTO ordertable (Sta_ID,Ord_TotalPrice, TrackingID, Items_No) VALUES (1,,,,$total_price)";
        //$run_query1 = mysqli_query($conn, $sql);
    } else {
        echo "Failed";
        mysqli_rollback($conn);
    }
    
    
}
