<?php
$module = fetchTable('select * from modules where id = ' . $id);
$module = $module[0];
$videos = fetchTable('select * from videos where module_id = ' . $id . ' order by number');

echo 'Module: ' . $module['name'];
echo '<br>';

echo '<table style="width:100%">';
for($i=0; $i<sizeof($videos); $i+=3){
    echo '<tr>';
    for($x=0; $x<3 && $i+$x<sizeof($videos); $x++){
        echo '<td width="247px">' . $videos[$i+$x]['thumbnail'] . '</td>';
    }
    echo '</tr>';
    echo '<tr>';
    for($x=0; $x<3 && $i+$x<sizeof($videos); $x++){
        echo    '<td><a href="index.php?p=v&i=' . $videos[$i+$x]['id'] . '">' . $videos[$i+$x]['name'] . '</a>';
        echo    '<p>' . $videos[$i+$x]['description'] . '</p></td>';
    }
    echo '</tr>';
}
echo '</table>';

?>
