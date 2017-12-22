<?php
session_start();
require('include/sanitizer.php');
require('include/head.php'); ?>
<br />

<div class="container">
		<form>
        <div class="col-sm-9" style=""> 
		  <div class="panel panel-primary">
			<div class="panel-heading">
                Edit Address
			</div>
			<div class="panel-body" style="">
				<div class="form-group">
                   <label>Full name</label>
				   <input class="form-control" type="text" name="firstname" id="name" placeholder="First Name" required>
                   <label>Street Address</label>
				   <input class="form-control" type="text" name="street" id="street" placeholder="Street" required>
					<label style="">City</label>
					<input class="form-control" type="text">
					<label>State/Province</label>
					<input class="form-control" type="text" name="text" id="State">
                    <label>Phone Number</label>
					<input class="form-control" type="text" name="text" id="State">
				</div>
			<div class="panel-footer">
				<input type="button" class="btn btn-info" style="width: 100px;" value="Add Address">
			</div>
		  </div>
		</div>
	  </div>
		</form>
    </div>




<?php include('include/footer.php'); ?>