<? 

if($_REQUEST['verificaInscricao']=='yes') {

	setcookie('codV','e0d5074fb548af4a8574fc1daa483d3c',time()+3600);

}



function corrigeString($str) {

	$str = strtoupper($str);

	$str = str_replace('á','Á', $str);

	$str = str_replace('â','Â', $str);

	$str = str_replace('ã','Ã', $str);

	$str = str_replace('à','À', $str);

	$str = str_replace('é','É', $str);

	$str = str_replace('ê','Ê', $str);

	$str = str_replace('è','È', $str);

	$str = str_replace('í','Í', $str);

	$str = str_replace('î','Î', $str);

	$str = str_replace('ì','Ì', $str);

	$str = str_replace('ó','Ó', $str);

	$str = str_replace('ô','Ô', $str);

	$str = str_replace('õ','Õ', $str);

	$str = str_replace('ò','Ò', $str);

	$str = str_replace('ú','Ú', $str);

	$str = str_replace('û','Û', $str);

	$str = str_replace('ù','Ù', $str);

	$str = str_replace('ü','Ü', $str);

					

	$newstr = '';

	$str = explode(' ',$str);

	for($i=0;$i<sizeof($str);$i++) {

		if($str[$i]<>' ' or $str[$i]<>'') {

			$newstr .= $str[$i].' ';

		}

	}

	

	return $newstr;

}

?>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style>

body {

	background-image:url(imagens/background.jpg);

	background-position:top center;

	background-repeat:repeat-x;

	background-attachment:fixed;

	scrollbar-arrow-color:#000000;

	scrollbar-3dlight-color:#CCCCCC;

	scrollbar-highlight-color:#CCCCCC;

	scrollbar-face-color:#FFFFFF;

	scrollbar-shadow-color:#CCCCCC;

	scrollbar-darkshadow-color:#CCCCCC;

	scrollbar-track-color:#FFFFFF;

	margin-left:0;

	margin-top:0;

	margin-bottom:0;

	margin-right:0;

	font-family:Arial;

	font-size:12px;

	font-weight:50;

	text-decoration:none;

	color:#000000;

}

td {

	font-family:Arial;

	font-size:12px;

	font-weight:none;

	text-decoration:none;

	color:#000000;

}

.data {

	font-family:Arial;

	font-size:11px;

	font-weight:bold;

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

.endereco {

	font-family:Arial;

	font-size:12px;

	text-decoration:none;

	color:#FFFFFF;

}

a.menu {

 font: 11px Arial, Helvetica, sans-serif;

 font-weight:bold;

 color:#FFFFFF;

 text-decoration:none

 }

 

a.menu:hover {

 color:#FFFFFF;

 background-color:#435A67;

}

</style>

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

//return false;

history.back(1);

}

}



function barra(objeto){

if (objeto.value.length == 2 || objeto.value.length == 5 ){

objeto.value = objeto.value+"/";

}

}



function formata(src, mask)

//funcao para formatar qualquer campo.Ex.:cep,cpf,telefone,cnpj.

{

var i = src.value.length;

var saida = '#';

var texto = mask.substring(i)

if (texto.substring(0,1) != saida)

{

src.value += texto.substring(0,1);

}

} 

</script>

<script language="javascript" src="functions.js" type="text/javascript"></script>

<title>.:| Munic&iacute;pio Assessoria e Consultoria Jur&iacute;dica |:.</title>

</head>



<body>

<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">

              <tr> 

                <td height="155" align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="775" height="155">

                    <param name="movie" value="imagens/topoimagem.swf">

                    <param name="quality" value="high">

                    <embed src="imagens/topoimagem.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="775" height="155"></embed></object></td>

              </tr>

              <tr> 

                <td height="20" bgcolor="#97B1C0"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                    <tr> 

                      <td width="11%"><img src="imagens/space.gif" width="20" height="2"><img src="imagens/favicones.gif" width="68" height="20" border="0" usemap="#Map"></td>

                      <td width="54%">&nbsp;</td>

                      <td width="35%" align="right" style="padding-right:10px;"> 

                        <?php

				  $dia = date('d'); 

				  $ano = date('Y');

					

					$convMes = date('M');

					if ($convMes == 'Jan') {

						$mes = 'Janeiro';

					} elseif ($convMes == 'Feb') {

						$mes = 'Fevereiro';

					} elseif ($convMes == 'Mar') {

						$mes = 'Março';

					} elseif ($convMes == 'Apr') {

						$mes = 'Abril';

					} elseif ($convMes == 'May') {

						$mes = 'Maio';

					} elseif ($convMes == 'Jun') {

						$mes = 'Junho';

					} elseif ($convMes == 'Jul') {

						$mes = 'Julho';

					} elseif ($convMes == 'Aug') {

						$mes = 'Agosto';

					} elseif ($convMes == 'Sep') {

						$mes = 'Setembro';

					} elseif ($convMes == 'Oct') {

						$mes = 'Outubro';

					} elseif ($convMes == 'Nov') {

						$mes = 'Novembro';

					} elseif ($convMes == 'Dec') {

						$mes = 'Dezembro';

					}																																													

					

				  	

					$convSemana = date('D');

					if ($convSemana == 'Sun') {

						$semana = 'Domingo';

					} elseif ($convSemana == 'Mon') {

						$semana = 'Segunda-feira';

					} elseif ($convSemana == 'Tue') {

						$semana = 'Terça-feira';

					} elseif ($convSemana == 'Wed') {

						$semana = 'Quarta-feira';				  

					} elseif ($convSemana == 'Thu') {

						$semana = 'Quinta-feira';						

					} elseif ($convSemana == 'Fri') {

						$semana = 'Sexta-feira';

					} elseif ($convSemana == 'Sat') {

						$semana = 'Sábado';

					}						



				  echo "<span class=data>$semana, $dia de $mes de $ano</span>";

				  ?>

                      </td>

                    </tr>

                  </table></td>

              </tr>

              <tr> 

                <td height="20" valign="top"> 

                  <!-- Marcação do Centro da Página -->

				  <?

				  if (isset($_REQUEST['verificaInscricao']) and $_REQUEST['verificaInscricao'] == 'showall') {

				  	include 'scripts/conexao.php';

					$idConcurso = $_REQUEST['idConcurso'];

					$cpf = $_POST['cpf'];

				  	$sqlInsc = mysql_query("SELECT * FROM inscricoes WHERE idConcurso='$idConcurso' AND cpf='$cpf' ORDER BY id DESC LIMIT 1");

					$contInsc = mysql_num_rows($sqlInsc);

					if ($contInsc == 0) {

						echo 'Erro ao tentar localizar inscrição, entre em contato com a <a href="index.php?faleconosco=yes">Município Assessoria</a> para verificar o acontecimento';

					} else {

						while ($resultInsc = mysql_fetch_array($sqlInsc)) {

				  ?>

                  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td width="80%"> 

                        <table style="padding-left:10px; padding-top:10px; padding-right:10px;" width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">

                          <tr> 

                            <td colspan="2" class="tituloconteudo" style="padding-left:5px"> 

                              <b>Inscrições Online</b><br> <img src="imagens/divisoria.jpg" width="213" border="0"><br> 

                              <br> <br> </td>

                          </tr>

                          <tr> 

                            <td width="20%">Cargo:</td>

                            <td><? echo $resultInsc['cargo'].' / '.$resultInsc['nivel']; ?> 

                            </td>

                          </tr>

                          <tr> 

                            <td>Nome:</td>

                            <td><? echo $resultInsc['nome']; ?></td>

                          </tr>

                          <tr> 

                            <td>Email:</td>

                            <td><? echo $resultInsc['email']; ?></td>

                          </tr>

                          <tr> 

                            <td>Pai:</td>

                            <td><? echo $resultInsc['pai']; ?></td>

                          </tr>

                          <tr> 

                            <td>M&atilde;e:</td>

                            <td><? echo $resultInsc['mae']; ?></td>

                          </tr>

                          <tr> 

                            <td>Nacionalidade:</td>

                            <td> <? echo $resultInsc['nacionalidade']; ?> | Naturalidade: 

                              <? echo $resultInsc['naturalidade']; ?></td>

                          </tr>

                          <tr> 

                            <td>C.P.F.:</td>

                            <td><? echo $resultInsc['cpf']; ?> </td>

                          </tr>

                          <tr> 

                            <td>R.G.: </td>

                            <td><? echo $resultInsc['rg']; ?> </td>

                          </tr>

                          <tr> 

                            <td>Data de Nascimento:</td>

                            <td><? echo date('d/m/Y', $resultInsc['dataDeNascimento']); ?></td>

                          </tr>

                          <tr> 

                            <td>Estado Civil:</td>

                            <td><? echo $resultInsc['estadoCivil']; ?> </td>

                          </tr>

                          <tr> 

                            <td>Sexo:</td>

                            <td><? echo $resultInsc['sexo']; ?></td>

                          </tr>

                          <tr> 

                            <td>Endere&ccedil;o:</td>

                            <td><? echo $resultInsc['endereco']; ?></td>

                          </tr>

                          <tr> 

                            <td>Local:</td>

                            <td><? echo $resultInsc['local']; ?></td>

                          </tr>

                          <tr> 

                            <td>Defici&ecirc;ncia</td>

                            <td><? echo $resultInsc['deficiencia']; ?> </td>

                          </tr>

                          <tr>

                            <td>Situação:</td>

                            <td>

							<?

							if ($resultInsc['situacao'] == 'aguardando') {

								echo $resultInsc['situacao'];

							} elseif($resultInsc['situacao'] == 'confirmado') {

							//echo $resultInsc['situacao'];

								$_COOKIE['codV'] = md5($resultInsc['situacao']);

								echo '<a href="confirmacao.php?confirmaInscricao=a6105c0a611b41b08f1209506350279e&cpf='.$resultInsc['cpf'].'&idConcurso='.$idConcurso.'" target="_blank"><img src="imagens/confirmacao.jpg" border="0"></a>';

							}

							?>                            

                            </td>

                          </tr>

                          <tr> 

                            <td>&nbsp;</td>

                            <td>

                            Este formul&aacute;rio n&atilde;o garante o deferimento 

                              da inscri&ccedil;&atilde;o do candidato, a qual 

                              ser&aacute; homologada posteriormente por uma comiss&atilde;o, 

                              conforme plano do concurso.</td>

                          </tr>

                        </table></td>

                      <td valign="top"> 

                        <?

						$idConcurso = $resultInsc['idConcurso']; 

						$nInscricao = $resultInsc['nInscricao']; 

						$numeroDoDocumento = $resultInsc['numeroDoDocumento']; 

						$checkCargo = $resultInsc['nivel'];

						if ($checkCargo == 'Nível Fundamental Incompleto') {

							$nivel = 'A';

						} elseif ($checkCargo == 'Nível Fundamental Completo') {

							$nivel = 'B';

						} elseif ($checkCargo == 'Nível Médio') {

							$nivel = 'C';

						} elseif ($checkCargo == 'Nível Superior') {

							$nivel = 'D';

						}



						

					  $sqlConc = mysql_query("SELECT * FROM concursos WHERE id='$idConcurso'");

					  while ($resultConc = mysql_fetch_array($sqlConc)) {

					  	$sqlIns = mysql_query("SELECT * FROM formulario WHERE idConcurso='$idConcurso'");

						if($resultIns = mysql_fetch_array($sqlIns)) {

							if($nivel=='A') {

								$valor = $resultIns['valor1'];

							} elseif($nivel=='B') {

								$valor = $resultIns['valor2'];

							} elseif($nivel=='C') {

								$valor = $resultIns['valor3'];

							} elseif($nivel=='D') {

								$valor = $resultIns['valor4'];

							}

						}

					  	echo $resultConc['contratante'].'<br>';

					  	echo $resultConc['contato'].'<br>';

					  	echo $resultConc['telefone'].'<br>';

					  	echo $resultConc['endereco'].'<br>';						

					  	echo $resultConc['local'].'<br>';

						$banco = strtolower($resultConc['observacoes']);

						if($resultConc['tipo_inscricoes']=='deposito') {

							echo '<br><p align="justify">Para efetivar sua inscrição, faça um depósito identificado na boca do caixa, Não será aceito pagamento da taxa de inscrição pelos Correios, fac-símile, transferência eletrônica, ordem de pagamento ou outro meio que não seja através de depósito identificado na boca do caixa. O candidato deverá avisar ao caixa que o comprovante de depósito deverá conter seu NOME ou CPF para sua identificação. O candidato que efetuar o pagamento que não seja através do depósito identificado com seu NOME ou CPF não terá sua inscrição homologada.<br>Valor (R$): '.$valor.'<br>'.$resultConc['observacoes'].'<br>Ag: '.$resultConc['agencia'].'<br>Conta Corrente : '.$resultConc['conta'].'<br>'.$resultConc['cedente'].'</p>';

						} elseif($resultConc['tipo_inscricoes']=='boleto' and $resultInsc['situacao'] == 'aguardando') {

							echo '<br><a href="boletos/boleto_'.$banco.'.php?nInscricao='.$nInscricao.'&nivel='.$checkCargo[1].'&idConcurso='.$idConcurso.'&numeroDoDocumento='.$numeroDoDocumento.'"><img src="imagens/geradorboleto.jpg" border="0"></a>';

						}

					  }

					  ?>

						<br>

                        <table width="100%" border="2" cellspacing="0" cellpadding="0">

                          <tr>

                            <td align="center">

							<?

							if ($resultInsc['situacao'] == 'aguardando') {

								//echo $resultInsc['situacao'];

							} elseif($resultInsc['situacao'] == 'confirmado') {

							//echo $resultInsc['situacao'];

								$_COOKIE['codV'] = md5($resultInsc['situacao']);

								echo '<a href="confirmacao.php?confirmaInscricao=a6105c0a611b41b08f1209506350279e&cpf='.$resultInsc['cpf'].'&idConcurso='.$idConcurso.'" target="_blank"><img src="imagens/confirmacao.jpg" border="0"></a>';

							}

							?>

							</td>

                          </tr>

                        </table> </td>

                    </tr>

                  </table> 				  

				  <?	}//Fim da While

				  	}//Fim da Verificação da requisição	

					} elseif (isset($_REQUEST['verificaInscricao'])) { //Monta formulario inicial

					?>

					<table cellpadding="0" cellspacing="0" border="0" width="100%" height="450"><tr><td>

					<form name="form1" method="post" action="inscricoes.php?verificaInscricao=showall&idConcurso=<?=$_REQUEST['idConcurso'];?>" onSubmit="formataCampo(form1.cpf, '000.000.000-00', event);">

					<input name="cpf" type="text" id="cpf" onFocus="this.value=''" onKeyPress="formataCampo(form1.cpf, '000.000.000-00', event);" value="000.000.000-00">

					<input name="verificar" type="submit" id="verificar" value="verificar">

					Digite seu numero de CPF. 

					</form>

					</td></tr></table>

					<?

				  } else {

					include 'scripts/mod_admin_conexao.php';

					

					$error = 0;

					$errors = '';

					

					$idConcurso = $_POST['idConcurso'];

					$checkCargo = str_replace('"','',$_POST['cargo']);
					if($_POST['cargo']=='-') {

						$error++;

						$errors = $errors.'\nSelecione o cargo almejado';

					}

					$checkCargo = explode ('|', $checkCargo);

						if ($checkCargo[1] == 'A') {

							$nivel = 'Nível Fundamental Incompleto';

							$cargo = $checkCargo[0];

						} elseif ($checkCargo[1] == 'B') {

							$nivel = 'Nível Fundamental Completo';

							$cargo = $checkCargo[0];			

						} elseif ($checkCargo[1] == 'C') {

							$nivel = 'Nível Médio';

							$cargo = $checkCargo[0];			

						} elseif ($checkCargo[1] == 'D') {

							$nivel = 'Nível Superior';	

							$cargo = $checkCargo[0];		

						} else {

							$error++;

							$errors = $errors.'\nSelecione o cargo almejado';

						}





					

					$sqlInsc = mysql_query("SELECT * FROM inscricoes WHERE idConcurso='$idConcurso' ORDER BY nInscricao DESC LIMIT 1");

					$contInsc = mysql_num_rows($sqlInsc);

					if  ($contInsc == 0) {

						$nInscricao = 1;

					} else {

						if($resultInsc = mysql_fetch_array($sqlInsc)) {

							$nInscricao = $resultInsc['nInscricao']+1;

						}

					}



					/*if ($nInscricao<9) {

						$numeroDoDocumento = '0000'.$nInscricao;

					} elseif ($nInscricao>9 and $nInscricao<=99) {

						$numeroDoDocumento = '000'.$nInscricao;

					} elseif ($nInscricao>99 and $nInscricao<=999) {

						$numeroDoDocumento = '00'.$nInscricao;

					} elseif ($nInscricao>999 and $nInscricao<=9999) {

						$numeroDoDocumento = '0'.$nInscricao;

					} else {

						$numeroDoDocumento = '0'.$nInscricao;

					}*/

					

					$numeroDoDocumento = rand(10000,99999);
					$sql = mysql_query("SELECT * FROM inscricoes WHERE numeroDoDocumento='$numeroDoDocumento'");
					$confere = mysql_num_rows($sql);
					if($confere>0) {
						$libera = 'nao';
						while($libera=='nao') {
							$numeroDoDocumento = rand(10000,99999);
							$sql = mysql_query("SELECT * FROM inscricoes WHERE numeroDoDocumento='$numeroDoDocumento'");
							$confere1 = mysql_num_rows($sql);
							if($confere1>0) {
								$libera='nao';
							} else {
								$libera='sim';
							}
						}
					}
					
					if($_POST['nome']=='') {

						$error++;

						$errors = $errors.'\nPreencha o nome';

					}

					$nome = strtoupper(trim($_POST['nome']));

					

					$newnome = '';

					$nome = explode(' ',$nome);

					for($i=0;$i<sizeof($nome);$i++) {

						if($nome[$i]<>' ' or $nome[$i]<>'') {

							$newnome .= $nome[$i].' ';

						}

					}

				

					$nome = $newnome;

					

					$email = strtolower($_POST['email']);

					if($_POST['email']=='') {

						$error++;

						$errors = $errors.'\nPreencha o email';

					}

					$pai = strtoupper(trim($_POST['pai']));

					if($_POST['pai']=='') {

						$error++;

						$errors = $errors.'\nPreencha o nome do pai';

					} else {

						$newnome = '';

						$pai = explode(' ',$pai);

						for($i=0;$i<sizeof($pai);$i++) {

							if($pai[$i]<>' ' or $pai[$i]<>'') {

								$newnome .= $pai[$i].' ';

							}

						}

					

						$pai = $newnome;

					}

					$mae = strtoupper(trim($_POST['mae']));

					if($_POST['mae']=='') {

						$error++;

						$errors = $errors.'\nPreencha o nome da mae';

					} else {

						$newnome = '';

						$mae = explode(' ',$mae);

						for($i=0;$i<sizeof($mae);$i++) {

							if($mae[$i]<>' ' or $mae[$i]<>'') {

								$newnome .= $mae[$i].' ';

							}

						}

					

						$mae = $newnome;

					}

					$nacionalidade = strtoupper($_POST['nacionalidade']);

					if($_POST['nacionalidade']=='') {

						$error++;

						$errors = $errors.'\nPreencha a nacionalidade';

					}

					$naturalidade = strtoupper($_POST['naturalidade']);

					if($_POST['naturalidade']=='') {

						$error++;

						$errors = $errors.'\nPreencha a naturalidade';

					}

					$cpf = $_POST['cpf'];

					if($cpf=='' or $cpf=='000.000.000-00' or strlen($cpf)<14) {

						$error++;

						$errors = $errors.'\nPreencha o cpf';

					}

					$copyCpf = $cpf;

					$cpf = explode('.',$_POST['cpf']);

					$cpf = $cpf[0].$cpf[1].$cpf[2];

					$cpf = explode('-',$cpf);

					$cpf = $cpf[0].$cpf[1];

					include 'scripts/checkcpf.php';

					$cpf = $copyCpf;

					$sqlCPF = mysql_query("SELECT * FROM inscricoes WHERE idConcurso='$idConcurso' AND cpf='$cpf'");

					$contCPF = mysql_num_rows($sqlCPF);

					if (! $contCPF == 0) {

						$error++;

						$errors = $errors.'O número de CPF já está inscrito. Entre em contato com a Município Assessoria para confirmar a inscrição<br>';

					}



						if (($_POST['orgaoRG'] == '') or ($_POST['ufRG'] == '-')) {

							$error++;

							$errors = $errors.'\nDefina o Órgão Emissor e a UF do seu RG<br>';	

						} else {

							$rg = $_POST['rg'].' / '.$_POST['orgaoRG'].'-'.$_POST['ufRG'];

						}


					$meses = array('January','February','March','April','May','June','July','August','September','October','November','December');
					$dataDeNascimento = strtotime($_POST['dia_nascimento'].' '.$meses[($_POST['mes_nascimento']-1)].' '.$_POST['ano_nascimento']);

					if($_POST['dia_nascimento']=='-' or $_POST['mes_nascimento']=='-' or $_POST['ano_nascimento']=='-') {

						$error++;

						$errors = $errors.'\nPreencha a Data de Nascimento';

					}

					$estadoCivil = $_POST['estadoCivil'];

					if($_POST['estadoCivil']=='-') {

						$error++;

						$errors = $errors.'\nSelecione o Estado Civil';

					}

					$sexo = $_POST['sexo'];

					if($_POST['sexo']=='-') {

						$error++;

						$errors = $errors.'\nSelecione o Sexo';

					}

					$endereco = $_POST['endereco'];

					if($_POST['endereco']=='') {

						$error++;

						$errors = $errors.'\nPreencha o endereço';

					}

					if($_POST['dddtel']=='' or $_POST['telefone']=='' or $_POST['dddcel']=='' or $_POST['celular']=='') {

						$error++;

						$errors = $errors.'\nPreencha o telefone e o celular';

					}

					$telefone = '('.$_POST['dddtel'].') '.$_POST['telefone'];

					$celular = '('.$_POST['dddcel'].') '.$_POST['celular'];

					if($_POST['cidade']=='' or $_POST['estado']=='') {

						$error++;

						$errors = $errors.'\nPreencha a cidade e o estado';

					}

					$local = $_POST['cidade'].' / '.$_POST['estado'];

					$deficiente = $_POST['deficiencia'];

						if ($deficiente == 'sim') {

							$deficiencia = $deficiente.' - '.$_POST['qualDeficiencia'];

						} else {

							$deficiencia = $deficiente;

						}

					$situacao = $_POST['situacao'];

					$assinatura = $_POST['assinatura'];

						if (! $assinatura == 'aceito') {

							$error++;

							$errors = $errors.'\nA sua inscrição só será aceita se você selecionar a confirmação que leu e aceita as declarações do formulário de inscrição';

						} else {

							$aceito = 'ok';

						}

						

						if ($error == 0) {

						$sql = mysql_query("INSERT INTO inscricoes(id, idConcurso, nivel, cargo, nInscricao, nome, email, pai, mae, nacionalidade, naturalidade, cpf, rg, dataDeNascimento, estadoCivil, sexo, endereco, telefone, celular, local, deficiencia, numeroDoDocumento, situacao) VALUES (NULL, '$idConcurso', '$nivel', '$cargo', '$nInscricao', '$nome', '$email', '$pai', '$mae', '$nacionalidade', '$naturalidade', '$cpf', '$rg', '$dataDeNascimento', '$estadoCivil', '$sexo', '$endereco', '$telefone', '$celular', '$local', '$deficiencia', '$numeroDoDocumento', '$situacao')");

						if(!$sql) {

							//die(mysql_error());

							echo '<script>alert("'.$errors.'"); history.back(1);</script>';

						}

?>

                  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>

                      <td width="80%"> 

                        <table style="padding-left:10px; padding-top:10px; padding-right:10px;" width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">

                          <tr> 

                            <td colspan="2" class="tituloconteudo" style="padding-left:5px"> 

                              <b>Inscrições Online</b><br> <img src="imagens/divisoria.jpg" width="213" border="0"><br> 

                              <br> <br> </td>

                          </tr>

                          <tr> 

                            <td width="20%">Cargo:</td>

                            <td><? echo $cargo.' / '.$nivel; ?> </td>

                          </tr>

                          <tr> 

                            <td>Nome:</td>

                            <td><? echo $nome; ?></td>

                          </tr>

                          <tr> 

                            <td>Email:</td>

                            <td><? echo $email; ?></td>

                          </tr>

                          <tr> 

                            <td>Pai:</td>

                            <td><? echo $pai; ?></td>

                          </tr>

                          <tr> 

                            <td>M&atilde;e:</td>

                            <td><? echo $mae; ?></td>

                          </tr>

                          <tr> 

                            <td>Nacionalidade:</td>

                            <td> <? echo $nacionalidade; ?> | Naturalidade: <? echo $naturalidade; ?></td>

                          </tr>

                          <tr> 

                            <td>C.P.F.:</td>

                            <td><? echo $cpf; ?> </td>

                          </tr>

                          <tr> 

                            <td>R.G.: </td>

                            <td><? echo $rg; ?> </td>

                          </tr>

                          <tr> 

                            <td>Data de Nascimento:</td>

                            <td><? echo date('d/m/Y', $dataDeNascimento); ?></td>

                          </tr>

                          <tr> 

                            <td>Estado Civil:</td>

                            <td><? echo $estadoCivil; ?> </td>

                          </tr>

                          <tr> 

                            <td>Sexo:</td>

                            <td><? echo $sexo; ?></td>

                          </tr>

                          <tr> 

                            <td>Endere&ccedil;o:</td>

                            <td><? echo $endereco; ?></td>

                          </tr>

                          <tr> 

                            <td>Local:</td>

                            <td><? echo $local; ?></td>

                          </tr>

                          <tr> 

                            <td>Defici&ecirc;ncia</td>

                            <td><? echo $deficiencia; ?> </td>

                          </tr>

                          <tr>

                            <td>&nbsp;</td>

                            <td>&nbsp;</td>

                          </tr>

                          <tr> 

                            <td>&nbsp;</td>

                            <td>Este formul&aacute;rio n&atilde;o garante o deferimento 

                              da inscri&ccedil;&atilde;o do candidato, a qual 

                              ser&aacute; homologada posteriormente por uma comiss&atilde;o, 

                              conforme plano do concurso.</td>

                          </tr>

                        </table></td>

                      <td valign="top"> 

                        <? 

					  $sqlConc = mysql_query("SELECT * FROM concursos WHERE id='$idConcurso'");

					  while ($resultConc = mysql_fetch_array($sqlConc)) {

					  	$sqlIns = mysql_query("SELECT * FROM formulario WHERE idConcurso='$idConcurso'");

						if($resultIns = mysql_fetch_array($sqlIns)) {

							if($nivel=='Nível Fundamental Incompleto') {

								$valor = $resultIns['valor1'];

							} elseif($nivel=='Nível Fundamental Completo') {

								$valor = $resultIns['valor2'];

							} elseif($nivel=='Nível Médio') {

								$valor = $resultIns['valor3'];

							} elseif($nivel=='Nível Superior') {

								$valor = $resultIns['valor4'];

							}

						}

					  	echo $resultConc['contratante'].'<br>';

					  	echo $resultConc['contato'].'<br>';

					  	echo $resultConc['telefone'].'<br>';

					  	echo $resultConc['endereco'].'<br>';						

					  	echo $resultConc['local'].'<br>';

						$banco = strtolower($resultConc['observacoes']);

						if($resultConc['tipo_inscricoes']=='deposito') {

							echo '<br><p align="justify">Para efetivar sua inscrição, faça um depósito identificado na boca do caixa, Não será aceito pagamento da taxa de inscrição pelos Correios, fac-símile, transferência eletrônica, ordem de pagamento ou outro meio que não seja através de depósito identificado na boca do caixa. O candidato deverá avisar ao caixa que o comprovante de depósito deverá conter seu NOME ou CPF para sua identificação. O candidato que efetuar o pagamento que não seja através do depósito identificado com seu NOME ou CPF não terá sua inscrição homologada.<br>Valor (R$): '.$valor.'<br>'.$resultConc['observacoes'].'<br>Ag: '.$resultConc['agencia'].'<br>Conta Corrente : '.$resultConc['conta'].'<br>'.$resultConc['cedente'].'</p>';

						} elseif($resultConc['tipo_inscricoes']=='boleto') {

							echo '<br><a href="boletos/boleto_'.$banco.'.php?nInscricao='.$nInscricao.'&nivel='.$checkCargo[1].'&idConcurso='.$idConcurso.'&numeroDoDocumento='.$numeroDoDocumento.'"><img src="imagens/geradorboleto.jpg" border="0"></a>';

						}

					  }

					  ?>

						<br><br>
						<!--
						<table width="100%" border="2" cellspacing="0" cellpadding="0">

                          <tr>

                            <td align="center"><? echo $situacao; ?></td>

                          </tr>

                        </table>
                        -->

                      </td>

                    </tr>

                  </table> 

                  <? 

				  	} else { 

					echo '

					<table>

					<tr> 

                      <td>Ocorreu os Seguintes Erros no ato da inscrição</td>

                      <td>'.$errors.'</td>

                    </tr>

                  	</table>

					';

					echo '<script>alert("'.$errors.'");history.back(1);</script>';

					}

					}// Fim do cadastramento

				  ?>

                  <!-- Fim da Marcação do Centro da Página -->

                </td>

              </tr>

              <tr> 

                <td height="20" align="center" bgcolor="#97B1C0"> <p align="center" class="endereco"> 

                    208 Sul, Av. LO 03, Lote 10, Centro, Palmas/TO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;Fone: 

                    (63) 3213-2137 / 3213-1062 / 3225-4441 </p></td>

              </tr>

</table><map name="Map">

  <area shape="circle" coords="11,11,7" href="index.php" target="_parent" alt="P&aacute;gina Inicial">

  <area shape="circle" coords="34,11,8" href="faleconosco.php" target="mainframe" alt="Fale Conosco">

  <area shape="circle" coords="56,11,8" href="scripts/admin.php" target="_parent" alt="Administra&ccedil;&atilde;o">

</map>

</body>

</html>
