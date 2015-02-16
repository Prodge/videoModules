<?php

echo "Installing <br>";


function query($query){
    require_once("config.php");

    //Create connection
    $conn = mysql_connect($sqlServer, $sqlUsername, $sqlPassword);

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysql_error());
    }

    //Run query
    if (mysql_query($query, $conn)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysql_error();
    }

    //Disconnect
    mysql_close($conn);
}

    //Creating Database
    query("CREATE DATABASE videoModules");

    //query("...");
?> 
