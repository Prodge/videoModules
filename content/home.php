<?php
echo $settings['site_description'];
echo '<br>';
echo '<br>';

$modules = fetchTable('select * from modules');

//generating table of modules$modules[$i][''
echo '<table style="width:100%">';
for($i=0; $i<sizeof($modules); $i++){
    echo '<tr>';
    echo    '<td width="280px"><a href="index.php?p=m&i=' . $modules[$i]['id'] . '"><img border="0" src="' . $modules[$i]['thumbnail'] . '" alt="' . $modules[$i]['name'] . '" width="300" height="200"></a></td>';
    echo    '<td width="480px"><a href="index.php?p=m&i=' . $modules[$i]['id'] . '"><h3>' . $modules[$i]['name'] . '</h3></a>';
    echo    '<p>' . $modules[$i]['description'] . '</p></td>';
    echo '</tr>';
}
echo '</table>';



?>
