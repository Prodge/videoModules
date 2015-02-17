<?php

echo "<strong>Installing</strong><br><br><br>";

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
    echo "New Database Successfully Created<br><br><br>";
} else {
    echo "Could not create database. Error: " . mysql_error() . "<br>";
}
//Disconnect
mysql_close($conn);

function query($query){
    global $sqlServer;
    global $sqlDatabase;
    global $sqlUsername;
    global $sqlPassword;
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
        echo "Query Successful:<br><code><pre>" . $query . "</pre></code><br>";
    } else {
        die("Query Error: " . mysql_error() . "<br>");
    }

    //Disconnect
    mysql_close($conn);
}

//Change to overwrite old tables??
query("CREATE TABLE IF NOT EXISTS settings( ".
    "id INT NOT NULL, ". 
    "bg_color VARCHAR(10) NOT NULL, ".
    "paragraph_color VARCHAR(10) NOT NULL, ".
    "heading_color VARCHAR(10) NOT NULL, ".
    "link_color VARCHAR(10) NOT NULL, ".
    "link_over_color VARCHAR(10) NOT NULL, ".
    "site_name VARCHAR(200) NOT NULL, ".
    "PRIMARY KEY ( id ));");

query("CREATE TABLE IF NOT EXISTS modules( ".
    "id INT NOT NULL AUTO_INCREMENT, ". 
    "number VARCHAR(10) NOT NULL, ".
    "name VARCHAR(200) NOT NULL, ".
    "description VARCHAR(2000), ".
    "thumbnail VARCHAR(255), ".
    "PRIMARY KEY ( id ));");

query("CREATE TABLE IF NOT EXISTS videos( ".
    "id INT NOT NULL AUTO_INCREMENT, ". 
    "number VARCHAR(10) NOT NULL, ".
    "name VARCHAR(200) NOT NULL, ".
    "module_id int NOT NULL, ".
    "thumbnail VARCHAR(255), ".
    "description VARCHAR(2000), ".
    "runtime VARCHAR(10), ".
    "embed VARCHAR(2000) NOT NULL, ".
    "PRIMARY KEY ( id ));");

//make sure this doesn't insert unless the table is empty
query("INSERT INTO `settings` (".
    "`id` ,".
    "`bg_color` ,".
    "`paragraph_color` ,".
    "`heading_color` ,".
    "`link_color` ,".
    "`link_over_color` ,".
    "`site_name`".
    ")".
    "VALUES (".
    "'0', '%ffffff', '%000000', '%000000', '%000000', '%000000', 'MySite'".
    ");");



echo "<br><strong>Installation Complete.</strong><br>";
echo "You can now delete 'install.php'<br>";


?> 
