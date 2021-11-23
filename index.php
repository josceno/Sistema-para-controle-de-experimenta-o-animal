<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewports" content="width=device-width, initial-scale-1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>login</title>
    </head>
    <body>
    <main class="login">
        <div class="login__container">
            <h1 class="login__title">Tela de Login</h1>
            
            <form action="" method="POST">
        <p>
            <label>E-mail</label>
            <input type="text" name="email"  placeholder="Seu E-mail...">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha"  placeholder ="Sua Senha..">
        </p>
        <p>
        <button class="login__submit">login</button>
        <a class="login__submit" href="cadastro.php">Cadastre-se</a> <br>
        </p>
            </form>
        </div>
    </main>
</body>