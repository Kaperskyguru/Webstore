<?php

$error = array();
$conn = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'be808db55dbefa', 'c3116baf', 'heroku_76835da5755eded') or die(mysql_error());
$con = $conn;

//mysql://be808db55dbefa:c3116baf@us-cdbr-iron-east-05.cleardb.net/heroku_76835da5755eded?reconnect=true



/*if (mysqli_select_db($con,'sparepartsDB')) {
    createTables();
} else {
    if (mysqli_create_db($con, 'sparepartsDB')) {
        createTables($con);
    } else {
        echo 'cannot create DB';
    }
}

function mysqli_create_db( $con,$db) {
    $query = "create database `$db`";
    return ($con ->query($query)) ? true : false;
}

function createTables() {
    global $con;
    $query = "CREATE TABLE IF NOT EXISTS `users` (`User_ID` int(11) NOT NULL AUTO_INCREMENT,`User_Name` varchar(50) NOT NULL, `Username` varchar(50) NOT NULL,`User_Password` varchar(50) NOT NULL,`User_Email` varchar(100) NOT NULL,`User_Address` text NOT NULL, `Role` INT NOT NULL,`DateCreated` TIMESTAMP NOT NULL, PRIMARY KEY (`User_ID`))";
    $con -> query($query);

    $query1 = "CREATE TABLE IF NOT EXISTS `producttable` (
                `Prod_ID` INT NOT NULL AUTO_INCREMENT ,
                `Prod_Name` TEXT NOT NULL ,
                `Prod_Desc` TEXT NOT NULL ,
                `Cat_ID` INT NOT NULL ,
                `Prod_Qty` INT NOT NULL ,
                `Prod_Price` DECIMAL NOT NULL ,
                `Prod_Image` TEXT NOT NULL,
                `DateCreated` TIMESTAMP NOT NULL ,
                PRIMARY KEY ( `Prod_ID` )
                );";
    mysqli_query($con,$query1);


    $query2 = "CREATE TABLE IF NOT EXISTS `ordertable` (
            `Ord_ID` INT NOT NULL AUTO_INCREMENT ,
            `Prod_ID` INT NOT NULL ,
            `User_ID` INT NOT NULL ,
            `Ord_Qty` INT NOT NULL ,
            `Ord_TotalPrice` DECIMAL NOT NULL ,
            `Sta_ID` INT NOT NULL ,
            `DateCreated` TIMESTAMP NOT NULL,
            PRIMARY KEY ( `Ord_ID` ),
            FOREIGN KEY FK_O_prod(`Prod_ID`) REFERENCES producttable(`Prod_ID`),
            FOREIGN KEY FK_O_user(`User_ID`) REFERENCES users(`User_ID`),
            FOREIGN KEY FK_O_sta(`Sta_ID`) REFERENCES statustable(`Sta_ID`)
            );";
    mysqli_query($con,$query2);

    $query3 = "CREATE TABLE IF NOT EXISTS `feedbacktable` (
            `feed_ID` INT NOT NULL AUTO_INCREMENT ,
            `feed_Title` VARCHAR( 40 ) NOT NULL ,
            `feed_Desc` TEXT NOT NULL ,
            `User_ID` INT NOT NULL ,
            `Prod_ID` INT NOT NULL ,
            `DateCreated` TIMESTAMP NOT NULL,
            PRIMARY KEY ( `feed_ID` ),
            FOREIGN KEY FK_F_user(`User_ID`) REFERENCES users(`User_ID`),
            FOREIGN KEY FK_F_prod(`Prod_ID`) REFERENCES producttable(`Prod_ID`)
            );";
    mysqli_query($con,$query3);

    $query4 = "CREATE TABLE IF NOT EXISTS `statustable` (
            `Sta_ID` INT NOT NULL AUTO_INCREMENT ,
            `Sta_Name` VARCHAR( 25 ) NOT NULL ,
            `DateCreated` TIMESTAMP NOT NULL,
            PRIMARY KEY ( `Sta_ID` ));";
    mysqli_query($con,$query4);
}*/
