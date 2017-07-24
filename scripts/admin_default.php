<style>
body {
	scrollbar-arrow-color:#000000;
	scrollbar-3dlight-color:#333333;
	scrollbar-highlight-color:#333333;
	scrollbar-face-color:#333333;
	scrollbar-shadow-color:#CCCCCC;
	scrollbar-darkshadow-color:#CCCCCC;
	scrollbar-track-color:#CCCCCC;
	background-color: transparent;
	margin-left:0;
	margin-top:0;
	margin-right:0;
	margin-bottom:0;
}
</style>
<?
include "conexao.php";
if (isset($_REQUEST['tabela']) and ($_REQUEST['tabela'] == 'menu')) {
	$table = $_REQUEST['tabela'];
?>
<table width="725" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">Inserir</td>
    <td align="center">Visualizar</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<?	
	$sql = mysql_query("SELECT * FROM $table ORDER BY id");
	while ($result = mysql_fetch_array($sql)) {
?>
<br>
<table width="725" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20" height="21" align="center"><img src="img/alterar.jpg" width="13" height="15"></td>
    <td width="20" align="center"><img src="img/excluir.jpg" width="15" height="15"></td>
    <td width="40" align="center"><? echo $result['id']; ?></td>
    <td><? echo $result['titulo']; ?></td>
    <td width="40" align="center"><? echo $result['ordem']; ?></td>
    <td width="100" align="center"><? echo $result['status']; ?></td>
    <td width="100" align="center"><? echo $result['estilo']; ?></td>
  </tr>
</table>
<? 	} // Fim do loop de resultados
} else { echo "erro de pagina"; }
?>