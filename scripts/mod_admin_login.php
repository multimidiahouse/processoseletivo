<?php
if (isset($_REQUEST['login'])) {
	$id = str_replace('\'','',$_REQUEST['login']);
	$id = str_replace('"','',$id);
	$pass = str_replace('\'','',$_REQUEST['senha']);
	$pass = str_replace('"','',$pass);
	$sql = mysql_query("SELECT * FROM usuarios WHERE usuario LIKE '%$id%'");
	$conta = mysql_fetch_array($sql);
	if ($conta['usuario'] == $id and $conta['senha'] == $pass) {
		$userauth = "sim";
		$passauth = "sim";
	} else {
		$passauth = 'no';
		$userauth = 'no';
    }
} else {
	$passauth = 'no';
	$userauth = 'no';
}
?>