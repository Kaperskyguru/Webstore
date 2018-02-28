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
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Your Account</a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><button type="button" class="btn btn-primary btn-xs" id="myBtn">Login</button></a></li>
                        <li class="divider"></li>
                        <li style="padding-left: 20px;">New Customer? <button class="btn btn-primary btn-xs" data-dismiss="modal" data-target = "#registerModal" data-toggle="modal" style="width: 60px; background-color: #48d1cc;">Sign Up</button></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>