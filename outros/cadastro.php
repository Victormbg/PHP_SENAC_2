<html>
<head>
<title>Cadastro</title>
</head>
<body>
<h1>Cadastre-se<h1>
<h2>Todos os campos sao obrigatorios<h2>
<form action="funcaocadastro.php" method="post">
<label for="nome">Nome:</label>
<input type="text" name="nome" id="nome" required> <br>
<label for="sexo">Sexo: </label>
<input name="sexo" type="radio" value="f"/>Feminino| 
<input name="sexo" type="radio" value="m" />Masculino<br>
<label for="email">E-mail: </label>
<input type="email" name="email" id="email" required> <br>
<label for="email">Confirma E-mail: </label>
<input type="email" name="email" id="email" required> <br>
<input type="submit" value="Enviar">
</form>
</body>
</html>