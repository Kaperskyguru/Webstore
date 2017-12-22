<?php
session_start();
require('include/sanitizer.php');
require('include/head.php');

$info="SELECT * FROM users WHERE user_id= '1'";
$res=mysqli_query($conn,$info);
$rows=mysqli_fetch_assoc($res);

if(isset($_POST['update'])){
    //sanitize post value from form.
    $newemail= clean($_POST['newemail']);
    $query="UPDATE users SET user_email= '$newemail'";
    $reult=mysqli_query($conn,$query);
    if( $reult > 0){
        echo "<div class='alert alert-warning'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Update Successful...</b>
                </div>
            ";
    }
}

?>
<br />
    <div class="container">
        <form action="#" METHOD="POST">
        <div class="col-sm-7" >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    E-mail Address
                </div>
                    <div class="panel-body">
                        <div class="form-group">
                        <label>Current email:</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $rows['user_email']; ?>" disabled>
                        <label>New E-mail*</label>
                        <input type="email" class="form-control" name="newemail" id="newemail" required>
                        </div>
                        <div class="panel-footer">
                            <input name="update" type="submit" class="btn btn-info" value="Submit" style="">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    
<?php include('include/footer.php'); ?>