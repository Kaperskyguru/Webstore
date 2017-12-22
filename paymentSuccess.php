<?php
session_start();

if(!isset($_SESSION["uid"])){
    header("location: index.php");
}else{
    if($_SESSION["uid"] == 2){
        
       header("location: ./Admin/index.php"); 
    }
}

?>

<!DOCTYPE html>
		<html lang='en'>
			<head>
				<title>Customer Page</title>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="css/bootstrap.min.css">
				<link rel="stylesheet" href="css/bootstrap.min.css" />
				<link rel = "stylesheet" href="css/main.css"/>
				<link href="css/shop-homepage.css" rel="stylesheet">
				<script type="text/javascript" src="jquery/1.12.0/jquery2.js"></script>
				<script type="text/javascript" src="jquery/1.12.0/bootstrap.min.js"></script>
				<script type="text/javascript" src="jquery/1.12.0/main.js"></script>
			</head>
			<style>
				table tr td{padding: 10px;}
			</style>
			<body>
			
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">SpareParts</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="#">About</a>
					</li>
					<li>
						<a href="#">Services</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
					<form class="navbar-form navbar-right">
						<div class="input-group">
							<input type="text" placeholder="Search" id="search" class="form-control" />
							<div class="input-group-btn">
								<button class="btn-btn-primary" style="margin-left: -2px; font-size: 20px; padding-bottom: 2px;" id="search_btn">
									<i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
					</form>
				</ul>
	
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> <?php echo "Hello, ".$_SESSION['name']; ?></span></a>
					<ul class="dropdown-menu">
						<li><a href="userpage.php" style="color: blue;">My Account</a></li>
						<li class="divider"></li>
						<li style=""><a href="#" style="color: blue;">My Orders</a</li>
                        <li class="divider"></li>
                        <li style=""><a href="#" style="color: blue;">My Reviews</a</li>
                        <li class="divider"></li>
                        <li><a href="logout.php" style="color: blue;"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
					</ul>
				</li>
				</ul>
			</div>
		</div>
	</nav>
	<p><br/></p>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Thank You</h1>
						<hr>
						<p>Hello <?php echo $_SESSION['name']; ?>, Your payment process is successfully completed and your Transaction ID is
                        xxxxx-xx-x<br/>
                        you can continue your shopping</p>
                        <a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
		
        
		
		<div class="container">
            <hr>
            <?php include ('include/footer.php'); ?>
        </div>

            </body>
        </html>