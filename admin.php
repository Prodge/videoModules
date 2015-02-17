<?php

require_once("common.php");

$db = array();
$db['m'] = array( 
    array("name", "Name", "200", "", "text"), 
    array("number", "Number", "10", "", "text"),
    array("thumbnail", "Thumbnail", "255", "", "text"),
    array("description", "Description", "2000", "", "text")
    );
$db['v'] = array( 
    array("name", "Name", "200", "", "text"), 
    array("number", "Number", "10", "", "text"),
    array("thumbnail", "Thumbnail", "255", "", "text"),
    array("description", "Description", "2000", "", "text"),
    array("module_id", "Module", "100", "", "text"),
    array("runtime", "Runtime", "10", "", "text"),
    array("embed", "Embed Code", "2000", "", "text")
    );
$db['s'] = array( 
    array("bg_color", "Background Color", "10", "", "text"), 
    array("paragraph_color", "Paragraph Color", "10", "", "text"),
    array("heading_color", "Heading Color", "10", "", "text"),
    array("link_color", "Link Color", "10", "", "text"),
    array("link_over_color", "Link Over Color", "10", "", "text"),
    array("site_name", "Site Name", "200", "", "text")
    );

$types = array();
$types['m'] = 'module';
$types['v'] = 'video';
$types['s'] = 'setting';

echo '<h2>Admin Settings</h2>';
//if post is set then we need to process the query
if(isset($_POST['action'])){
    echo '<p>Processing Query</p>';
    $action = $_POST['action'];
    $type = $_POST['type'];

    $query = '';
    if($action == 'a'){
        $query .= "insert into `" . $types[$type] . "s` (";
        for($i=0; $i<sizeof($db[$type]); $i++){
            $query .= '`' . $db[$type][$i][0] . '`';        
            if($i != sizeof($db[$type]) - 1 ){
                $query .= ' , ';
            }
        }
        $query .= ") values (";
        for($i=0; $i<sizeof($db[$type]); $i++){
            $query .= "'" . $_POST[$db[$type][$i][0]] . "'";        
            if($i != sizeof($db[$type]) - 1 ){
                $query .= ', ';
            }
        }
        $query .= ")";
        echo $query;
    }

    if($action == 'e'){
        $query .= "update `" . $types[$type] . "s` set ";
        for($i=0; $i<sizeof($db[$type]); $i++){
            $query .= "`" . $db[$type][$i][0] . "` = '" . $_POST[$db[$type][$i][0]] . "'";        
            if($i != sizeof($db[$type]) - 1 ){
                $query .= ', ';
            }
        }
        $query .= "where id = " . $_POST['id'];
        echo $query;
    }

    //add support for deleting rows here

    pushTable($query);

    echo '<a href="admin.php">Make another Change</a>';
}else{

    echo '<p>Select what you want to do<p><br><br>';

    if (isset($_GET['a'])) {
        //Action will either be 'e' for edit, 'r' for remove or 'a' for add
        $action = $_GET['a'];

        //Check if action is valid
        if($action != 'a' && $action != 'r' && $action != 'e'){
            die("Invalid action parameter");
        }

        //If an action is set then a type must be set
        if (!isset($_GET['t'])) {
            die("Action type must be set");
        }
        //Type will either be 's' for settings, 'v' for video or 'm' for module
        $type = $_GET['t'];

        //Check if type is valid
        if($type != 's' && $type != 'v' && $type != 'm'){
            die("Invalid type parameter");
        }

        //If type is settings, the action can only be edit
        if($type == 's'){
            $action = 'e';
            $id = '0';
        }else{
            //If action is edit then id must be set
            if($action == 'e' && !isset($_GET['i'])){
                die("id not set, Please select an item to edit. Refrain from clicking edit");
            }
            $id = $_GET['i'];
        }


        //Inputs are now clean

        echo '
            <form action="' . $_PHP_SELF . '" method="POST">
            <input type="hidden" name="type" value="' . $type . '">
            <input type="hidden" name="action" value="' . $action . '">
            ';
        if($action == 'r'){
            $table = fetchTable('select * from `' . $types[$type] . 's`');
            for($i=0; $i<sizeof($table); $i++){
                echo '<input type="checkbox" name="ids[]" value="' . $table[$i]["id"] . '">' . $table[$i]["number"] . ' - ' . $table[$i]["name"] . '<br>';
            }
        }else{
            //If editing, the fields need to be populated first
            if($action == 'e'){
                echo'<input type="hidden" name="id" value="' . $id . '">';
                $table = fetchTable('select * from `' . $types[$type] . 's` where `id` = ' . $id);
                for($i=0; $i<sizeof($db[$type]); $i++){
                    $db[$type][$i][3] = $table[0][$db[$type][$i][0]];
                }
                    //add a check if its empty (this shouldnt happen)
            }
            if($type == 'v'){
                $table = fetchTable('select * from `modules`');
            }
            for($i=0; $i<sizeof($db[$type]); $i++){
                if($db[$type][$i][0] == 'module_id' && $type == 'v'){
                    echo 'Module: <select name="module">';
                    for($x=0; $x<sizeof($table); $x++){
                        echo '<option '; 
                        if($table[$x]["id"] == $db[$type][$x][3]){
                            echo 'selected ';
                        }
                        echo 'value="' . $table[$x]["id"] . '">' . $table[$x]["number"] . ' - ' . $table[$x]["name"] . '</option>';
                    } 
                    echo '</select><br>';
                }else{
                    echo $db[$type][$i][1] . ': <input 
                        type="' . $db[$type][$i][4] . '" 
                        name="' . $db[$type][$i][0] . '" 
                        value="' . htmlentities($db[$type][$i][3]) . '"
                        maxlength="' . $db[$type][$i][2] . '"><br>';
                }
            }
        }
        echo '
            <input type="submit" />
            </form>
            ';

    }else{ //No action set, user needs to pick one
       
        //Setting up option arrays
        $actions = array( 
            array("a", "Add"), 
            array("e", "Edit"),
            array("r", "Remove")
            );
        $types = array( 
            array("m", "Module"), 
            array("v", "Video"),
            );

        //Generating options
        echo '<a href="admin.php?a=e&t=s">Edit Settings</a><br><br>';
        for($i=0; $i<sizeof($types); $i++){
            for($x=0; $x<sizeof($actions); $x++){
                echo '<a href="admin.php?a=' . $actions[$x][0] . '&t=' . $types[$i][0] . '">' . $actions[$x][1] . ' ' . $types[$i][1] . '</a>';
                if($actions[$x][0] == 'e'){
                    $table = fetchTable('select * from `' . strtolower($types[$i][1]) . 's`');
                    echo ' -> <select onchange="window.location.href=this.value">';
                    echo '<option value="">Select ' . $types[$i][1] . '</option>';
                    for($y=0; $y<sizeof($table); $y++){
                        echo '<option value="admin.php?a=e&t=' . $types[$i][0] . '&i=' . $table[$y]['id'] . '">' . $table[$y]['name'] . '</option>';
                    }
                    echo '</select>';
                }
                echo '<br>';
            }
            echo '<br>';
        }





    }
}
?>
