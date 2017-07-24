<? 
					include 'scripts/conexao.php';

					$nInscricao = 'CT'.rand(0,99999);
					$sqlInsc = mysql_query("SELECT * FROM inscricoes WHERE nInscricao='$set'");
					$contInsc = mysql_num_rows($sqlInsc);
					$resultInsc = mysql_fetch_array($sqlInsc);
						if  ($contInsc == 0) {
							$numeroDoDocumento = $nInscricao;							
						} else {
							$setNew = $nInscricao;
							while ($setNew <> $resultInsc['nInscricao']) {
							$setNew = 'CT'.rand(0,9999);							
							$nInscricao = $setNew;
							$numeroDoDocumento = $nInscricao;														
							}
						}
						echo $nInscricao;
						echo $numeroDoDocumento;
						if (isset($setNew)) { echo $setNew; }

?>