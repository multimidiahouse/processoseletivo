<?php
$dia = date('d'); 
$ano = date('Y');
$convMes = date('M');
	if ($convMes == 'Jan') {
		$mes = 'Janeiro';
	} elseif ($convMes == 'Feb') {
		$mes = 'Fevereiro';
	} elseif ($convMes == 'Mar') {
		$mes = 'Março';
	} elseif ($convMes == 'Apr') {
		$mes = 'Abril';
	} elseif ($convMes == 'May') {
		$mes = 'Maio';
	} elseif ($convMes == 'Jun') {
		$mes = 'Junho';
	} elseif ($convMes == 'Jul') {
		$mes = 'Julho';
	} elseif ($convMes == 'Aug') {
		$mes = 'Agosto';
	} elseif ($convMes == 'Sep') {
		$mes = 'Setembro';
	} elseif ($convMes == 'Oct') {
		$mes = 'Outubro';
	} elseif ($convMes == 'Nov') {
		$mes = 'Novembro';
	} elseif ($convMes == 'Dec') {
		$mes = 'Dezembro';
	}																																													

$convSemana = date('D');
	if ($convSemana == 'Sun') {
		$semana = 'Domingo';
	} elseif ($convSemana == 'Mon') {
		$semana = 'Segunda-feira';
	} elseif ($convSemana == 'Tue') {
		$semana = 'Terça-feira';
	} elseif ($convSemana == 'Wed') {
		$semana = 'Quarta-feira';				  
	} elseif ($convSemana == 'Thu') {
		$semana = 'Quinta-feira';						
	} elseif ($convSemana == 'Fri') {
		$semana = 'Sexta-feira';
	} elseif ($convSemana == 'Sat') {
		$semana = 'Sábado';
	}						
echo $semana.', '.$dia.' de '.$mes.' de '.$ano;
?>