<?php
echo $settings['site_description'];
echo '<br>';

$modules = fetchTable('select * from modules');

//generating table of modules$modules[$i][''
echo '<table style="width:100%">';
for($i=0; $i<sizeof($modules); $i++){
    if($i % 2 == 0){
        echo '<tr>';
    }
    echo    '<td>' . $modules[$i]['thumbnail'] . '</td>';
    echo    '<td><a href="index.php?p=m&i=' . $modules[$i]['id'] . '">' . $modules[$i]['name'] . '</a>';
    echo    '<p>' . $modules[$i]['description'] . '</p></td>';
    if($i % 2 == 0 && $i != 0){
        echo '</tr>';
    }
}
echo '</table>';



?>
