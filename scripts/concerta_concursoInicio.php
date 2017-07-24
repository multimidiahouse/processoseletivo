<?

include 'conexao.php';

$meses = array('January','February','March','April','May','June','July','August','September','October','November','December');



$sql = mysql_query("SELECT * FROM concursos ORDER BY id DESC");

while($result=mysql_fetch_array($sql)) {

	if(strpos($result['inicio'],'/')) {

		$formata_inicio = explode('/',$result['inicio']);

		$inicio = $formata_inicio[0].' '.$meses[$formata_inicio[1]-1].' '.$formata_inicio[2].' 00:00:00';

		$update = mysql_query("UPDATE concursos SET inicio='$inicio' WHERE id='$result[id]'");

		echo 'Data Antiga: '.$result['inicio'].' - ';

		echo 'Data Nova: '.$inicio.'<br>';

	}

}

?>