<?php

$pages = array();
$pages['h'] = 'home';
$pages['m'] = 'module';
$pages['v'] = 'video';

if(!isset($_GET['p'])){
    //set page to home by default
    $page = 'home.php';
}else{
    $p = $_GET['p'];
    //If 'p' is not valid, die
    if($p != 'h' && $p != 'm' && $p != 'v'){
        die('Error: Page is not valid.  <a href="index.php">Home</a>');
    }
    $page = $pages[$p] . '.php';
    require_once('content/' . $page);
}









?>
