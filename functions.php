<?php

require('include/sanitizer.php');
require_once('include/connect.inc.php');

function getProductDetails($id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE prod_id = '" . $id . "'";
    $run_query = mysqli_query($conn, $sql);
    return $run_query;
}
