<?php
$module = fetchTable('select * from modules where id = ' . $id);
$module = $module[0];
$videos = fetchTable('select * from videos where module_id = ' . $id . ' order by number');

echo 'Module: ' . $module['name'];
echo '<br>';

echo '<table style="width:100%">';
for($i=0; $i<sizeof($videos); $i++){
    if($i % 3 == 0){
        echo '<tr>';
    }
    echo    '<td>' . $videos[$i]['thumbnail'] . '</td>';
    echo    '<td><a href="index.php?p=m&i=' . $videos[$i]['id'] . '">' . $videos[$i]['name'] . '</a>';
    echo    '<p>' . $videos[$i]['description'] . '</p></td>';
    if($i % 2 == 0 && $i != 0){
        echo '</tr>';
    }
}
echo '</table>';

?>
