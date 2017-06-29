<?php
$db = mysql_connect ("localhost","root","root") or die('Error connecting to mysql: '.mysql_error());;
mysql_select_db("phpsite", $db);
mysql_query ('SET NAMES utf8');
?>
