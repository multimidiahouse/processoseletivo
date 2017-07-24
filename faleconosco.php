<?php $thisfile = $_SERVER['PHP_SELF']; ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?php 

	if ($_POST['enviar'] == 'enviar') {

	

	$nome = $_POST['nome'];

	$email = $_POST['email'];

	$mensagem = $_POST['mensagem'];

	

	$corpo = "

	<head>

	<title>Contato - Website</title>

	<style>

	.style7 {

	font-family:Arial;

	font-size: 12px;

	text-decoration:none;

	color:#006699;

	}

	.style7:hover {

	color:#0066CC;

	}

	</style>

	</head>

	<body>

	<p>Segue os dados do contato!</p>

	<table class=style7 width=100%  border=0>

  	<tr>

    <td width=17%>Contato:</td>

    <td width=83%>$nome</td>

  	</tr>

  	<tr>

    <td>email</td>

    <td>$email</td>

  	</tr>

  	<tr>

    <td>Mensagem</td>

    <td>$mensagem</td>

  	</tr>

	</table>

	</body>

	</html>";



			include "scripts/conexao.php";

			/*

			$enviar = "SELECT * FROM mensagens WHERE titulo='faleconosco'";

			$sql = mysql_query($enviar);

			if ($result = mysql_fetch_array($sql)) {

				$send = $result['conteudo'];

			}*/

			$send = 'skalamas@terra.com.br';
			
			//$send = 'yuri_designer@msn.com';





	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

	$headers .= "From: Contato Website <".$email.">\n";

	mail("$send", "Fale Conosco", $corpo, $headers);

	echo '<span class="faleconosco">email enviado com sucesso!</span>';

	}

?>

<style>

/*body {

	scrollbar-arrow-color:#000000;

	scrollbar-3dlight-color:#CCCCCC;

	scrollbar-highlight-color:#CCCCCC;

	scrollbar-face-color:#FFFFFF;

	scrollbar-shadow-color:#CCCCCC;

	scrollbar-darkshadow-color:#CCCCCC;

	scrollbar-track-color:#FFFFFF;

	

background-color: transparent;

}*/

form {

padding-left:5;

padding-top:5;

padding-right:5;

padding-bottom:5;

font-family:Arial, Helvetica, sans-serif;

font-size:11px;

text-decoration:none;

color:#333333;

}

.faleconosco {

padding-left:5;

padding-top:5;

padding-right:5;

padding-bottom:5;

font-family:Arial, Helvetica, sans-serif;

font-size:11px;

text-decoration:none;

color:#333333;

}

</style>

<p align="justify">&nbsp;</p>

<p align="center" class="faleconosco"><strong>FALE CONOSCO</strong></p>

<p align="justify" class="faleconosco">

Rua Dr Epaminondas Bandeira Mello, 291 Bairro Pq. Das Americas<br>

Cep 38045-270<br>

Fone: (34) 3312-3382<br>

Uberaba - MG</p>

<form name="form1" action="<? echo $thisfile; ?>?faleconosco=yes" method="post">

Nome:<br>

<input type="text" name="nome" size="25"><br>

Email:<br>

<input type="text" name="email" size="25"><br>

Mensagem:<br>

<textarea name="mensagem" cols="25" rows="10"></textarea><br>

<input type="submit" name="enviar" value="enviar"><input type="reset" name="limpar">

</form>