<html>
<head>
<title> Calculo de idade! </title>
</head>
<body>
<?php
function calculo_idade($data) {
    //Data atual
    $dia = date('d');
    $mes = date('m');
    $ano = date('Y');
    //Data do aniversário
    $nascimento = explode('/', $data);
    $dianasc = ($nascimento[0]);
    $mesnasc = ($nascimento[1]);
    $anonasc = ($nascimento[2]);
    // se for formato do banco, use esse código em vez do de cima!
    /*
    $nascimento = explode('-', $nascimento);
    $dianasc = ($nascimento[2]);
    $mesnasc = ($nascimento[1]);
    $anonasc = ($nascimento[0]);
     */
    //Calculando sua idade
    $idade = $ano - $anonasc; // simples, ano- nascimento!
    if ($mes < $mesnasc) // se o mes é menor, só subtrair da idade
    {
        $idade--;
        return $idade;
    }
    elseif ($mes == $mesnasc && $dia <= $dianasc) // se esta no mes do aniversario mas não passou ou chegou a data, subtrai da idade
    {
        $idade--;
        return $idade;
    }
    else // ja fez aniversario no ano, tudo certo!
    {
        return $idade;
    }
}
echo calculo_idade('01/02/1986'); // mostra a idade na tela/console!
?>
</body>
</html>