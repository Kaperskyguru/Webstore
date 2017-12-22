<!DOCTYPE html>
		<html lang='en'>
			<head>
				<title>Customer Page</title>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="css/bootstrap.min.css">
				<link rel="stylesheet" href="css/bootstrap.css" />
				<link rel = "stylesheet" href="css/main.css"/>
				<!--<script type="text/javascript" src="jquery/1.12.0/jquery.min.js"></script>
				<script type="text/javascript" src="jquery/1.12.0/bootstrap.min.js"></script>-->
				<script type="text/javascript" src="jquery/1.12.0/jquery.min.js"></script>
				<script type="text/javascript" src="jquery/1.12.0/bootstrap.min.js"></script>
				<script type="text/javascript" src="jquery/1.12.0/main.js"></script>
				
			</head>
			<body>
				<nav class="navbar navbar-inverse">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a class="navbar-brand" href="#">Logo</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href="#" class="glyphicon glyphicon-modal-window"><span> Products</span></a></li>
			<li><a href="#"><span> Deals</span></a></li>
			<li><a href="#"><span> Stores</span></a></li>
			<li><a href="#"><span> Contact</span></a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="#" onclick="document.getElementById('id01').style.display='block'"><span class="glyphicon glyphicon-user"></span> <?php echo "Hi, " .$_SESSION['name']; ?></a></li>
			<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="badge">0</span> Cart</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
		  </ul>
		</div>
	  </div>
	</nav>

    
    <div class="container">
	  <div class="row">
		<div class="col-sm-3">
		  <ul class="nav nav-pills nav-stacked" style="width: 110%; margin-left: -14px;">
			<h4 style="padding-left: 15px; text-decoration: underline;">My Account</h4>
			<li class="active"><a href="userpage.php">Account Control Panel</a></li>
			<li><a href="accountedit.php">Personal Information</a></li>
			<li><a href="address.php">Address Book</a></li>
			<li><a href="#section4">My Orders</a></li>
            <li><a href="#section5">My Reviews</a></li>
		  </ul><br>
		</div> 