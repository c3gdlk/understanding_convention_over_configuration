<?php
$db = mysql_connect ("localhost","admin","2jHEi4f3rId8") or die('Error connecting to mysql: '.mysql_error());;
mysql_select_db("phpsite", $db);
mysql_query ('SET NAMES utf8');
?>
