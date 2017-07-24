<?php
include "scripts/conexao.php"; 
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<META NAME="autor" CONTENT="Yuri Thomaz" />
<style>
body {
	background-image:url(imagens/background.jpg);
	background-position:top center;
	background-repeat:repeat-x;
	background-attachment:fixed;
	scrollbar-arrow-color:#000000;
	scrollbar-3dlight-color:#CCCCCC;
	scrollbar-highlight-color:#CCCCCC;
	scrollbar-face-color:#FFFFFF;
	scrollbar-shadow-color:#CCCCCC;
	scrollbar-darkshadow-color:#CCCCCC;
	scrollbar-track-color:#FFFFFF;
	margin-left:0;
	margin-top:0;
	margin-bottom:0;
	margin-right:0;
	font-family:Arial;
	font-size:12px;
	font-weight:50;
	text-decoration:none;
	color:#000000;
}
.data {
	font-family:Arial;
	font-size:11px;
	font-weight:bold;
	text-decoration:none;
	color:#000000;
}
.contador {
	font-family:Arial;
	font-size:11px;
	font-weight:bold;
	text-decoration:none;
	color:#FFFFFF;
}
.menulateral {
	font-family:Arial;
	font-size:11px;
	font-weight:bold;
	text-decoration:none;
	color:#FFFFFF;
}
.endereco {
	font-family:Arial;
	font-size:12px;
	text-decoration:none;
	color:#FFFFFF;
}
a.menu {
	font: 11px Arial, Helvetica, sans-serif;
	font-weight:bold;
	color:#FFFFFF;
	text-decoration:none
}
a.menu:hover {
 color:#FFFFFF;
 background-color:#A78B6B;
}
</style>
<title>.:| Santos e Correia da Rocha Advocacia |:.</title>
<script type="text/javascript" src="functions.js"></script>
</head>
<body>
<!-- Paginação -->
<table width="775" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr> 
		<td height="250" align="center">
        <img src="imagens/topoimagem.jpg" border="0" />
		</td>
	</tr>
	<tr>
		<td height="20" bgcolor="#A78B6B">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="11%">
						<img src="imagens/space.gif" width="20" height="2"><img src="imagens/favicones.gif" width="68" height="20" border="0" usemap="#Map">
					</td>
					<td width="54%" align="right"><span class="contador"><?php include 'scripts/mostra_visita.php'; ?></span></td>
					<td width="25%" align="right" style="padding-right:10px;"><span class="data"><?php include 'scripts/mostra_data.php';?></span></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="20" valign="top">
			<table width="775" height="590" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr> 
					<td width="150" valign="top" bgcolor="#EEDBA8"><?php include 'scripts/mostra_menu.php'; ?></td>
					<td width="625" valign="top">
					<?php
						if (isset($_REQUEST['modelos'])) {
							echo '<iframe width="625" height="590" name="mainframe" scrolling="auto" frameborder="0" src="modelos.php?table='.$_REQUEST['table'].'"></iframe>';
						} elseif (isset($_REQUEST['faleconosco'])) {
							include 'faleconosco.php';
						} elseif (isset($_REQUEST['downloads'])) {
							include 'downloads.php';
						} else {
							include 'conteudo.php';
						}
					?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr> 
		<td height="35" align="center" bgcolor="#A78B6B">
			<p align="center" class="endereco">
            Rua Dr Epaminondas Bandeira Mello, 291 Bairro Pq. Das Americas
            Cep 38045-270 Uberaba - MG
			Fone: (34) 3312-3382
			</p>
		</td>
	</tr>
</table>
<map name="Map">
	<area shape="circle" coords="11,11,7" href="index.php" target="_parent" alt="P&aacute;gina Inicial">
	<area shape="circle" coords="34,11,8" href="index.php?faleconosco=yes" target="_parent" alt="Fale Conosco">
	<area shape="circle" coords="56,11,8" href="scripts/" target="_parent" alt="Administra&ccedil;&atilde;o">
</map>
<!-- Paginação -->
</body>
</html>