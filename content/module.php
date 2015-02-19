<?php
$module = fetchTable('select * from modules where id = ' . $id);
$module = $module[0];
$videos = fetchTable('select * from videos where module_id = ' . $id . ' order by number');

echo '<a href=index.php?>Home</a> > ';
echo $module['name'];

echo '<br><br>';

echo '<table style="width:100%">';
for($i=0; $i<sizeof($videos); $i+=3){
    echo '<tr>';
    for($x=0; $x<3 && $i+$x<sizeof($videos); $x++){
        echo '<td width="264px"><a href="index.php?p=v&i=' . $videos[$i+$x]['id'] . '"><img border="0" src="' . $videos[$i+$x]['thumbnail'] . '" alt="' . $videos[$i+$x]['name'] . '" width="264" height="149"></a></td>';
    }
    echo '</tr>';
    echo '<tr>';
    for($x=0; $x<3 && $i+$x<sizeof($videos); $x++){
        echo    '<td><a href="index.php?p=v&i=' . $videos[$i+$x]['id'] . '"><h3>' . $videos[$i+$x]['name'] . '</h3></a>';
        echo    '<p>' . $videos[$i+$x]['description'] . '</p><br><br><br></td>';
    }
    echo '</tr>';
}
echo '</table>';

?>
