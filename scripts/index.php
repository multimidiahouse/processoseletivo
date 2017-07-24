<?php

include "mod_admin_conexao.php";

include "mod_admin_login.php";

if (($userauth == "sim") and ($passauth == "sim")) {

	$user = $conta['usuario'];

	$pass = $conta['senha'];

	session_start();

	$_SESSION['login'] = 'logado';

	$_SESSION['usuario'] = $conta['usuario'];

	$_SESSION['senha'] = $conta['senha'];

	$_SESSION['autorizacao'] = md5($conta['autorizacao']);

	$_SESSION['menu'] = $conta['menu'];

	$_SESSION['concursos'] = $conta['concursos'];

	$_SESSION['conteudos'] = $conta['conteudos'];

	$_SESSION['documentos_seguros'] = $conta['documentos_seguros'];

	$_SESSION['documentos_publicos'] = $conta['documentos_publicos'];

	$_SESSION['noticias'] = $conta['noticias'];

	$_SESSION['destaques'] = $conta['destaques'];

	$_SESSION['usuarios'] = $conta['usuarios'];

} else {

	header("location: mod_admin_logar.php?action=admin");

} 

?>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>GC - Gerenciador de Conteúdos</title>

</head>

<frameset rows="30,*" cols="*" framespacing="0" frameborder="NO" border="0">

  <frame src="mod_admin_menu.php" name="topFrame" scrolling="NO" noresize id="topFrame">

  <frame src="blank.php" name="mainFrame">

</frameset>

<noframes><body>

</body></noframes>

</html>