<?php 
$con = mysql_connect('localhost', 'muni_yuri', 'municoncursos');
if (! $con) { 
	die ("error". mysql_error());
}

$db = mysql_select_db('muni_site');
if (! $db) { 
	die ("error". mysql_error());
}
?>