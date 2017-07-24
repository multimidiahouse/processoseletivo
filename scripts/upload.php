<?php 
session_start();
if ($_SESSION['login'] == 'logado') { 
	$thisfile = $_SERVER['PHP_SELF']; 

	if (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'enviar')) {
		if ($_POST['table'] == 'concursos') {
		$imagem = $_FILES['imagem'];
	
		if($imagem <> 'none') {
			$erros = 0;
			$errors = '';
	
		   $extensao = explode("." , $imagem['name']);
		   //echo $extensao[1]; 

			if(($extensao[1] == "exe") or ($extensao[1] == "bat") or ($extensao[1] == "dat")) {
			$erros++;
			$errors = $errors."Proibido fazer upload de arquivos executáveis<br>";
			} 
		   
                        if(! (($extensao[1] == "doc") or ($extensao[1] == "xls") or ($extensao[1] == "pdf") or ($extensao[1] == "jpg"))) {
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

		   $status = $_POST['status'];
		   $ordem = $_POST['ordem'];		   
   		   $local = $_POST['local'];
		   $table = $_POST['table'];			
		   $nome = $_POST['documento'];
			$arquivo = "../imagens/documentos/$local/$imagem[name]";
		   $href = "imagens/documentos/$local/$imagem[name]";
	
	       if (file_exists($arquivo)) {
	       $erros++;
	       $errors = $errors."O arquivo já existe, por favor renomeie o arquivo<br>";
	       }
	
	       if($erros == 0) {
	       copy($imagem['tmp_name'], "../imagens/documentos/$local/$imagem[name]");
		   include "conexao.php";
		   $sqlDocs = mysql_query("INSERT INTO documentos(id, nome, arquivo, tipo, href, status, ordem, idConcurso) VALUES (NULL, '$nome', '$arquivo', '$tipo', '$href', '$status', '$ordem', '$local')");
			   if (! $sqlDocs) { die('Erro ao tentar cadastrar o documento no banco'.mysql_error()); } else { echo 'adicionar outro arquivo?<br><a href="upload.php?acao='.$table.'&table='.$table.'&id='.$local.'" target="_self">Sim</a> | <a href="mod_admin_conteudo.php?table='.$table.'" target="_self">Não</a>'; }
	       } else {
	       echo "Foram encontrados os seguintes erros:<br>$errors";
	       }
	    }
	
		} elseif ($_POST['table'] == 'noticias') {

		$imagem = $_FILES['imagem'];
		include "conexao.php";

		if($imagem <> 'none') {
	
			$erros = 0;
			$errors = '';
	
		   $extensao = explode("." , $imagem['name']);
		   //echo $extensao[1]; 

		   if(($extensao[1] == "exe") or ($extensao[1] == "bat") or ($extensao[1] == "dat")) {
			$erros++;
			$errors = $errors."Proibido fazer upload de arquivos executáveis<br>";
	       } 
		   
		   if(! (($extensao[1] == "jpg") or ($extensao[1] == "gif"))) {
			$erros++;
			$errors = $errors."Por gentilesa anexar arquivos de documentos (*.jpg, *.gif)<br>";
	       }
			
	       $arquivo = "../imagens/destaques/$imagem[name]";
		   $href = "imagens/destaques/$imagem[name]";
		   $table = $_POST['table'];
		   $idnoticia = $_POST['idnoticia'];
	
	       if (file_exists($arquivo)) {
	       $erros++;
	       $errors = $errors."O arquivo já existe, por favor renomeie o arquivo<br>";
	       }
	
	       if($erros == 0) {
	       copy($imagem['tmp_name'] , "../imagens/destaques/$imagem[name]");
		   mysql_query("UPDATE $table SET imagem='$href' WHERE id='$idnoticia'");
	       header("location: mod_admin_conteudo.php?table=$_POST[table]");		   
	       } else {
	       echo "Foram encontrados os seguintes erros:<br>$errors";
	       }
	    }
		
		} elseif ($_POST['table'] == 'destaques') {

		$imagem = $_FILES['imagem'];
	
		if($imagem <> 'none') {
			$erros = 0;
			$errors = '';
	
		   $extensao = explode("." , $imagem['name']);
		   //echo $extensao[1]; 

		   if(($extensao[1] == "exe") or ($extensao[1] == "bat") or ($extensao[1] == "dat")) {
			$erros++;
			$errors = $errors."Proibido fazer upload de arquivos executáveis<br>";
	       } 
		   
		   if(! (($extensao[1] == "gif") or ($extensao[1] == "jpg") or ($extensao[1] == "png"))) {
			$erros++;
			$errors = $errors."Por gentilesa anexar arquivos de documentos (*.jpg, *.gif, *.png)<br>";
	       }

		   $chamada = $_POST['chamada'];
		   $ordem = $_POST['ordem'];		   
   		   $data = $_POST['data'];
		   $hora = $_POST['hora'];
		   $link = $_POST['link'];
	       $arquivo = "../imagens/destaques/$imagem[name]";
		   $href = "imagens/destaques/$imagem[name]";
	
	       if (file_exists($arquivo)) {
	       $erros++;
	       $errors = $errors."O arquivo já existe, por favor renomeie o arquivo<br>";
	       }

			$tamanhos = getimagesize($imagem['tmp_name']);
			
			$calcpct = $tamanhos[0] / 190;
			$calcWidth = $tamanhos[0] / $calcpct;
			$calcHeight = $tamanhos[1] / $calcpct;
			$width = round($calcWidth);
			$height = round($calcHeight);			
			//echo round($width);
			//echo round($height);
	
	       if($erros == 0) {
	       copy($imagem['tmp_name'], "../imagens/destaques/$imagem[name]");
		   include "conexao.php";
		   $sqlDocs = mysql_query("INSERT INTO destaques(id, chamada, data, hora, imagem, ordem, width, height, link) VALUES (NULL, '$chamada', '$data', '$hora', '$href', '$ordem', '$width', '$height', '$link')");
			   if (! $sqlDocs) { die('Erro ao tentar cadastrar o documento no banco'.mysql_error()); } else { echo 'adicionar outro arquivo?<br><a href="upload.php?acao=destaques" target="_self">Sim</a> | <a href="mod_admin_conteudo.php?table=destaques" target="_self">Não</a>'; }
	       } else {
	       echo "Foram encontrados os seguintes erros:<br>$errors";
	       }
	    }	
		
		} else {
		$table = $_POST['table'];
		$imagem = $_FILES['imagem'];
	
		if($imagem <> 'none') {
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

		   $status = $_POST['status'];
		   $ordem = $_POST['ordem'];		   
   		   $local = $_POST['local'];
		   $nome = $_POST['documento'];
	       $arquivo = "../imagens/documentos/$imagem[name]";
		   $href = "imagens/documentos/$imagem[name]";
	
	       if (file_exists($arquivo)) {
	       $erros++;
	       $errors = $errors."O arquivo já existe, por favor renomeie o arquivo<br>";
	       }
	
	       if($erros == 0) {
	       copy($imagem['tmp_name'], "../imagens/documentos/$imagem[name]");
		   include "conexao.php";
		   $sqlDocs = mysql_query("INSERT INTO documentos(id, nome, arquivo, tipo, href, status, ordem, idConcurso) VALUES (NULL, '$nome', '$arquivo', '$tipo', '$href', '$status', '$ordem', '$local')");
			   if (! $sqlDocs) { die('Erro ao tentar cadastrar o documento no banco'.mysql_error()); } else { echo 'adicionar outro arquivo?<br><a href="upload.php?acao='.$table.'" target="_self">Sim</a> | <a href="mod_admin_conteudo.php?table='.$table.'" target="_self">Não</a>'; }
	       } else {
	       echo "Foram encontrados os seguintes erros:<br>$errors";
	       }
	    }		
		}
	} elseif (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'noticias')) {
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
    <tr> 
      <td height="40" colspan="2">Upload de Arquivos</td>
    </tr>
    <tr> 
      <td height="30">Arquivo:</td>
      <td height="30"> 
        <input name="imagem" type="file" lang="pt" size="30"></td>
    </tr>
    <tr> 
      <td height="30" colspan="2"><input type="submit" name="enviar" value="enviar"> 
        <input name="table" type="hidden" value="<?php echo $_REQUEST['table']; ?>"> 
		<input name="idnoticia" type="hidden" value="<?php echo $_REQUEST['idnoticia']; ?>"> 
      </td>
    </tr>
  </table>
</form>
<?php } elseif (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'concursos')) { ?>
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
    <tr>
      <td height="40" colspan="2">
	  <?
		$table = $_REQUEST['table']; 
		$id = $_REQUEST['id'];

		include "conexao.php";
		$sql = mysql_query("SELECT * FROM $table WHERE id='$id' ");
		while ($x = mysql_fetch_array($sql)) {
		echo $x['contratante'];	
		}
		?>
	  </td>
    </tr>
    <tr> 
      <td height="40" colspan="2">Upload de Arquivos</td>
    </tr>
    <tr> 
      <td width="23%" height="30">Nome do Documento: </td>
      <td width="77%" height="30"><input name="documento" type="text" size="25"></td>
    </tr>
    <tr>
      <td height="30">Ordem:</td>
      <td height="30"><input name="ordem" type="text" id="ordem" size="25"></td>
    </tr>
    <tr> 
      <td height="30">Status:</td>
      <td height="30"><select name="status" id="status">
          <option value="publicado">Publicado</option>
          <option value="pendente">Pendente</option>
        </select></td>
    </tr>
    <tr> 
      <td height="30">Arquivo:</td>
      <td height="30"> <input name="imagem" type="file" lang="pt" size="30"></td>
    </tr>
    <tr> 
      <td height="30" colspan="2"><input type="submit" name="enviar" value="enviar"> 
        <input name="table" type="hidden" value="<?php echo $_REQUEST['table']; ?>"> 
        <input name="local" type="hidden" id="local" value="<?php echo $_REQUEST['id']; ?>"> </td>
    </tr>
  </table>
</form>
<?php } elseif (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'documentos' or $_REQUEST['acao'] == 'documentosseguros' )) { ?>
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
    <tr>
      <td height="40" colspan="2"><? echo $_REQUEST['acao']; ?></td>
    </tr>
    <tr> 
      <td height="40" colspan="2">Upload de Arquivos</td>
    </tr>
    <tr> 
      <td width="23%" height="30">Nome do Documento: </td>
      <td width="77%" height="30"><input name="documento" type="text" size="25"></td>
    </tr>
    <tr>
      <td height="30">Ordem:</td>
      <td height="30"><input name="ordem" type="text" id="ordem" size="25"></td>
    </tr>
    <tr> 
      <td height="30">Status:</td>
      <td height="30"><select name="status" id="status">
          <option value="publicado">Publicado</option>
          <option value="pendente">Pendente</option>
        </select></td>
    </tr>
    <tr> 
      <td height="30">Local:</td>
      <td height="30">
	  <select name="local" id="local">	  
	  <? 
	  include "conexao.php";
	  $sqlLocal = mysql_query("SELECT * FROM menu WHERE fonte='$_REQUEST[acao]' ORDER BY id DESC");
		while ($resultLocal = mysql_fetch_array($sqlLocal)) {
			if ($resultLocal['titulo'] == 'CONCURSOS REALIZADOS' or $resultLocal['titulo'] == 'CONCURSOS EM ANDAMENTO') {
			echo '';
			} else {
			echo '<option value="'.$resultLocal['titulo'].'">'.$resultLocal['titulo'].'</option>';			
			}
		} 
		?>
        </select>		
	 </td>
    </tr>
    <tr> 
      <td height="30">Arquivo:</td>
      <td height="30"> <input name="imagem" type="file" lang="pt" size="30"></td>
    </tr>
    <tr> 
      <td height="30" colspan="2"><input name="table" type="hidden" id="table" value="<? echo $_REQUEST['acao']; ?>">
        <input type="submit" name="enviar" value="enviar">
      </td>
    </tr>
  </table>
</form>
<?php } elseif (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'destaques')) { ?>
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
    <tr> 
      <td height="40" colspan="2"><? echo $_REQUEST['acao']; ?></td>
    </tr>
    <tr> 
      <td height="40" colspan="2">Upload de Arquivos</td>
    </tr>
    <tr> 
      <td width="23%" height="30">Titulo do Destaque: </td>
      <td width="77%" height="30"><input name="chamada" type="text" size="25"></td>
    </tr>
    <tr> 
      <td height="30">Ordem:</td>
      <td height="30"><input name="ordem" type="text" id="ordem" size="25"></td>
    </tr>
    <tr> 
      <td height="30">Data:</td>
      <td height="30"><input name="data" type="text" id="data" value="<? $data = date("d/m/Y"); echo $data; ?>" size="25"></td>
    </tr>
    <tr> 
      <td height="30">Hora:</td>
      <td height="30"><input name="hora" type="text" id="hora" value="<? $hora = date("H:i"); echo $hora; ?>" size="25"></td>
    </tr>
    <tr>
      <td height="30">Link:</td>
      <td height="30"><input name="link" type="text" id="link" size="25">
        ex: http://www.site.com</td>
    </tr>
    <tr> 
      <td height="30">Imagem:</td>
      <td height="30"> <input name="imagem" type="file" lang="pt" size="30"></td>
    </tr>
    <tr> 
      <td height="30" colspan="2"><input name="table" type="hidden" value="destaques">
        <input type="submit" name="enviar" value="enviar"> </td>
    </tr>
  </table>
</form>
<? 	}
} else { 	echo "Erro de página";	}
?>
