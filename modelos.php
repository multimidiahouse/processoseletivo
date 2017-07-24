<?php
include "scripts/conexao.php";
include "scripts/login.php";
if (($userauth == "sim") and ($passauth == "sim")) {
$user = "$conta[usuario]";
$pass = "$conta[senha]";
session_start();
$_SESSION['login'] = 'logado';
}else{ 
header("location: scripts/logar.php?action=documentos&table=$_REQUEST[table]");
} 
?>
<style>
body {
margin-left:10;
margin-top:20;
margin-bottom:10;
margin-right:10;
}
.tituloconteudo {
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
	color:#000000;
}
.conteudo {
	font-family:Arial;
	font-size:11px;
	text-decoration:none;
	color:#000000;
}
.titulonoticias {
	font-family:Arial;
	font-size:12px;
	font-weight:bold;
	text-decoration:none;
	color:#000000;
}
.titulonoticiasanteriores {
	font-family:Arial;
	font-size:11px;
	font-weight:bold;
	text-decoration:none;
	color:#000000;
}
.noticias {
	font-family:Arial;
	font-size:11px;
	text-decoration:none;
	color:#000000;
}
.noticiasanteriores {
	font-family:Arial;
	font-size:11px;
	text-decoration:none;
	color:#000000;
}
.menulateral {
	font-family:Arial;
	font-size:11px;
	font-weight:bold;
	text-decoration:none;
	color:#FFFFFF;
}
</style>
<table width="95%"  border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td colspan="3" class="tituloconteudo" style="padding-left:5px"><? echo $_REQUEST['table']; ?>
	<br> <img src="imagens/divisoria.jpg" width="213" border="0"><br>
      <br>
      <br> </td>
  </tr>
  <tr> 
    <td width="70%"><b>Documento</b></td>
    <td width="15%"><b>Formato</b></td>
    <td width="15%"><b>Download</b></td>
  </tr>
  <?php 
  	$table = $_REQUEST['table'];
	$sqlDocs = mysql_query("SELECT * FROM documentos WHERE idConcurso='$table' AND status='publicado' ORDER BY ordem ASC");
	while ($x = mysql_fetch_array($sqlDocs)) {
	$href = explode('/', $x['href']);
	echo '
	<tr>
    <td width="70%"><a class="conteudo" href="imagens/documentos/'.$href[2].'/'.rawurlencode($href[3]).'" target="_blank">'.$x['nome'].'</a></td>
    <td width="15%" class="conteudo"><a class="conteudo" href="imagens/documentos/'.$href[2].'/'.rawurlencode($href[3]).'" target="_blank"><img src="'.$x['tipo'].'" width="25" height="25" border="0"></a></td>
    <td width="15%"><a class="conteudo" href="imagens/documentos/'.$href[2].'/'.rawurlencode($href[3]).'" target="_blank"><img src="imagens/download.jpg" border="0"></a></td>
	</tr>';
	}	
?>
</table>