<?php
$video = fetchTable('select * from videos where id = ' . $id);
$video = $video[0];
$module = fetchTable('select * from modules where id = ' . $video["module_id"]);
$module = $module[0];

echo '<a href=index.php?>Home</a> > ';
echo '<a href=index.php?p=m&i=' . $video["module_id"] . '>' . $module["name"] . '</a> > ';
echo $video['name'];

echo '<h2 align="center">' . $video["name"] . '</h2>';
echo '<div style="width:750px; margin-right:25px; margin-left:25px;">';
echo $video["embed"];
echo '</div>';
echo '<div style="width:700px; padding:20px; margin-left:auto; margin-right:auto;">';
echo '<p><strong>Runtime:</strong> ' . $video["runtime"] . '</p>';
echo '<p><strong>Description:</strong></p>';
echo '<p>' . $video["description"] . '</p>';
echo '</div>';

?>
