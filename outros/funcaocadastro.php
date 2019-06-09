<?php 
$erro = false;
if ( !isset( $_POST ) || empty( $_POST ) ) {
	$erro = 'Nada foi postado.';
}
foreach ( $_POST as $chave => $valor ) {
	
	$$chave = trim( strip_tags( $valor ) );
	if ( empty ( $valor ) ) {
		$erro = 'Existem campos em branco.';
	}
}
if ( ( ! isset( $email ) || ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) && !$erro ) {
	$erro = 'Envie um email válido.';
}
if ( $erro ) {
	echo $erro;
} else {
	echo "<h1>Seu Cadastro foi enviado.</h1>";
	echo "<h1>Confira suas informacoes para que possa concluir seu cadastro.</h1>";
	foreach ( $_POST as $chave => $valor ) {
		echo '<b>' . $chave . '</b>: ' . $valor . '<br><br>';
	}
}