<?php
include "fckeditor/fckeditor.php";
session_start();
if ($_SESSION['login'] == 'logado') { 
	
	if (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'atualizar')) {
		if ($_POST['table'] == 'menu') {
		include "conexao.php";
		$id = $_POST['id'];
		$table = $_POST['table'];
		$titulo = $_POST['titulo'];
		$ordem = $_POST['ordem'];		
		$status = $_POST['status'];
		$estilo = $_POST['estilo'];
		$fonte = $_POST['fonte'];		
		$link = $_POST['link'];				
		$sql = mysql_query("UPDATE $table SET titulo='$titulo', ordem='$ordem', status='$status', estilo='$estilo', fonte='$fonte', link='$link' WHERE id='$id'");
		if (! $sql) {
		die ("error". mysql_error());
		} else {
		header("location: mod_admin_conteudo.php?table=$table");
		}
		
		} elseif ($_POST['table'] == 'inscricoes') {
		include "conexao.php";
		$id = $_POST['id'];
		$table = $_POST['table'];
		$idConcurso = $_POST['idConcurso'];
		$situacao = $_POST['situacao'];
		
		$sql = mysql_query("UPDATE $table SET situacao='$situacao' WHERE id='$id'");
		if (! $sql) {
		die ("error". mysql_error());
		} else {
		header("location: mod_admin_conteudo.php?table=$table&idConcurso=$idConcurso");
		}		
		
		} elseif ($_POST['table'] == 'concursos') {
			include "conexao.php";
			$table = $_POST['table'];
			$id = $_POST['id'];		
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
			$sql = mysql_query("UPDATE $table SET contratante='$contratante', contato='$contato', telefone='$telefone', fax='$fax', email='$email', inicio='$inicio', termino='$termino1', situacao='$situacao', inscricoes='$inscricoes', tipo_inscricoes='$tipo_inscricoes', observacoes='$observacoes', cedente='$cedente', agencia='$agencia', conta='$conta', convenio='$convenio', contrato='$contrato', instrucao='$instrucao', cnpj='$cnpj', endereco='$endereco', local='$local' WHERE id='$id' ");
			if (! $sql) {
				die ("error". mysql_error());
			} else {
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
			$meses = array('January','February','March','April','May','June','July','August','September','October','November','December');
			$formata_inicio = explode('/',$_POST['data_inicio']);
			$inicio = $formata_inicio[0].' '.$meses[$formata_inicio[1]-1].' '.$formata_inicio[2].' '.$_POST['hora_inicio'];
			
			$formata_termino = explode('/',$_POST['data_termino']);
			$termino = $formata_termino[0].' '.$meses[$formata_termino[1]-1].' '.$formata_termino[2].' '.$_POST['hora_termino'];
			
			$formSql = mysql_query("UPDATE formulario SET nivel1='$nivel1', nivel2='$nivel2', nivel3='$nivel3', nivel4='$nivel4', valor1='$valor1', valor2='$valor2', valor3='$valor3', valor4='$valor4', cargos1='$cargos1', cargos2='$cargos2', cargos3='$cargos3', cargos4='$cargos4', termino='$termino', inicio='$inicio'  WHERE idConcurso='$id'");
				if (! $formSql) {
				die ("error". mysql_error());
				echo '<center>Erro ao tentar preencher o formulário<br>Entre em contato com o administrador <a href="mailto:yuri_designer@msn.com">yuri_designer@msn.com</a> para evitar transtornos.</center>';				
				} else {
				echo "<center>Formulário de Inscrição atualizado com sucesso</center><br>";
				}
			
			
			echo $termino.'<br>';
			echo $inicio.'<br>';
			echo "$id<br>";
			echo "<center><br>";
			echo "Concurso atualizado com sucesso<br>";
			echo "<br><br>Obs: Favor postar documentos no formato Word(*.doc) ou Excel(*.xls) ou PDF(*.pdf)";
			echo "Deseja adicionar documentos neste concurso?<br><a href=upload.php?acao=$table&table=$table&id=$id>Sim</a> | <a href=mod_admin_conteudo.php?table=$table>Não</a><br>";
			echo "</center>";
			}
		} elseif ($_POST['table'] == 'noticias') {
		include "conexao.php";
		$id = $_POST['id'];
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
		$sql = mysql_query("UPDATE $table SET titulo='$titulo', chamada='$chamada', noticia='$noticia', data='$data', hora='$hora', destaque='$destaque', imagem='$imagem', link='$link', idConcurso='$idConcurso' WHERE id='$id' ");
		if (! $sql) {
		die ("error". mysql_error());
		} else {
		header("location: mod_admin_conteudo.php?table=$_POST[table]");
		}
		} elseif ($_POST['table'] == 'conteudos') {
		include "conexao.php";
		$id = $_POST['id'];
		$table = $_POST['table'];
		$titulo = $_POST['titulo'];
		$texto = $_POST['richEdit0'];		
		$operador = $_POST['operador'];
		$observacoes = $_POST['observacoes'];
		$sql = mysql_query("UPDATE $table SET titulo='$titulo', texto='$texto', operador='$operador', observacoes='$observacoes' WHERE id='$id' ");
		if (! $sql) {
		die ("error". mysql_error());
		} else {
		header("location: mod_admin_conteudo.php?table=$_POST[table]");
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
		$id = $_REQUEST['id'];
		include "conexao.php";
		$sql = mysql_query("SELECT * FROM $table WHERE id='$id' ");
		while ($x = mysql_fetch_array($sql)) {
?>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr> 
    <td width="50%" align="center" valign="top"> 
	<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?acao=atualizar">
        <p align="justify"> Titulo: 
          <input type="text" size="25" name="titulo" value="<? echo $x['titulo']; ?>">
          <br>
          Ordem: 
          <input type="text" size="8" name="ordem" value="<? echo $x['ordem']; ?>">
          <br>
          Status: 
          <select name="status" id="status">
		  <? if ($x['status'] == 'publico') {
		  echo "		  
            <option value=publico selected>Público</option>
            <option value=oculto>Oculto</option>
			";
			} else {
		  echo "		  
            <option value=publico>Público</option>
            <option value=oculto selected>Oculto</option>
			";			
			}
			?>
          </select>
          <br>
          Estilo: 
          <select name="estilo" id="estilo">
		  <? if ($x['estilo'] == 'normal') {
		  echo "		  
            <option value=normal selected>Normal</option>
            <option value=topico>Tópico</option>
			";
			} else {
		  echo "		  
            <option value=normal>Normal</option>
            <option value=topico selected>Tópico</option>
			";			
			}
			?>
	      </select>
          <br>
          Fonte de Dados: 
          <select name="fonte" id="fonte">
		  <? if ($x['fonte'] == 'contatos') {
		  echo '		  
            <option value="conteudos">Fonte de Conteudos</option>
            <option value="documentosseguros">Fonte de Documentos Protegidos</option>
            <option value="documentos">Fonte de Documentos Publicos</option>			
            <option value="contatos" selected>Fonte de Contatos</option>
            <option value="concursos">Fonte de Concursos / Editais</option>			
			';
			} elseif ($x['fonte'] == 'documentosseguros') {
		  echo '		  
            <option value="conteudos">Fonte de Conteudos</option>
            <option value="documentosseguros" selected>Fonte de Documentos Protegidos</option>
            <option value="documentos">Fonte de Documentos Publicos</option>			
            <option value="contatos">Fonte de Contatos</option>
            <option value="concursos">Fonte de Concursos / Editais</option>			
			';			
			} elseif ($x['fonte'] == 'documentos') {
		  echo '		  
            <option value="conteudos">Fonte de Conteudos</option>
            <option value="documentosseguros">Fonte de Documentos Protegidos</option>
            <option value="documentos" selected>Fonte de Documentos Publicos</option>			
            <option value="contatos">Fonte de Contatos</option>
            <option value="concursos">Fonte de Concursos / Editais</option>			
			';			
			} elseif ($x['fonte'] == 'concursos') {
		  echo '		  
            <option value="conteudos">Fonte de Conteudos</option>
            <option value="documentosseguros">Fonte de Documentos Protegidos</option>
            <option value="documentos">Fonte de Documentos Publicos</option>			
            <option value="contatos">Fonte de Contatos</option>
            <option value="concursos" selected>Fonte de Concursos / Editais</option>			
			';			
			} else {
		  echo '		  
            <option value="conteudos" selected>Fonte de Conteudos</option>
            <option value="documentosseguros">Fonte de Documentos Protegidos</option>
            <option value="documentos">Fonte de Documentos Publicos</option>			
            <option value="contatos">Fonte de Contatos</option>
            <option value="concursos">Fonte de Concursos / Editais</option>			
			';			
			}
			?>
	      </select>
          <br>
		  <br>
		  Se Fonte de Dados for Concursos / Editais<br>
		  nomeie uma categoria:<br>
		  <input type="text" name="categoria" value="<? echo $x['categoria']; ?>" disabled><br>
		  <br>
		  <br>
          Link: 
          <select name="link" id="link">
		  <? if ($x['link'] == 'sim') {
		  echo "		  
            <option value=sim selected>Sim</option>
            <option value=nao>Não</option>
			";
			} else {
		  echo "		  
            <option value=sim>Sim</option>
            <option value=nao selected>Não</option>
			";			
			}
			?>
	      </select>
          <br>		  
          <input type="hidden" name="table" value="<? echo $table; ?>">
          <input type="hidden" name="id" value="<? echo $id; ?>">		  
          <input type="submit" name="enviar" value="enviar">
      </form>
	  </p>
    </td>
  </tr>
</table>
<?php	}
		} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'concursos')) {
		$table = $_REQUEST['table']; 
		$id = $_REQUEST['id'];
		include "conexao.php";
		$sql = mysql_query("SELECT * FROM $table WHERE id='$id' ");
		while ($x = mysql_fetch_array($sql)) {
?>
<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?acao=atualizar">
  <table width="100%" border="0" cellspacing="5" cellpadding="5">
    <tr> 
      <td width="50%" align="center" valign="top">Contratante</td>
      <td width="50%" align="left" valign="top">
<input name="contratante" type="text" id="contratante" value="<? echo $x[1]; ?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Contato:</td>
      <td align="left" valign="top">
<input name="contato" type="text" id="contato" value="<? echo $x[2]; ?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Telefone:</td>
      <td align="left" valign="top">
<input name="telefone" type="text" id="telefone" value="<? echo $x[3]; ?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Fax:</td>
      <td align="left" valign="top">
<input name="fax" type="text" id="fax" value="<? echo $x[4]; ?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Email:</td>
      <td align="left" valign="top">
<input name="email" type="text" id="email" value="<? echo $x[5]; ?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Data de In&iacute;cio do Concurso:</td>
      <td align="left" valign="top">
      <? 
	  $formata_data = strtotime($x[6]);
	  $data_inicio = date('d/m/Y',$formata_data);
	  $hora_inicio = date('H:i',$formata_data);
	  ?>
<input name="inicio" type="text" id="inicio" value="<?=$data_inicio;?>" size="15"> 
dd/mm/aaaa 
<input name="hora_inicio_concurso" type="text" id="hora_inicio_concurso" value="<?=$hora_inicio;?>" size="6" /> 
h:m:s</td>
    </tr>
    <tr> 
      <td align="center" valign="top">Data da Prova:</td>
      <td align="left" valign="top">
		<?
		  $formata_data = strtotime($x[7]);
		  $data_prova = date('d/m/Y',$formata_data);
		  $hora_prova = date('H:i',$formata_data);
		?>
	
<input name="termino1" type="text" id="termino1" value="<?=$data_prova; ?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Situa&ccedil;&atilde;o:</td>
      <td align="left" valign="top">
<select name="situacao" id="situacao">
	  <?
	  	include 'conexao.php';
			$sqlMenu = mysql_query("SELECT * FROM menu WHERE fonte='concursos'");
			$categoria = '';
			while ($resultMenu = mysql_fetch_array($sqlMenu)) {
				if ($resultMenu['categoria'] == $x[8]) {
					$categoria .= '<option value="'.$resultMenu['categoria'].'" selected>'.strtoupper($resultMenu['categoria']).'</option>';
				} else {
					$categoria .= '<option value="'.$resultMenu['categoria'].'">'.strtoupper($resultMenu['categoria']).'</option>';
				}
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
		<? if($x['tipo_inscricoes'] == 'boleto') $boleto = 'selected="selected"'; else $deposito = 'selected="selected"'; ?>
		<select>
			<option value="boleto" <?=$boleto;?> >Boleto</option>
			<option value="deposito" <?=$deposito;?> >Deposito</option>
		</select>
       </td>
    </tr>
	
    <tr> 
      <td align="center" valign="top">Banco:</td>
      <td align="left" valign="top"> 
        <input type="text" name="observacoes" id="observacoes" value="<?=$x['observacoes'];?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Cedente</td>
      <td align="left" valign="top"><input name="cedente" type="text" id="cedente" value="<? echo $x['cedente']; ?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Ag&ecirc;ncia</td>
      <td align="left" valign="top"><input name="agencia" type="text" id="agencia" value="<? echo $x['agencia']; ?>">
        Sem o d&iacute;gito</td>
    </tr>
    <tr> 
      <td align="center" valign="top">Conta Corrente</td>
      <td align="left" valign="top"><input name="conta" type="text" id="conta" value="<? echo $x['conta']; ?>">
        Sem o d&iacute;gito</td>
    </tr>
    <tr> 
      <td align="center" valign="top">Conv&ecirc;nio</td>
      <td align="left" valign="top"><input name="convenio" type="text" id="convenio" value="<? echo $x['convenio']; ?>">
        Verifcar o conv&ecirc;nio no Gerenciador Financeiro BB</td>
    </tr>
    <tr> 
      <td align="center" valign="top">Contrato:</td>
      <td align="left" valign="top"><input name="contrato" type="text" id="contrato" value="<? echo $x['contrato']; ?>">
        Verifcar o conv&ecirc;nio no Gerenciador Financeiro BB</td>
    </tr>
    <tr> 
      <td align="center" valign="top">Instru&ccedil;&atilde;o</td>
      <td align="left" valign="top"><input name="instrucao" type="text" id="instrucao" value="<? echo $x['instrucao']; ?>">
        Instru&ccedil;&atilde;o relativa ao boleto, geralmente multas, descontos, 
        etc. </td>
    </tr>
    <tr> 
      <td align="center" valign="top">CNPJ:</td>
      <td align="left" valign="top"><input name="cnpj" type="text" id="cnpj" value="<? echo $x['cnpj']; ?>">
        Ex: 000.000.000/0001-00</td>
    </tr>
    <tr> 
      <td align="center" valign="top">Endere&ccedil;o:</td>
      <td align="left" valign="top"><input name="endereco" type="text" id="endereco" value="<? echo $x['endereco']; ?>" size="80%"></td>
    </tr>
    <tr> 
      <? $local = explode ('/',$x['local']); ?>
      <td align="center" valign="top">Cidade:</td>
      <td align="left" valign="top"><input name="cidade" type="text" id="cidade" value="<? echo $local[0]; ?>">
        UF: 
        <input name="uf" type="text" id="uf" value="<? echo $local[1]; ?>" size="4"> 
      </td>
    </tr>
    <tr> 
      <td colspan="2" align="center" valign="top">Dados da Ficha de Inscri&ccedil;&atilde;o</td>
    </tr>
    <?
	$sqlForm = mysql_query("SELECT * FROM formulario WHERE idConcurso=$x[0]"); 
	while ($resultForm = mysql_fetch_array($sqlForm)) {
	?>
    <tr>
      <td align="center" valign="top">Inscri&ccedil;&otilde;es ?</td>
      <td align="left" valign="top">
      <?
	  	if($x['inscricoes']=='S') {
			echo '<input type="radio" name="inscricoes" id="inscricoes" value="S" checked="checked" /> Sim | <input type="radio" name="inscricoes" id="inscricoes" value="N" /> N&atilde;o';
		} else {
			echo '<input type="radio" name="inscricoes" id="inscricoes" value="S" /> Sim | <input type="radio" name="inscricoes" id="inscricoes" value="N" checked="checked" /> N&atilde;o';
		}
	  ?>
      </td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr> 
      <td align="center" valign="top">N&iacute;vel Fundamental Incompleto:</td>
      <? if ($resultForm[2] == 'sim') { ?>
      <td align="left" valign="top"><select name="nivel1" id="nivel1">
          <option value="sim" selected>Sim</option>
          <option value="nao">N&atilde;o</option>
        </select>
        Valor da Inscri&ccedil;&atilde;o : R$ 
        <input name="valor1" type="text" id="valor1" value="<? echo $resultForm[6]; ?>"> 
      </td>
      <? } else { ?>
      <td align="left" valign="top"><select name="nivel1" id="nivel1">
          <option value="sim">Sim</option>
          <option value="nao" selected>N&atilde;o</option>
        </select>
        Valor da Inscri&ccedil;&atilde;o : R$ 
        <input name="valor1" type="text" id="valor1" value="<? echo $resultForm[6]; ?>"> 
      </td>
      <? } ?>
    </tr>
    <tr> 
      <td align="center" valign="top">Cargos a N&iacute;vel Fundamental Incompleto</td>
      <td align="left" valign="top"><textarea name="cargos1" cols="80%" rows="5" id="cargos1"><? echo $resultForm[10]; ?></textarea> 
        <br>
        Separe os cargos com v&iacute;rgula (,)</td>
    </tr>
    <tr> 
      <td align="center" valign="top">N&iacute;vel Fundamental Completo</td>
      <? if ($resultForm[3] == 'sim') { ?>
      <td align="left" valign="top"><select name="nivel2" id="nivel2">
          <option value="sim" selected>Sim</option>
          <option value="nao">N&atilde;o</option>
        </select>
        Valor da Inscri&ccedil;&atilde;o : R$ 
        <input name="valor2" type="text" id="valor2" value="<? echo $resultForm[7]; ?>"> 
      </td>
      <? } else { ?>
      <td align="left" valign="top"><select name="nivel2" id="nivel2">
          <option value="sim">Sim</option>
          <option value="nao" selected>N&atilde;o</option>
        </select>
        Valor da Inscri&ccedil;&atilde;o : R$ 
        <input name="valor2" type="text" id="valor2" value="<? echo $resultForm[7]; ?>"> 
      </td>
      <? } ?>
    </tr>
    <tr> 
      <td align="center" valign="top">Cargos a N&iacute;vel Fundamental</td>
      <td align="left" valign="top"><textarea name="cargos2" cols="80%" rows="5" id="cargos2"><? echo $resultForm[11]; ?></textarea> 
        <br>
        Separe os cargos com v&iacute;rgula (,)</td>
    </tr>
    <tr> 
      <td align="center" valign="top">N&iacute;vel M&eacute;dio</td>
      <? if ($resultForm[4] == 'sim') { ?>
      <td align="left" valign="top"><select name="nivel3" id="nivel3">
          <option value="sim" selected>Sim</option>
          <option value="nao">N&atilde;o</option>
        </select>
        Valor da Inscri&ccedil;&atilde;o : R$ 
        <input name="valor3" type="text" id="valor3" value="<? echo $resultForm[8]; ?>"> 
      </td>
      <? } else { ?>
      <td align="left" valign="top"><select name="nivel3" id="nivel3">
          <option value="sim">Sim</option>
          <option value="nao" selected>N&atilde;o</option>
        </select>
        Valor da Inscri&ccedil;&atilde;o : R$ 
        <input name="valor3" type="text" id="valor3" value="<? echo $resultForm[8]; ?>"> 
      </td>
      <? } ?>
    </tr>
    <tr> 
      <td align="center" valign="top">Cargos a N&iacute;vel M&eacute;dio</td>
      <td align="left" valign="top"><textarea name="cargos3" cols="80%" rows="5" id="cargos3"><? echo $resultForm[12]; ?></textarea> 
        <br>
        Separe os cargos com v&iacute;rgula (,)</td>
    </tr>
    <tr> 
      <td align="center" valign="top">N&iacute;vel Superior</td>
      <? if ($resultForm[5] == 'sim') { ?>
      <td align="left" valign="top"><select name="nivel4" id="nivel4">
          <option value="sim" selected>Sim</option>
          <option value="nao">N&atilde;o</option>
        </select>
        Valor da Inscri&ccedil;&atilde;o : R$ 
        <input name="valor4" type="text" id="valor4" value="<? echo $resultForm[9]; ?>"> 
      </td>
      <? } else { ?>
      <td align="left" valign="top"><select name="nivel4" id="nivel4">
          <option value="sim">Sim</option>
          <option value="nao" selected>N&atilde;o</option>
        </select>
        Valor da Inscri&ccedil;&atilde;o : R$ 
        <input name="valor4" type="text" id="valor4" value="<? echo $resultForm[9]; ?>"> 
      </td>
      <? } ?>
    </tr>
    <tr> 
      <td align="center" valign="top">Cargos a N&iacute;vel Superior</td>
      <td align="left" valign="top"><textarea name="cargos4" cols="80%" rows="5" id="cargos4"><? echo $resultForm[13]; ?></textarea> 
        <br>
        Separe os cargos com v&iacute;rgula (,)</td>
    </tr>
    <tr>
      <td align="center" valign="top">In&iacute;cio das Inscri&ccedil;&otilde;es</td>
      <td align="left" valign="top">
	  <? 
		$inicio = strtotime($resultForm['inicio']);
		$data_inicio = date('d/m/Y',$inicio);
		$hora_inicio = date('H:i',$inicio);
		
		$termino = strtotime($resultForm['termino']);
		$data_termino = date('d/m/Y',$termino);
		$hora_termino = date('H:i',$termino);
	  ?>
	  <input name="data_inicio" type="text" id="termino" size="15" value="<?=$data_inicio;?>">
        dd/mm/aaaa 
        <input name="hora_inicio" type="text" id="hora_inicio" size="10" value="<?=$hora_inicio;?>" /> 
        h:m:s</td>
    </tr>
    <? } ?>	
    <tr>
      <td align="center" valign="top">T&eacute;rmino das Inscri&ccedil;&otilde;es</td>
      <td align="left" valign="top"><input name="data_termino" type="text" id="data_termino" size="15" value="<?=$data_termino;?>" />
        dd/mm/aaaa 
        <input name="hora_termino" type="text" id="hora_termino" size="10" value="<?=$hora_termino;?>" /> 
        h:m:s</td>
    </tr>
    <tr> 
      <td align="center" valign="top">&nbsp;</td>
      <td align="center" valign="top"> <input type="hidden" name="table" value="<? echo $table; ?>"> 
        <input type="hidden" name="id" value="<? echo $id; ?>"> <input type="submit" name="enviar" value="enviar"> 
      </td>
    </tr>
  </table>
</form>
<?
		}
		} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'noticias')) {
			$table = $_REQUEST['table']; 
			$id = $_REQUEST['id'];
	
			include "conexao.php";
			$sql = mysql_query("SELECT * FROM $table WHERE id='$id' ");
			while ($x = mysql_fetch_array($sql)) {
?>
<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?acao=atualizar" onSubmit="rtoStore()">
<table width="100%" border="0" cellspacing="5" cellpadding="5">
    <tr> 
      <td width="10%" align="center" valign="top">Titulo: </td>
      <td width="90%" align="left" valign="top"><input name="titulo" type="text" id="titulo" size="25" value="<? echo $x[1]; ?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Not&iacute;cia:</td>
      <td align="left" valign="top">
	  <?
	  $editor = new FCKeditor("richEdit0");
	  $editor->BasePath = "fckeditor/";
	  $editor->Value =  $x['noticia'];
	  $editor->Width = "90%";
	  $editor->Height = "500";
	  $editor->Create();	  
	  ?>
	  </td>
    </tr>
    <tr> 
      <td align="center" valign="top">Data:</td>
      <td align="left" valign="top"><input name="data" type="text" id="data" value="<? echo $x[4]; ?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Hora:</td>
      <td align="left" valign="top"><input name="hora" type="text" id="hora" value="<? echo $x[5]; ?>"></td>
    </tr>
    <tr>
      <td align="center" valign="top">Deseja inserir Link? </td>
      <td align="left" valign="top">
	  <? 
	  if ($x[8] == 'sim') {
	  	echo '<input name="link" type="checkbox" id="link" value="sim" checked>Sim';
	  } else {
	  	echo '<input name="link" type="checkbox" id="link" value="sim">Sim';
	  }
	  ?>
	  <br>
	  <br>	  <select name="concurso" id="concurso">
	    <option>---</option>
		<?
		include "conexao.php";
		
		$sql = mysql_query("SELECT * FROM concursos ORDER BY situacao");
		while($result=mysql_fetch_array($sql)){
			if ($result['id'] == $x[9]) {
				echo '<option value="'.$result['id'].'" selected>'.strtoupper($result['contratante']).' - '.$result['situacao'].'</option>';
			} else {
				echo '<option value="'.$result['id'].'">'.strtoupper($result['contratante']).' - '.$result['situacao'].'</option>';
			}
		}
		?>
      </select>	  </td>
    </tr>
    <tr>
      <td align="center" valign="top">Icone do Link:</td>
      <td align="left" valign="top">
	  <?
	  $icone = array("leiamais", "inscricoes", "edital"); 
	  $cores = array("black","gray");
	  	for($i=0;$i<3;$i++){
			for($j=0;$j<2;$j++){
				$radio = $icone[$i].$cores[$j];
				if($x[7] == $radio) {
					echo '<input name="iconelink" type="radio" value="'.$radio.'" checked><img src="../imagens/'.$radio.'.gif" width="87" height="30">';
				} else {
					echo '<input name="iconelink" type="radio" value="'.$radio.'"><img src="../imagens/'.$radio.'.gif" width="87" height="30">';
				}
			}
		echo '<br>';			
		}
	  ?>
	  </td>
    </tr>
    <tr>
      <td align="center" valign="top">Destaque: </td>
      <td align="left" valign="top">
	<? 
	if ($x[6] == 'sim') {
	echo '
	  <select name="destaque" id="destaque">
          <option value="sim" selected>Sim</option>
          <option value="nao">N&atilde;o</option>
        </select>	
	';
	} else {
	echo '
	  <select name="destaque" id="destaque">
          <option value="sim">Sim</option>
          <option value="nao" selected>N&atilde;o</option>
        </select>	

	';
	}
	?> 	  
	</td>
    </tr>
	<!--
    <tr>
      <td align="center" valign="top">Imagem:</td>
	  <? //$src = explode("/", $x[7]); ?>
      <td align="left" valign="top"><? //echo '<a href="upload.php?acao='.$table.'&table='.$table.'&idnoticia='.$id.'"><img alt="Noticia Sem Imagem" src="../imagens/'.$src[1].'/'.rawurlencode($src[2]).'" border="0" width="187" height="140"></a>'; ?></td>
    </tr>
	-->
    <tr>
      <td align="center" valign="top">&nbsp;</td>
      <td align="left" valign="top">
	  <input type="hidden" name="table" value="<? echo $table; ?>"> 
      <input type="hidden" name="id" value="<? echo $id; ?>">		  
      <input type="submit" name="enviar" value="enviar">
      <input name="chamada" type="hidden" id="chamada" value="<? date("d/m/Y"); ?>">
	  </td>
    </tr>
</table>
</form>
<?
			}
		} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'conteudos')) {
		$table = $_REQUEST['table']; 
		$id = $_REQUEST['id'];
		include "conexao.php";
		$sql = mysql_query("SELECT * FROM $table WHERE id='$id' ");
		while ($x = mysql_fetch_array($sql)) {
?>
<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?acao=atualizar" onSubmit="rtoStore()">
  <table width="100%" border="0" cellspacing="5" cellpadding="5">
    <tr> 
      <td width="20%" align="center" valign="top">T&iacute;tulo:</td>
      <td width="80%" align="left" valign="top"><input name="titulo" type="text" id="titulo" value="<? echo $x['titulo']; ?>"></td>
    </tr>
    <tr> 
      <td align="center" valign="top">Local</td>
      <td align="left" valign="top"> 
        <select name="operador" id="operador">
        <? 
	  	include "conexao.php";
		$sql = mysql_query("SELECT * FROM menu WHERE link='sim' AND fonte='conteudos' ORDER BY id DESC");
		while ($result = mysql_fetch_array($sql)) {
			$texto = $x['texto'];
			if ($result['titulo'] == $x['operador']) {
			echo '<option value="'.$result['titulo'].'" selected>'.$result['titulo'].'</option>';			
			} else {
			echo '<option value="'.$result['titulo'].'">'.$result['titulo'].'</option>';
			}
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
	  $editor->Value =  $texto;
	  $editor->Width = "90%";
	  $editor->Height = "500";
	  $editor->Create();	  
	  ?>
	  </td>
    </tr>
    <tr> 
      <td align="center" valign="top">Observa&ccedil;&otilde;es:</td>
      <td align="left" valign="top"><textarea name="observacoes" cols="50%" rows="5" id="observacoes"><? echo $x['observacoes']; ?></textarea></td>
    </tr>
    <tr> 
      <td align="center" valign="top">&nbsp;</td>
      <td align="left" valign="top"><input type="hidden" name="table" value="<? echo $table; ?>">
	  <input type="hidden" name="id" value="<? echo $id; ?>">
        <input type="submit" name="enviar2" value="enviar"></td>
    </tr>
  </table>
</form>
<?			}//FIm da While
		} //elseif () {
		//}
	} // Fim da acao entrar
} else {
	echo "Erro de página";
} 
?>