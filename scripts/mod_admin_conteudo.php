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



	left:0px;



	padding-left:10px;



	padding-right:10px;



	width:100%; 



	z-index:1;



	float:left;



}







td {



	font-family:Arial, Helvetica, sans-serif;



	font-size:14px;



	text-decoration:none;



	color:#333333;



}





#cargoTR {

	background-color:transparent;

	height:15px;

	font-family:Arial, Helvetica, sans-serif;

	font-size:12px;

	color:#666;

}

#cargoTR:hover {

	background-color:#CCC;

}



#documentos {

	background-color:transparent;

	height:15px;

	font-family:Arial, Helvetica, sans-serif;

	font-size:12px;

	color:#333;

}

#documentos:hover {

	background-color:#CCC;

}



#col0 {width: 35px;}

#col1 {width: 75px;}

#col2 {width: 86px;}

#col3 {width: 106px;}

#col4 {width: 62px;}

#col5 {width: 450px;}

#col6 {width: 191px;}

#col7 {width: 127px;}

#col8 {width: 182px;}

#col9 {width: 80px;}

#col10 {width: 94px;}

#col11 {width: 86px;}

#col12 {width: 114px;}

#col13 {width: 103px;}

#col14 {width: 70px;}

#col15 {width: 66px;}

#col16 {width: 162px;}

#col17 {width: 97px;}

#col18 {width: 97px;}

#col19 {width: 82px;}

#col20 {width: 63px;}

#col21 {width: 116px;}

#col22 {width: 78px;}

</style>

<script language="javascript" type="text/javascript">

function excluirCandidato() {

	var answer = confirm("Deseja realmente excluir o candidato?");

	if(answer) {

		window.location = "exclui_conteudo.php?table=inscricoes&idConcurso="+form1.codConcurso.value+"&id="+form1.idCandidato.value;

	} else {

		alert("A��o cancelada");

	}

}



</script>



<p align="center" style="width:100%;"><a href="javascript:history.back(1);">voltar</a></p>



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







    <!--<td height="30" bgcolor="#666666" style="color:#FFFFFF;"><a class="a" href="mod_admin_conteudo.php?table=noticias&showall=yes&id=<? echo $result[0]; ?>" target="_self"><!--<img alt="Noticia Sem Imagem" src="<? //echo '../imagens/'.$src[1].'/'.rawurlencode($src[2]); ?>" border="0" width="187" height="140">Alterar</a></td>-->



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







    <td width="80%" bgcolor="#CCCCCC"><? //echo $result[2]; ?></td>







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







		}//Fim da Fun��o Showall







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







		$sql = mysql_query("SELECT * FROM $table WHERE situacao='$situacao' ORDER BY termino");







		while ($result = mysql_fetch_array($sql)) {







?>







<div id="divnoticia">



<form action="mod_admin_conteudo.php?table=concursos&amp;<? echo 'id='.$result[0].'&situacao='.$situacao.'&showall=yes'; ?>" method="post">



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



	    <td width="80%"><input type="submit" name="entrar" value="entrar"></td>



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







    <td height="40" align="right" style="background-color:rgb(111, 111, 111); color:#FFFFFF;"><a href="mod_admin_conteudo.php?table=inscricoes&amp;idConcurso=<? echo $result[0]; ?>"><img src="img/inscricoes.gif" width="172" height="40" border="0"></a></td>







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







    <td align="left" valign="top"><? echo $resultForm[2].' | Valor da Inscri��o: R$ '.$resultForm[6]; ?></td>







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







    <td align="left" valign="top"><? echo $resultForm[3].' | Valor da Inscri��o: R$ '.$resultForm[7]; ?></td>







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







    <td align="left" valign="top"><? echo $resultForm[4].' | Valor da Inscri��o: R$ '.$resultForm[8]; ?></td>







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







    <td align="left" valign="top"><? echo $resultForm[5].' | Valor da Inscri��o: R$ '.$resultForm[9]; ?></td>







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

          <td width="15%" align="center" style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;">Alterar</td>

          <td width="15%" align="center" style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;">Excluir</td>

          <td width="70%" align="center" style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;">Nome 

            do Documento</td>

        </tr>

        <?

		$sqlDocs = mysql_query("SELECT * FROM documentos WHERE idConcurso='$result[0]' ORDER BY id ASC");

		while ($resultDocs = mysql_fetch_array($sqlDocs)) {

			echo '

			<tr id="documentos"> 

			  <td width="15%" align="center" style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;"><a href="altera_upload.php?acao=entrar&idConcurso='.$result[0].'&id='.$resultDocs['id'].'"><img src="img/alterar.jpg" border="0" width="15" height="15"></a></td>

			  <td width="15%" align="center" style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;"><a href="exclui_upload.php?acao=entrar&id='.$resultDocs['id'].'"><img src="img/excluir.jpg" border="0" width="15" height="15"></a></td>

			  <td width="70%" align="center"><a style="font-family:Arial; font-size:9px; color:#000000; text-decoration:none;" href="altera_upload.php?acao=entrar&idConcurso='.$result[0].'&id='.$resultDocs['id'].'">'.$resultDocs['nome'].'</a></td>

			</tr>

			';

		}

	?>

      </table>

      <!-- Documentos Relacionados -->

    </td>

  </tr>

  <tr> 

    <td width="20%" height="50"><a href="<? echo "altera_conteudo.php?acao=entrar&table=$table&id=$result[id]" ?>" target="_self"><img src="img/alterar.jpg" alt="Alterar" width="13" height="15" border="0">Alterar</a></td>

    <td width="20%"><a href="<? echo "exclui_conteudo.php?table=$table&id=$result[id]" ?>" target="_self"><img src="img/excluir.jpg" alt="Excluir" width="15" height="15" border="0">Excluir</a></td>

    <td width="20%">N&uacute;mero: <? echo $result[0]; ?></td>

    <td width="80%">&nbsp;</td>

  </tr>

</table>







<?	







			} //FIm da While







		} //Fim da Fun��o Showall







		} else {



			$sqlMenu = mysql_query("SELECT * FROM menu WHERE fonte='concursos'");



			$categoria = '';



			while ($resultMenu = mysql_fetch_array($sqlMenu)) {



				$categoria .= '<tr><td align="center"><a href="mod_admin_conteudo.php?table='.$table.'&situacao='.$resultMenu['categoria'].'" target="_self">'.strtoupper($resultMenu['categoria']).'</a></td></tr>';



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

		if(isset($_REQUEST['alteraCandidato'])) {

			$checkCargo = explode ('|', $_POST['cargo']);

			if ($checkCargo[1] == 'A') {

				$nivel = 'N�vel Fundamental Incompleto';

				$cargo = $checkCargo[0];

			} elseif ($checkCargo[1] == 'B') {

				$nivel = 'N�vel Fundamental Completo';

				$cargo = $checkCargo[0];			

			} elseif ($checkCargo[1] == 'C') {

				$nivel = 'N�vel M�dio';

				$cargo = $checkCargo[0];			

			} elseif ($checkCargo[1] == 'D') {

				$nivel = 'N�vel Superior';	

				$cargo = $checkCargo[0];		

			}



			$nome = strtoupper($_POST['nome']);

			$email = strtolower($_POST['email']);

			$pai = strtoupper($_POST['pai']);

			$mae = strtoupper($_POST['mae']);

			$nacionalidade = strtoupper($_POST['nacionalidade']);

			$naturalidade = strtoupper($_POST['naturalidade']);

			$cpf = $_POST['cpf'];

			$rg = $_POST['rg'].' / '.$_POST['orgaoRG'].'-'.$_POST['ufRG'];

			$dataDeNascimento = $_POST['dataDeNascimento'];

			$estadoCivil = $_POST['estadoCivil'];

			$sexo = $_POST['sexo'];

			$endereco = $_POST['endereco'];

			$telefone = '('.$_POST['dddtel'].') '.$_POST['telefone'];

			$celular = '('.$_POST['dddcel'].') '.$_POST['celular'];

			$local = $_POST['cidade'].' / '.$_POST['estado'];

			$deficiente = $_POST['deficiencia'];

			$situacao = $_POST['situacao'];



			$sql = mysql_query("UPDATE inscricoes SET nivel='$nivel', cargo='$cargo', nome='$nome', email='$email', pai='$pai', mae='$mae', nacionalidade='$nacionalidade', naturalidade='$naturalidade', cpf='$cpf', rg='$rg', dataDeNascimento='$dataDeNascimento', estadoCivil='$estadoCivil', sexo='$sexo', endereco='$endereco', telefone='$telefone', celular='$celular', local='$local', deficiencia='$deficiencia', situacao='$situacao' WHERE id='$_POST[idCandidato]' ");

			if($sql) {

				echo '<meta http-equiv="refresh" content="0;url=mod_admin_conteudo.php?table='.$table.'&idConcurso='.$idConcurso.'" />';

			}



		} elseif(isset($_REQUEST['candidato'])) {

			$sql = mysql_query("SELECT * FROM $table WHERE idConcurso='$idConcurso' AND id='$_REQUEST[candidato]'");

			if($result = mysql_fetch_array($sql)) {

		?>

        <form name="form1" action="mod_admin_conteudo.php?table=inscricoes&idConcurso=<?=$idConcurso;?>&alteraCandidato=yes" method="post">

        <table style="padding-left:10px; padding-top:10px; padding-right:10px;" width="95%"  border="0" cellspacing="0" cellpadding="0" align="center">    

        <tr>

        <td>Cargo:</td>

        <td colspan="3"><select name="cargo" id="cargo" class="conteudo">

              <? 

			  $sqlCon = mysql_query("SELECT * FROM formulario WHERE idConcurso='$idConcurso'");

			  if($resultCon = mysql_fetch_array($sqlCon)) {

                if ($resultCon[2] == 'sim') {

                echo '<option value="-">-- N�vel Fundamental Incompleto --</option>';

                    $cargos1 = explode (',', $resultCon[10]);

                    for ($i=0; $i < sizeof($cargos1); $i++) {

						if($cargos1[$i]==$result['cargo']) {

	                    	echo '<option value="'.$cargos1[$i].'|A" selected>'.$cargos1[$i].'</option>';

						} else {

							echo '<option value="'.$cargos1[$i].'|A">'.$cargos1[$i].'</option>';

						}

                    }

                }



				if ($resultCon[3] == 'sim') {

                echo '<option value="-">-- N�vel Fundamental --</option>';

                    $cargos2 = explode (',', $resultCon[11]);

                    for ($i=0; $i < sizeof($cargos2); $i++) {

						if($cargos2[$i]==$result['cargo']) {

	                    	echo '<option value="'.$cargos2[$i].'|B" selected>'.$cargos2[$i].'</option>';

						} else {

							echo '<option value="'.$cargos2[$i].'|B">'.$cargos2[$i].'</option>';

						}

                    }

                }



				if ($resultCon[4] == 'sim') {

                echo '<option value="-">-- N�vel M�dio --</option>';

                    $cargos3 = explode (',', $resultCon[12]);

                    for ($i=0; $i < sizeof($cargos3); $i++) {

						if($cargos3[$i]==$result['cargo']) {

	                    	echo '<option value="'.$cargos3[$i].'|C" selected>'.$cargos3[$i].'</option>';

						} else {

							echo '<option value="'.$cargos3[$i].'|C">'.$cargos3[$i].'</option>';

						}

                    }

                }



				if ($resultCon[5] == 'sim') {

                echo '<option value="-">-- N�vel Superior --</option>';

                    $cargos4 = explode (',', $resultCon[13]);

                    for ($i=0; $i < sizeof($cargos4); $i++) {

						if($cargos4[$i]==$result['cargo']) {

	                    	echo '<option value="'.$cargos4[$i].'|D" selected>'.$cargos4[$i].'</option>';

						} else {

							echo '<option value="'.$cargos4[$i].'|D">'.$cargos4[$i].'</option>';

						}

                    }

                }

			  }

                ?>

            </select></td>

          </tr>

          <tr>

            <td>Nome:</td>

            <td colspan="3"><input name="nome" onkeypress="maiusculo(this);" type="text" id="nome" size="80%" value="<?=$result['nome']?>"></td>

          </tr>

          <tr>

            <td>Email:</td>

            <td colspan="3"><input name="email" onkeypress="minusculo(this);" type="text" id="email" size="40%" value="<?=$result['email']?>"></td>

          </tr>

          <tr>

            <td>Pai:</td>

            <td colspan="3"><input name="pai" onkeypress="maiusculo(this);" type="text" id="pai" size="80%" value="<?=$result['pai']?>"></td>

          </tr>

          <tr>

            <td>M&atilde;e:</td>

            <td colspan="3"><input name="mae" onkeypress="maiusculo(this);" type="text" id="mae" size="80%" value="<?=$result['mae']?>"></td>

          </tr>

          <tr>

            <td>Nacionalidade:</td>

            <td colspan="3"><input name="nacionalidade" onkeypress="maiusculo(this);" type="text" id="nacionalidade" size="30%" value="<?=$result['nacionalidade']?>">

              | Naturalidade:

              <input name="naturalidade" onkeypress="maiusculo(this);" type="text" id="naturalidade" size="30%" value="<?=$result['naturalidade']?>"></td>

          </tr>

          <tr>

            <td>C.P.F.:</td>

            <td colspan="3"><input onchange="ValidarCPF(form1.cpf);" onBlur="ValidarCPF(form1.cpf);" onKeyPress="formataCampo(form1.cpf, '000.000.000-00', event);" name="cpf" type="text" id="cpf" size="30%" value="<?=$result['cpf']?>"></td>

          </tr>

          <tr>

            <td>R.G.: </td>

            <td colspan="3">

            <?

			$rg = explode('/',$result['rg']);

			$nRg = trim($rg[0]);

			$orgaoRg = explode('-',trim($rg[1]));

			$emissorRg = $orgaoRg[0];

			$ufRg = $orgaoRg[1];

			?>

            <input name="rg" type="text" id="rg3" size="20%" value="<?=$nRg;?>">

              &Oacute;rg&atilde;o 

              

              

              

              Emissor:

              <input name="orgaoRG" type="text" id="orgaoRG" value="<?=$emissorRg;?>" size="6">

              UF:

              <select name="ufRG" id="select3">              

              <?

				  $estados = array('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO');

				  for($i=0;$i<sizeof($estados);$i++) {

					  if(trim($ufRg)==$estados[$i]) {

						  echo '<option value="'.$estados[$i].'" selected>'.$estados[$i].'</option>';

					  } else {

						  echo '<option value="'.$estados[$i].'">'.$estados[$i].'</option>';

					  }

				  }

			  ?>

              </select></td>

          </tr>

          <tr>

            <td>Data de Nascimento:</td>

            <td colspan="3"><input name="dataDeNascimento" onKeyUp="barra(this)" type="text" id="dataDeNascimento" size="20%" value="<?=$result['dataDeNascimento']?>"></td>

          </tr>

          <tr>

            <td>Estado Civil:</td>

            <td colspan="3">

            <select name="estadoCivil" id="estadoCivil">            

            <?

				$civil = array('Solterio(a)','Casado(a)','Divorciado(a)','Outro');

				for($i=0;$i<sizeof($civil);$i++) {

					if($result['estadoCivil']==$civil[$i]) {

						echo '<option value="'.$civil[$i].'" selected>'.$civil[$i].'</option>';

					} else {

						echo '<option value="'.$civil[$i].'">'.$civil[$i].'</option>';

					}

				}

			?>

            </select></td>

          </tr>

          <tr>

            <td>Sexo:</td>

            <td colspan="3">
            <select name="sexo" id="sexo">
            <?
			$sexo = array('masculino','feminino');
			for($i=0;$i<sizeof($sexo);$i++) {
				if($result['sexo']==$sexo[$i]) {
					echo '<option value="'.$sexo[$i].'" selected>'.ucfirst($sexo[$i]).'</option>';
				} else {
					echo '<option value="'.$sexo[$i].'">'.ucfirst($sexo[$i]).'</option>';
				}
			}
			?>
            </select></td>

          </tr>

          <tr>

            <td>Endere&ccedil;o:</td>

            <td colspan="3"><input name="endereco" onkeypress="maiusculo(this);" type="text" id="endereco" size="80%" value="<?=$result['endereco']?>"></td>

          </tr>

          <tr>

            <td>Telefone:</td>

            <td>

            <?

			$telefone = explode(')',$result['telefone']);

			$dddTel = str_replace('(','',trim($telefone[0]));

			$numeroTelefone = trim($telefone[1]);



			$celular = explode(')',$result['celular']);

			$dddCel = str_replace('(','',trim($celular[0]));

			$numeroCelular = trim($celular[1]);

			?>

            <input type="text" name="dddtel" id="dddtel" maxlength="2" size="4" value="<?=$dddTel;?>" />

              <input name="telefone" type="text" id="telefone" size="15" maxlength="9" value="<?=$numeroTelefone;?>" /></td>

            <td>Celular: </td>

            <td><input type="text" name="dddcel" id="dddcel" maxlength="2" size="4" value="<?=$dddCel;?>" />

              <input name="celular" type="text" id="celular" size="15" maxlength="9" value="<?=$numeroCelular;?>" /></td>

          </tr>

          <tr>

            <td>Cidade:</td>

            <td colspan="3">

            <?

			$local = explode('/',$result['local']);

			$cidade = trim($local[0]);

			$uf = trim($local[1]);

			?>

            <input name="cidade" onkeypress="maiusculo(this);" type="text" id="cidade" value="<?=$cidade;?>" >

              UF:

              <select name="estado">

              <?

			  for($i=0;$i<sizeof($estados);$i++) {

				  if($estados[$i]==$uf) {

					  echo '<option value="'.$estados[$i].'" selected>'.$estados[$i].'</option>';

				  } else {

					  echo '<option value="'.$estados[$i].'">'.$estados[$i].'</option>';

				  }

			  }

			  ?>

              </select></td>

          </tr>

          <tr>

            <td>Necessita de atendimento especial?</td>

            <td colspan="3"><select name="deficiencia" id="deficiencia">

            <?

			if($result['deficiencia']=='sim') {

				echo '<option value="sim" selected>Sim</option>

				<option value="nao">N&atilde;o</option>';

			} else {

				echo '<option value="sim">Sim</option>

				<option value="nao" selected>N&atilde;o</option>';				

			}

			?>

            </select>

              Se a resposta for sim, especificar:

              <input name="qualDeficiencia" onkeypress="maiusculo(this);" type="text" id="qualDeficiencia" value="<?=$result['deficiencia'];?>"></td>

          </tr>

          <tr>

            <td>Situa&ccedil;&atilde;o:</td>

            <td colspan="3">

            <?

            	if($result['situacao']=='confirmado') {

					echo '<input type="radio" name="situacao" value="confirmado" checked="checked" />Pagamento Confirmado | <input type="radio" name="situacao" value="aguardando" />Aguardando Pagamento';

				} else {

					echo '<input type="radio" name="situacao" value="confirmado"/>Pagamento Confirmado | <input type="radio" name="situacao" value="aguardando" checked="checked" />Aguardando Pagamento';

				}

			?>

            </td>

          </tr>

          <tr>

            <td><input name="idCandidato" type="hidden" value="<?=$result['id'];?>"><input name="codConcurso" type="hidden" value="<?=$idConcurso;?>"></td>

            <td colspan="3"><input name="enviar" type="submit" id="enviar" value="enviar"> <input type="button" name="excluir" value="excluir" onclick="excluirCandidato();" /></td>

          </tr>

        </table>   

        </form>     

        <?

			}

	

		} elseif (isset($_REQUEST['lista'])) {

		?>

		<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1">

		  <?

		  $sql = mysql_query("SELECT * FROM $table WHERE idConcurso='$idConcurso' AND situacao='confirmado' ORDER BY nivel, cargo, nome ");

		  $listaCSV = '';

		  $listaXLS = '<table>';

		  while ($result = mysql_fetch_array($sql)) {

				$listaXLS .= '<tr>';

			  for($i=0;$i<=22;$i++) {



				  $listaCSV .= $result[$i].";";
				  if($i==13) {
					  $listaXLS .= '<td>'.date('d/m/Y',$result[$i]).'</td>';
				  } else {
					  $listaXLS .= '<td>'.$result[$i].'</td>';
				  }



			  }

			  $listaXLS .= '</tr>';



			  $listaCSV .= "\n";



		?>

		  <tr>

			<td>N�vel</td>

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

		  <?

			  }

			$listaXLS .= '</table>';

		  ?>

</table>

		<?

			if($fp = fopen('../imagens/documentos/'.$idConcurso.'/lista.xls','w+') and $fpCSV = fopen('../imagens/documentos/'.$idConcurso.'/lista.csv','w+')) {

				fwrite($fp,$listaXLS);

				fwrite($fpCSV,$listaCSV);

				fclose($fp);

				fclose($fpCSV);

			} else {

				echo 'erro ao criar lista';

			}

			echo '<a href="../imagens/documentos/'.$idConcurso.'/lista.xls" target="_blank">Arquivo Excel</a> | ';

			echo '<a href="../imagens/documentos/'.$idConcurso.'/lista.csv" target="_blank">Arquivo CSV</a>';

		} elseif(isset($_REQUEST['listaLetra'])) {

			

		?>







<table width="100%" align="center">

  <tr>

    <td align="center"><a href="mod_admin_conteudo.php?<? echo "table=$table&idConcurso=$idConcurso"; ?>">atualizar</a> </td>

    <td align="center"><a href="mod_admin_conteudo.php?<? echo "table=$table&idConcurso=$idConcurso&lista=yes"; ?>">mostrar lista de confirmados</a></td>

  </tr></table>  

<table border="0" align="center" cellpadding="0" cellspacing="3">

        <tr bgcolor="#CCCCCC">

          <td id="col0">excluir</td>

          <td id="col0">id</td>

          <td id="col1">idConcurso</td>

          <td id="col2">nivel</td>

          <td id="col3">cargo</td>

          <td id="col4">nInscricao</td>

          <td id="col5">nome</td>

          <td id="col6">email</td>

          <td id="col7">pai</td>

          <td id="col8">mae</td>

          <td id="col9">nacionalidade</td>

          <td id="col10">naturalidade</td>

          <td id="col11">cpf</td>

          <td id="col12">rg</td>

          <td id="col13">dataDeNascimento</td>

          <td id="col14">estadoCivil</td>

          <td id="col15">sexo</td>

          <td id="col16">endereco</td>

          <td id="col17">telefone</td>

          <td id="col18">celular</td>

          <td id="col19">local</td>

          <td id="col20">deficiencia</td>

          <td id="col21">numeroDoDocumento</td>

          <td id="col22">situacao</td>

        </tr>

  <?

  $sql = mysql_query("SELECT * FROM $table WHERE idConcurso='$idConcurso' AND nome LIKE '$_REQUEST[listaLetra]%' ORDER BY nome ");

  while ($result = mysql_fetch_array($sql)) {

	  echo '<tr>';

	  for($i=0;$i<24;$i++) {

	  	echo '<td><a href="mod_admin_conteudo.php?table='.$table.'&idConcurso='.$idConcurso.'&candidato='.$result['id'].'" target="_self">'.$result[$i].'</a></td>';

	  }

		echo '</tr>';

  }

		} else {

			$alfabeto = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','X','Y','W','Z');

			for($i=0;$i<sizeof($alfabeto);$i++) {

				echo '<a href="mod_admin_conteudo.php?table='.$table.'&idConcurso='.$idConcurso.'&listaLetra='.$alfabeto[$i].'"> '.$alfabeto[$i].' </a> |';

			}

			echo '<table cellpadding="3" cellspacing="3" border="0" width="100%">';

			$sql = mysql_query("SELECT cargo, count(cargo) FROM inscricoes WHERE idConcurso='$idConcurso' GROUP BY cargo");

			while($result = mysql_fetch_array($sql)) {
				echo '<tr id="cargoTR">';
				echo '<td>'.$result[0].'</td><td>'.$result[1].'</td>';
				echo '</tr>';
			}
			echo '</table>';

			$sql1 = mysql_query("SELECT * FROM inscricoes WHERE idConcurso='$idConcurso'");
			$listaCSV = '';
			$listaXLS = '<table>';
			while($result1 = mysql_fetch_array($sql1)) {

				$listaXLS .= '<tr>';
				for($i=0;$i<=22;$i++) {
					$listaCSV .= $result1[$i].";";
					if($i==13) {
						$listaXLS .= '<td>'.date('d/m/Y',$result1[$i]).'</td>';
					} else {
						$listaXLS .= '<td>'.$result1[$i].'</td>';
					}
				}
				$listaXLS .= '</tr>';
				$listaCSV .= "\n";

			}
			$listaXLS .= '</table>';

			if($fp = fopen('../imagens/documentos/'.$idConcurso.'/listaCompleta.xls','w+') and $fpCSV = fopen('../imagens/documentos/'.$idConcurso.'/listaCompleta.csv','w+')) {
				fwrite($fp,$listaXLS);
				fwrite($fpCSV,$listaCSV);
				fclose($fp);
				fclose($fpCSV);
			} else {
				echo 'erro ao criar lista';
			}
			echo '<a href="../imagens/documentos/'.$idConcurso.'/listaCompleta.xls" target="_blank">Arquivo Excel</a> | ';
			echo '<a href="../imagens/documentos/'.$idConcurso.'/listaCompleta.csv" target="_blank">Arquivo CSV</a>';
			

		}



?>



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