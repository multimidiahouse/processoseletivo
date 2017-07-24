<style>
body {
margin-left:0;
margin-top:0;
margin-right:0;
margin-bottom:0;
background-color:white;
color:black;
font:Arial;
}
</style>
<?php if (isset($_REQUEST['ver']) and ($_REQUEST['ver'] == 'codigo1')) {?>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td><p align="justify" style="width:60%">&lt;b&gt;10/05/2007&lt;/b&gt; - &lt;em&gt;S&Aacute;UDE&lt;/em&gt;&lt;br&gt;<br>
      &lt;br&gt;<br>
        Texto normal sem formata&ccedil;&atilde;o de fonte para que fique padr&atilde;o 
        no navegador, se for usada muitas formata&ccedil;&otilde;es corre-se o 
        risco de dar diferen&ccedil;a entre um e outro. Recomenda-se o uso apenas 
        da quebra de linha, negrito, italico e o c&oacute;digo para links, isso 
        possibilita uma padroniza&ccedil;&atilde;o de fontes. &lt;a href=&quot;formatacao.php?ver=codigo1&quot;&gt;Clique 
        aqui&lt;/a&gt; para ver o c&oacute;digo de formata&ccedil;&atilde;o deste 
        texto. </p></td>
</tr>
</table>
<?php } else { ?>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td colspan="3" align="center" bgcolor="#000000"><font color="white" size="4" face="Arial, Helvetica, sans-serif">Dicas 
      de Formata&ccedil;&atilde;o</font></td>
  </tr>
  <tr> 
    <td width="78" align="center" bgcolor="#FFCC00"><strong><font size="2" face="Arial, Helvetica, sans-serif">Fun&ccedil;&atilde;o</font></strong></td>
    <td width="113" align="center" bgcolor="#FF9900"><strong><font size="2" face="Arial, Helvetica, sans-serif">C&oacute;digo</font></strong></td>
    <td width="309" align="center" bgcolor="#FF9900"><strong><font size="2" face="Arial, Helvetica, sans-serif">Exemplo</font></strong></td>
  </tr>
  <tr> 
    <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Negrito</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;b&gt;&lt;/b&gt;</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;b&gt;Ativi&lt;/b&gt;</font></td>
  </tr>
  <tr> 
    <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">It&aacute;lico</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;em&gt;&lt;/em&gt;</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;em&gt;Ativi&lt;/em&gt;</font></td>
  </tr>
  <tr> 
    <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Quebrar 
      linha</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;br&gt;</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">1&ordm; 
      Paragrafo.&lt;br&gt;<br>
      2&ordm; Paragrafo.</font></td>
  </tr>
  <tr> 
    <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Inserir 
      link</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;a 
      href=http://Link&gt;&lt;/a&gt;</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;a 
      href=http://www.ativiconsultoria.com.br&gt; <a href="http://www.ativiconsultoria.com.br" target="_blank">Clique 
      aqui para entrar</a> &lt;/a&gt;</font></td>
  </tr>
  <tr> 
    <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Inserir 
      link para email</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;a 
      href=mailto:contato@ativisonsultoria.com.br&gt;&lt;/a&gt;</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;a 
      href=mailto:me@uol.com&gt;<a href="mailto:me@uol.com">Clique aqui</a>&lt;/a&gt;</font></td>
  </tr>
  <tr> 
    <td height="19" colspan="3" align="center"><p><font face="Arial, Helvetica, sans-serif"></font><font face="Arial, Helvetica, sans-serif"></font><font face="Arial, Helvetica, sans-serif">Observa&ccedil;&otilde;es</font></p>
      <p><font face="Arial, Helvetica, sans-serif">1. Note que para inserir uma 
        quebra de linha n&atilde;o h&aacute; necessidade de fechar o c&oacute;digo, 
        isso ocorre devido a fun&ccedil;&atilde;o n&atilde;o precisar determinar 
        a &aacute;rea de atua&ccedil;&atilde;o do c&oacute;digo.<br>
        <br>
        2.Voc&ecirc; pode inserir um ou mais de um em um s&oacute; texto desde 
        que n&atilde;o se esque&ccedil;a de fechar os c&oacute;digos que necessitam 
        de determinar a &aacute;rea de atua&ccedil;&atilde;o. Ex: &lt;b&gt;&lt;em&gt;&lt;a 
        href=http://Link&gt;Texto que vai ficar negrito, italico e com o link&lt;/a&gt;&lt;/em&gt;&lt;/b&gt;</font></p>
      <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#000000"> 
    <td height="19" colspan="3" align="center"><font color="#FFFFFF" size="4" face="Arial, Helvetica, sans-serif"><strong>Fontes</strong></font></td>
  </tr>
  <tr> 
    <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Tamanho</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;font 
      size=2&gt;&lt;/font&gt; </font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;font 
      size=2&gt;Texto&lt;/font&gt; </font></td>
  </tr>
  <tr> 
    <td height="19" align="center"><font size="2" face="Arial, Helvetica, sans-serif">Tipo</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;font 
      face=Arial&gt;&lt;/font&gt;</font></td>
    <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">&lt;font 
      face=Arial&gt;Texto na fonte Arial&lt;/font&gt; </font></td>
  </tr>
  <tr> 
    <td height="19" align="center">Cor</td>
    <td align="center">&lt;font color=white&gt;&lt;/font&gt;</td>
    <td align="center">&lt;font color=red&gt;<font color="#FF0000">Texto vermelho</font>&lt;/font&gt;</td>
  </tr>
  <tr> 
    <td height="19" colspan="3" align="center"><p><font face="Arial, Helvetica, sans-serif">Observa&ccedil;&otilde;es</font></p>
      <p><font face="Arial, Helvetica, sans-serif">1. Para determinar o tamanho, 
        o tipo e a cor de uma s&oacute; vez note que basta incluir todas as fun&ccedil;&otilde;es 
        dentro do mesmo c&oacute;digo. Ex: &lt;font size=3 color=red face=Arial&gt;<font color="#FF0000">Texto 
        Vermelho no tamanho 3 (padr&atilde;o) e no tipo Arial</font>&lt;/font&gt;</font></p></td>
  </tr>
  <tr> 
    <td height="19" colspan="3" align="center"><p>&nbsp;</p>
      <p><strong>Texto de Exemplo:</strong></p>
      <p align="justify"><b>10/05/2007</b> - <em>SA&Uacute;DE</em></p>
      <p align="justify" style="width:50%">Texto normal sem formata&ccedil;&atilde;o 
        de fonte para que fique padr&atilde;o no navegador, se for usada muitas 
        formata&ccedil;&otilde;es corre-se o risco de dar diferen&ccedil;a entre 
        um e outro. Recomenda-se o uso apenas da quebra de linha, negrito, italico 
        e o c&oacute;digo para links, isso possibilita uma padroniza&ccedil;&atilde;o 
        de fontes. <a href="formatacao.php?ver=codigo1">Clique aqui</a> para ver 
        o c&oacute;digo de formata&ccedil;&atilde;o desete texto.</p></td>
  </tr>
</table>
<?php } ?>