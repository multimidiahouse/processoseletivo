<?php



// +----------------------------------------------------------------------+



// | BoletoPhp - Versão Beta                                              |



// +----------------------------------------------------------------------+



// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |



// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |



// | Você deve ter recebido uma cópia da GNU Public License junto com     |



// | esse pacote; se não, escreva para:                                   |



// |                                                                      |



// | Free Software Foundation, Inc.                                       |



// | 59 Temple Place - Suite 330                                          |



// | Boston, MA 02111-1307, USA.                                          |



// +----------------------------------------------------------------------+







// +----------------------------------------------------------------------+



// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |



// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |



// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa				        |



// | 														                                   			  |



// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|



// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |



// +----------------------------------------------------------------------+







// +--------------------------------------------------------------------------------------------------------+



// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>              		             				|



// | Desenvolvimento Boleto Banco do Brasil: Daniel William Schultz / Leandro Maniezo / Rogério Dias Pereira|



// +--------------------------------------------------------------------------------------------------------+











// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //



// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//







include '../scripts/mod_admin_conexao.php';







$nInscricao = $_REQUEST['nInscricao'];



$idConcurso = $_REQUEST['idConcurso'];



$nossonumero = $_REQUEST['numeroDoDocumento'];







$sql = mysql_query("SELECT * FROM inscricoes WHERE nInscricao='$nInscricao' and idConcurso='$idConcurso'");



if($result = mysql_fetch_array($sql)) {



	$nome = $result['nome'];



	$cargo = $result['cargo'];



	$nivel = $result['nivel'];



	$cpf = $result['cpf'];



	$endereco_candidato = $result['endereco'];



	$local_candidato = $result['local'];



} else {



	die(mysql_error());



}







$sql = mysql_query("SELECT * FROM formulario WHERE idConcurso='$idConcurso'");



if($result = mysql_fetch_array($sql)) {



	$valor1 = $result['valor1'];



	$valor2 = $result['valor2'];



	$valor3 = $result['valor3'];



	$valor4 = $result['valor4'];



	$termino_inscricao = strtotime($result['termino']);



} else {



	die(mysql_error());



}











$sql = mysql_query("SELECT * FROM concursos WHERE id='$idConcurso'");



if($result = mysql_fetch_array($sql)) {



	$contratante = $result['contratante'];



	$cedente = $result['cedente'];



	$agencia = $result['agencia'];



	$conta = $result['conta'];



	$convenio = $result['convenio'];



	$contrato = $result['contrato'];



	$instrucao = $result['instrucao'];



	$cnpj = $result['cnpj'];



	$endereco = $result['endereco'];



	$local = $result['local'];



} else {



	die(mysql_error());



}







// DADOS DO BOLETO PARA O SEU CLIENTE



$dias_de_prazo_para_pagamento = 5;



$taxa_boleto = 0.00;



$data_venc = date("d/m/Y", $termino_inscricao);  // Prazo de X dias OU informe data: "13/04/2006"; 



//$data_venc = date("d/m/Y", time()+172800);







if($nivel=='Nível Fundamental Incompleto') {



	$valor_cobrado = $valor1;



} elseif($nivel=='Nível Fundamental Completo') {



	$valor_cobrado = $valor2;



} elseif($nivel=='Nível Médio') {



	$valor_cobrado = $valor3;



} elseif($nivel=='Nível Superior') {



	$valor_cobrado = $valor4;



} else {



	$valor_cobrado = '00,00';



}



 // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal







$valor_cobrado = str_replace(",", ".",$valor_cobrado);



$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');







$dadosboleto["nosso_numero"] = substr($nossonumero,0,5);



$dadosboleto["numero_documento"] = $nossonumero;	// Num do pedido ou do documento



$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA



$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto



$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)



$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula







// DADOS DO SEU CLIENTE



$dadosboleto["sacado"] = $nome;



$dadosboleto["endereco1"] = $endereco_candidato;



$dadosboleto["endereco2"] = $local_candidato;







// INFORMACOES PARA O CLIENTE



$dadosboleto["demonstrativo1"] = $nome;



$dadosboleto["demonstrativo2"] = $nivel.' - '.$cargo;



$dadosboleto["demonstrativo3"] = 'Concurso Público - '.$contratante;







// INSTRUÇÕES PARA O CAIXA



$dadosboleto["instrucoes1"] = $instrucao;



$dadosboleto["instrucoes2"] = '';



$dadosboleto["instrucoes3"] = '';



$dadosboleto["instrucoes4"] = '';







// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE



$dadosboleto["quantidade"] = "10";



$dadosboleto["valor_unitario"] = "10";



$dadosboleto["aceite"] = "N";		



$dadosboleto["especie"] = "R$";



$dadosboleto["especie_doc"] = "DM";











// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //











// DADOS DA SUA CONTA - BANCO DO BRASIL



$dadosboleto["agencia"] = $agencia; // Num da agencia, sem digito



$dadosboleto["conta"] = $conta; 	// Num da conta, sem digito







// DADOS PERSONALIZADOS - BANCO DO BRASIL



$dadosboleto["convenio"] = $convenio;  // Num do convênio - REGRA: 6 ou 7 ou 8 dígitos



$dadosboleto["contrato"] = $contrato; // Num do seu contrato



$dadosboleto["carteira"] = "18";



$dadosboleto["variacao_carteira"] = "-019";  // Variação da Carteira, com traço (opcional)







// TIPO DO BOLETO



$dadosboleto["formatacao_convenio"] = strlen($convenio); // REGRA: 8 p/ Convênio c/ 8 dígitos, 7 p/ Convênio c/ 7 dígitos, ou 6 se Convênio c/ 6 dígitos



if(strlen($convenio)==6) {



        $dadosboleto["formatacao_nosso_numero"] = "1"; // REGRA: Usado apenas p/ Convênio c/ 6 dígitos: informe 1 se for NossoNúmero de até 5 dígitos ou 2 para opção de até 17 dígitos



} else {



        $dadosboleto["formatacao_nosso_numero"] = "2"; // REGRA: Usado apenas p/ Convênio c/ 6 dígitos: informe 1 se for NossoNúmero de até 5 dígitos ou 2 para opção de até 17 dígitos



}







/*



#################################################



DESENVOLVIDO PARA CARTEIRA 18







- Carteira 18 com Convenio de 8 digitos



  Nosso número: pode ser até 9 dígitos







- Carteira 18 com Convenio de 7 digitos



  Nosso número: pode ser até 10 dígitos







- Carteira 18 com Convenio de 6 digitos



  Nosso número:



  de 1 a 99999 para opção de até 5 dígitos



  de 1 a 99999999999999999 para opção de até 17 dígitos







#################################################



*/











// SEUS DADOS



$dadosboleto["identificacao"] = $contratante;



$dadosboleto["cpf_cnpj"] = $cnpj;



$dadosboleto["endereco"] = $endereco;



$dadosboleto["cidade_uf"] = $local;



$dadosboleto["cedente"] = $cedente;







// NÃO ALTERAR!



include("include/funcoes_bb.php"); 



include("include/layout_bb.php");



?>



