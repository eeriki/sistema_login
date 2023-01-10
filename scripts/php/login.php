<?php

include_once 'principal.php';
//$conexao = new mysqli('localhost', 'erkg5', '1113836246', 'cadastro', 3306);

$login = $_POST['user_login'];
$senha = $_POST['pass_login'];

$result_login = $conexao->query("select nickname from users");
$result_pass = $conexao->query("select pass from users where nickname = '$login' ");

$database_nicks = $result_login->fetch_all(MYSQLI_ASSOC);
$database_pass = $result_pass->fetch_assoc();
$database_pass_filter;

foreach($database_pass as $dtp){
    $database_pass_filter = $dtp;
}

if(request($database_nicks, $login, $database_pass_filter, $senha) == false){
    header('Location: ../../index.html');
} else {
    header('Location: ../../pagina2/index.html');
}