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


