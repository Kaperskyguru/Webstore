<?php
session_start();
require('include/head.php');

?>

<br />
    <div class="container">
		<!--<h4 style="padding-bottom: 15px; margin-left: 60px;">Address Book</h4>-->
		<div class="col-sm-9">
        <div class="col-sm-6" style="margin-top: -10px; margin-left: 0px; padding-bottom: 20px;">
		  <div class="panel panel-primary">
			<div class="panel-heading">
                
            </div>
			<div class="panel-body"style="height: 250px;">
				<p><?php echo $_SESSION['name']; ?></p>
				<p><span class="glyphicon glyphicon-envelope"></span> No 2 Pinnacle close off Refinery road, beside Casa De Pedro Annex Effurun, Delta state Casa De Pedro annex, Refinery road WARRI-REFINERY ROAD Delta
				  </p>
				<p><span class="glyphicon glyphicon-phone"> 08122394432</span></p>
				<p><span class="glyphicon glyphicon-info-sign"><a href="addressedit.php">EditAddress</a>|<a href="#">Delete</a></span></p>
				
			</div>
		  </div>
		</div>
		<div class="row">
		<div class="col-sm-6" style="margin-top: -10px; margin-left: 0px; padding-bottom: 20px; padding-left: 30px;">
		  <div class="panel panel-primary">
			<div class="panel-heading">
                
            </div>
			<div class="panel-body"style="height: 250px;">
				<p><?php echo $_SESSION['name']; ?></p>
				<p><span class="glyphicon glyphicon-envelope"></span> No 2 Pinnacle close off Refinery road, beside Casa De Pedro Annex Effurun, Delta state Casa De Pedro annex, Refinery road WARRI-REFINERY ROAD Delta
				  </p>
				<p><span class="glyphicon glyphicon-phone"> 08122394432</span></p>
				<p><span class="glyphicon glyphicon-info-sign"><a href="addressedit.php">EditAddress</a>|<a href="#">Delete</a></span></p>
			</div>
		  </div>
		</div>
	  </div>
    </div>
	</div>
	
	<?php include('include/footer.php'); ?>	