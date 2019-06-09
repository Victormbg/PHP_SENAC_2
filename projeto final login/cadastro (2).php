<?php
/**
 * Projeto de aplicação CRUD utilizando PDO 
 */
// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
	$usuario = filter_input(INPUT_POST, 'usuario');
	$senha = filter_input(INPUT_POST, 'senha');
	$confsenha = filter_input(INPUT_POST, 'confsenha');
    $endereco = filter_input(INPUT_POST, 'endereco');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $email = filter_input(INPUT_POST, 'email');
    $sexo = filter_input(INPUT_POST, 'sexo');
    
} else if (!isset($id)) {
// Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
}

// Cria a conexão com o banco de dados
try {
    $conexao = new PDO("mysql:host=localhost;dbname=projetologin", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "<p class=\"bg-danger\">Erro na conexão:" . $erro->getMessage() . "</p>";
}

// Bloco If que Salva os dados no Banco - atua como Create e Update
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    try {
        if ($id != "") {
            $stmt = $conexao->prepare("UPDATE usuarios SET nome=?,usuario=?,senha=?,confsenha=?, endereco=?,telefone=?, email=?,sexo=? WHERE id = ?");
            $stmt->bindParam(9, $id);
        } else {
            $stmt = $conexao->prepare("INSERT INTO usuarios (nome, usuario, senha, confsenha, endereco, telefone, email, sexo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        }
        $stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $usuario);
		$stmt->bindParam(3, $senha);
		$stmt->bindParam(4, $confsenha);
        $stmt->bindParam(5, $endereco);
        $stmt->bindParam(6, $telefone);
        $stmt->bindParam(7, $email);
        $stmt->bindParam(8, $sexo);
        
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $id = null;
                $nome = null;
				$usuario = null;
				$senha = null;
				$confsenha = null;
                $endereco = null;
                $telefone = null;
                $email = null;
                $sexo = null;
                } else {
                echo "<p class=\"bg-danger\">Erro ao tentar efetivar cadastro</p>";
            }
        } else {
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}

// Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $id = $rs->id;
            $nome = $rs->nome;
			$usuario = $rs->usuario;
			$senha = $rs->senha;
			$confsenha = $rs->confsenha;
            $endereco = $rs->endereco;
            $telefone = $rs->telefone;
            $email = $rs->email;
            $sexo = $rs->sexo;
            } else {
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}

// Bloco if utilizado pela etapa Delete
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM contatos WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "<p class=\"bg-success\">Registo foi excluído com êxito</p>";
            $id = null;
        } else {
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" >
        <title>Agenda de telefones</title>
        <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet" />
        <script src="assets/js/bootstrap.js" type="text/javascript" ></script>
    </head>
    <body>
        <div class="container">
            <header class="row">
                <br />
            </header>
            <article>
                <div class="row">
                    <form action="?act=save" method="POST" name="form1" class="form-horizontal" >
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="panel-title">Cadastro</span>
                            </div>
                            <div class="panel-body">

                                <input type="hidden" name="id" value="<?php
                                // Preenche o id no campo id com um valor "value"
                                echo (isset($id) && ($id != null || $id != "")) ? $id : '';

                                ?>" />
                                <div class="form-group">
                                    <label for="nome" class="col-sm-1 control-label">Nome:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="nome" value="<?php
                                        // Preenche o nome no campo nome com um valor "value"
                                        echo (isset($nome) && ($nome != null || $nome != "")) ? $nome : '';

                                        ?>" class="form-control"/>
                                    </div>
                                    <label for="nome" class="col-sm-1 control-label">Usuário:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="usuario" value="<?php
                                        // Preenche o nome no campo nome com um valor "value"
                                        echo (isset($usuario) && ($usuario != null || $usuario != "")) ? $usuario : '';

                                        ?>" class="form-control"/>
                                    </div>
									</div>
									<div class="form-group">
                                    <label for="nome" class="col-sm-1 control-label">Senha:</label>
                                    <div class="col-md-4">
                                        <input type="password" name="senha" value="<?php
                                        // Preenche o nome no campo nome com um valor "value"
                                        echo (isset($senha) && ($senha != null || $senha != "")) ? $senha : '';

                                        ?>" class="form-control"/>
                                    </div>
                                    <label for="nome" class="col-sm-1 control-label">Comfirmar senha:</label>
                                    <div class="col-md-4">
                                        <input type="password" name="confsenha" value="<?php
                                        // Preenche o nome no campo nome com um valor "value"
                                        echo (isset($confsenha) && ($confsenha != null || $confsenha != "")) ? $confsenha : '';

                                        ?>" class="form-control"/>
                                    </div>
									</div>
									<div class="form-group">
                                    <label for="endereco" class="col-sm-1 control-label">Endereço:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="endereco" value="<?php
                                        // Preenche o endereco no campo telefone com um valor "value"
                                        echo (isset($endereco) && ($endereco != null || $endereco != "")) ? $endereco : '';

                                        ?>" class="form-control" />
                                    </div>
                                    <label for="telefone" class="col-sm-1 control-label">Telefone:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="telefone" value="<?php
                                        // Preenche o email no campo telefone com um valor "value"
                                        echo (isset($telefone) && ($telefone != null || $telefone != "")) ? $telefone : '';

                                        ?>" class="form-control" />
										</div>
									</div>
									<div class="form-group">
                                    <label for="email" class="col-sm-1 control-label">E-mail:</label>
                                    <div class="col-md-4">
                                        <input type="email" name="email" value="<?php
                                        // Preenche o email no campo email com um valor "value"
                                        echo (isset($email) && ($email != null || $email != "")) ? $email : '';

                                        ?>" class="form-control" />
                                    </div>
                                    <label for="sexo" class="col-sm-1 control-label">Sexo:</label>
                                    <div class="col-md-1">
                                        <input type="text" name="sexo" value="<?php
                                        // Preenche o celular no campo sexo com um valor "value"
                                        echo (isset($sexo) && ($sexo != null || $sexo != "")) ? $sexo : '';

                                        ?>" class="form-control" />
                                    </div>
                                </div>
								
                                
                                      <div class="panel-footer">
                                <div class="clearfix">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary" /><span class="glyphicon glyphicon-ok"></span>Salvar</button>
                                    </div>
                                </div>
                                      </div>
                            </div>
                        </div>
                    </form>
            </article>
        </div>
    </body>
</html>
