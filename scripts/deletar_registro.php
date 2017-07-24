<?php 
	if (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'noticias')) {

		include "conexao.php";
		$table = $_REQUEST['table'];
		$id = $_REQUEST['id'];
		mysql_query ("DELETE FROM $table WHERE id = '$id'");
		echo "Imagem deletada com sucesso <a href=javascript:history.go(-1);>Clique aqui</a> para voltar";

	} elseif (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'parceiros')) {

		include "conexao.php";
		$id = $_REQUEST['id'];
		$sql = "SELECT * FROM parceiros WHERE id = '$id'";
		$result = mysql_query($sql);
		if ($result) {
			$rs = mysql_fetch_array($result);
			$file = "../imagens/parceiros/$rs[arquivo]";
			mysql_query("DELETE FROM parceiros WHERE id = '$id'");
			if(file_exists($file)) {
			unlink($file);
			}
			mysql_close($con);
			echo "Imagem deletada com sucesso <a href=javascript:history.go(-1); class=td>Clique aqui</a> para voltar";			
		}
	}

?>