<?php
/** connects the php to the database of iLigtas automatically */
$link = mysql_connect("localhost","gcccsorg_iligtas","gcccs2014");
$db_selected = mysql_select_db('gcccsorg_iligtas', $link);

?>