<html>
<head>
<title>cadastrando...</title>
</head>
<body>
<?php


$usuario = 'root';
$senha = '';
$database = 'cadastro1';
$host = 'localhost';

$conexao = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

?>
<?php
$nome =$_POST["nome"];
$email=$_POST["email"];
$senha=$_POST["senha"];
$telefone=$_POST["telefone"];

$mysqli = mysqli("INSERT INTO usuarios (nome, email, senha, telefone)
VALUES('$nome','$email','$senha','$telefone')");
echo"Cadastrado com Sucesso!!"
?>
</body>
</html>