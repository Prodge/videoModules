<?php

if (isset($_GET['a'])) {
    //Action will either be 'e' for edit, 'r' for remove or 'a' for add
    $action = $_GET['a'];

    //Check if action is valid
    if($action != 'a' || $action != 'r' || $action != 'e'){
        die("Invalid action parameter");
    }

    //If an action is set then a type must be set
    if (!isset($_GET['t'])) {
        die("Action type must be set");
    }
    //Type will either be 's' for settings, 'v' for video or 'm' for module
    $type = $_GET['t'];

    //Check if type is valid
    if($type != 's' || $type != 'v' || $type != 'e'){
        die("Invalid type parameter");
    }

    //If type is settings, the action can only be edit

}else{
    //No action set, user needs to pick one
    $actions = array( 
            array("a", "add"), 
            array("e", "edit"),
            array("r", "remove")
            );
    $types = array( 
            array("s", "settings"), 
            array("v", "video"),
            array("m", "module")
            );
    for($i=0; $i<sizeof($actions); $i++){
        for($x=0; $x<sizeof($types); $x++){
        echo '<a href="admin.php?a=' . $actions[$i][0] . '&t=' . $types[$x][0] . '">' . $actions[$i][1] . ' ' . $types[$x][1] . '</a>';
    }
}















?>
