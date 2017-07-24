<?

include 'conexao.php';

$meses = array('January','February','March','April','May','June','July','August','September','October','November','December');



$sql = mysql_query("SELECT * FROM concursos ORDER BY id DESC");

while($result=mysql_fetch_array($sql)) {
	if($result['termino']=='' or $result['inicio']=='') {
		echo 'Limpo: '.$result['id'].'<br>';
		//$termino = date("d F Y H:i:s"); 
		//$update = mysql_query("UPDATE concursos SET termino='$termino' WHERE id='$result[id]'");		
	} elseif(strpos($result['termino'],'/')==true) {
		$formata_inicio = explode('/',$result['termino']);

		$termino = $formata_inicio[0].' '.$meses[$formata_inicio[1]-1].' '.$formata_inicio[2].' 00:00:00';

		$update = mysql_query("UPDATE concursos SET termino='$termino' WHERE id='$result[id]'");

		echo 'Data Antiga: '.$result['termino'].' - ';

		echo 'Data Nova: '.$termino.'<br>';

	} elseif(strlen($result['termino'])<=10) {
		if($result['termino']<0) {
			$termino = strtotime($result['inicio']) - ($result['termino'] * 86400);
		} else {
			$termino = strtotime($result['inicio']) + ($result['termino'] * 86400);
		}
		$termino = date('d F Y H:i:s',$termino);
		echo $result['id'].' - '.$result['inicio'].' - '.$termino.'<br>';
		$update = mysql_query("UPDATE concursos SET termino='$termino' WHERE id='$result[id]'");
	}

}

?>