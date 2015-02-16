<?php

echo "Installing <br>";


function query($query){
    require_once("config.php");

    echo $sqlUsername;
    echo "<br>";
    echo $sqlPassword;
    echo "<br>";

    //Create connection
    $conn = mysql_connect($sqlServer, $sqlUsername, $sqlPassword);

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysql_error());
    }

    //Run query
    if (mysql_query($conn, $query)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysql_error($conn);
    }

    //Disconnect
    mysql_close($conn);
}

    //Creating Database
    query("CREATE DATABASE videoModules");

    //query("...");
?> 
