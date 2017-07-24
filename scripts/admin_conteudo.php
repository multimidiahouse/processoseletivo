<? 

session_start();

if ($_SESSION['login'] == 'logado') { 

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

	margin-left:0;

	margin-top:0;

	margin-right:0;

	margin-bottom:0;

}
.a{
color:#FFFFFF;
}
.a:hover{
color:#CCCCCC;
}

#divnoticia {

position:static;

left:0px;
margin-left:5px;

width:180px; 

z-index:1;

float:left;

}

td {

	font-family:Arial, Helvetica, sans-serif;

	font-size:14px;

	text-decoration:none;

	color:#333333;

}

</style>

<?

	include "conexao.php";

	if (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'menu')) {

		$table = $_REQUEST['table'];

?>

<table width="725" height="21" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center"><a href="<? echo "inserir_conteudo.php?acao=entrar&table=$table"; ?>" target="_self">Inserir</a></td>

    <td align="center">Visualizar</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

</table>

<br>

<table width="725" height="42" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr> 

    <td height="21" align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td>titulo</td>

    <td align="center">ordem</td>

    <td align="center">status</td>

    <td align="center">estilo</td>

    <td align="center">fonte de dados</td>

    <td align="center">link</td>

  </tr>

  <?	

		$sql = mysql_query("SELECT * FROM $table ORDER BY ordem");

		while ($result = mysql_fetch_array($sql)) {

?>

  <tr> 

    <td width="20" height="21" align="center"><a href="<? echo "altera_conteudo.php?acao=entrar&table=$table&id=$result[id]" ?>" target="_self"><img src="img/alterar.jpg" alt="Alterar" width="13" height="15" border="0"></a></td>

    <td width="20" align="center"><a href="<? echo "exclui_conteudo.php?table=$table&id=$result[id]" ?>" target="_self"><img src="img/excluir.jpg" alt="Excluir" width="15" height="15" border="0"></a></td>

    <td width="40" align="center"><? //echo $result['id']; ?></td>

    <td><? echo $result['titulo']; ?></td>

    <td width="40" align="center"><? echo $result['ordem']; ?></td>

    <td width="100" align="center"><? echo $result['status']; ?></td>

    <td width="100" align="center"><? echo $result['estilo']; ?></td>

    <td width="50" align="center"><? echo $result['fonte']; ?></td>

    <td width="50" align="center"><? echo $result['link']; ?></td>

  </tr>

  <? 		} 		?>

</table>

<?

	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'noticias')) {



		$table = $_REQUEST['table'];

?>

<table width="725" height="21" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center"><a href="<? echo "inserir_conteudo.php?acao=entrar&table=$table"; ?>" target="_self">Inserir</a></td>

    <td align="center">Visualizar</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

</table>

<?

		if (! isset($_REQUEST['showall'])) {

		$sql = mysql_query("SELECT * FROM $table ORDER BY id DESC");

		while ($result = mysql_fetch_array($sql)) {

		

?>

<div id="divnoticia">

<table>

  <tr>

    <td height="30" colspan="3" bgcolor="#666666" style="color:#FFFFFF;"><? echo $result[0]; ?></td>

	<? $src = explode("/", $result[7]); ?>

    <!--<td height="30" bgcolor="#666666" style="color:#FFFFFF;"><a class="a" href="admin_conteudo.php?table=noticias&showall=yes&id=<? echo $result[0]; ?>" target="_self"><!--<img alt="Noticia Sem Imagem" src="<? //echo '../imagens/'.$src[1].'/'.rawurlencode($src[2]); ?>" border="0" width="187" height="140">Alterar</a></td>-->
	<td height="30" bgcolor="#666666" style="color:#FFFFFF;"><a class="a" href="altera_conteudo.php?acao=entrar&table=<? echo $table; ?>&id=<? echo $result[0]; ?>" target="_self"><!--<img alt="Noticia Sem Imagem" src="<? //echo '../imagens/'.$src[1].'/'.rawurlencode($src[2]); ?>" border="0" width="187" height="140">-->Alterar</a>&nbsp;|&nbsp;<a class="a" href="<? echo 'exclui_conteudo.php?table='.$table.'&id='.$result[0]; ?>" target="_self">Excluir</a></td>

  </tr>

  <tr>

    <td width="20%" colspan="3">Titulo:</td>

    <td width="80%"><? echo $result[1]; ?></td>

  </tr>

</table>

</div>

<?		}//Fim da While

		} else {

		$id = $_REQUEST['id'];

		$sql = mysql_query("SELECT * FROM $table WHERE id=$id ORDER BY id");

		while ($result = mysql_fetch_array($sql)) {

?>

<table width="725"  border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td height="30" colspan="2" bgcolor="#666666" style="color:#FFFFFF;"><? echo $result[0]; ?></td>

	<? $src = explode("/", $result[7]); ?>

    <td height="30" bgcolor="#666666" style="color:#FFFFFF;"><!--<img alt="Noticia Sem Imagem" src="<? echo '../imagens/'.$src[1].'/'.rawurlencode($src[2]); ?>" border="0" width="187" height="140">--></td>

  </tr>

  <tr>

    <td width="20%" colspan="2">Titulo:</td>

    <td width="80%"><? echo $result[1]; ?></td>

  </tr>
<!--
  <tr>

    <td width="20%" colspan="3" bgcolor="#CCCCCC">Chamada:</td>

    <td width="80%" bgcolor="#CCCCCC"><? echo //$result[2]; ?></td>

  </tr>
-->
  <tr>

    <td width="20%" colspan="2" bgcolor="#FFFF99">Noticia:</td>

    <td width="80%" bgcolor="#FFFF99"><? echo $result[3]; ?></td>

  </tr>

  <tr>

    <td width="20%" colspan="2">Data:</td>

    <td width="80%"><? echo $result[4]; ?></td>

  </tr>

  <tr>

    <td width="20%" colspan="2">Hora:</td>

    <td width="80%"><? echo $result[5]; ?></td>

  </tr>

  <tr>

    <td width="20%" colspan="2">&nbsp;</td>

    <td width="80%">&nbsp;</td>

  </tr>

  <tr>

    <td width="20%" colspan="2">Destaque:</td>

    <td width="80%"><? echo $result[6]; ?></td>

  </tr>

  <tr>

    <td><a href="<? echo "altera_conteudo.php?acao=entrar&table=$table&id=$result[id]" ?>" target="_self"><img src="img/alterar.jpg" alt="Alterar" width="13" height="15" border="0">Alterar</a>      </td>

    <td><a href="<? echo "exclui_conteudo.php?table=$table&id=$result[id]" ?>" target="_self"><img src="img/excluir.jpg" alt="Excluir" width="15" height="15" border="0">Excluir</a></td>
    <td width="80%">&nbsp;</td>

  </tr>
</table>

  <? 		}// Fim da While

		}//Fim da Função Showall

	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'concursos')) { 

		$table = $_REQUEST['table'];

		if (isset($_REQUEST['situacao'])) {

		$situacao = $_REQUEST['situacao'];

?>

<table width="725" height="21" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center"><a href="<? echo "inserir_conteudo.php?acao=entrar&table=$table"; ?>" target="_self">Inserir</a></td>

    <td align="center">Visualizar</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

</table>

<?

		if (! isset($_REQUEST['showall'])) {

		$sql = mysql_query("SELECT * FROM $table WHERE situacao='$situacao' ORDER BY id");

		while ($result = mysql_fetch_array($sql)) {

?>

<div id="divnoticia">

<form action="admin_conteudo.php?table=concursos&<? echo 'id='.$result[0].'&situacao='.$situacao.'&showall=yes'; ?>" method="post">

<table>

  <tr>

    <td height="40" colspan="4" bgcolor="#666666" style="color:#FFFFFF;"><? echo $result[1]; ?></td>

  </tr>

  <tr>

    <td width="20%" colspan="3">Contato:</td>

    <td width="80%"><? echo $result[2]; ?></td>

  </tr>

  <tr>

    <td width="20%" colspan="3">Telefone:</td>

    <td width="80%"><? echo $result[3]; ?></td>

  </tr>

  <tr>

        <td width="20%" colspan="3"><a href="upload.php?acao=concursos&table=concursos&id=<? echo $result[0]; ?>">Adicionar Documentos?</a></td>

    <td width="80%"><input type="submit" name="vertudo"></td>

  </tr>  

</table>

</form>

</div>

<?		} //Fim da While

  		} else {

		$id = $_REQUEST['id'];

		$sql = mysql_query("SELECT * FROM $table WHERE id=$id ORDER BY id");

		while ($result = mysql_fetch_array($sql)) {

?>

<table width="725"  border="0" align="center" cellpadding="0" cellspacing="0">

  <tr> 

    <td height="40" colspan="3" style="background-color:rgb(111, 111, 111); color:#FFFFFF;"><? echo $result[1]; ?></td>

    <td height="40" align="right" style="background-color:rgb(111, 111, 111); color:#FFFFFF;"><a href="admin_conteudo.php?table=inscricoes&idConcurso=<? echo $result[0]; ?>"><img src="img/inscricoes.gif" width="172" height="40" border="0"></a></td>

  </tr>

  <tr bgcolor="#EEEEEE"> 

    <td width="20%" colspan="3">Contato:</td>

    <td width="80%"><strong><? echo $result[2]; ?></strong></td>

  </tr>

  <tr bgcolor="#E4E4E4"> 

    <td width="20%" colspan="3">Telefone:</td>

    <td width="80%"><strong><? echo $result[3]; ?></strong></td>

  </tr>

  <tr bgcolor="#EEEEEE"> 

    <td width="20%" colspan="3">Fax:</td>

    <td width="80%"><strong><? echo $result[4]; ?></strong></td>

  </tr>

  <tr bgcolor="#E4E4E4"> 

    <td width="20%" colspan="3">Email:</td>

    <td width="80%"><strong><? echo $result[5]; ?></strong></td>

  </tr>

  <tr bgcolor="#EEEEEE"> 

    <td width="20%" colspan="3">Data de In&iacute;cio:</td>

    <td width="80%"><strong><? echo $result[6]; ?></strong></td>

  </tr>

  <tr bgcolor="#E4E4E4"> 

    <td width="20%" colspan="3">Data do T&eacute;rmino:</td>

    <td width="80%"><strong><? echo $result[7]; ?></strong></td>

  </tr>

  <tr bgcolor="#EEEEEE"> 

    <td width="20%" colspan="3">Situa&ccedil;&atilde;o:</td>

    <td width="80%"><strong><? echo $result[8]; ?></strong></td>

  </tr>

  <tr bgcolor="#E4E4E4"> 

    <td width="20%" colspan="3">Observa&ccedil;&otilde;es:</td>

    <td width="80%"><strong><? echo $result[9]; ?></strong></td>

  </tr>

  <tr> 

    <td colspan="4" align="center" bgcolor="#FFFFCC">Dados Banc&aacute;rios para 

      Gera&ccedil;&atilde;o de Boleto</td>

  </tr>

  <tr bgcolor="#FFE8B0"> 

    <td colspan="3" align="left" valign="top">Cedente</td>

    <td align="left" valign="top"><strong><? echo $result[10]; ?></strong></td>

  </tr>

  <tr> 

    <td colspan="3" align="left" valign="top" bgcolor="#FFFFCC">Ag&ecirc;ncia</td>

    <td align="left" valign="top" bgcolor="#FFFFCC"><strong><? echo $result[11]; ?></strong></td>

  </tr>

  <tr bgcolor="#FFE8B0"> 

    <td colspan="3" align="left" valign="top">Conta Corrente</td>

    <td align="left" valign="top"><strong><? echo $result[12]; ?></strong></td>

  </tr>

  <tr> 

    <td colspan="3" align="left" valign="top" bgcolor="#FFFFCC">Conv&ecirc;nio</td>

    <td align="left" valign="top" bgcolor="#FFFFCC"><strong><? echo $result[13]; ?></strong></td>

  </tr>

  <tr bgcolor="#FFE8B0"> 

    <td colspan="3" align="left" valign="top">Contrato:</td>

    <td align="left" valign="top"><strong><? echo $result[14]; ?></strong></td>

  </tr>

  <tr> 

    <td colspan="3" align="left" valign="top" bgcolor="#FFFFCC">Instru&ccedil;&atilde;o</td>

    <td align="left" valign="top" bgcolor="#FFFFCC"><strong><? echo $result[15]; ?></strong></td>

  </tr>

  <tr bgcolor="#FFE8B0"> 

    <td colspan="3" align="left" valign="top">CNPJ:</td>

    <td align="left" valign="top"><strong><? echo $result[16]; ?></strong></td>

  </tr>

  <tr> 

    <td colspan="3" align="left" valign="top" bgcolor="#FFFFCC">Endere&ccedil;o:</td>

    <td align="left" valign="top" bgcolor="#FFFFCC"><strong><? echo $result[17]; ?></strong></td>

  </tr>

  <tr bgcolor="#FFE8B0"> 

    <td colspan="3" align="left" valign="top">Local:</td>

    <td align="left" valign="top"><strong><? echo $result[18]; ?></strong></td>

  </tr>

  <tr> 

    <?

  $sqlForm = mysql_query("SELECT * FROM formulario WHERE idConcurso=$result[0]"); 

  while ($resultForm = mysql_fetch_array($sqlForm)) {

  ?>

    <td colspan="4" align="center" valign="top" bgcolor="#EEEEEE">Dados da Ficha 

      de inscri&ccedil;&atilde;o</td>

  </tr>

  <tr bgcolor="#E4E4E4"> 

    <td colspan="3" align="left" valign="top">N&iacute;vel Fundamental Incompleto:</td>

    <td align="left" valign="top"><? echo $resultForm[2].' | Valor da Inscrição: R$ '.$resultForm[6]; ?></td>

  </tr>

  <tr bgcolor="#E4E4E4"> 

    <td colspan="3" align="left" valign="top">Cargos a N&iacute;vel Fundamental 

      Incompleto</td>

    <td align="left" valign="top" bgcolor="#E4E4E4"><? echo $resultForm[10]; ?></td>

  </tr>

  <tr> 

    <td colspan="3" align="left">&nbsp;</td>

    <td align="left">&nbsp;</td>

  </tr>

  <tr bgcolor="#EEEEEE"> 

    <td colspan="3" align="left" valign="top">N&iacute;vel Fundamental Completo:</td>

    <td align="left" valign="top"><? echo $resultForm[3].' | Valor da Inscrição: R$ '.$resultForm[7]; ?></td>

  </tr>

  <tr bgcolor="#EEEEEE"> 

    <td colspan="3" align="left" valign="top">Cargos a N&iacute;vel Fundamental</td>

    <td align="left" valign="top"><? echo $resultForm[11]; ?></td>

  </tr>

  <tr> 

    <td colspan="3" align="left">&nbsp;</td>

    <td align="left">&nbsp;</td>

  </tr>

  <tr bgcolor="#E4E4E4"> 

    <td colspan="3" align="left" valign="top">N&iacute;vel M&eacute;dio:</td>

    <td align="left" valign="top"><? echo $resultForm[4].' | Valor da Inscrição: R$ '.$resultForm[8]; ?></td>

  </tr>

  <tr bgcolor="#E4E4E4"> 

    <td colspan="3" align="left" valign="top">Cargos a N&iacute;vel M&eacute;dio</td>

    <td align="left" valign="top"><? echo $resultForm[12]; ?></td>

  </tr>

  <tr> 

    <td colspan="3" align="left">&nbsp;</td>

    <td align="left">&nbsp;</td>

  </tr>

  <tr bgcolor="#EEEEEE"> 

    <td colspan="3" align="left" valign="top">N&iacute;vel Superior:</td>

    <td align="left" valign="top"><? echo $resultForm[5].' | Valor da Inscrição: R$ '.$resultForm[9]; ?></td>

  </tr>

  <tr bgcolor="#EEEEEE"> 

    <td colspan="3" align="left" valign="top">Cargos a N&iacute;vel Superior</td>

    <td align="left" valign="top"><? echo $resultForm[13]; ?></td>

  </tr>

  <tr> 

    <td colspan="3" align="left">&nbsp;</td>

    <td align="left">&nbsp;</td>

  </tr>

  <tr> 

    <td colspan="3" align="left">Encerramento das Inscri&ccedil;&otilde;es em:</td>

    <td align="left"> 

      <?

	$hoje = time("d/m/Y G:i:s");

	$venc = round(($resultForm[14] - $hoje) / 86400);

	echo $venc.' Dias';

	//echo $resultForm[14].'<br>';

	//echo $hoje.'<br>';

	?>

    </td>

  </tr>

  <? } ?>

  <tr> 

    <td colspan="3" align="left">&nbsp;</td>

    <td align="left">&nbsp;</td>

  </tr>

  <tr> 

    <td width="20%" colspan="3"> Documentos Relacionados:<br> <a href="upload.php?acao=concursos&table=concursos&id=<? echo $result[0]; ?>">Adicionar 

      Documentos?</a> </td>

    <td width="80%"> 

      <!-- Documentos Relacionados -->

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td width="5%" align="center" style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;">Alterar</td>

          <td width="5%" align="center" style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;">Excluir</td>

          <td width="90%" align="center" style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;">Nome 

            do Documento</td>

        </tr>

        <?

		$sqlDocs = mysql_query("SELECT * FROM documentos WHERE idConcurso='$result[0]' ORDER BY id ASC");

		while ($resultDocs = mysql_fetch_array($sqlDocs)) {

		echo '

        <tr> 

          <td width="5%" align="center" style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;"><a href="altera_upload.php?acao=entrar&idConcurso='.$result[0].'&id='.$resultDocs['id'].'"><img src="img/alterar.jpg" border="0" width="15" height="15"></a></td>

          <td width="5%" align="center" style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;"><a href="exclui_upload.php?acao=entrar&id='.$resultDocs['id'].'"><img src="img/excluir.jpg" border="0" width="15" height="15"></a></td>

          <td width="90%" align="center"><a style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;" href="altera_upload.php?acao=entrar&idConcurso='.$result[0].'&id='.$resultDocs['id'].'">'.$resultDocs['nome'].'</a></td>

        </tr>		

		';

		}

	?>

      </table>

      <!-- Documentos Relacionados -->

    </td>

  </tr>

  <tr> 

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr> 

    <td width="20%"><a href="<? echo "altera_conteudo.php?acao=entrar&table=$table&id=$result[id]" ?>" target="_self"><img src="img/alterar.jpg" alt="Alterar" width="13" height="15" border="0"></a>Alterar</td>

    <td width="20%"><a href="<? echo "exclui_conteudo.php?table=$table&id=$result[id]" ?>" target="_self"><img src="img/excluir.jpg" alt="Excluir" width="15" height="15" border="0"></a> 

      Excluir </td>

    <td width="20%">N&uacute;mero: <? echo $result[0]; ?></td>

    <td width="80%">&nbsp;</td>

  </tr>

</table>

<?	

			} //FIm da While

		} //Fim da Função Showall

		} else {
			$sqlMenu = mysql_query("SELECT * FROM menu WHERE fonte='concursos'");
			$categoria = '';
			while ($resultMenu = mysql_fetch_array($sqlMenu)) {
				$categoria .= '<tr><td align="center"><a href="admin_conteudo.php?table='.$table.'&situacao='.$resultMenu['categoria'].'" target="_self">'.strtoupper($resultMenu['categoria']).'</a></td></tr>';
			}

		echo '<table width="75%" border="0" align="center" cellpadding="0" cellspacing="5">
				<tr>
					<td align="center">Deseja ver os Concursos / Editais</td>
				</tr>
					'.$categoria.'
				</table>';
		}

	} elseif (isset($_REQUEST['table']) and $_REQUEST['table'] == 'inscricoes') {

		$table = $_REQUEST['table'];

		$idConcurso = $_REQUEST['idConcurso'];

		if (isset($_REQUEST['lista'])) {

		?>

		<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1">

		  <?

		  $sql = mysql_query("SELECT * FROM $table WHERE idConcurso='$idConcurso' AND situacao='confirmado' ORDER BY nivel, cargo, nome ");

		  while ($result = mysql_fetch_array($sql)) {

		?>

		  <tr>
			<td>Nível</td>
			<td>Cargo</td>
			<td>N&ordm; de Inscri&ccedil;&atilde;o:</td>
			<td>Nome Completo:</td>
			<td>RG </td>
			<td>CPF</td>
		  </tr>
		  <tr>
			<td><? echo $result[2]; ?></td>
			<td><? echo $result[3]; ?></td>
			<td><? echo $result[4]; ?></td>
			<td><? echo $result[5]; ?></td>
			<td><? echo $result[12]; ?></td>
			<td><? echo $result[11]; ?></td>
		  </tr>

		  <? } ?>

</table>

		<?

		} else {

		?>

<table width="100%" align="center">

  <tr>

    <td align="center"><a href="admin_conteudo.php?<? echo "table=$table&idConcurso=$idConcurso"; ?>">atualizar</a> </td>

    <td align="center"><a href="admin_conteudo.php?<? echo "table=$table&idConcurso=$idConcurso&lista=yes"; ?>">mostrar lista de confirmados</a></td>

  </tr></table>  

<table width="725" height="42" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr bgcolor="#CCCCCC"> 
    <td width="10%" align="center">N&ordm; Insc.</td>
    <td width="15%">Atendimento Especial</td>
    <td width="80%">Nome:</td>
    <td width="15%">CPF:</td>
    <td width="10%">Situação:</td>
  </tr>
  <?

  $sql = mysql_query("SELECT * FROM $table WHERE idConcurso='$idConcurso' ORDER BY nInscricao ASC ");

  while ($result = mysql_fetch_array($sql)) {

?>
  <tr>
    <td width="10%" align="center"><? echo $result[4]; ?></td>
    <td width="15%"><? echo $result[20]; ?></td>
    <td><? echo strtoupper($result[5]); ?></td>
    <td width="15%"><? echo $result[11]; ?></td>
    <td width="10%"><form name="form1" method="post" action="altera_conteudo.php?acao=atualizar">
      <select name="situacao" id="select">
        <?
		if ($result[22] == 'aguardando') {
			echo '<option value="aguardando" selected>aguardando</option>';
			echo '<option value="confirmado">confirmado</option>';
		} else {
			echo '<option value="aguardando">aguardando</option>';
			echo '<option value="confirmado" selected>confirmado</option>';		
		}
		?>
      </select>
      <input name="alterar" type="submit" id="alterar3" value="alterar">
      <input name="id" type="hidden" id="id" value="<? echo $result[0]; ?>">
      <input name="table" type="hidden" id="table" value="<? echo $table; ?>">
      <input name="idConcurso" type="hidden" id="idConcurso" value="<? echo $idConcurso; ?>">
    </form></td>
  </tr>

  <? }

  	} ?>

</table>

<?

	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'documentos' or $_REQUEST['table'] == 'documentosseguros')) {

		$table = $_REQUEST['table'];

?>

<table width="725" height="21" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center"><a href="<? echo "upload.php?acao=$table"; ?>" target="_self">Inserir</a></td>

    <td align="center">Visualizar</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

</table>

<br>

<table width="725" height="42" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr> 

    <td height="21" align="center">&nbsp;</td>

    <td align="center">id</td>

    <td>nome</td>

    <td align="center">arquivo</td>

    <td align="center">tipo</td>

    <td align="center">status</td>

    <td align="center">ordem</td>

    <td align="center">local</td>

  </tr>

  <?

  $sqlFonte = mysql_query("SELECT * FROM menu WHERE fonte='$table' ORDER BY id DESC ");

  while ($resultFonte = mysql_fetch_array($sqlFonte)) {

  $local = $resultFonte['titulo'];

  

		$sqlDocs = mysql_query("SELECT * FROM documentos WHERE idConcurso='$local' ORDER BY ordem ASC");

		while ($resultDocs = mysql_fetch_array($sqlDocs)) {



?>

  <tr> 

    <td width="20" height="21" align="center"><a href="<? echo "exclui_conteudo.php?table=$table&id=$resultDocs[id]" ?>" target="_self"><img src="img/excluir.jpg" alt="Excluir" width="15" height="15" border="0"></a></td>

    <td width="40" align="center"><? echo $resultDocs[0]; ?></td>

    <td><? echo $resultDocs[1]; ?></td>

    <td width="40" align="center"><? echo $resultDocs[2]; ?></td>

    <td width="100" align="center"><img src="<? echo '../'.$resultDocs[3]; ?>" width="15" height="15" border="0"></td>

    <td width="100" align="center"><? echo $resultDocs[5]; ?></td>

    <td width="50" align="center"><? echo $resultDocs[6]; ?></td>

    <td width="20" align="center"><? echo $resultDocs[7]; ?></td>

  </tr>

  <? 		} 

  }		?>

</table>	

<? 	

	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'destaques')) {

		$table = $_REQUEST['table'];

?>

<table width="725" height="21" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center"><a href="<? echo "upload.php?acao=$table"; ?>" target="_self">Inserir</a></td>

    <td align="center">Visualizar</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

</table>

<br>

<table width="725" height="42" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr> 

    <td height="21" align="center">&nbsp;</td>

    <td align="center">id</td>

    <td>Chamada</td>

    <td align="center">data</td>

    <td align="center">hora</td>

    <td align="center">imagem</td>

    <td align="center">ordem</td>

    <td align="center">&nbsp;</td>

  </tr>

  <?	

		$sql = mysql_query("SELECT * FROM destaques ORDER BY ordem DESC");

		while ($result = mysql_fetch_array($sql)) {

?>

  <tr> 

    <td width="20" height="21" align="center"><a href="<? echo "exclui_conteudo.php?table=$table&id=$result[id]" ?>" target="_self"><img src="img/excluir.jpg" alt="Excluir" width="15" height="15" border="0"></a></td>

    <td width="40" align="center"><? echo $result[0]; ?></td>

    <td><? echo $result[1]; ?></td>

    <td width="40" align="center"><? echo $result[2]; ?></td>

    <td width="100" align="center"><? echo $result[3]; ?></td>

    <td width="100" align="center"><? echo $result[4]; ?></td>

    <td width="50" align="center"><? echo $result[5]; ?></td>

    <td width="20" align="center">&nbsp;</td>

  </tr>

  <? 		} 		?>

</table>	

<?

	} elseif(isset($_REQUEST['table']) and ($_REQUEST['table'] == 'usuarios')) {

		$table = $_REQUEST['table'];	

?>

<table width="725" height="21" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center"><a href="<? echo "inserir_conteudo.php?acao=entrar&table=$table"; ?>" target="_self">Inserir</a></td>

    <td align="center">Visualizar</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

</table>

<table width="725" height="42" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr> 

    <td height="21" align="center">&nbsp;</td>

    <td align="center">id</td>

    <td>Usuario</td>

    <td align="center">Senha</td>

    <td align="center">Nome</td>

    <td align="center">Email</td>

  </tr>

  <?	

		$sql = mysql_query("SELECT * FROM usuarios WHERE autorizacao='cliente' ORDER BY id ASC");

		while ($result = mysql_fetch_array($sql)) {

?>

  <tr> 

    <td width="20" height="21" align="center"><a href="<? echo "exclui_conteudo.php?table=$table&id=$result[id]" ?>" target="_self"><img src="img/excluir.jpg" alt="Excluir" width="15" height="15" border="0"></a></td>

    <td width="40" align="center"><? echo $result[0]; ?></td>

    <td><? echo $result[1]; ?></td>

    <td align="center"><? echo $result[2]; ?></td>

    <td width="100" align="center"><? echo $result[4]; ?></td>

    <td width="100" align="center"><? echo $result[5]; ?></td>

  </tr>

  <? 		} 		?>

</table>

<?

	} elseif(isset($_REQUEST['table']) and ($_REQUEST['table'] == 'conteudos')) {

		$table = $_REQUEST['table'];	

?>

<table width="725" height="21" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center"><a href="<? echo "inserir_conteudo.php?acao=entrar&table=$table"; ?>" target="_self">Inserir</a></td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

</table>

<table width="725" height="42" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr> 

    <td height="21" align="center">&nbsp;</td>

    <td align="center">&nbsp;</td>

    <td>id</td>

    <td align="center">Titulo</td>

    <td align="center">Local</td>

    <td align="center">Observa&ccedil;&otilde;es</td>

  </tr>

  <?	

		$sql = mysql_query("SELECT * FROM conteudos ORDER BY id ASC");

		while ($result = mysql_fetch_array($sql)) {

?>

  <tr> 

    <td width="20" height="21" align="center"><a href="<? echo "altera_conteudo.php?acao=entrar&table=$table&id=$result[id]" ?>" target="_self"><img src="img/alterar.jpg" alt="Alterar" width="13" height="15" border="0"></a></td>  

    <td width="20" align="center"><a href="<? echo "exclui_conteudo.php?table=$table&id=$result[id]" ?>" target="_self"><img src="img/excluir.jpg" alt="Excluir" width="15" height="15" border="0"></a></td>

    <td width="40" align="center"><? echo $result[0]; ?></td>

    <td><? echo $result[1]; ?></td>

    <td align="center"><? echo $result[3]; ?></td>

    <td width="200" align="center"><? echo $result[4]; ?></td>

  </tr>

  <? 		} 		?>

</table>

<?

	}

} else { echo "erro de pagina"; }

?>