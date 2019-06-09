<html>
<head>
<title>Avaliacao</title>
</head>
<body>
<?php
echo "Site com Varias operacoes e suas resolucoes:<br/>";
echo"<br/>";
echo "1 operacao: Calcular o Maior e sua Posicao entre os numeros de 1 a 10:<br/>";
echo"<br/>";
$vetor=array(1,2,3,4,5,6,7,8,9,10);
$maior=-1;
$posicao=-1;
for($i=0;$i<sizeof($vetor);$i++){
	if($maior<$vetor[$i]){
		$maior = $vetor[$i];
		$posicao =$i;
	}
}
echo"Resolucao: Maior elemento ".$maior." esta armazenado na posicao ".$posicao;
echo"<br/>";
echo"<br/>";
echo "2 operacao: Mostra os valores pares dos determinados numeros(1,3,5,8,11,12,15,20):<br/>";
$vetor=array(1,3,5,8,11,12,15,20);
	for($i=0;$i<sizeof($vetor);$i++){
	if($vetor[$i]%2==0){
		echo"<br/>O numero $vetor[$i] e par.<br/>";
		}
	}
echo"<br/>";
echo"3 operacao: Mostra determinados valores para a b c d: ";
echo"<br/>";
$a = 10;
$b = 10;
$c = $a++;
echo "valor de c:".$c."</br>";
echo "valor de a:".$a."</br>";
$d = ++$b;
echo "valor de d:".$d."</br>";
echo "valor de b:".$b."</br>";
echo"<br/>";
echo"4 operacao: Mostra os numeros de 1 a 10 em contagem regressiva:";
echo"<br/>";
$a = 0;
do{
echo $a++;
echo "<br>";
}while($a <=10);
echo"<br/>";













?>




































</body>
</html>