<?php 
$con = mysql_connect('localhost', 'santo918_root', 'Multimidiahouse1984');
if (! $con) { 
	die ("error". mysql_error());
}

$db = mysql_select_db('santo918_site');
if (! $db) { 
	die ("error". mysql_error());
}
?>