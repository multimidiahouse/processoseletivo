<?php
if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'admin') {
		$thisfile = "index.php";
		} elseif ($_REQUEST['action'] == 'documentos') {
		$thisfile = "../modelos.php";
		}
		if(isset($_REQUEST['table'])) {
			$table = $_REQUEST['table'];
		} else {
			$table = '';
		}
?>
<style>
.logon {
color:#006699;
font-size:10px;
font-family:Arial;
text-decoration:none;
}
.longo:hover {
color:#0099FF;
font-size:12px;
}
body {
	background-color: #EBEBEB;
}
</style>
<title>GC - Gerenciador de Conteúdos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<form action="<?=$thisfile;?>?table=<?=$table;?>" method="post" name="form1" target="_self">
  Usu&aacute;rio:<br>
  <input name="login" type="text" id="login">
  <br>
  Senha:<br>
  <input name="senha" type="password" id="senha">
  <br>
  <input name="enviar" type="submit" id="enviar" value="Enviar">
</form>
<?php } else { echo 'erro de paginação'; } ?>