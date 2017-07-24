<?php
session_start();
if (($_SESSION['login'] == 'logado') and ($_REQUEST['acao'] == 'adicionar')) { 

		if ($_POST['enviar'] == 'enviar') {
		include "conexao.php";
		$data = $_POST['data'];
		$titulo = $_POST['titulo'];
		$chamada = $_POST['chamada'];
		$noticia = $_POST['noticia'];
		$sql = mysql_query("INSERT INTO noticias(id, data, titulo, chamada, noticia) VALUES (NULL, '$data', '$titulo', '$chamada', '$noticia') ");
			if (! $sql) {
			die ("error". mysql_error());
			} else {
			$idsql = "SELECT * FROM noticias ORDER BY id DESC LIMIT 1";
			$sqlnum = mysql_query($idsql);
				if ($selid = mysql_fetch_array($sqlnum)) {
				$id = $selid['id'];
				}
			echo "$id<br>";
			echo "<center><br>";
			echo "Noticia enviada com sucesso<br>";
			echo "Deseja adicionar foto nesta noticia?<br><a href=upload.php?acao=entrar&idnoticia=$id>Clique aqui para realizar o upload da imagem</a><br>";
			echo "<br><br>Obs: Favor usar imagens no formato JPEG(*.jpg) ou GIF(*.gif)";
			echo "</center>";
			}
		}
?>
<style>
body {
	scrollbar-arrow-color:#000000;
	scrollbar-3dlight-color:#333333;
	scrollbar-highlight-color:#333333;
	scrollbar-face-color:#333333;
	scrollbar-shadow-color:#CCCCCC;
	scrollbar-darkshadow-color:#CCCCCC;
	scrollbar-track-color:#CCCCCC;
	background-color: transparent;
	margin-left:5;
	margin-top:5;
	margin-right:5;
	margin-bottom:5;
}

td {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	text-decoration:none;
	color:#333333;
}
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr> 
    <td width="50%" align="center" valign="top"> 
      <form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?acao=adicionar">
	  Data:<br>
	  <input type="text" size="20" name="data"><br>
	  Titulo:<br>
	  <input type="text" size="20" name="titulo"><br>
	  Chamada:<br>
	  <input type="text" size="20" name="chamada"><br>
        Noticia:<br>
        <textarea name="noticia" cols="70%" rows="20"></textarea>
        <br>
        <input type="submit" name="enviar" value="enviar">
      </form></td>
  </tr>
  <tr>
    <td valign="top"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td colspan="3" align="center" bgcolor="#000000"><font color="white" size="4" face="Arial, Helvetica, sans-serif">Dicas 
            de Formata&ccedil;&atilde;o</font></td>
        </tr>
        <tr> 
          <td width="78" align="center" bgcolor="#FFCC00"><strong><font size="2" face="Arial, Helvetica, sans-serif">Fun&ccedil;&atilde;o</font></strong></td>
          <td width="113" align="center" bgcolor="#FF9900"><strong><font size="2" face="Arial, Helvetica, sans-serif">C&oacute;digo</font></strong></td>
          <td width="309" align="center" bgcolor="#FF9900"><strong><font size="2" face="Arial, Helvetica, sans-serif">Exemplo</font></strong></td>
        </tr>
        <tr> 
          <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Negrito</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;b&gt;&lt;/b&gt;</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;b&gt;Ativi&lt;/b&gt;</font></td>
        </tr>
        <tr> 
          <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">It&aacute;lico</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;em&gt;&lt;/em&gt;</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;em&gt;Ativi&lt;/em&gt;</font></td>
        </tr>
        <tr> 
          <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Quebrar 
            linha</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;br&gt;</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">1&ordm; 
            Paragrafo.&lt;br&gt;<br>
            2&ordm; Paragrafo.</font></td>
        </tr>
        <tr> 
          <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Inserir 
            link</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;a 
            href=http://Link target=_blank&gt;&lt;/a&gt;</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;a 
            href=http://www.ativiconsultoria.com.br target=_blank&gt; <a href="http://www.ativiconsultoria.com.br" target="_blank">Clique 
            aqui para entrar</a> &lt;/a&gt;</font></td>
        </tr>
        <tr> 
          <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Inserir 
            link para email</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;a 
            href=mailto:contato@ativisonsultoria.com.br&gt;&lt;/a&gt;</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;a 
            href=mailto:me@uol.com&gt;<a href="mailto:me@uol.com">Clique aqui</a>&lt;/a&gt;</font></td>
        </tr>
        <tr> 
          <td height="19" colspan="3" align="center"><p><font face="Arial, Helvetica, sans-serif"></font><font face="Arial, Helvetica, sans-serif"></font><font face="Arial, Helvetica, sans-serif">Observa&ccedil;&otilde;es</font></p>
            <p><font face="Arial, Helvetica, sans-serif">1. Note que para inserir 
              uma quebra de linha n&atilde;o h&aacute; necessidade de fechar o 
              c&oacute;digo, isso ocorre devido a fun&ccedil;&atilde;o n&atilde;o 
              precisar determinar a &aacute;rea de atua&ccedil;&atilde;o do c&oacute;digo.</font></p>
            <p><font face="Arial, Helvetica, sans-serif">2. Ao inserir um link 
              em um texto &eacute; indispens&aacute;vel o colocamento do c&oacute;digo 
              &quot;target =_blank&quot;, sem esse c&oacute;digo o link ir&aacute; 
              abrir na parte de not&iacute;cias. Voc&ecirc; pode expecificar que 
              a pagina abra no centro da p&aacute;gina da ativi colocando a seguinte 
              &quot;target=mainframe&quot;.<br>
              <br>
              3.Voc&ecirc; pode inserir um ou mais de um em um s&oacute; texto 
              desde que n&atilde;o se esque&ccedil;a de fechar os c&oacute;digos 
              que necessitam de determinar a &aacute;rea de atua&ccedil;&atilde;o. 
              Ex: &lt;b&gt;&lt;em&gt;&lt;a href=http://Link tagert=_blank&gt;Texto 
              que vai ficar negrito, italico e com o link&lt;/a&gt;&lt;/em&gt;&lt;/b&gt;</font></p>
            <p>&nbsp;</p></td>
        </tr>
        <tr bgcolor="#000000"> 
          <td height="19" colspan="3" align="center"><font color="#FFFFFF" size="4" face="Arial, Helvetica, sans-serif"><strong>Fontes</strong></font></td>
        </tr>
        <tr> 
          <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Tamanho</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;font 
            size=2&gt;&lt;/font&gt; </font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;font 
            size=2&gt;Texto&lt;/font&gt; </font></td>
        </tr>
        <tr> 
          <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Tipo</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;font 
            face=Arial&gt;&lt;/font&gt;</font></td>
          <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;font 
            face=Arial&gt;Texto na fonte Arial&lt;/font&gt; </font></td>
        </tr>
        <tr> 
          <td height="19" align="center">Cor</td>
          <td align="center">&lt;font color=white&gt;&lt;/font&gt;</td>
          <td align="center">&lt;font color=red&gt;<font color="#FF0000">Texto 
            vermelho</font>&lt;/font&gt;</td>
        </tr>
        <tr> 
          <td height="19" colspan="3" align="center"><p><font face="Arial, Helvetica, sans-serif">Observa&ccedil;&otilde;es</font></p>
            <p><font face="Arial, Helvetica, sans-serif">1. Para determinar o 
              tamanho, o tipo e a cor de uma s&oacute; vez note que basta incluir 
              todas as fun&ccedil;&otilde;es dentro do mesmo c&oacute;digo. Ex: 
              &lt;font size=3 color=red face=Arial&gt;<font color="#FF0000">Texto 
              Vermelho no tamanho 3 (padr&atilde;o) e no tipo Arial</font>&lt;/font&gt;</font></p></td>
        </tr>
        <tr> 
          <td height="19" colspan="3" align="center"><p>&nbsp;</p>
            <p><strong>Texto de Exemplo:</strong></p>
            <p align="justify" style="width:50%"><b>10/05/2007</b> - <em>SA&Uacute;DE</em><br><br>
              Texto normal sem formata&ccedil;&atilde;o 
              de fonte para que fique padr&atilde;o no navegador, se for usada 
              muitas formata&ccedil;&otilde;es corre-se o risco de dar diferen&ccedil;a 
              entre um e outro. Recomenda-se o uso apenas da quebra de linha, 
              negrito, italico e o c&oacute;digo para links, isso possibilita 
              uma padroniza&ccedil;&atilde;o de fontes. <a href="#" style="cursor:hand" onClick="MM_openBrWindow('formatacao.php?ver=codigo1','Formatacao','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=650,height=400,top=0,left=0')">Clique 
              aqui</a> para ver o c&oacute;digo de formata&ccedil;&atilde;o deste 
              texto.</p></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php } elseif (($_SESSION['login'] == 'logado') and ($_REQUEST['acao'] == 'deletar')) {
?>
<table width="100%" border="2" align="center" cellpadding="5" cellspacing="5" bordercolor="#999999">
  <?php 
			include "conexao.php";

			$enviar = "SELECT * FROM noticias ORDER BY id DESC";
			$sql = mysql_query($enviar);
			while ($result = mysql_fetch_array($sql)) {
				$texto = urldecode($result['noticia']);
				$id = $result['id'];
				$imagem = $result['imagem'];				
				echo "<tr>\n";
				echo "<td width=5%><a href=deletar_registro.php?acao=noticias&table=noticias&id=$id><img src=../imagens/excluir.gif border=0></a></td><td width=5%>$id</td><td width=80%>$texto</td><td width=10%><img src=$imagem border=0 style=width:100%;height:auto;></td>\n";
				echo "</tr>\n";
			}
			?>
</table>
<?php } else {
	echo "Erro de página";
	} 
?>