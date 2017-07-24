<?php 
session_start();
if ($_SESSION['login'] == 'logado') { 

	if (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'menu')) {

		include "conexao.php";
		$table = $_REQUEST['table'];
		$id = $_REQUEST['id'];
		mysql_query ("DELETE FROM $table WHERE id = '$id'");
		//echo "Item removido com sucesso <a href=javascript:history.go(-1);>Clique aqui</a> para voltar";
		header("location: mod_admin_conteudo.php?table=$table");
		
	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'concursos')) {
		$erros = 0;
		$errors = "";
		include "conexao.php";
		$id = $_REQUEST['id'];
		$table = $_REQUEST['table'];
		mysql_query ("DELETE FROM $table WHERE id = '$id'");
		mysql_query ("DELETE FROM formulario WHERE idConcurso = '$id'");
		$sql = mysql_query("SELECT * FROM documentos WHERE idConcurso = '$id'");
		while ($rs = mysql_fetch_array($sql)) {
			$file = $rs['arquivo'];
			$docid = $rs['id'];
			mysql_query("DELETE FROM documentos WHERE id = '$docid'");
			if(file_exists($file)) {
			unlink($file);
			} else {
			$erros++;
			$errors = $errors."erro ao deletar $file<br>";
			}
		}
		if ($erros == 0) {
		mysql_close($con);
		echo "Deletada com sucesso <a href=javascript:history.back(1); class=td>Clique aqui</a> para voltar";
		} else {
		echo "Foram encontrados os seguintes erros:<br>$errors";
		}
	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'noticias')) {
		$erros = 0;
		$errors = "";
		include "conexao.php";
		$id = $_REQUEST['id'];
		$table = $_REQUEST['table'];
		$sql = mysql_query("SELECT * FROM $table WHERE id = '$id'");
		while ($rs = mysql_fetch_array($sql)) {
			$file = "../$rs[imagem]";
			if(file_exists($file)) {
			unlink($file);
			} else {
			$erros++;
			$errors = $errors."erro ao deletar $file<br>";
			}
		}
		mysql_query ("DELETE FROM $table WHERE id = '$id'");				
		if ($erros == 0) {
		mysql_close($con);
		echo "Imagem deletada com sucesso <a href=javascript:history.go(-1); class=td>Clique aqui</a> para voltar";
		} else {
		echo "Foram encontrados os seguintes erros:<br>$errors";
		}
	} elseif (isset($_REQUEST['table']) and (($_REQUEST['table'] == 'documentos') or ($_REQUEST['table'] == 'documentosseguros'))) {
		$erros = 0;
		$errors = "";
		include "conexao.php";
		$id = $_REQUEST['id'];
		$table = $_REQUEST['table'];
		$sql = mysql_query("SELECT * FROM documentos WHERE id = '$id'");
		while ($rs = mysql_fetch_array($sql)) {
			$file = $rs['arquivo'];
			if(file_exists($file)) {
			unlink($file);
			} else {
			$erros++;
			$errors = $errors."erro ao deletar $file<br>";
			}
		}
		mysql_query ("DELETE FROM documentos WHERE id = '$id'");				
		if ($erros == 0) {
		mysql_close($con);
		echo "Imagem deletada com sucesso <a href=javascript:history.go(-1); class=td>Clique aqui</a> para voltar";
		} else {
		echo "Foram encontrados os seguintes erros:<br>$errors";
		}
	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'usuarios')) {

		include "conexao.php";
		$table = $_REQUEST['table'];
		$id = $_REQUEST['id'];
		mysql_query ("DELETE FROM $table WHERE id = '$id'");
		//echo "Item removido com sucesso <a href=javascript:history.go(-1);>Clique aqui</a> para voltar";
		header("location: mod_admin_conteudo.php?table=$table");
		
	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'destaques')) {
		$erros = 0;
		$errors = "";
		include "conexao.php";
		$id = $_REQUEST['id'];
		$table = $_REQUEST['table'];
		$sql = mysql_query("SELECT * FROM $table WHERE id = '$id'");
		while ($rs = mysql_fetch_array($sql)) {
			$file = "../$rs[imagem]";
			if(file_exists($file)) {
			unlink($file);
			} else {
			$erros++;
			$errors = $errors."erro ao deletar $file<br>";
			}
		}
		mysql_query ("DELETE FROM $table WHERE id = '$id'");				
		if ($erros == 0) {
		mysql_close($con);
		echo "Imagem deletada com sucesso <a href=javascript:history.go(-1); class=td>Clique aqui</a> para voltar";
		} else {
		echo "Foram encontrados os seguintes erros:<br>$errors";
		}
	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'conteudos')) {

		include "conexao.php";
		$table = $_REQUEST['table'];
		$id = $_REQUEST['id'];
		mysql_query ("DELETE FROM $table WHERE id = '$id'");
		//echo "Item removido com sucesso <a href=javascript:history.go(-1);>Clique aqui</a> para voltar";
		header("location: mod_admin_conteudo.php?table=$table");
	} elseif (isset($_REQUEST['table']) and ($_REQUEST['table'] == 'inscricoes')) {
		include "conexao.php";
		$table = $_REQUEST['table'];
		$id = $_REQUEST['id'];
		$idConcurso = $_REQUEST['idConcurso'];
		mysql_query ("DELETE FROM $table WHERE id='$id'");
		//echo "Item removido com sucesso <a href=javascript:history.go(-1);>Clique aqui</a> para voltar";
		header("location: mod_admin_conteudo.php?table=$table&idConcurso=$idConcurso");
	}
	
} else { echo "erro de pagina"; }
?>