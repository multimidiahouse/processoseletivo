<?php
	echo '<table border="0" cellpadding="4" cellspacing="0">';
	//$sqlMenu = mysql_query("SELECT * FROM menu WHERE status='publico' ORDER BY ordem ASC LIMIT 0,15");
	$sqlMenu = mysql_query("SELECT * FROM menu WHERE status='publico' ORDER BY ordem");
	while ($x = mysql_fetch_array($sqlMenu)) {
		if($x['link'] == 'sim') { 
			if ($x['fonte'] == 'documentosseguros') {
				if ($x['estilo'] == 'topico') {
					echo '<tr><td class="menulateral" style="padding-left:5px;" height="20" bgcolor="#A78B6B"><font color="#EEDBA8">&raquo;</font> <a class="menu" href="index.php?idmenu='.$x['id'].'&modelos=yes&table='.$x['titulo'].'" target="_parent">'.strtoupper($x['titulo']).'</a></td></tr>';
				} else {
					echo '<tr><td class="menulateral" style="padding-left:5px;" height="20"><a class="menu" href="index.php?idmenu='.$x['id'].'&modelos=yes&table='.$x['titulo'].'" target="_parent">'.strtoupper($x['titulo']).'</a></td></tr>';
				}
			} elseif ($x['fonte'] == 'contatos') {
				if ($x['estilo'] == 'topico') {
					echo '<tr><td class="menulateral" style="padding-left:5px;" height="20" bgcolor="#A78B6B"><font color="#EEDBA8">&raquo;</font> <a class="menu" href="index.php?idmenu='.$x['id'].'&faleconosco=yes" target="_parent">'.strtoupper($x['titulo']).'</a></td></tr>';
				} else {
					echo '<tr><td class="menulateral" style="padding-left:5px;" height="20"><a class="menu" href="index.php?idmenu='.$x['id'].'&faleconosco=yes" target="_parent">'.strtoupper($x['titulo']).'</a></td></tr>';
				}
			//} elseif ($x['fonte'] == 'conteudos' or $x['fonte'] == 'documentos') {
			} else {
				if ($x['estilo'] == 'topico') {
					echo '<tr><td class="menulateral" style="padding-left:5px;" height="20" bgcolor="#A78B6B"><font color="#EEDBA8">&raquo;</font> <a class="menu" href="index.php?idmenu='.$x['id'].'&conteudo='.$x['titulo'].'" target="_parent">'.strtoupper($x['titulo']).'</a></td></tr>';
				} else {
					echo '<tr><td class="menulateral" style="padding-left:5px;" height="20"><a class="menu" href="index.php?idmenu='.$x['id'].'&conteudo='.$x['titulo'].'" target="_parent">'.strtoupper($x['titulo']).'</a></td></tr>';
				}
			}
		} else {
			if ($x['estilo'] == 'topico') {
				echo '<tr><td class="menulateral" style="padding-left:5px;" height="20" bgcolor="#A78B6B"><font color="#EEDBA8">&raquo;</font>'.strtoupper($x['titulo']).'</td></tr>';
			} else {
				echo '<tr><td class="menulateral" style="padding-left:5px;" height="20">'.strtoupper($x['titulo']).'</td></tr>';
			}
		}
	}
	echo '</table>';
?>