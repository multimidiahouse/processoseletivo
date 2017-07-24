<? session_start(); ?>

<style>

	body {

		background-color: #CCCCCC;

		margin-left:0;

		margin-top:0;

		margin-right:0;

		margin-bottom:0;

		font-family:Arial, Helvetica, sans-serif;

		font-size:11px;

		text-decoration:none;

		color:#333333;

	}

	a {

		font-family:Arial, Helvetica, sans-serif;

		font-size:14px;

		color:#666;

		text-decoration:none;

		padding-left:10px;

		padding-right:10px;

	}

	a:hover {

		background-color:#000;

		color:#FFF;

	}

</style>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td height="30" align="center">

    <?

	if($_SESSION['menu'] == 'S') {

		echo '<a href="mod_admin_conteudo.php?table=menu" target="mainFrame">Menu</a>';

	}

	if($_SESSION['concursos'] == 'S') {

		echo '<a href="mod_admin_conteudo.php?table=concursos" target="mainFrame">Concursos</a>';

	}

	if($_SESSION['conteudos'] == 'S') {

		echo '<a href="mod_admin_conteudo.php?table=conteudos" target="mainFrame">Conteúdos</a>';

	}

	if($_SESSION['noticias'] == 'S') {

		echo '<a href="mod_admin_conteudo.php?table=noticias" target="mainFrame">Notícias</a>';

	}	

	if($_SESSION['documentos_seguros'] == 'S') {

		echo '<a href="mod_admin_conteudo.php?table=documentosseguros" target="mainFrame">Documentos Seguros</a>';

	}

	if($_SESSION['documentos_publicos'] == 'S') {

		echo '<a href="mod_admin_conteudo.php?table=documentos" target="mainFrame">Documentos Públicos</a>';

	}

	if($_SESSION['destaques'] == 'S') {

		echo '<a href="mod_admin_conteudo.php?table=destaques" target="mainFrame">Destaques</a>';

	}

	if($_SESSION['usuarios'] == 'S') {

		echo '<a href="mod_admin_conteudo.php?table=usuarios" target="mainFrame">Usuários</a>';

	}

	?>

    </td>

    <td width="15%" align="center"><a href="../" target="_blank">ver site &gt;&gt;</a></td>

  </tr>

</table>

<map name="Map">

  <area shape="rect" coords="7,6,43,25" href="mod_admin_conteudo.php?table=menu" target="mainFrame">

  <area shape="rect" coords="72,8,171,24" href="mod_admin_conteudo.php?table=concursos" target="mainFrame">

  <area shape="rect" coords="193,6,258,24" href="mod_admin_conteudo.php?table=conteudos" target="mainFrame">

  <area shape="rect" coords="283,6,334,24" href="mod_admin_conteudo.php?table=noticias" target="mainFrame">

  <area shape="rect" coords="354,7,475,24" href="mod_admin_conteudo.php?table=documentosseguros" target="mainFrame">

  <area shape="rect" coords="634,8,697,25" href="mod_admin_conteudo.php?table=destaques" target="mainFrame">

  <area shape="rect" coords="717,8,771,23" href="mod_admin_conteudo.php?table=usuarios" target="mainFrame">

  <area shape="rect" coords="495,9,618,23" href="mod_admin_conteudo.php?table=documentos" target="mainFrame">

</map>

<map name="Map2">

  <area shape="circle" coords="91,77,56" href="http://www.municipioassessoria.com.br" target="_parent" alt="Página Inicial">

</map>

