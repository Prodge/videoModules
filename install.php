<?php

echo "Installing <br>";

require_once("config.php");

function query($query){
    //Create connection
    $conn = mysqli_connect($sqlServer, $sqlUsername, $sqlPassword);

    echo $sqlUsername;
    echo $sqlPassword;
    
    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //Run query
    if (mysqli_query($conn, $query)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }

    //Disconnect
    mysqli_close($conn);
}
    //Creating Database
    query("CREATE DATABASE videoModules");

    //query("...");
?> 
