<?php
echo '

<div id = "l">
    <div id="sidebar-wrapper" class = "panel-group col-lg-12 col-xs-1">

        <ul class="sidebar-nav">
            <li>
                <a href="index.php">
                    <span class = "glyphicon glyphicon-dashboard"></span>
                    Dashboard <a class = "close pull-right" id = "toggle1" href = "#" style = "padding:2px 10px; padding-top: -10px; color: #FFF"> &times;
                    </a>

                </a>
            </li>


            <li>
                <a href = "#acc" data-toggle = "collapse" data-parent = "#l"><span class = "glyphicon glyphicon-user"></span> Account <i class = "caret"></i></a>
                <div class = "panel-collapse collapse" id ="acc">
                    <ul class = "list-group">
                        <li class = "list-group-item"><a href = "customers.php"><span class = "glyphicon glyphicon-user"> </span> Customers</a>
                        <li class = "list-group-item"><a href = "#" data-toggle = "modal" data-target = "#addAdminModal" ><span class = "glyphicon glyphicon-plus"> </span> Add Admin</a>
                        <li class = "list-group-item"><a href = "#"><span class = "glyphicon glyphicon-edit"> </span> Edit Account</a>
                        <li class = "list-group-item"><a href = "#"><span class = "glyphicon glyphicon-remove-sign"> </span> Remove Admin</a>
                    </ul>

                </div>

            </li>

            <li class = "">
                <a href = "#coll" data-toggle = "collapse" data-parent = "#l"><span class = "glyphicon glyphicon-plus"></span> Products <i class = "caret"></i></a>

                <div class = "collapse" id = "coll">
                    <ul class = "list-group ">
                        <li class = "list-group-item"><a href = "addProduct.php"><span class = "glyphicon glyphicon-plus"> </span> Add Products</a></li>
                        <li class = "list-group-item"><a href = "viewProduct.php"><span class = "glyphicon glyphicon-list"></span> View Products</a></li>
                        <li class = "list-group-item"><a href = "#"><span class = "glyphicon glyphicon-remove-sign"> </span> Delete Products</a></li>
                    </ul>
                </div>
            </li>

            <li><a href = "#order" data-toggle = "collapse" data-parent = "#sidebar-wrapper"><span class = "glyphicon glyphicon-shopping-cart"></span> Orders <i class = "caret"></i></a>

                <div class = "collapse" id = "order">
                    <ul class = "list-group ">
                        <li class = "list-group-item"><a href = "order.php?t=Active"><span class = "glyphicon glyphicon-plus"> </span> Active <span class="badge">5</span></a></li>
                        <li class = "list-group-item"><a href = "order.php?t=Pending"><span class = "glyphicon glyphicon-list"></span> Pending <span class="badge">5</span></a></li>
                        <li class = "list-group-item"><a href = "order.php?t=onship"><span class = "glyphicon glyphicon-remove-sign"> </span> On Ship <span class="badge">5</span></a></li>
                    </ul>
                </div>
            </li>

            <li><a href = "feedback.php" id="add"><span class = "glyphicon glyphicon-comment"></span> Feedbacks</a></li>
            <li><a href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>

    <div id = "sidebar-wrapper-icon">
        <ul class = "sidebar-nav">
            <li><a href = "#" id = "toggle" data-toggle = "tooltip" title = "Menu"><i class = "glyphicon glyphicon-tasks"></i></a></li>
            <li><a href = "index.php" data-toggle = "tooltip" title = "Dashboard"><i class = "glyphicon glyphicon-dashboard"></i></a></li>
            <li><a href = "account.php" data-toggle = "tooltip" title = "Account"><i class = "glyphicon glyphicon-user"></i></a></li>
            <li><a href = "addProduct.php" data-toggle = "tooltip" title = "Products"><i class = "glyphicon glyphicon-plus"></i></a></li>
            <li><a href = "order.php" data-toggle = "tooltip" title = "Orders"><i class = "glyphicon glyphicon-shopping-cart"></i></a></li>
            <li><a href = "feedback.php" data-toggle = "tooltip" title = "Feedbacks"><i class = "glyphicon glyphicon-comment"></i></a></li>
            <li><a href = "logout.php" data-toggle = "tooltip" title = "log out"><i class = "glyphicon glyphicon-log-out"></i></a></li>
        </ul>
    </div>
</div>

<!--
<div id="addAdminModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
-->

';
?>