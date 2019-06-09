<?php
if (isset($_POST['enviar'])):
    $aluno = $_POST['aluno'];
	$matricula = $_POST['matricula'];
	$serie = $_POST['serie'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    

    $media = ($nota1 + $nota2) / 2;
	$res = ($serie + 1);
    echo "Ola " . $aluno ." e matricula ". $matricula ." e serie ". $serie ." suas notas foram: <br>"
        ."Primeiro Bimestre: " . $nota1 . "<br>"
        ."Segundo Bimestre: " . $nota2 . "<br>"
        ."Sua media final e " . $media . " - "
		;

    if ($media >= 7):
        echo "Aluno Aprovado!";
		echo "<br> Voce passou para $res";
    elseif (($media < 7) && ($media >= 5)):
        echo "Aluno esta na media!";
    else:
        echo "Aluno Reprovado!";
    endif;
endif;

?>