<?
include 'mod_admin_conexao.php';
$sql = mysql_query("SELECT * FROM inscricoes WHERE idConcurso='143'");
while($result = mysql_fetch_array($sql)) {
	echo date('d/m/Y', $result['dataDeNascimento']).' - '.$result['dataDeNascimento'].'<br>';
}
?>