<?php
echo '
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
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">'
?> <?php

echo "Hello, " . $_SESSION['name'];
echo '</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="userpage.php" style="color: blue;">My Account</a></li>
                                <li class="divider"></li>
                                <li style=""><a href="#" style="color: blue;">My Orders</a</li>
                                <li class="divider"></li>
                                <li style=""><a href="#" style="color: blue;">My Reviews</a</li>
                                <li class="divider"></li>
                                <li style=""><a href="cart.php" style="color: blue;"><span class="glyphicon glyphicon-shopping-cart"> Cart</span></a</li>
                                <li class="divider"></li>
                                <li><a href="logout.php" style="color: blue;"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                            </ul>
                        </li>
                        <li><a href ="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span style ="" class = "glyphicon glyphicon-shopping-cart"> Cart <span class="badge"> 0</span></span></a>
                            <div class="dropdown-menu scrollable-menu" style="height: auto; max-height: 200px; width: 400px; overflow-x: hidden;">
                                <div class="panel panel-success" >
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-3">S/N</div>
                                            <div class="col-md-3">Product Image</div>
                                            <div class="col-md-3">Product Name</div>
                                            <div class="col-md-3">Price(N)</div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div id="cart_product">

                                        </div>
                                    </div>
                                    <div class="panel-footer"></div>
                                </div>
                            </div>
                        </li> 

                    </ul>
                </div>
            </div>
        </nav>
        

        ';
