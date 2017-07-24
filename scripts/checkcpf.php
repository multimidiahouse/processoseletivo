<?
 //VERIFICA SE O QUE FOI INFORMADO � N�MERO
 if(!is_numeric($cpf)) {
  //$status = false;
   $error++;
   $errors = $errors.'\nN�mero de CPF n�o � um n�mero v�lido';
 }

 else {
  //VERIFICA
  if( ($cpf == '11111111111') || ($cpf == '22222222222') ||
   ($cpf == '33333333333') || ($cpf == '44444444444') ||
   ($cpf == '55555555555') || ($cpf == '66666666666') ||
   ($cpf == '77777777777') || ($cpf == '88888888888') ||
   ($cpf == '99999999999') || ($cpf == '00000000000') ) {
   //$status = false;
   $error++;
   $errors = $errors.'\nN�mero de CPF inv�lido';
  }

  else {
   //PEGA O DIGITO VERIFIACADOR
   $dv_informado = substr($cpf, 9,2);

   for($i=0; $i<=8; $i++) {
    $digito[$i] = substr($cpf, $i,1);
   }

   //CALCULA O VALOR DO 10� DIGITO DE VERIFICA��O
   $posicao = 10;
   $soma = 0;

   for($i=0; $i<=8; $i++) {
    $soma = $soma + $digito[$i] * $posicao;
    $posicao = $posicao - 1;
   }

   $digito[9] = $soma % 11;

   if($digito[9] < 2) {
    $digito[9] = 0;
   }
   else {
    $digito[9] = 11 - $digito[9];
   }

   //CALCULA O VALOR DO 11� DIGITO DE VERIFICA��O
   $posicao = 11;
   $soma = 0;

   for ($i=0; $i<=9; $i++) {
    $soma = $soma + $digito[$i] * $posicao;
    $posicao = $posicao - 1;
   }

   $digito[10] = $soma % 11;

   if ($digito[10] < 2) {
    $digito[10] = 0; 
   }
   else {
    $digito[10] = 11 - $digito[10];
   }

  //VERIFICA SE O DV CALCULADO � IGUAL AO INFORMADO
  $dv = $digito[9] * 10 + $digito[10];
  if ($dv != $dv_informado) {
   //$status = false;
   $error++;
   $errors = $errors.'\nN�mero de CPF inv�lido';
  }
  else
   //$status = true;
   $numCpf = 'ok';
  }//FECHA ELSE
}//FECHA ELSE(is_numeric)
?>