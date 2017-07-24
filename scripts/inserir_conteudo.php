<?php

include "fckeditor/fckeditor.php";

session_start();



if ($_SESSION['login'] == 'logado') { 



	



if (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'cadastrar')) {



	if ($_POST['table'] == 'menu') {



	



		include "conexao.php";



		$table = $_POST['table'];



		$titulo = $_POST['titulo'];



		$ordem = $_POST['ordem'];		



		$status = $_POST['status'];



		$estilo = $_POST['estilo'];



		$fonte = $_POST['fonte'];

		

		$categoria = strtolower(trim($_POST['categoria']));



		$link = $_POST['link'];				







		$sql = mysql_query("INSERT INTO $table(id, titulo, ordem, status, estilo, fonte, categoria, link) VALUES (NULL, '$titulo', '$ordem', '$status', '$estilo', '$fonte', '$categoria', '$link')");



		if (! $sql) {



		die ("error". mysql_error());



		} else {



		header("location: mod_admin_conteudo.php?table=$table");



		}







	} elseif ($_POST['table'] == 'noticias') {







		include "conexao.php";



		$table = $_POST['table'];



		$titulo = $_POST['titulo'];



		$chamada = $_POST['chamada'];		



		$noticia = $_POST['richEdit0'];



		$link = $_POST['link'];

		if ($link == 'sim') {

			$idConcurso = $_POST['concurso'];

			$imagem = $_POST['iconelink'];

			//$noticia .= '<br><br><a href="index.php?downloads=yes&files=andamento&idConcurso='.$concurso.'"><img src="imagens/'.$iconelink.'.gif" border="0"></a>';

		}



		$data = $_POST['data'];



		$hora = $_POST['hora'];		



		$destaque = $_POST['destaque'];				







		$sql = mysql_query("INSERT INTO $table(id, titulo, chamada, noticia, data, hora, destaque, imagem, link, idConcurso) VALUES (NULL, '$titulo', '$chamada', '$noticia', '$data', '$hora', '$destaque', '$imagem', '$link', '$idConcurso')");



		if (! $sql) {



		die ("error". mysql_error());



		} else {

			//MODULO PARA O UPLOAD DE IMAGENS (DESATIVADO)

			//$idsql = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";



			//$sqlnum = mysql_query($idsql);



				//if ($selid = mysql_fetch_array($sqlnum)) {



				//$id = $selid['id'];



				//}



			//echo "$id<br>";



			//echo "<center><br>";



			//echo "Noticia enviada com sucesso<br>";



			//echo "Deseja adicionar foto nesta noticia?<br><a href=upload.php?acao=$table&table=$table&idnoticia=$id>Clique aqui para realizar o upload da imagem</a><br>";



			//echo "<br><br>Obs: Favor usar imagens no formato JPEG(*.jpg) ou GIF(*.gif)";



			//echo "</center>";

			

		header("location: mod_admin_conteudo.php?table=$_POST[table]");



		}



	



	} elseif ($_POST['table'] == 'concursos') {

	include "conexao.php";
	$table = $_POST['table'];		
	$contratante = $_POST['contratante'];
	$contato = $_POST['contato'];
	$telefone = $_POST['telefone'];		
		$fax = $_POST['fax'];
		$email = $_POST['email'];
		$meses = array('January','February','March','April','May','June','July','August','September','October','November','December');
		$formata_inicio = explode('/',$_POST['inicio']);
		$inicio = $formata_inicio[0].' '.$meses[$formata_inicio[1]-1].' '.$formata_inicio[2].' '.$_POST['hora_inicio_concurso'];
		$formata_termino = explode('/',$_POST['termino1']);
		$termino1 = $formata_termino[0].' '.$meses[$formata_termino[1]-1].' '.$formata_termino[2];
		$situacao = $_POST['situacao'];
		$observacoes = $_POST['observacoes'];
		$tipo_inscricoes = $_POST['tipo_inscricoes'];
		$cedente = $_POST['cedente'];
		$agencia = $_POST['agencia'];
		$conta = $_POST['conta'];
		$convenio = $_POST['convenio'];
		$contrato = $_POST['contrato'];
		$cnpj = $_POST['cnpj'];
		$endereco = $_POST['endereco'];
		$local = $_POST['cidade'].'/'.$_POST['uf'];
		$instrucao = $_POST['instrucao'];
		$inscricoes = $_POST['inscricoes'];

		$sql = mysql_query("INSERT INTO $table(id, contratante, contato, telefone, fax, email, inicio, termino, situacao, inscricoes, tipo_inscricoes, observacoes, cedente, agencia, conta, convenio, contrato, cnpj, endereco, local, instrucao) VALUES (NULL, '$contratante', '$contato', '$telefone', '$fax', '$email', '$inicio', '$termino1', '$situacao', '$inscricoes', '$tipo_inscricoes', '$observacoes', '$cedente', '$agencia', '$conta', '$convenio', '$contrato', '$cnpj', '$endereco', '$local', '$instrucao')");
		if (! $sql) {
			die ("error". mysql_error());
		} else {
			$idsql = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
			$sqlnum = mysql_query($idsql);
				if ($selid = mysql_fetch_array($sqlnum)) {
					$id = $selid['id'];
					if (mkdir("../imagens/documentos/$id", 0773)) {
						chmod("../imagens/documentos/$id", 0773);			
					}
				}

		//Formulario



			$nivel1 = $_POST['nivel1'];



			$nivel2 = $_POST['nivel2'];



			$nivel3 = $_POST['nivel3'];



			$nivel4 = $_POST['nivel4'];



			$valor1 = $_POST['valor1'];



			$valor2 = $_POST['valor2'];



			$valor3 = $_POST['valor3'];



			$valor4 = $_POST['valor4'];



			$cargos1 = $_POST['cargos1'];



			$cargos2 = $_POST['cargos2'];



			$cargos3 = $_POST['cargos3'];



			$cargos4 = $_POST['cargos4'];



			$formata_inicio = explode('/',$_POST['data_inicio']);

			$inicio = $formata_inicio[0].' '.$meses[$formata_inicio[1]-1].' '.$formata_inicio[2].' '.$_POST['hora_inicio'];

			

			$formata_termino = explode('/',$_POST['data_termino']);

			$termino = $formata_termino[0].' '.$meses[$formata_termino[1]-1].' '.$formata_termino[2].' '.$_POST['hora_termino'];



			



			$formSql = mysql_query("INSERT INTO formulario(id, idConcurso, nivel1, nivel2, nivel3, nivel4, valor1, valor2, valor3, valor4, cargos1, cargos2, cargos3, cargos4, termino, inicio) VALUES (NULL, '$id', '$nivel1', '$nivel2', '$nivel3', '$nivel4', '$valor1', '$valor2', '$valor3', '$valor4', '$cargos1', '$cargos2', '$cargos3', '$cargos4', '$termino', '$inicio' )");



				if (! $formSql) {



				die ("error". mysql_error());



				echo '<center>Erro ao tentar preencher o formulário<br>Entre em contato com o administrador <a href="mailto:yuri_designer@msn.com">yuri_designer@msn.com</a> para evitar transtornos.</center>';				



				} else {



				echo "<center>Formulário de Inscrição criado com sucesso</center><br>";



				}



				



			//echo "$id<br>";



			echo "<center><br>";



			echo "Concurso adicionado com sucesso<br><br>";



			echo "<br><br>Obs: Favor postar documentos no formato Word(*.doc) ou Excel(*.xls) ou PDF(*.pdf)";			



			echo "Deseja adicionar documentos neste concurso?<br><a href=upload.php?acao=$table&table=$table&id=$id>Sim</a> | <a href=mod_admin_conteudo.php?table=$table>Não</a><br>";



			echo "</center>";



		}



	} elseif ($_POST['table'] == 'usuarios') {







		include "conexao.php";



		$table = $_POST['table'];		



		$usuario = $_POST['usuario'];		



		$senha = $_POST['senha'];



		$autorizacao = $_POST['autorizacao'];



		$nome = $_POST['nome'];		



		$email = $_POST['email'];







		$sql = mysql_query("INSERT INTO $table(id, usuario, senha, autorizacao, nome, email) VALUES (NULL, '$usuario', '$senha', '$autorizacao', '$nome', '$email')");



		if (! $sql) {



		die ("error". mysql_error());



		} else {



		header("location: mod_admin_conteudo.php?table=$table");



		}	



	} elseif ($_POST['table'] == 'conteudos') {







		include "conexao.php";



		$table = $_POST['table'];		



		$titulo = $_POST['titulo'];		



		$operador = $_POST['operador'];



		$texto = $_POST['richEdit0'];



		$observacoes = $_POST['observacoes'];		







		$sql = mysql_query("INSERT INTO $table(id, titulo, texto, operador, observacoes) VALUES (NULL, '$titulo', '$texto', '$operador', '$observacoes')");



		if (! $sql) {



		die ("error". mysql_error());



		} else {



		header("location: mod_admin_conteudo.php?table=$table");



		}



	}	



} elseif (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'entrar')) {



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



<!--<meta http-equiv="Refresh" content="10">-->



<?php 



		if (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'menu')) {



		$table = $_REQUEST['table']; 



?>



<table width="100%" border="0" cellspacing="5" cellpadding="5">



  <tr> 



    <td width="50%" align="center" valign="top"> 



	<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?acao=cadastrar">



        <p align="justify"> Titulo: 



          <input type="text" size="25" name="titulo">



          <br>



          Ordem: 



          <input type="text" size="8" name="ordem">



          <br>



          Status: 



          <select name="status" id="status">



            <option value="publico" selected>P&uacute;blico</option>



            <option value="oculto">Oculto</option>



          </select>



          <br>



          Estilo: 



          <select name="estilo" id="estilo">



            <option value="normal" selected>Normal</option>



            <option value="topico">T&oacute;pico</option>



          </select>



          <br>



          Fonte de Dados: 



          <select name="fonte" id="fonte">



            <option value="conteudos" selected>Fonte de Conteudos</option>

            <option value="documentosseguros">Fonte de Documentos Protegidos</option>

            <option value="documentos">Fonte de Documentos Publicos</option>			

            <option value="contatos">Fonte de Contatos</option>

            <option value="concursos">Fonte de Concursos / Editais</option>			



          </select>		  



          <br>

		  <br>

		  Se Fonte de Dados for Concursos / Editais<br>

		  nomeie uma categoria:<br>

		  <input type="text" name="categoria"><br>

		  <br>

		  <br>



          Link: 



          <select name="link" id="link">



            <option value="sim">Sim</option>



            <option value="nao" selected>N&atilde;o</option>



          </select>



          <br>		  



          <input type="hidden" name="table" value="<? echo $table; ?>">



          <input type="submit" name="enviar" value="enviar">



      </form>



	  </p>



	  </td>



  </tr>



</table>



<?php	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'noticias')) { 



			$table = $_REQUEST['table'];



?>



<script language="JavaScript" src="fckeditor/fckeditor.js"></script>



 <form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?acao=cadastrar" onSubmit="rtoStore()">



  <table width="100%" border="0" cellspacing="5" cellpadding="5">



    <tr> 



      <td width="20%" align="center" valign="top">Titulo: </td>



      <td width="80%" align="left" valign="top"> 



        <input name="titulo" type="text" id="titulo" size="25"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Not&iacute;cia:</td>



      <td align="left" valign="top">

	  <?

	  $editor = new FCKeditor("richEdit0");

	  $editor->BasePath = "fckeditor/";

	  $editor->Value =  '';

	  $editor->Width = "90%";

	  $editor->Height = "500";

	  $editor->Create();	  

	  ?>

	  </td>



    </tr>



    <tr>

      <td align="center" valign="top">Deseja inserir Link? </td>

      <td align="left" valign="top">

	  <input name="link" type="checkbox" id="link" value="sim">

	  Sim

	  <br>

	  <br>	  <select name="concurso" id="concurso">

	    <option>---</option>

		<?

		include "conexao.php";

		

		$sql = mysql_query("SELECT * FROM concursos ORDER BY situacao");

		while($result=mysql_fetch_array($sql)){

			echo '<option value="'.$result['id'].'">'.strtoupper($result['contratante']).' - '.$result['situacao'].'</option>';

		}

		?>

      </select>	  </td>

    </tr>

    <tr>

      <td align="center" valign="top">Icone do Link:</td>

      <td align="left" valign="top"><input name="iconelink" type="radio" value="leiamaisblack">

      <img src="../imagens/leiamaisblack.gif" width="87" height="30"> <input name="iconelink" type="radio" value="leiamaisgray"> <img src="../imagens/leiamaisgray.gif" width="88" height="30"><br>

      <input name="iconelink" type="radio" value="inscricoesblack"> 

      <img src="../imagens/inscricoesblack.gif" width="87" height="30"> <input name="iconelink" type="radio" value="inscricoesgray"> <img src="../imagens/inscricoesgray.gif" width="87" height="30"><br>

      <input name="iconelink" type="radio" value="editalblack"> 

      <img src="../imagens/editalblack.gif" width="87" height="30"> <input name="iconelink" type="radio" value="editalgray"> <img src="../imagens/editalgray.gif" width="87" height="30"></td>

    </tr>

    <tr> 



      <td align="center" valign="top">Data:</td>



      <td align="left" valign="top">



<input name="data" type="text" id="data" value="<? $data = date("d/m/Y"); echo $data; ?>"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Hora:</td>



      <td align="left" valign="top">



<input name="hora" type="text" id="hora" value="<? $hora = date("H:i"); echo $hora; ?>"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Destaque: </td>



      <td align="left" valign="top">



<select name="destaque" id="destaque">



          <option value="sim">Sim</option>



          <option value="nao">N&atilde;o</option>



        </select></td>



    </tr>



    <tr>



      <td align="center" valign="top">&nbsp;</td>



      <td align="left" valign="top">



<input type="hidden" name="table" value="<? echo $table; ?>"> 



        <input type="submit" name="enviar2" value="enviar">

        <input name="chamada" type="hidden" id="chamada" value="<? date("d/m/Y"); ?>"></td>



    </tr>



  </table>



</form>



<?php	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'concursos')) { 



			$table = $_REQUEST['table'];



?>



 <form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?acao=cadastrar">



  <table width="100%" border="0" cellspacing="5" cellpadding="5">



    <tr> 



      <td width="20%" align="center" valign="top">Contratante</td>



      <td width="80%" align="left" valign="top"><input name="contratante" type="text" id="contratante" value="Prefeitura Municipal de"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Contato:</td>



      <td align="left" valign="top"><input name="contato" type="text" id="contato"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Telefone:</td>



      <td align="left" valign="top"><input name="telefone" type="text" id="telefone"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Fax:</td>



      <td align="left" valign="top"><input name="fax" type="text" id="fax"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Email:</td>



      <td align="left" valign="top"><input name="email" type="text" id="email"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Data de In&iacute;cio do Concurso:</td>



      <td align="left" valign="top"><input name="inicio" type="text" id="inicio" value="<?= date("d/m/Y"); ?>" size="15"> 

        dd/mm/aaaa 

        <input name="hora_inicio_concurso" type="text" id="hora_inicio_concurso" value="<?=date("H:i:s");?>" size="8" /> 

        h:m:s</td>



    </tr>



    <tr> 



      <td align="center" valign="top">Data da Prova:</td>



      <td align="left" valign="top"><input name="termino1" type="text" id="termino1" value="<? $termino = date("d/m/Y", time() + (45 * 86400)); echo $termino; ?>"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Situa&ccedil;&atilde;o:</td>



      <td align="left" valign="top"><select name="situacao" id="situacao">

	  <?

	  	include 'conexao.php';

			$sqlMenu = mysql_query("SELECT * FROM menu WHERE fonte='concursos'");

			$categoria = '';

			while ($resultMenu = mysql_fetch_array($sqlMenu)) {

				$categoria .= '<option value="'.$resultMenu['categoria'].'">'.strtoupper($resultMenu['categoria']).'</option>';

			}

	  		echo $categoria;

	  ?>

        </select></td>



    </tr>



    <tr> 



      <td colspan="2" align="center" valign="top">Dados banc&aacute;rios para 



        pagamento de inscri&ccedil;&otilde;es</td>



    </tr>

    <tr> 



      <td align="center" valign="top">&nbsp;</td>



      <td align="left" valign="top"> 
		<select name="tipo_inscricoes">
			<option value="boleto" selected="selected">Boleto</option>
			<option value="deposito">Deposito</option>
		</select>

       </td>



    </tr>

    <tr>
      <td align="center" valign="top">Banco</td>
      <td align="left" valign="top"><input name="observacoes" type="text" id="observacoes" /></td>
    </tr>
    <tr> 



      <td align="center" valign="top">Cedente</td>



      <td align="left" valign="top"><input name="cedente" type="text" id="cedente"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Ag&ecirc;ncia</td>



      <td align="left" valign="top"><input name="agencia" type="text" id="agencia">



        Sem o d&iacute;gito</td>



    </tr>



    <tr> 



      <td align="center" valign="top">Conta Corrente</td>



      <td align="left" valign="top"><input name="conta" type="text" id="conta">



        Sem o d&iacute;gito</td>



    </tr>



    <tr> 



      <td align="center" valign="top">Conv&ecirc;nio</td>



      <td align="left" valign="top"><input name="convenio" type="text" id="convenio">



        Verifcar o conv&ecirc;nio no Gerenciador Financeiro BB</td>



    </tr>



    <tr> 



      <td align="center" valign="top">Contrato:</td>



      <td align="left" valign="top"><input name="contrato" type="text" id="contrato">



        Verifcar o conv&ecirc;nio no Gerenciador Financeiro BB</td>



    </tr>



    <tr> 



      <td align="center" valign="top">Instru&ccedil;&atilde;o</td>



      <td align="left" valign="top"><input name="instrucao" type="text" id="instrucao">



        Instru&ccedil;&atilde;o relativa ao boleto, geralmente multas, descontos, 



        etc. </td>



    </tr>



    <tr> 



      <td align="center" valign="top">CNPJ:</td>



      <td align="left" valign="top"><input name="cnpj" type="text" id="cnpj">



        Ex: 000.000.000/0001-00</td>



    </tr>



    <tr> 



      <td align="center" valign="top">Endere&ccedil;o:</td>



      <td align="left" valign="top"><input name="endereco" type="text" id="endereco" size="80%"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Cidade:</td>



      <td align="left" valign="top"><input name="cidade" type="text" id="cidade">



        UF: 



        <input name="uf" type="text" id="uf" size="4"> </td>



    </tr>



    <tr> 



      <td colspan="2" align="center" valign="top">Dados da Ficha de Inscri&ccedil;&atilde;o</td>



    </tr>



    <tr>
      <td align="center" valign="top">Inscri&ccedil;&otilde;es?</td>
      <td align="left" valign="top"><input type="radio" name="inscricoes" id="inscricoes" value="S" /> Sim | <input type="radio" name="inscricoes" id="inscricoes" value="N" /> N&atilde;o</td>
    </tr>
    <tr> 



      <td align="center" valign="top">N&iacute;vel Fundamental Incompleto:</td>



      <td align="left" valign="top"><select name="nivel1" id="nivel1">



          <option value="sim">Sim</option>



          <option value="nao" selected>N&atilde;o</option>



        </select>



        Valor da Inscri&ccedil;&atilde;o : R$ 



        <input name="valor1" type="text" id="valor1"> </td>



    </tr>



    <tr> 



      <td align="center" valign="top">Cargos a N&iacute;vel Fundamental Incompleto</td>



      <td align="left" valign="top"><textarea name="cargos1" rows="5" id="cargos1"></textarea>



        Separe os cargos com v&iacute;rgula (,)</td>



    </tr>	



    <tr> 



      <td align="center" valign="top">N&iacute;vel Fundamental Completo</td>



      <td align="left" valign="top"><select name="nivel2" id="nivel2">



          <option value="sim">Sim</option>



          <option value="nao" selected>N&atilde;o</option>



        </select>



        Valor da Inscri&ccedil;&atilde;o : R$ 



        <input name="valor2" type="text" id="valor2"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Cargos a N&iacute;vel Fundamental</td>



      <td align="left" valign="top"><textarea name="cargos2" rows="5" id="cargos2"></textarea>



        Separe os cargos com v&iacute;rgula (,)</td>



    </tr>	



    <tr> 



      <td align="center" valign="top">N&iacute;vel M&eacute;dio</td>



      <td align="left" valign="top"><select name="nivel3" id="nivel3">



          <option value="sim">Sim</option>



          <option value="nao" selected>N&atilde;o</option>



        </select>



        Valor da Inscri&ccedil;&atilde;o : R$ 



        <input name="valor3" type="text" id="valor3"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Cargos a N&iacute;vel M&eacute;dio</td>



      <td align="left" valign="top"><textarea name="cargos3" rows="5" id="cargos3"></textarea>



        Separe os cargos com v&iacute;rgula (,)</td>



    </tr>	



    <tr> 



      <td align="center" valign="top">N&iacute;vel Superior</td>



      <td align="left" valign="top"><select name="nivel4" id="nivel4">



          <option value="sim">Sim</option>



          <option value="nao" selected>N&atilde;o</option>



        </select>



        Valor da Inscri&ccedil;&atilde;o : R$ 



        <input name="valor4" type="text" id="valor4"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Cargos a N&iacute;vel Superior</td>



      <td align="left" valign="top"><textarea name="cargos4" rows="5" id="cargos4"></textarea>



        Separe os cargos com v&iacute;rgula (,)</td>



    </tr>



    <tr>



      <td align="center" valign="top">In&iacute;cio das Inscri&ccedil;&otilde;es:</td>



      <td align="left" valign="top">



	  <input name="data_inicio" type="text" id="data_inicio" size="15" value="<?=date('d/m/Y');?>">



        dd/mm/aaaa 

        <input name="hora_inicio" type="text" id="hora_inicio" size="10" value="<?=date('H:i');?>" />

        h:m:s</td>



    </tr>



    <tr>

      <td align="center" valign="top">T&eacute;rmino das Inscri&ccedil;&otilde;es:</td>

      <td align="left" valign="top"><input name="data_termino" type="text" id="data_termino" size="15" />

        dd/mm/aaaa 

          <input name="hora_termino" type="text" id="hora_termino" size="10" /> 

        h:m:s</td>

    </tr>

    <tr> 



      <td align="center" valign="top">&nbsp;</td>



      <td align="left" valign="top"><input type="hidden" name="table" value="<? echo $table; ?>"> 



        <input type="submit" name="enviar2" value="enviar"></td>



    </tr>



  </table>



</form>



<? 



		} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'usuarios')) { 



			$table = $_REQUEST['table'];



?>



<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?acao=cadastrar">



<table width="100%" border="0" cellspacing="5" cellpadding="5">



  <tr> 



    <td width="20%" align="center" valign="top">Usuario:</td>



    <td width="80%" align="left" valign="top"><input name="usuario" type="text" id="usuario"></td>



  </tr>



  <tr> 



    <td align="center" valign="top">Senha:</td>



    <td align="left" valign="top"><input name="senha" type="text" id="senha"></td>



  </tr>



  <tr> 



    <td align="center" valign="top">Nome:</td>



    <td align="left" valign="top"><input name="nome" type="text" id="nome"></td>



  </tr>



  <tr> 



    <td align="center" valign="top">Email:</td>



    <td align="left" valign="top"><input name="email" type="text" id="email"></td>



  </tr>



  <tr> 



    <td align="center" valign="top">&nbsp;</td>



    <td align="left" valign="top"><input name="autorizacao" type="hidden" id="autorizacao" value="cliente">



      <input type="hidden" name="table" value="<? echo $table; ?>"> 



      <input type="submit" name="enviar2" value="enviar"></td>



  </tr>



</table>



</form>



<?php	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'conteudos')) { 



			$table = $_REQUEST['table'];



?>



 <form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?acao=cadastrar" onSubmit="rtoStore()">



  <table width="100%" border="0" cellspacing="5" cellpadding="5">



    <tr> 



      <td width="20%" align="center" valign="top">T&iacute;tulo:</td>



      <td width="80%" align="left" valign="top"><input name="titulo" type="text" id="titulo"></td>



    </tr>



    <tr> 



      <td align="center" valign="top">Local</td>



      <td align="left" valign="top"> 



        <select name="operador" id="operador">



        <? 



	  	include "conexao.php";



		$sql = mysql_query("SELECT * FROM menu WHERE link='sim' AND fonte='conteudos' ORDER BY id DESC");



		while ($result = mysql_fetch_array($sql)) {



		echo '<option value="'.$result['titulo'].'">'.$result['titulo'].'</option>';



		}



		?>



        </select> </td>



    </tr>



    <tr> 



      <td align="center" valign="top">Texto:</td>



      <td align="left" valign="top">



	  <?

	  $editor = new FCKeditor("richEdit0");

	  $editor->BasePath = "fckeditor/";

	  $editor->Value =  '';

	  $editor->Width = "90%";

	  $editor->Height = "500";

	  $editor->Create();	  

	  ?>





	  </td>



    </tr>



    <tr> 



      <td align="center" valign="top">Observa&ccedil;&otilde;es:</td>



      <td align="left" valign="top"><textarea name="observacoes" cols="50%" rows="5" id="observacoes"></textarea></td>



    </tr>



    <tr> 



      <td align="center" valign="top">&nbsp;</td>



      <td align="left" valign="top"><input type="hidden" name="table" value="<? echo $table; ?>"> 



        <input type="submit" name="enviar2" value="enviar"></td>



    </tr>



  </table>



</form>



<?			



		}



}



} else {



	echo "Erro de página";



} 



?>