

<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button id="close" type="button" class="close" data-dismiss="modal">&times;</button>
                    <p><span></span> <img src="img.jpg" alt="Avatar" class="avatar" /></p>

                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" action="#" METHOD="POST">
                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-lock"></span> Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="" checked>Remember me</label>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>New Customer? <a href="#" data-dismiss="modal" data-target = "#registerModal" data-toggle="modal">Sign Up</a></p>
                    <p>Forgot <a href="#">Password?</a></p>
                </div>
            </div>
        </div>
    </div> 
</div>

<!-- Register Dialog -->
<div id = "registerModal" class = "modal fade" role = "dialog">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="text-primary">Register a new account</h2>
                <p class="text-danger" id="errorPanel"></p>
            </div>
            <div class = "modal-body">
                <form class = "form" action="#" METHOD="POST">
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input class="form-control" type="text" id="name" />
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" id="username" />
                    </div>
                    <div class="form-group">
                        <label for="pass">Password:</label>
                        <input class="form-control" type="password" id="pass" />
                    </div>
                    <div class="form-group">
                        <label for="lblemail" id="lblemail">Email:</label>
                        <input class="form-control" type="email" id="emailAddress" />
                    </div>	
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" rows="5" id="address"></textarea>
                    </div>
                </form>
            </div>
            <div class = "modal-footer">
                <submit type="button" id = "register" class="btn btn-primary">Register</submit>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#myBtn").click(function () {
            $("#myModal").modal();
        });
    });
</script>

