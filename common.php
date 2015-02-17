<?php
require_once("config.php");

function fetchTable($query){
    global $sqlServer;
    global $sqlDatabase;
    global $sqlUsername;
    global $sqlPassword;

    $conn = mysql_connect($sqlServer, $sqlUsername, $sqlPassword);
    if (!$conn) {
        die("Connection failed: " . mysql_error());

    }
    if (!mysql_select_db($sqlDatabase)) die("Could not connect to database: " . mysql_error(    ));
    
    $result = mysql_query($query);
    $data = array(); // create a variable to hold the information
    while (($row = mysql_fetch_array($result, MYSQL_ASSOC)) !== false){
        $data[] = $row; // add the row in to the results (data) array
    }
    mysql_close($conn);
    return $data;
}

function pushTable($query){
    global $sqlServer;
    global $sqlDatabase;
    global $sqlUsername;
    global $sqlPassword;

    $conn = mysql_connect($sqlServer, $sqlUsername, $sqlPassword);
    if (!$conn) {
        die("Connection failed: " . mysql_error());

    }
    if (!mysql_select_db($sqlDatabase)) die("Could not connect to database: " . mysql_error(    ));
    
    //Run query
    if (!mysql_query($query, $conn)) {
        die("Query Error: " . mysql_error() . "<br>");
    }
    mysql_close($conn);
}
?>
