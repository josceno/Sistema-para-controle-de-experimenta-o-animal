<?php

function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}

if(count($_POST) > 0) {

    include('conexao.php');
    
    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    if(empty($nome)) {
        $erro = "Preencha o nome";
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Preencha o e-mail";
    }

   

    if(!empty($telefone)) {
        $telefone = limpar_texto($telefone);
        if(strlen($telefone) != 11)
            $erro = "O telefone deve ser preenchido no padrão (11) 98888-8888";
    }

    if($erro) {
        echo "<p><b>ERRO: $erro</b></p>";
    } else {
        $sql_code = "INSERT INTO clientes (nome, email, telefone, senha, data) 
        VALUES ('$nome', '$email', '$telefone', '$senha', NOW())";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            echo "<p><b>Cliente cadastrado com sucesso!!!</b></p>";
            unset($_POST);
        }
    }

}


?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="estiloCD.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Cadastrar Cliente</title>
</head>
<body>
<main class="cadastro">
    <div class="cadastro_box">
        <h1 class="login__title">Cadastro</h1>
        <form method="POST" action="">
        <p>
            <label>Nome:</label>
            <input value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text" class="input_name" >
            <span class="input_border"></span>

        </p>
        <p>
            <label>E-mail:</label>
            <input value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email" type="text" class="input_user">
            <span class="input_border"></span>
        </p>
        <p>
            <label>Telefone:</label>
            <input value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone']; ?>"  placeholder="(11) 98888-8888" name="telefone" type="text" class="input_email">
            <span class="input_border"></span>
        </p>
        <p>
            <label> senha:</label>
            <input value="<?php if(isset($_POST['senha'])) echo $_POST['senha']; ?>"  name="senha" type="password" class="input_password">
            <span class="input_border"></span>
        </p>
        <p>
            <button class="submit_cadastro">Cadastrar</button>
            <a href="index.php">login</a>
        </p>
        </form>
    </div>

</main>
</body>
</html>