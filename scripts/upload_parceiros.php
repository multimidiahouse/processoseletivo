<?php 
session_start();
$thisfile = $_SERVER['PHP_SELF']; 
?>
<META NAME="keywords" content="Consultoria, Assessoria e Treinamento em Indústrias de Alimentos" />
<META NAME="keywords" content="Engenharia de Alimentos" />
<META NAME="keywords" content="Ativi assessoria" />
<style>
.td {
font:Verdana;
font-size:10px;
color:#FFFFFF;
}
font {
font:Verdana;
font-size:10px;
color:#FFFFFF;
}
body{
background-color:#FFFFFF;
font:Verdana;
font-size:10px;
color:#003399;
}
.style2 {color: #000000}
.style4 {
	color: #FFFFFF;
	font-size: 14px;
	font-weight: bold;
}
.style5 {color: #003399}
</style>
<?php 
if (($_SESSION['login'] == 'logado') and ($_REQUEST['acao'] == 'enviar')) {
	
		if($imagem <> 'none') {
	
		   $extensao = explode("." , $imagem_name);

		   if(($extensao[1] == "exe") or ($extensao[1] == "bat") or ($extensao[1] == "dat")) {
			$erros++;
			$errors = $errors."Proibido fazer upload de arquivos executáveis<br>";
	       } elseif(! (($extensao[1] == "jpg") or ($extensao[1] == "gif") or ($extensao[1] == "cdr") or ($extensao[1] == "psd") or ($extensao[1] == "dwg") or ($extensao[1] == "pdf"))) {
			$erros++;
			$errors = $errors."Por gentilesa anexar arquivos em Vetor (*.cdr, *.dwg, *.pdf), Imagem (*.jpg, *.gif, *.psd)<br>";
	       }	   

	       $arquivo = "../imagens/parceiros/$imagem_name";
		   $href = "http://www.ativiconsultoria.com.br/imagens/parceiros/$imagem_name";
		   $link = $_POST['link'];
		   $empresa = $_POST['empresa'];
   		   $classe = $_POST['classe'];
	
	       if (file_exists($arquivo)) {
	       $erros++;
	       $errors = $errors."O arquivo já existe, por favor renomeie o arquivo<br>";
	       }
	
	       if($erros == 0) {
	       copy($imagem, "../imagens/parceiros/$imagem_name");
	       echo "Arquivo enviada com Sucesso!!";
			include "conexao.php";
			mysql_query("INSERT INTO parceiros(id, empresa, imagem, link, classe, arquivo) VALUES (NULL, '$empresa', '$href', '$link', '$classe', '$imagem_name')");
	       } else {
	       echo "Foram encontrados os seguintes erros:<br>$errors";
	       }
	    }

} elseif (($_SESSION['login'] == 'logado') and ($_REQUEST['acao'] == 'entrar')) {
?>
<p align="right" style="width:100%"><a class="td" href="javascript:history.back(1);">voltar</a></p>
<form class="td" name="frm_upload" method="post" action="<?php echo $thisfile; ?>?acao=enviar" enctype="multipart/form-data">
<table width="50%" border="0" cellspacing="0" cellpadding="0">
<tr>
      <td height="40" colspan="2" bgcolor="#003399" class="style2"><span class="style4"><span class="style5">---</span>Imagens 
        de Parceiros</font></font></span></td>
</tr>
<tr>
      <td width="23%" height="30" bgcolor="#003399"><font face="Arial" size="2">Empresa 
        Parceira:</font></td>
<td width="77%" height="30" bgcolor="#003399"><input type="text" name="empresa" size="25"></td>
</tr>
<tr>
<td width="23%" height="30" bgcolor="#003399"><font face="Arial" size="2">Arquivo:</font></td>
<td width="77%" height="30" bgcolor="#003399"><input lang="pt" type="file" name="imagem"></td>
</tr>
<tr>
      <td width="23%" height="30" bgcolor="#003399"><font face="Arial" size="2">Link:</font></td>
<td width="77%" height="30" bgcolor="#003399"><input type="text" name="link" size="25"><br><br>
<font face="Arial" size="2">Ex: http://www.ativiconsultoria.com.br</font></td>
</tr>
<tr>
      <td width="23%" height="30" bgcolor="#003399"><font face="Arial" size="2">Classe:</font></td>
      <td width="77%" height="30" bgcolor="#003399"> 
        <select name="classe" id="classe">
          <option selected>------</option>
          <option value="CLIENTES">CLIENTES</option>
          <option value="PARCEIROS">PARCEIROS</option>
        </select></td>
</tr>
<tr>
<td height="30" colspan="2" bgcolor="#003399"><input type="submit" name="enviar" value="enviar"></td>
</tr>
</table>
</form>
<?php } elseif (($_SESSION['login'] == 'logado') and ($_REQUEST['acao'] == 'deletar')) { ?>
<table width="100%" border="2" align="center" cellpadding="5" cellspacing="5" bordercolor="#999999">
  <?php 
			include "conexao.php";

			$enviar = "SELECT * FROM parceiros ORDER BY id DESC";
			$sql = mysql_query($enviar);
			while ($result = mysql_fetch_array($sql)) {
				$empresa = $result['empresa'];
				$id = $result['id'];
				$imagem = $result['imagem'];
				$arquivo = $result['arquivo'];
				echo "<tr>\n";
				echo "<td width=5%><a href=deletar_registro.php?acao=parceiros&id=$id><img src=../imagens/excluir.gif border=0></a></td><td width=5%>$id</td><td width=60%>$empresa</td><td width=20%>$arquivo</td><td width=10%><img src=$imagem border=0 style=width:100%;height:auto;></td>\n";
				echo "</tr>\n";
			}
			?>
</table>
<?php } else { 
	echo "Erro de página";
	}
?>