<?php
session_start();
require('include/sanitizer.php');
require('include/head.php');
$id = $_SESSION['uid'];
$query = "SELECT * FROM users WHERE user_id = '$id'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);
if (isset($_POST['save'])) {
    //clean all post values from form
    $f_name = clean($_POST['firstname']);
    $gender = clean($_POST['gender']);
    $newemail = clean($_POST['newemail']);
    $update = "UPDATE users SET f_name= '$f_name',
			user_email= '$newemail'
	";
    $result = mysqli_query($conn, $update);
    if ($result > 0) {
        echo "
			<div class='alert alert-warning'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Update Successful...</b>
             </div>
			
		";
    }
}
?>

<br />
<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" METHOD="POST">
        <div class="col-sm-9" style=""> 
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Edit Account
                </div>
                <div class="panel-body" style="">
                    <div class="form-group">
                        <label>First name*</label>
                        <input class="form-control" type="text" name="firstname" id="name" value="<?php echo $row['f_name']; ?>"required>
                        <label style="">Current E-mail</label>
                        <input class="form-control"type="email"  name="email" value="<?php echo $row['user_email']; ?>" disabled>
                        <label>New E-mail</label>
                        <input class="form-control" type="email"  name="newemail" id="email" required>
                        <p style="">* Required fields</p>

                    </div>
                    <div class="panel-footer">
                        <input name="save" type="submit" class="btn btn-info" style="width: 60px;" value="Save">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include('include/footer.php'); ?>