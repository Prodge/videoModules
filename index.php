<?php 
    require_once("common.php");
    $settings = fetchTable("select * from settings");
    if(empty($settings)){
        die("Could not pull settings from database. Check your database info in 'config.php'.");
    }
    $settings = $settings[0];
?>
<head>
    <title><?php echo $settings["site_name"]; ?></title>
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <meta name="author" content="prodge">
    <meta name="description" content="<?php echo $settings["site_description"]; ?>">
</head>
<?php
    $mains = array();
    $mains['h'] = 'home';
    $mains['m'] = 'module';
    $mains['v'] = 'video';

    if(!isset($_GET['p'])){
        //set page to home by default
        $main = 'home.php';
    }else{
        $p = $_GET['p'];
        //If 'p' is not valid, die
        if($p != 'h' && $p != 'm' && $p != 'v'){
            die('Error: Page is not valid.  <a href="index.php">Home</a>');
        }
        $main = $mains[$p] . '.php';
        //If we are loading a module or video, we need to get its id
        if($p != 'h'){
            if(isset($_GET['i'])){
                $id = $_GET['i'];
                //checking thi id exists in the database
                $valid_ids = fetchTable('select id from ' . $mains[$p] . 's');
                $isValid=false;
                for($i=0; $i<sizeof($valid_ids); $i++){
                    if($valid_ids[$i]['id'] == $id){
                        $isValid = true;
                    }
                }
                if(!$isValid){
                    die('Error: ' . $mains[$p] . ' is not valid.  <a href="index.php">Home</a>');
                }
            }else{
                die('Error: ' . $mains[$p] . ' id not specified.   <a href="index.php">Home</a>');
            }
        }
    }

    //checking the files we need exist
    $main = 'content/' . $main;
    $pages = array('content/header.php', $main, 'content/footer.php');
?>

<div class="wrapper">
    <?php
        foreach($pages as $page){
            if(file_exists($page)){
                include($page);
            }else{
                die('page "' . $page . '" does not exist');
            }
        }
    ?>
</div>


