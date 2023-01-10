<?php

include_once 'principal.php';

$nick = $_POST['user_cadastro'];
$password = $_POST['pass_cadastro'];

$result = $conexao->query('select nickname from users');
$nick_array = $result->fetch_all(MYSQLI_ASSOC);

$searchResult = searchNicks($nick_array, $nick);

if($searchResult){   
    $stmt = $conexao->stmt_init();
    $stmt->prepare('insert into users (nickname, pass) values (?, ?)');
    $stmt->bind_param('ss', $nick, $password);
    $stmt->execute();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <?php
        if($searchResult){
    ?>
        <h2>Dados cadastrados com sucesso</h2>
        <h4>Dados para login:</h4>
        <p>Usuário: <?= $nick ?></p>
        <p>Senha: <?= $password ?></p>
        <a href="../../index.html"><button>voltar para cadastro</button></a>
    <?php
        } else {       
    ?>
        <h2>Nome de Usuário não disponível</h2>
        <a href="../../index.html"><button>voltar para cadastro</button></a>
    <?php
        }
    ?>

</body>
</html>
