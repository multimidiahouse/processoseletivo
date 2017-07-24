<?php

include "conexao.php";

include "login.php";

if (($userauth == "sim") and ($passauth == "sim") and ($autorizacao == "administrador")) {

$user = "$conta[usuario]";

$pass = "$conta[senha]";

session_start();

$_SESSION['login'] = 'logado';

}else{ 

header("location: logar.php?action=admin");

} 

?>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<frameset rows="185,*" cols="*" framespacing="0" frameborder="NO" border="0">

  <frame src="admin_menu.php" name="topFrame" scrolling="NO" noresize id="topFrame">

  <frame src="blank.php" name="mainFrame">

</frameset>

<noframes><body>



</body></noframes>

</html>

