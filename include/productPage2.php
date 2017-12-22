
<div id="get_product">
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
            <p class="pull-right">3 reviews</p>
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