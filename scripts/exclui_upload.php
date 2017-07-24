<?
if (isset($_REQUEST['acao']) and ($_REQUEST['acao'] == 'entrar')) {
		include "conexao.php";
		$id = $_REQUEST['id'];
		
		$sql = mysql_query("SELECT * FROM documentos WHERE id = '$id'");
		while ($rs = mysql_fetch_array($sql)) {

			$file = $rs['arquivo'];
			if(file_exists($file)) {
			unlink($file);
			} else {
			$erros++;
			$errors = $errors."erro ao deletar $file<br>";
			}

		mysql_query("DELETE FROM documentos WHERE id = '$id'");			
		}
		
		if ($erros == 0) {
		mysql_close($con);
		echo "Imagem deletada com sucesso <a href=javascript:history.go(-1); class=td>Clique aqui</a> para voltar";
		} else {
		echo "Foram encontrados os seguintes erros:<br>$errors";
		}
		
} else { echo 'erro de página'; }
?>