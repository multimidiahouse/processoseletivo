<style>

body {

margin-bottom:0;

margin-left:0;

margin-right:0;

margin-top:0;

}
td {
	font-family:Arial;
	font-size:14px;
	color:#000;
	height:25px;
}

</style>

                  <? 

				  if (isset($_REQUEST['confirmaInscricao']) and $_REQUEST['confirmaInscricao']=='a6105c0a611b41b08f1209506350279e' and isset($_COOKIE['codV'])) {

				  	include 'scripts/conexao.php';

					$idConcurso = $_REQUEST['idConcurso'];
					$cpf = $_REQUEST['cpf'];

				  	$sqlInsc = mysql_query("SELECT * FROM inscricoes WHERE cpf='$cpf' AND idConcurso='$idConcurso' AND situacao='confirmado' ORDER BY id DESC LIMIT 1");

					$contInsc = mysql_num_rows($sqlInsc);

					if ($contInsc == 0) {

						die('Erro ao tentar localizar inscrição, entre em contato com a <a href="index.php?faleconosco=yes">Município Assessoria</a> para verificar o acontecimento');

					} else {

						if ($resultInsc = mysql_fetch_array($sqlInsc)) {

							$sqlConcurso = mysql_query("SELECT * FROM concursos WHERE id='$resultInsc[idConcurso]'");

							if($resultConcurso = mysql_fetch_array($sqlConcurso)) {

								$contratante = strtoupper($resultConcurso['contratante']);

							}
							$meses = array('January','February','March','April','May','June','July','August','September','October','November','December');
							$dataprint = date('d/m/Y H:i:s');
							$md5print = 'MACJ|'.(md5($resultInsc['nome'].'-'.$dataprint));
							
							$registra = mysql_query("UPDATE inscricoes SET md5print='$md5print',dataprint='$dataprint' WHERE idConcurso='$idConcurso' AND cpf='$cpf'");
							if(! $registra) {
								die('Falha de registro. Tente novamente mais tarde.');
							}

				  ?>

                        <table style="padding-left:10px; padding-top:10px; padding-right:10px;" width="775" height="200" border="1" cellspacing="0" cellpadding="0" align="center">

                          <tr>

                            <td align="center" valign="middle"><strong>ESTADO DO TOCANTINS<br /><?=$contratante;?><br />CONCURSO PÚBLICO<br />COMPROVANTE DE INSCRIÇÃO</strong></td>

                          </tr>

                          <tr>

                            <td>N&uacute;mero de Inscri&ccedil;&atilde;o:                            
                            <?

								if ($resultInsc['nInscricao']<9) {

									echo '00000'.$resultInsc['nInscricao'];

								} elseif ($resultInsc['nInscricao']>9 and $resultInsc['nInscricao']<=99) {

									echo '0000'.$resultInsc['nInscricao'];

								} elseif ($resultInsc['nInscricao']>99 and $resultInsc['nInscricao']<=999) {

									echo '000'.$resultInsc['nInscricao'];

								} elseif ($resultInsc['nInscricao']>999 and $resultInsc['nInscricao']<=9999) {

									echo '00'.$resultInsc['nInscricao'];

								} elseif ($resultInsc['nInscricao']>9999 and $resultInsc['nInscricao']<=99999) {

									echo '0'.$resultInsc['nInscricao'];

								} else {

									echo $resultInsc['nInscricao'];

								}

							 ?></td>

                          </tr>

                          <tr>

                            <td>Cargo: <? echo $resultInsc['cargo']; ?></td>

                          </tr>

                          <tr> 

                            <td>Nome:<? echo $resultInsc['nome']; ?></td>

                          </tr>

                          <tr>

                            <td>

                            <strong>IMPORTANTE:</strong><br />

                            Este cartão terá validade somente com a apresentação dos documentos originais descritos no edital;<br />

                            Compareça ao local de realização das provas com antecedência mínima de 30 (trinta) minutos do seu início;<br />

                            Levar caneta esferográfica azul ou preta.<br />

                            </td>

                          </tr>
                          <tr>
                            <td>Data de Impressão: <?=$dataprint;?> | CÓD.: <?=$md5print;?></td>
                          </tr>

                        </table>

				  <? } //Fim da While

				  } // Fim da Verificação

				  }

				  ?>