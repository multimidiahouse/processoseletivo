<?
session_start();
if (($_SESSION['login'] == 'logado') and ($_REQUEST['acao'] == 'entrar')) { 
	$thisfile = $_SERVER['PHP_SELF']; 

?>
<style>
body {
background-color:#FFFFFF;
font:Arial;
font-size:12px;
color:#000000;
}
td {
padding-left:10px;
background-color:#666666;
font:Arial;
font-size:12px;
color:#FFFFFF;
}
</style>
<p align="right" style="width:100%"><a class="td" href="javascript:history.back(1);">voltar</a></p>
<form class="td" name="frm_upload" method="post" action="<?php echo $thisfile; ?>?acao=enviar" enctype="multipart/form-data">
<table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <?
		$id = $_REQUEST['id'];
		$idConcurso = $_REQUEST['idConcurso'];

		include "conexao.php";
		$sql = mysql_query("SELECT * FROM documentos WHERE id='$id' ");
		while ($x = mysql_fetch_array($sql)) {
		?>
    <tr>
      <td height="40" colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td height="40" colspan="2">Upload de Arquivos</td>
    </tr>
    <tr> 
      <td width="23%" height="30">Nome do Documento: </td>
      <td width="77%" height="30"><input name="documento" type="text" size="25" value="<? echo $x['nome']; ?>"></td>
    </tr>
    <tr>
      <td height="30">Ordem:</td>
      <td height="30"><input name="ordem" type="text" id="ordem" size="25" value="<? echo $x['ordem']; ?>"></td>
    </tr>
    <tr> 
      <td height="30">Status:</td>
      <td height="30">
	  <? if ($x['status'] == 'publicado') {
	  echo '
	  <select name="status" id="status">
          <option value="publicado" selected>Publicado</option>
          <option value="pendente">Pendente</option>
        </select>';
		 } else { 
	  echo '
	  <select name="status" id="status">
          <option value="publicado">Publicado</option>
          <option value="pendente" selected>Pendente</option>
        </select>';		 
		 }
		 ?>
		</td>
    </tr>
    <tr> 
      <td height="30">Arquivo:</td>
      <td height="30"> <input name="imagem" type="file" lang="pt" size="30"></td>
    </tr>
    <tr> 
      <td height="30" colspan="2"><input type="submit" name="enviar" value="enviar"> 
        <input name="local" type="hidden" id="local" value="<?php echo $idConcurso; ?>">
        <input name="id" type="hidden" id="id" value="<?php echo $id; ?>">		
		 </td>
    </tr>
	<? } ?>
  </table>
</form>
<? } elseif (($_SESSION['login'] == 'logado') and ($_REQUEST['acao'] == 'enviar')) {

		$id = $_POST['id'];
		$nome = $_POST['documento'];
		$ordem = $_POST['ordem'];		   
		$status = $_POST['status'];
   		$local = $_POST['local'];
		$imagem = $_FILES['imagem'];
	
		if ($imagem <> '') {
			$erros = 0;
			$errors = '';
	
		   $extensao = explode("." , $imagem['name']);
		   //echo $extensao[1]; 

		   if(($extensao[1] == "exe") or ($extensao[1] == "bat") or ($extensao[1] == "dat")) {
			$erros++;
			$errors = $errors."Proibido fazer upload de arquivos executáveis<br>";
	       } 
		   
		   if(! (($extensao[1] == "doc") or ($extensao[1] == "xls") or ($extensao[1] == "pdf"))) {
			$erros++;
			$errors = $errors."Por gentilesa anexar arquivos de documentos (*.doc, *.xls, *.pdf)<br>";
	       } else {
		   	$fileTipo = $extensao[1];
			if ($fileTipo == 'doc') {
				$tipo = "imagens/word.gif";
			} elseif ($fileTipo == 'xls') {
				$tipo = "imagens/exel.gif";
			} elseif ($fileTipo == 'pdf') {
				$tipo = "imagens/acrobat.gif";
			}
		   }
			
	       $arquivo = "../imagens/documentos/$local/$imagem[name]";
		   $href = "imagens/documentos/$local/$imagem[name]";
	
	       if (file_exists($arquivo)) {
	       unlink($arquivo);
	       }
	
	       if($erros == 0) {
	       copy($imagem['tmp_name'], "../imagens/documentos/$local/$imagem[name]");
		   include "conexao.php";
		   $sqlDocs = mysql_query("UPDATE documentos SET nome='$nome', arquivo='$arquivo', tipo='$tipo', href='$href', status='$status', ordem='$ordem', idConcurso='$local' WHERE id='$id' ");
			   if (! $sqlDocs) { die('Erro ao tentar cadastrar o documento no banco'.mysql_error()); } else { echo 'adicionar outro arquivo?<br><a href="upload.php?acao=concursos&table=concursos&id='.$local.'" target="_self">Sim</a> | <a href="mod_admin_conteudo.php?table=concursos" target="_self">Não</a>'; }
	       } else {
	       echo "Foram encontrados os seguintes erros:<br>$errors";
	       }
	    } else {
			echo "Selecione o arquivo a ser atualizado, caso seja o mesmo arquivo selecione-o novamente.";
		}
		mysql_close($con);
	
	} else { echo 'erro de página'; } ?>