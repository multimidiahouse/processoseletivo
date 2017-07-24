<?php
	$datavisita = date("d/m/Y");
	$horavisita = date("H:i");
	$ipvisita = $_SERVER['REMOTE_ADDR'];
	$checkvisita = mysql_query("SELECT * FROM contador WHERE ip='$ipvisita' AND data='$datavisita'");
	$validavisita = mysql_num_rows($checkvisita);
	$contador = mysql_query("SELECT * FROM contador");
	$qtdcontador = mysql_num_rows($contador);
	if ($qtdcontador <> 0 and $seevisita = mysql_fetch_array($contador)) {
		$setvisita = $seevisita['numerodavisita'] + 1;
	} else {
		$setvisita = 1;
	}

	//if ($validavisita == 0) {
		$sqlvisita = mysql_query("INSERT INTO contador(id, data, hora, ip, numerodavisita) VALUES (NULL, '$datavisita', '$horavisita', '$ipvisita', '$setvisita')");
	//}

	/*if ($setvisita <= 9) {
		echo 'visitante nº: 000'.$qtdcontador;
	} elseif ($setvisita > 9 and $setvisita <= 99) {
	  	echo 'visitante nº: 00'.$qtdcontador;
	} elseif ($setvisita > 99 and $setvisita <= 999) {
	  	echo 'visitante nº: 0'.$qtdcontador;
	} elseif ($setvisita > 999 and $setvisita <= 9999) {
	  	echo 'visitante nº: '.$qtdcontador;
	}*/

?>