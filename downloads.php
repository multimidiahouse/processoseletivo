<?
//Monta dia do Nascimento
$dia_nascimento = '<option value="-" selected>-</option>';
for($i=1;$i<=31;$i++) {
	$dia_nascimento .= '<option value="'.$i.'">'.$i.'</option>';
}

$meses = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
$mes_nascimento = '<option value="-" selected>-</option>';
for($i=0;$i<sizeof($meses);$i++) {
	$mes_nascimento .= '<option value="'.($i+1).'">'.$meses[$i].'</option>';
}

$ano_nascimento = '<option value="-" selected>-</option>';
$inicio = date('Y')-16;
$termino = date('Y')-120;
for($i=$inicio;$i>$termino;$i--) {
	$ano_nascimento .= '<option value="'.$i.'">'.$i.'</option>';
}

?>
<script language="JavaScript">
function validaForm() {
	conf="";
	if((document.forms[0].nome.value=="") || (document.forms[0].nome.value.substring(0,1)==" ")){
		conf="Preencha seu nome";
	}
	
	if((document.forms[0].cargo.value=="-")){
		conf=conf+"\nSelecione o cargo";
	}
	
	if((document.forms[0].email.value=="") || (document.forms[0].email.value.substring(0,1)==" ")){
		conf=conf+"\nPreencha o email";
	}
	
	if (conf!="") {
		alert(conf);
		conf="";
		history.back(1);
	}
}

function barra(objeto){
	if (objeto.value.length == 2 || objeto.value.length == 5 ){
		objeto.value = objeto.value+"/";
	}
}

function formata(src, mask) { //funcao para formatar qualquer campo.Ex.:cep,cpf,telefone,cnpj.
	var i = src.value.length;
	var saida = '#';
	var texto = mask.substring(i)
	if (texto.substring(0,1) != saida) {
		src.value += texto.substring(0,1);
	}
} 

function maiusculo(objeto) {
	var texto = objeto.value.toUpperCase();
	objeto.value = texto;
}

function minusculo(objeto) {
	var texto = objeto.value.toLowerCase();
	objeto.value = texto;
}
</script>
<script language="javascript" src="functions.js" type="text/javascript"></script>
<style>
td {
	font-family:Arial;
	font-size:12px;
	font-weight:none;
	text-decoration:none;
	color:#000000;
}

select {
	font-family:Arial;
	font-size:12px;
	font-weight:none;
	text-decoration:none;
	color:#000000;
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

a {
	text-decoration:none;
	color:#404040;
	font: Arial;
}
a:hover {
	text-decoration:underline;
}

#documento {
	height:25px;
	background-color:transparent;
}

#documento:hover {
	background-color:#CCC;
}
</style>
<? 
if (isset($_REQUEST['files']) and ($_REQUEST['files'] == 'andamento')) {
		include "scripts/conexao.php"; 
		$idConcurso = $_REQUEST['idConcurso'];
		$sqlContratante = mysql_query("SELECT * FROM concursos WHERE id='$idConcurso'");
		while ($x = mysql_fetch_array($sqlContratante)) {
			$contratante = $x['contratante'];
			$inscricoes = $x['inscricoes'];
			//$dataprova = strtotime($x['termino']);
			$dataprova = strtotime($x['termino']);
			$dataprova = date('d/m/Y',$dataprova);
			$dataprova = explode('/',$dataprova);
			$meses = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
			$dataprova = $dataprova[0].' de '.$meses[($dataprova[1]-1)].' de '.$dataprova[2];
		}

?>
<table width="95%"  border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td colspan="3" class="tituloconteudo" style="padding-left:5px"><? echo $contratante; ?>
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
	$sqlDocs = mysql_query("SELECT * FROM documentos WHERE idConcurso='$idConcurso' AND status='publicado' ORDER BY ordem ASC");
	while ($x = mysql_fetch_array($sqlDocs)) {
		$href = explode('/', $x['href']);
		echo '
		<tr id="documento">
	    <td width="60%"><a class="conteudo" href="imagens/documentos/'.$href[2].'/'.rawurlencode($href[3]).'" target="_blank">'.$x['nome'].'</a></td>
	    <td width="20%" class="conteudo"><a class="conteudo" href="imagens/documentos/'.$href[2].'/'.rawurlencode($href[3]).'" target="_blank"><img src="'.$x['tipo'].'" width="25" height="25" border="0"></a></td>
	    <td width="20%"><a class="conteudo" href="imagens/documentos/'.$href[2].'/'.rawurlencode($href[3]).'" target="_blank"><img src="imagens/download.jpg" border="0"></a></td>
		</tr>';
	}
	?>
</table>
<!-- Marcação do Formulário -->
	<?php
	$hoje = time("d/m/Y H:i:s");
	$sqlForm = mysql_query("SELECT * FROM formulario WHERE idConcurso='$idConcurso'");

	while ($resultForm = mysql_fetch_array($sqlForm)) {
		$termino = strtotime($resultForm['termino']);
		$inicio = strtotime($resultForm['inicio']);
		if ($termino <= $hoje and $inscricoes=='S') {
		echo '
		<table style="padding-left:10px; padding-top:10px; padding-right:10px;" width="95%"  border="0" cellspacing="0" cellpadding="0" align="center">		
		<tr> 
		  <td>&nbsp;</td>
		  <td colspan="3"><a href="inscricoes.php?verificaInscricao=yes&idConcurso='.$idConcurso.'" target="_parent"><img src="scripts/img/inscricoes.gif" width="172" height="40" border="0" align="left"> 
			Clique aqui para verificar sua inscri&ccedil;&atilde;o.</a></td>
		</tr>
	  	</table>		
		';
		} elseif ($resultForm[10] == '' and $resultForm[11] == '' and $resultForm[12] == '' and $resultForm[13] == '' and $resultForm['terrmino']=='') {

		} elseif ($inicio <= $hoje and $termino > $hoje and $inscricoes=='S') { 

	?>
<form action="inscricoes.php" method="post" name="form1" target="_parent" id="form1" onsubmit="formataCampo(form1.cpf, '000.000.000-00', event);">
  <table style="padding-left:10px; padding-top:10px; padding-right:10px;" width="95%"  border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="4" class="tituloconteudo" style="padding-left:5px"> <b>Inscrições 
        Online</b><br> <img src="imagens/divisoria.jpg" width="213" border="0"><br> 
        <br> <br> </td>
    </tr>
    <tr> 
      <td width="20%">Cargo:</td>
      <td colspan="3"> <select name="cargo" id="cargo" class="conteudo">
          <? 
		if ($resultForm[2] == 'sim') {
		echo '<option value="-">-- Nível Fundamental Incompleto --</option>';
			$cargos1 = explode (',', $resultForm[10]);
			for ($i=0; $i < sizeof($cargos1); $i++) {
				echo '<option value="'.$cargos1[$i].'|A">'.$cargos1[$i].'</option>';
			}
		}
		if ($resultForm[3] == 'sim') {
			echo '<option value="-">-- Nível Fundamental --</option>';
			$cargos2 = explode (',', $resultForm[11]);
			for ($i=0; $i < sizeof($cargos2); $i++) {
				echo '<option value="'.$cargos2[$i].'|B">'.$cargos2[$i].'</option>';
			}
		}
		if ($resultForm[4] == 'sim') {
			echo '<option value="-">-- Nível Médio --</option>';
			$cargos3 = explode (',', $resultForm[12]);
			for ($i=0; $i < sizeof($cargos3); $i++) {
				echo '<option value="'.$cargos3[$i].'|C">'.$cargos3[$i].'</option>';
			}
		}
		if ($resultForm[5] == 'sim') {
			echo '<option value="-">-- Nível Superior --</option>';
			$cargos4 = explode (',', $resultForm[13]);
			for ($i=0; $i < sizeof($cargos4); $i++) {
				echo '<option value="'.$cargos4[$i].'|D">'.$cargos4[$i].'</option>';
			}
		}				
		?>
        </select> </td>
    </tr>
    <tr> 
      <td>Nome:</td>
      <td colspan="3"><input name="nome" onchange="maiusculo(this);" onkeypress="maiusculo(this);" type="text" id="nome" size="80%"></td>
    </tr>
    <tr> 
      <td>Email:</td>
      <td colspan="3"><input name="email" onchange="minusculo(this);" onkeypress="minusculo(this);" type="text" id="email" size="40%"></td>
    </tr>
    <tr> 
      <td>Pai:</td>
      <td colspan="3"><input name="pai" onchange="maiusculo(this);" onkeypress="maiusculo(this);" type="text" id="pai" size="80%"></td>
    </tr>
    <tr> 
      <td>M&atilde;e:</td>
      <td colspan="3"><input name="mae" onchange="maiusculo(this);" onkeypress="maiusculo(this);" type="text" id="mae" size="80%"></td>
    </tr>
    <tr> 
      <td>Nacionalidade:</td>
      <td colspan="3"><input name="nacionalidade" onchange="maiusculo(this);" onkeypress="maiusculo(this);" type="text" id="nacionalidade" size="30%">
        | Naturalidade: 
        <input name="naturalidade" onchange="maiusculo(this);" onkeypress="maiusculo(this);" type="text" id="naturalidade" size="30%"></td>
    </tr>
    <tr> 
      <td>C.P.F.:</td>
      <td colspan="3"><input onFocus="this.value=''" maxlength="14" onKeyPress="formataCampo(form1.cpf, '000.000.000-00', event);" value="000.000.000-00" name="cpf" type="text" id="cpf" size="30%"></td>
    </tr>
    <tr> 
      <td>R.G.: </td>
      <td colspan="3"><input name="rg" type="text" id="rg3" size="20%"> &Oacute;rg&atilde;o 
        Emissor: 
        <input name="orgaoRG" type="text" id="orgaoRG2" value="SSP" onchange="maiusculo(this);" onkeypress="maiusculo(this);" size="6" onFocus="this.value='';">
        UF: 
        <select name="ufRG" id="select3">
          <option value="AC">AC</option>
          <option value="AL">AL</option>
          <option value="AP">AP</option>
          <option value="AM">AM</option>
          <option value="BA">BA</option>
          <option value="CE">CE</option>
          <option value="DF">DF</option>
          <option value="ES">ES</option>
          <option value="GO">GO</option>
          <option value="MA">MA</option>
          <option value="MT">MT</option>
          <option value="MS">MS</option>
          <option value="MG">MG</option>
          <option value="PA">PA</option>
          <option value="PB">PB</option>
          <option value="PR">PR</option>
          <option value="PE">PE</option>
          <option value="PI">PI</option>
          <option value="RJ">RJ</option>
          <option value="RN">RN</option>
          <option value="RS">RS</option>
          <option value="RO">RO</option>
          <option value="RR">RR</option>
          <option value="SC">SC</option>
          <option value="SP">SP</option>
          <option value="SE">SE</option>
          <option value="TO">TO</option>
          <option value="-" selected>Selecione</option>
        </select></td>
    </tr>
    <tr> 
      <td>Data de Nascimento:</td>
      <td colspan="3">
      <select name="dia_nascimento">
      <?=$dia_nascimento;?>
      </select>
      <select name="mes_nascimento">
      <?=$mes_nascimento;?>
      </select>
      <select name="ano_nascimento">
      <?=$ano_nascimento;?>
      </select>
      <!--<input name="dataDeNascimento" value="DD/MM/YYYY" maxlength="10" onchange="barra(this)" onKeyUp="barra(this)" type="text" id="dataDeNascimento" size="20%">--></td>
    </tr>
    <tr> 
      <td>Estado Civil:</td>
      <td colspan="3"> <select name="estadoCivil" id="estadoCivil">
          <option value="-" selected>-</option>
          <option value="Solteiro(a)">Solteiro(a)</option>
          <option value="Casado(a)">Casado(a)</option>
          <option value="Divorciado(a)">Divorciado(a)</option>
          <option value="Outro">Outro</option>
        </select></td>
    </tr>
    <tr> 
      <td>Sexo:</td>
      <td colspan="3"><select name="sexo" id="sexo">
          <option value="-" selected>-</option>
          <option value="masculino">Masculino</option>
          <option value="feminino">Feminino</option>
        </select></td>
    </tr>
    <tr> 
      <td>Endere&ccedil;o:</td>
      <td colspan="3"><input name="endereco" onkeypress="maiusculo(this);" onchange="maiusculo(this);" type="text" id="endereco" size="80%"></td>
    </tr>
    <tr>
      <td>Telefone:</td>
      <td><input type="text" name="dddtel" id="dddtel" maxlength="2" size="4" /> <input name="telefone" type="text" id="telefone" size="15" maxlength="9" /></td>
      <td>Celular: </td>
      <td><input type="text" name="dddcel" id="dddcel" maxlength="2" size="4" /> <input name="celular" type="text" id="celular" size="15" maxlength="9" /></td>
    </tr>
    <tr> 
      <td>Cidade:</td>
      <td colspan="3"><input name="cidade" onkeypress="maiusculo(this);" onchange="maiusculo(this);" type="text" id="cidade">
        UF: 
        <select name="estado">
          <option value="AC">AC</option>
          <option value="AL">AL</option>
          <option value="AP">AP</option>
          <option value="AM">AM</option>
          <option value="BA">BA</option>
          <option value="CE">CE</option>
          <option value="DF">DF</option>
          <option value="ES">ES</option>
          <option value="GO">GO</option>
          <option value="MA">MA</option>
          <option value="MT">MT</option>
          <option value="MS">MS</option>
          <option value="MG">MG</option>
          <option value="PA">PA</option>
          <option value="PB">PB</option>
          <option value="PR">PR</option>
          <option value="PE">PE</option>
          <option value="PI">PI</option>
          <option value="RJ">RJ</option>
          <option value="RN">RN</option>
          <option value="RS">RS</option>
          <option value="RO">RO</option>
          <option value="RR">RR</option>
          <option value="SC">SC</option>
          <option value="SP">SP</option>
          <option value="SE">SE</option>
          <option value="TO">TO</option>
          <option value="selecione" selected>Selecione</option>
        </select></td>
    </tr>
    <tr> 
      <td>Necessita de atendimento especial? (Deficientes F&iacute;sicos, Visual, etc...)</td>
      <td colspan="3"><select name="deficiencia" id="deficiencia">
          <option value="sim">Sim</option>
          <option value="nao" selected>N&atilde;o</option>
        </select>
        Se a resposta for sim, especificar: 
        <input name="qualDeficiencia" onkeypress="maiusculo(this);" onchange="maiusculo(this);" type="text" id="qualDeficiencia"> </td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="3"><p align="justify">Declaro que tenho conhecimento e estou de acordo
          com o Edital, do Concurso Público a ser realizado pela <?=$contratante;?>,
          ao qual me submeterei no dia <?=$dataprova;?>.
          Declaro ainda que estou de acordo que, se aprovado e empossado, 
          poderei ser designado, para prestar serviços em qualquer localidade 
          do município, inclusive na zona rural, de acordo com interesse da Administração 
          Municipal.</p></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="3"><input name="assinatura" type="checkbox" id="assinatura" value="aceito">
        Li e aceito.</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr> 
      <td><input name="idConcurso" type="hidden" id="idConcurso2" value="<? echo $idConcurso; ?>">
        <input name="situacao" type="hidden" id="situacao" value="aguardando"></td>
      <td colspan="3"><input name="enviar" type="submit" id="enviar" value="enviar"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="3"><a href="inscricoes.php?verificaInscricao=yes&idConcurso=<?=$idConcurso;?>" target="_parent"><img src="scripts/img/inscricoes.gif" width="172" height="40" border="0" align="left"> 
        Clique aqui para verificar sua inscri&ccedil;&atilde;o.</a></td>
    </tr>
  </table>
</form>
	<?  } // Fim da VErificação de Data de Termino da inscrição
		} //Fim da While ?>
<!-- Fim da Marcação do Formulário -->
<? } ?>