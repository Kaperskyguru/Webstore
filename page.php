<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 $select_db = mysqli_select_db($conn, $db);

?>



<!DOCTYPE html>
    <html lang='en'>
        <head>
            <title>Customer Page</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/bootstrap.css" />
            <script type="text/javascript" src="jquery/1.12.0/jquery.min.js"></script>
			<script type="text/javascript" src="jquery/1.12.0/bootstrap.min.js"></script>
            <style></style>
        </head>
        <body>
			<br />
			<div class="container" style="width: 800px;">
				<h3 align="center">Multi tab Shopping cart by using Ajax Jquery Bootstrap Mysql</h3><br />
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#products">Products</a></li>
					<li><a data-toggle="tab" href="#cart">Cart <span class="badge"><?php if(isset($_SESSION["shopping_cart"])) { echo count($_SESSION["shopping_cart"]);} else{ echo '0';} ?></span></a></li>
				</ul>
				<div class="tab-content">
					<div id="products" class="tab-pane fade in active">
						<?php
						$query = "SELECT * FROM tbl_product ORDER BY id ASC";
						$result = mysqli_query($conn, $query);
						while($row = mysqli_fetch_array($result))
						{
							?>
							<div class="col-md-4" style="margin-top: 12px;">
								<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 16px; height: 350px;" align="center">
									
									<img src="<?php echo $row["image"]; ?> " class="img-responsive" /><br />
									<h4 class="text-info"><?php echo $row["name"]; ?></h4>
									<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
									<input type="text" name="quantity" id="quantity<?php echo $row["id"]; ?>" class="form-control" value="1" />
									<input type="hidden" name="hidden_name" id="name<?php echo $row["id"]; ?>" class="<?php echo $row["name"]; ?>" />
									<input type="hidden" name="hidden_price" id="price<?php echo $row["id"]; ?>" class="<?php echo $row["price"]; ?>" />
									<input type="button" name="add_to_cart" id="<?php echo $row["id"]; ?>" style="margin-top: 5px;" class="btn btn-warning form-control add_to_cart" value="Add to Cart" />
									
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<div id="cart" class="tab-pane fade">
						<div class="table-responsive" id="order_table">
							<table class="table table-bordered">
								<tr>
									<th width="40%">Product Name</th>
									<th width="10%">Quantity</th>
									<th width="20%">Price</th>
									<th width="15%">Total</th>
									<th width="5%">Action</th>
								</tr>
								<?php
								if(!empty($_SESSION["shopping_cart"])){
									$total = 0;
									foreach($_SESSION["shopping_cart"] as $keys => $values)
									{
										?>
										<tr>
											<td><?php echo $values["product_name"]; ?></td>
											<td><?php echo $values["product_quantity"]; ?></td>
											<td align="right">$ <?php echo $values["product_price"]; ?></td>
											<td align="right">$ <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>
											<td><button name="delete" class="delete" id="<?php echo $values["product_id"]; ?>">Remove</button></td>
										</tr>
										<?php
										$total = $total + ($values["product_quantity"] * $values["product_price"]);
									}
									?>
									<tr>
										<td colspan="3" align="right">Total</td>
										<td align="right">$ <?php echo number_format($total, 2); ?></td>
										<td></td>
									</tr>
									<?php
								}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
				<script>
					$(document).ready(function(data){
						
						$('.add_to_cart').click(function() {
							var product_id= $(this).attr("id");
							var product_name= $('#name'+product_id).val();
							var product_price= $('#price'+product_id).val();
							var product_quantity = $('#quantity'+product_id).val();
							var action = "add";
							if (product_quantity > 0) {
                                $.ajax({
									url:"action.php",
									method:"POST",
									dataType:"json",
									data:{
										product_id:product_id,
										product_name:product_name,
										product_price:product_price,
										product_quantity:product_quantity,
										action:action
									},
									success:function(data){
										$('#order_table').html(data.order_table);
										$('.badge').text(data.cart_item);
										alert("Product has been Added into Cart");
									}
								});
                            }
							else {
								alert("please Enter Quantity of Product");
							}
						});
					});
				</script>
		</body>
	</html>	