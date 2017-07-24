<style>
body {
margin-left:0;
margin-top:0;
margin-bottom:0;
margin-right:0;
}
.tituloconteudo {
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
	color:#000000;
}
p {
	font-family:Arial;
	font-size:11px;
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
#concurso {
	background-color:transparent;
}
#concurso:hover {
	background-color:#CCC;
}
</style>
<?php
if (isset($_REQUEST['conteudo'])) {
	$idmenu = $_REQUEST['idmenu'];
	$sqlMenu = mysql_query("SELECT * FROM menu WHERE id='$idmenu'");
	if ($resultMenu = mysql_fetch_array($sqlMenu)) {
		if ($resultMenu['fonte'] == 'concursos') {
			$situacao = $resultMenu['categoria'];
?>
<table style="padding-left:10px; padding-top:10px; padding-right:10px;" width="95%"  border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="3" class="tituloconteudo" style="padding-left:5px">
	<?php echo $_REQUEST['conteudo']; ?><br>
	<img src="imagens/divisoria.jpg" width="213" border="0"><br><br><br>
	</td>
  </tr>
  <tr>
    <td width="70%"><b>Contratante</b></td>
    <td width="15%"><b>Telefone</b></td>
    <td width="15%"><b>Fax</b></td>
  </tr>
	<?php 
	include "scripts/conexao.php"; 
	$conteudo = $_REQUEST['conteudo'];
	$hoje = time('d/m/Y H:i');
	$sqlMenu = mysql_query("SELECT * FROM concursos WHERE situacao='$situacao' ORDER BY id DESC");
	while ($x = mysql_fetch_array($sqlMenu)) {
		if(strtotime($x['inicio'])<=$hoje) {
		echo '
		<tr id="concurso" height="50px">
		<td width="50%"><a class="conteudo" href="index.php?downloads=yes&files=andamento&idConcurso='.$x['id'].'" target="_self">'.$x['contratante'].'</a></td>
		<td width="25%" class="conteudo">'.$x['telefone'].'</td>
		<td width="25%" class="conteudo">'.$x['fax'].'</td>
		</tr>';
		}
	}
	?>
</table>
<p>&nbsp;</p>
<?php
		} elseif ($resultMenu['fonte'] == 'conteudos') {
?>
<table width="95%" height="450" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td valign="top" style="padding-left:10px; padding-top:10px; padding-right:10px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td valign="top" style="padding-left:5px">
                <?php 
				include "scripts/conexao.php"; 
				$conteudo = $_REQUEST['conteudo'];
				$sqlMenu = mysql_query("SELECT * FROM conteudos WHERE operador='$conteudo' ORDER BY id DESC LIMIT 1");
				while ($x = mysql_fetch_array($sqlMenu)) {
				?>				
				<p class="conteudo" align="justify"> 
                    <span class="tituloconteudo"><? echo $x['titulo']; ?></span><br>
                    <img src="imagens/divisoria.jpg" width="213" border="0"><br><br><br>
                    <? echo $x['texto']; ?></p>
					<p>&nbsp;</p>
				<?php } ?>	
				</td>
              </tr>
            </table>
			</td>
  </tr>
</table>
<?php
		} elseif ($resultMenu['fonte'] == 'documentos') {
?>
<table style="padding-left:10px; padding-top:10px; padding-right:10px;" width="95%"  border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="3" class="tituloconteudo" style="padding-left:5px">
	<?php echo $_REQUEST['conteudo']; ?><br>
	<img src="imagens/divisoria.jpg" width="213" border="0"><br><br><br>
	</td>
  </tr>
  <tr>
    <td width="70%"><b>Nome do Documento</b></td>
    <td width="15%"><b>Tipo</b></td>
    <td width="15%"><b>Download</b></td>
  </tr>
	<?php 
	include "scripts/conexao.php"; 
	$conteudo = $_REQUEST['conteudo'];
	$sqlDocs = mysql_query("SELECT * FROM documentos WHERE idConcurso='$_REQUEST[conteudo]' AND status='publicado' ORDER BY ordem ASC");
	while ($x = mysql_fetch_array($sqlDocs)) {
		$href = explode('/', $x['href']);
		echo '
		<tr>
		<td width="70%"><a class="conteudo" href="'.$href[0].'/'.$href[1].'/'.rawurlencode($href[2]).'" target="_blank">'.$x['nome'].'</a></td>
		<td width="15%" class="conteudo"><img src="'.$x['tipo'].'" width="25" height="25" border="0"></td>
		<td width="15%"><a class="conteudo" href="'.$href[0].'/'.$href[1].'/'.rawurlencode($href[2]).'" target="_blank"><img src="imagens/download.jpg" border="0"></a></td>
		</tr>';
	}
	?>
</table>
<?php
		}
	}
} elseif (isset($_REQUEST['noticia'])) { 
		$noticia = $_REQUEST['noticia'];
		include "scripts/conexao.php"; 
		$sqlNot = mysql_query("SELECT * FROM noticias WHERE id='$noticia'");
		while ($x = mysql_fetch_array($sqlNot)) {
			if ($x['imagem'] == '') {
			echo '<center><p style="width:90%; padding-top:10px; padding-bottom:10px;" class="conteudo" align="justify"> 
			<span class="tituloconteudo">'.$x['titulo'].'</span><br><br>
			<img src="imagens/divisoria.jpg" width="213" border="0"><br><br><br>
			'.$x['noticia'].'</p></center>';
			} else {
			$srcNot = explode('/', $x['imagem']);									
			echo '<center><div align="justify" style="width:90%; padding-top:10px; padding-bottom:10px;"><img width="187" height="140" hspace="10" align="right" vspace="10" border="0" src="imagens/'.$srcNot[1].'/'.rawurlencode($srcNot[2]).'">'.$x['noticia'].'</div></center>';
			}
		}
?>
<?php } else { ?>
<table width="625" height="450" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
                      <td width="425" valign="top" style="padding-left:10px; padding-top:10px; padding-right:10px;">
					  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td height="140" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
								<?php 
								include "scripts/conexao.php"; 
								$sqlNotDest = mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 7");
								while ($x = mysql_fetch_array($sqlNotDest)) {
								?>
                                <tr> 
                                  <td valign="top" style="padding-left:5px"><!--<a href="<? echo "index.php?noticia=$x[id]"; ?>" target="_self">--><p class="noticias" align="justify"> 
                                      <span class="titulonoticias"><? echo $x['titulo']; ?></span><br>
                                      <img src="imagens/divisoria.jpg" width="213" border="0"><br>
                                      <?php echo $x['noticia']; ?></p><p>&nbsp;</p>
									  <?php
									  if (! $x['imagem'] == '') {
									  ?>
										<br><br><div style="float:left;"><a href="index.php?downloads=yes&files=andamento&idConcurso=<?  echo $x['idConcurso']; ?>"><img src="imagens/<? echo $x['imagem']; ?>.gif" border="0"></a></div><div style="float:left;margin-left:20px;padding-top:3px;"><img onclick="shareFace('<? echo 'http://www.municipioassessoria.com.br/';?>');" style="cursor:pointer;" src="imagens/shareface.gif" border="0"></div>									   
									  <?php
									  }
									  ?>
									  <div style="clear:both;">&nbsp;</div>
									  <!--</a>--></td>
                                </tr>
								<?php } // Fim da While ?>
								
								<?php /*
								include "scripts/conexao.php"; 
								$sqlNotDest = mysql_query("SELECT * FROM noticias WHERE destaque='sim' ORDER BY id DESC LIMIT 1");
								while ($x = mysql_fetch_array($sqlNotDest)) {
									if ($x['imagem'] == '') {
									echo '<td width="5" height="140">&nbsp;</td>';
									} else {
									$srcNot = explode('/', $x['imagem']);									
									echo '<td width="187"><a href="index.php?noticia='.$x['id'].'" target="_self"><img border="0" src="imagens/'.$srcNot[1].'/'.rawurlencode($srcNot[2]).'" width="187" height="140"></a></td>';
									}
								?>
                                  <td valign="top" style="padding-left:5px"><a href="<? echo "index.php?noticia=$x[id]"; ?>" target="_self"><p class="noticias" align="justify"> 
                                      <span class="titulonoticias"><? echo $x['titulo']; ?></span><br>
                                      <img src="imagens/divisoria.jpg" width="213" border="0"><br>
                                      <? echo $x['chamada']; ?></p></a></td>
								<? } // Fim da While*/ ?>
                                </tr>
                              </table></td>
                          </tr>
						  <!--
                          <tr> 
                            <td height="135" align="center" valign="top"><span class="titulonoticiasanteriores">NOT&Iacute;CIAS 
                              ANTERIORES</span><br> <img src="imagens/divisoria.jpg" border="0"><br> 
                              <table class="noticiasanteriores" width="100%" height="120" border="0" cellpadding="0" cellspacing="5">
                                <tr> 
									<td width="50%" valign="top" align="justify">
								<?php 
								//include "scripts/conexao.php"; 
								//$sqlNotDest = mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 0,4");
								//while ($x = mysql_fetch_array($sqlNotDest)) {
								//echo '<a class="noticiasanteriores" href="index.php?noticia='.$x['id'].'" target="_self">&raquo; '.$x['data'].' - '.$x['titulo'].'</a><br><br>';
								//}
								?>
									</td>
                                  <td width="50%" valign="top" align="justify">
								<?php 
								//include "scripts/conexao.php"; 
								//$sqlNotDest = mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 4,4");
								//while ($x = mysql_fetch_array($sqlNotDest)) {
								//echo '<a class="noticiasanteriores" href="index.php?noticia='.$x['id'].'" target="_self">&raquo; '.$x['data'].' - '.$x['titulo'].'</a><br><br>';
								//}
								?>								  
								  </td>
                                </tr>
                              </table></td>
                          </tr>
						  -->
                        </table></td>
                      <td width="200" valign="top"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
                            <td class="menulateral" style="padding-left:5px;" height="20" bgcolor="#A78B6B"><font color="#EEDBA8">&raquo;</font> 
                              DESTAQUES</td>
                          </tr>
                          <tr> 
                            
          <td width="200" align="center" valign="top" style="background-image:url(imagens/backdest.jpg); background-position:center top; background-repeat:repeat-y;"> 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Municipio Assessoria -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-5075057333402288"
     data-ad-slot="6648432755"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
            <table width="90%" border="0" cellspacing="0" cellpadding="0">
				<?php 
				include "scripts/conexao.php";
				$sqlDestaques = mysql_query("SELECT * FROM destaques ORDER BY id DESC LIMIT 5");
				while ($result = mysql_fetch_array($sqlDestaques)) {
				//echo $result[4];
				if ($result[8] == '') {
				if ($result[4] == '') {
				echo '
                                <tr> 
                                  <td align="center">'.$result[1].'</td>
                                </tr>
				';
				} else {
				$src = explode("/", $result[4]);
				echo '
                                <tr> 
                                  <td align="center"><img src="'.$src[0].'/'.$src[1].'/'.rawurlencode($src[2]).'" style="width:'.$result[6].'; height:'.$result[7].';" border="0"></td>
                                </tr>
				';				
				}// Fim do $result[4] empty
				} else {
				if ($result[4] == '') {
				echo '
                                <tr> 
                                  <td align="center"><a href="'.$result[8].'" target="_blank">'.$result[1].'</a></td>
                                </tr>
				';
				} else {
				$src = explode("/", $result[4]);
				echo '
                                <tr> 
                                  <td align="center"><a href="'.$result[8].'" target="_blank"><img src="'.$src[0].'/'.$src[1].'/'.rawurlencode($src[2]).'" style="width:'.$result[6].'; height:'.$result[7].';" border="0"></a></td>
                                </tr>
				';				
				}				
				}// Fim do $result[8] empty
				
				} // Fim da While
				?>
                              </table>
                              <center>
                                
              <p align="justify" style="width:160px" class="noticiasanteriores">&nbsp;</p>
                              </center></td>
                          </tr>
                          <tr> 
                            <td class="menulateral" height="20" style="background-image:url(imagens/rodapedest.jpg); background-position:center bottom; background-repeat:no-repeat;">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
</table>
<?php } ?>