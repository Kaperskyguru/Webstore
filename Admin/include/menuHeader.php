<?php
session_start();
echo '        
    <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="../index.php" class="navbar-brand">JCP  Spare Parts</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-comment"></span>  Notification <span class="badge">5</span></a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span>'?>  <?php echo "Hello, ".$_SESSION['name']; echo '</a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
                        </ul>
                    </div>
                </div>
                ';
