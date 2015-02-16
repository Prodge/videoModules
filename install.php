<?php

echo "Installing <br>";

require_once("config.php");

function query($query){
    //Create connection
    $conn = mysql_connect($sqlServer, $sqlUsername, $sqlPassword);

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
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

    echo $sqlUsername;
    echo "<br>";
    echo $sqlPassword;
    echo "<br>";

    //Creating Database
    query("CREATE DATABASE videoModules");

    //query("...");
?> 
