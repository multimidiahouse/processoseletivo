<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa				        |
// | 																	                                    |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Real: Juan Basso         		                  |
// +----------------------------------------------------------------------+


// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE
//$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 1.90;
//$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
$hoje = date("Y-m-d");
if ($hoje < '2009-06-15') {
	$valor_cobrado = "20,00";
	$data_venc = time() + 172800;
	$data_venc = date("d/m/Y", $data_venc);
} else {
	$valor_cobrado = "30,00";
	$data_venc = '17/06/2009';
}



//$valor_cobrado = "20,00"; //$_REQUEST['VALOR_PAGAR']; //"20,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
//$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');
$valor_boleto=number_format($valor_cobrado, 2, ',', '');


$dadosboleto["nosso_numero"] = '00000'.$_REQUEST['NOSSO_NUMERO']; //"0000000123456";  // Nosso numero - REGRA: M�ximo de 13 caracteres!
$dadosboleto["numero_documento"] = $_REQUEST['NUM_DOCUMENTO']; //"1234567";	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $_REQUEST['NOME']; //"FACULDADE CAT�LICA DO TOCANTINS";
$dadosboleto["endereco1"] = $_REQUEST['ENDERECO']; //"Endere�o do seu Cliente";
$dadosboleto["endereco2"] = $_REQUEST['CIDADE'].' - '.$_REQUEST['UF'].' - '.$_REQUEST['CEP']; //"Cidade - Estado -  CEP: 00000-000";

// INFORMACOES PARA O CLIENTE
$demosntrativo1 = 'PROCESSO SELETIVO 2009/2';

$dadosboleto["demonstrativo1"] = $demonstrativo1; //"PROCESSO SELETIVO 2009/1";
$dadosboleto["demonstrativo2"] = 'NUMERO DE INSCRI��O: N� '.$_REQUEST['NUM_INSCRICAO']; //"Mensalidade referente a nonon nonooon nononon<br>Taxa banc�ria - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = 'AP�S O PAGAMENTO RETIRE SEU COMPROVANTE DE INSCRI��O<br>NO SITE WWW.CATOLICA-TO.EDU.BR'; //"BoletoPhp - http://www.boletophp.com.br";
$dadosboleto["instrucoes1"] = $demonstrativo1; //"- Sr. Caixa, cobrar multa de 2% ap�s o vencimento";
$dadosboleto["instrucoes2"] = $_REQUEST['NOME']; //"- Receber at� 10 dias ap�s o vencimento";
$dadosboleto["instrucoes3"] = 'NUMERO DE INSCRICAO: N� '.$_REQUEST['NUM_INSCRICAO']; //"- Em caso de d�vidas entre em contato conosco: xxxx@xxxx.com.br";
$dadosboleto["instrucoes4"] = 'WWW.CATOLICA-TO.EDU.BR'; //"&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "N";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "ME";


// --------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - REAL
$dadosboleto["agencia"] = "0932"; // Num da agencia, sem digito
$dadosboleto["conta"] = "2025252"; 	// Num da conta, sem digito
$dadosboleto["carteira"] = "57";  // C�digo da Carteira

// SEUS DADOS
$dadosboleto["identificacao"] = "FACULDADE CAT�LICA DO TOCANTINS";
$dadosboleto["cpf_cnpj"] = "00.331.801/0002-10";
$dadosboleto["endereco"] = "Av. Teot�nio Segurado - 1402 Sul Cj. 01 - (63) 3221-2100";
$dadosboleto["cidade_uf"] = "PALMAS / TO";
$dadosboleto["cedente"] = "FACULDADE CAT�LICA DO TOCANTINS";

// N�O ALTERAR!
include("include/funcoes_real.php"); 
include("include/layout_real.php");
?>
