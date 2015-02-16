<?php

echo "Installing <br>";

require_once("config.php");

//Creating New Database
//Create connection
$conn = mysql_connect($sqlServer, $sqlUsername, $sqlPassword);
//Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}
//Creating the database if it doesnt exist already
if (mysql_query("CREATE DATABASE IF NOT EXISTS $sqlDatabase", $conn)) {
    echo "Query Successful<br>";
} else {
    echo "Query Error: " . mysql_error() . "<br>";
}
//Disconnect
mysql_close($conn);

function query($query, $sqlServer, $sqlUsername, $sqlPassword){

    //Create connection
    $conn = mysql_connect($sqlServer, $sqlUsername, $sqlPassword);

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysql_error());
    }

    //Run query
    if (mysql_query($query, $conn)) {
        echo "Query Successful<br>";
    } else {
        echo "Query Error: " . mysql_error() . "<br>";
    }

    //Disconnect
    mysql_close($conn);
}

    query("CREATE TABLE settings( ".
        "PRIMARY KEY ( tutorial_id ));". 
        "bg_color VARCHAR(10) NOT NULL, ".
        "paragraph_color VARCHAR(10) NOT NULL, ".
        "heading_color VARCHAR(10) NOT NULL, ".
        "link_color VARCHAR(10) NOT NULL, ".
        "link_over_color VARCHAR(10) NOT NULL, ".
        "site_name VARCHAR(200) NOT NULL, ",
        $sqlServer, $sqlUsername, $sqlPassword);

?> 
