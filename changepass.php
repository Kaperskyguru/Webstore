<?php
session_start();
require('include/head.php');
?>
 <br />
 <div class="container">
       <div class="row">
              <div class="col-sm-9" id="error">
                     
              </div>
        <div class="col-sm-9" >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Authorization Information
                </div>
                    <div class="panel-body">
                     <form action="#"  METHOD="POST">
                        <div class="form-group">    
                        <label>Current Password:</label>
                        <input class="form-control" name="oldpsw" type="password" id="oldpsw" required>
                        <label>New Password:</label>
                        <input class="form-control" name="newpsw" type="password" id="newpsw" required>
                        <label>Confirm Password:</label>
                        <input class="form-control" name="confpsw" type="password" id="confpsw" required>
                        </div>
                        <div class="panel-footer">
                            <input name="update" type="submit" id="update" class="btn btn-info" value="Submit" style="">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 </div>
    
<?php include('include/footer.php'); ?>
