<?php

function sanitizer($data) {
    global $con;
    $data = htmlentities($data);
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($con, $data);
    return $data;
}

function getProductImage($Prod_ID) {
    global $con;
    $query = "SELECT * FROM `producttable`";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo '
                <div class="col-lg-3 col-md-3 ">
                        <img src = "images/constru3.jpg" class = "img-responnsive" width = "200"/>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <p class = "text-capitalize text-center">'
?> <?php echo $row['Prod_Title']; ?><?php

        echo '</p>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <p>Accessories (Interior and External)</p>
                    </div>
                    <div class="col-lg-1 col-md-1">
                        <p>800</p>
                    </div>
                    <div class="col-lg-1 col-md-1">
                        <p>7000</p>
                    </div>
                    <div class="col-lg-1 col-md-1">
                        <button type = "button" class = "btn btn-danger">Del</button><br /><br />
                        <button type = "button" class = "btn btn-danger">View</button><br /><br />
                        <button type = "button" class = "btn btn-danger">Edit</button>
                    </div>
                </div>
';
    }
}

function getProductTitle($Prod_ID, $i) {
    global $con;
    $query = "SELECT `Prod_Title` FROM `poducttable` WHERE `Prod_ID` = $Prod_ID";
    $result = mysqli_query($con,$query);
    $data = mysqli_result($result, $i);

    return $data;
}
