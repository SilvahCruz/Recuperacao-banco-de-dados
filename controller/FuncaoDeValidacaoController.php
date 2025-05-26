<?php

session_start();
require_once '../model/FuncaoDeValidacaoModel.php';
require_once '../service/conexao.php';


if (isset($_POST['cod']) && isset($_POST['cod2']) && isset($_POST['cod3']) && isset($_POST['cod4']) && isset($_POST['cod5']) && isset($_POST['cod6'])){
    
    $codigo = $_POST['cod'] . $_POST['cod2'] . $_POST['cod3'] . $_POST['cod4'] . $_POST['cod5'] . $_POST['cod6'];
}


// Verifica se o código foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($codigo)) {

    if (!$codigo) {
        $_SESSION['mensagem'] = "Código não informado!";
        header("Location: ../view/PHP/validacao.php");
        exit();
    }

    try {
        $codigoDB = verificarCode($codigo);

        if ($codigoDB) {
            // Código válido
            $_SESSION['codigo_validado'] = true;
            echo "validado com sucesso.";            
            header("Location: ../view/PHP/recuperacao.php"); 
            exit();
        } else {
            $_SESSION['mensagem'] = "Código inválido!";
            echo "código invalido";
            header("Location: ../view/PHP/validacao.php");
            exit();
        }

    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro ao validar o código: " . $e->getMessage();
        header("Location: ../view/PHP/validacao.php");
        exit();
    }



} 


if ($_SERVER['REQUEST_METHOD'] === 'POST'&& $_POST['Senha_Nova']) { 

$SenhaNova = $_POST['Senha_Nova'];
        $ConfirmarSenha = $_POST['confirm-senha'];

        if ($SenhaNova === $ConfirmarSenha) {
            if(atualizarSenha($SenhaNova)) {
                unset($_SESSION['usuario']);
                header("Location: ../view/PHP/index.php?sucesso=1");
                exit();
            }
        }

        header("Location: ../view/PHP/recuperacao.php?erro=1");
        exit();

}