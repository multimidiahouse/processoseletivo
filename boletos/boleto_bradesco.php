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
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa			       	  |
// | 																	                                    |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Bradesco: Ramon Soares						            |
// +----------------------------------------------------------------------+


// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//

$con = mysql_connect('localhost', 'muni_yuri', 'yuri11');

if (! $con) { 
die ("error". mysql_error());
}

$db = mysql_select_db('muni_portal');

if (! $db) { 
die ("error". mysql_error());
}
/*
Dados do boleto - Obrigatórios
*/
$nInscricao = $_REQUEST['nInscricao'];
$idConcurso = $_REQUEST['idConcurso'];
$nivel = $_REQUEST['nivel'];
$numeroDoDocumento = $_REQUEST['numeroDoDocumento'];

	$sqlForm = mysql_query("SELECT * FROM formulario WHERE idConcurso='$idConcurso'");
	while ($resultForm = mysql_fetch_array($sqlForm)) {
		$data_venc=date("d/m/Y", $resultForm['termino']);
		if ($nivel == 'A') {
		$valor_cobrado = $resultForm['valor1'];
		} elseif ($nivel == 'B') {
		$valor_cobrado = $resultForm['valor2'];		
		} elseif ($nivel == 'C') {
		$valor_cobrado = $resultForm['valor3'];		
		} elseif ($nivel == 'D') {
		$valor_cobrado = $resultForm['valor4'];		
		}
	}
	
	$sqlConc = mysql_query("SELECT * FROM concursos WHERE id='$idConcurso'");
	while ($resultConc = mysql_fetch_array($sqlConc)) {
		$cedente = $resultConc['cedente'];
		$agencia = explode("-",$resultConc['agencia']);
		$agencia_dv = $agencia[1];
		$agencia = $agencia[0];
		$conta = explode("-",$resultConc['conta']);
		$conta_dv = $conta[1];
		$conta = $conta[0];
		$convenio = $resultConc['convenio'];
		$contrato = $resultConc['contrato'];
		$instrucao = $resultConc['instrucao'];		
		$cnpj = $resultConc['cnpj'];
		$endereco_cedente = $resultConc['endereco'];
		$local = $resultConc['local'];
	}
	
	$sqlInsc = mysql_query("SELECT * FROM inscricoes WHERE nInscricao='$nInscricao'");
	while ($resultInsc = mysql_fetch_array($sqlInsc)) {
		$nome = $resultInsc['nome'];
		$cargo = $resultInsc['cargo'];		
		$endereco = $resultInsc['endereco'];
		$cidade = $resultInsc['local'];
		
	}



// DADOS DO BOLETO PARA O SEU CLIENTE
//$dias_de_prazo_para_pagamento = 5;


$taxa_boleto = 0.00;
//$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
//$valor_cobrado = "2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = $numeroDoDocumento; //"75896452";  // Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
$dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];	// Num do pedido ou do documento = Nosso numero
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $nome; //"Nome do seu Cliente";
$dadosboleto["endereco1"] = $endereco; //"Endereço do seu Cliente";
$dadosboleto["endereco2"] = $cidade; //"Cidade - Estado -  CEP: 00000-000";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = $nome; //"Pagamento de Compra na Loja Nonononono";
$dadosboleto["demonstrativo2"] = $cargo; //"Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = '';//"BoletoPhp - http://www.boletophp.com.br";
$dadosboleto["instrucoes1"] = $instrucao; //"- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dadosboleto["instrucoes2"] = $nome;//"- Receber até 10 dias após o vencimento";
$dadosboleto["instrucoes3"] = $cargo;//"- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
$dadosboleto["instrucoes4"] = //"&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "001";
$dadosboleto["valor_unitario"] = $valor_boleto;
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DS";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - Bradesco
$dadosboleto["agencia"] = $agencia; //"1172"; // Num da agencia, sem digito
$dadosboleto["agencia_dv"] = $agencia_dv; //"0"; // Digito do Num da agencia
$dadosboleto["conta"] = $conta; //"0403005"; 	// Num da conta, sem digito
$dadosboleto["conta_dv"] = $conta_dv; //"2"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - Bradesco
$dadosboleto["conta_cedente"] = $conta; //"0403005"; // ContaCedente do Cliente, sem digito (Somente Números)
$dadosboleto["conta_cedente_dv"] = $conta_dv; //"2"; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = "06";  // Código da Carteira: pode ser 06 ou 03

// SEUS DADOS
$dadosboleto["identificacao"] = "Concurso Público - ".$cedente;
$dadosboleto["cpf_cnpj"] = $cnpj; //"";
$dadosboleto["endereco"] = $endereco_cedente; //"Coloque o endereço da sua empresa aqui";
$dadosboleto["cidade_uf"] = $local; //"Cidade / Estado";
$dadosboleto["cedente"] = $cedente; //"Coloque a Razão Social da sua empresa aqui";

// NÃO ALTERAR!
include("include/funcoes_bradesco.php"); 
include("include/layout_bradesco.php");
?>
