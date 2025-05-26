<?php

//session_start();
require_once '../service/conexao.php';

    function verificarCode($codigo) {
        $conn = new usePDO(); 
        $instance = $conn->getInstance();

        $sql = "SELECT * FROM code WHERE code = ? ORDER BY id DESC LIMIT 1";
        $stmt = $instance->prepare($sql);
        $stmt->execute([$codigo]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["usuario"] = $usuario;
        return $usuario;
}
 
function atualizarSenha($SenhaNova) {
    $conn = new usePDO(); 
    $instance = $conn->getInstance();

    $senha_hash = password_hash($SenhaNova, PASSWORD_DEFAULT);
        $email = $_SESSION['usuario']['email'];
        $sql = "UPDATE usuario SET senha = ? WHERE email = ?";
        $stmt = $instance->prepare($sql);
        return $stmt->execute([$senha_hash, $email]);
}

function recuperacao($email) {
    
    $conn = new usePDO(); 
    $instance = $conn->getInstance();
    $code = rand(100000, 999999); 
    

    $sql = "INSERT INTO code (nome, code, email) VALUES (?, ?, ?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$email, $code, $email]);

    return false;
}
?>