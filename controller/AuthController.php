<?php

session_start();
require_once '../model/AuthModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CPF = $_POST['CPF'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $usuario = autenticarUsuario($CPF, $senha);
    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        header('Location: ../view/PHP/tela-inicial.php');
    } else {
        $_SESSION['mensagem'] = "A senha ou o usuário não coincidem!";
        header('Location: ../view/PHP/index.php');
        exit();
    } 
}
