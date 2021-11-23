<?php include('protect.php');?>


<?php

function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}

if(count($_POST) > 0) {

    include('conexao.php');
    
    $erro = false;
    $especie = $_POST['especie'];
    $quantidade = $_POST['quantidade'];
    $codigo = $_POST['codigo'];
    $justificativa = $_POST['justificativa'];
    
    if(empty($especie)) {
        $erro = "Preencha o campo especie";
    }

    if(empty($quantidade)) {
        $erro = "preencha o campo quantidade";
    }

    if($erro) {
        echo "<p><b>ERRO: $erro</b></p>";
    } else {
        $sql_code = "INSERT INTO pedidos (especie, quantidade, codigo, justificativa,data) 
        VALUES ('$especie', '$quantidade', '$codigo', '$justificativa', NOW())";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            echo "<p><b>pedido realizado com sucesso!!!</b></p>";
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
        <h1 class="login__title">Pedido</h1>
        <form method="POST" action="">
        <p>
            <label>Nome Especie:</label>
            <input value="<?php if(isset($_POST['especie'])) echo $_POST['especie']; ?>" name="especie" type="text" class="input_name" >
            <span class="input_border"></span>

        </p>
        <p>
            <label>Quantidade de especies:</label>
            <input value="<?php if(isset($_POST['quantidade'])) echo $_POST['quantidade']; ?>" name="quantidade" type="text" class="input_user">
            <span class="input_border"></span>
        </p>
        <p>
            <label>Codigo bioterio:</label>
            <input value="<?php if(isset($_POST['codigo'])) echo $_POST['codigo']; ?>" name="codigo"   type="text"  class="input_email" placeholder="codigo do bióterio"> 
            <span class="input_border"></span>
        </p>
        <p>
            <label> justificativa:</label>
            <input value="<?php if(isset($_POST['justificativa'])) echo $_POST['justificativa']; ?>"  name="justificativa" type="text" class="input_password">
            <span class="input_border"></span>
        </p>
        <p>
            <button class="submit_cadastro">Pedir</button>
            <a href="index.php">voltar</a>
        </p>
        </form>
    </div>

</main>
</body>
</html>