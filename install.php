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

function query($query, $sqlServer, $sqlDatabase, $sqlUsername, $sqlPassword){

    //Create connection
    $conn = mysql_connect($sqlServer, $sqlUsername, $sqlPassword);

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysql_error());
    }

    //Select DB
    if (!mysql_select_db($sqlDatabase)) die("Could not connect to database: " . mysql_error());

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
        "entry INT NOT NULL, ". 
        "bg_color VARCHAR(10) NOT NULL, ".
        "paragraph_color VARCHAR(10) NOT NULL, ".
        "heading_color VARCHAR(10) NOT NULL, ".
        "link_color VARCHAR(10) NOT NULL, ".
        "link_over_color VARCHAR(10) NOT NULL, ".
        "site_name VARCHAR(200) NOT NULL, ".
        "PRIMARY KEY ( entry ));", 
        $sqlServer, $sqlDatabase, $sqlUsername, $sqlPassword);

    query("CREATE TABLE modules( ".
        "id INT NOT NULL AUTO_INCREMENT, ". 
        "number VARCHAR(10) NOT NULL, ".
        "name VARCHAR(200) NOT NULL, ".
        "description VARCHAR(2000), ".
        "thumbnail VARCHAR(255), ".
        "PRIMARY KEY ( id ));", 
        $sqlServer, $sqlDatabase, $sqlUsername, $sqlPassword);

    query("CREATE TABLE videos( ".
        "id INT NOT NULL, ". 
        "number VARCHAR(10) NOT NULL, ".
        "name VARCHAR(200) NOT NULL, ".
        "module_id int NOT NULL, ".
        "thumbnail VARCHAR(255), ".
        "discription VARCHAR(2000), ".
        "runtime VARCHAR(10), ".
        "embed VARCHAR(2000) NOT NULL, ".
        "PRIMARY KEY ( id ));", 
        $sqlServer, $sqlDatabase, $sqlUsername, $sqlPassword);


?> 
