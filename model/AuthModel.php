<?php 

require_once '../service/conexao.php';

function autenticarUsuario($CPF, $senha) {
    $conn = new usePDO(); 
    $instance = $conn->getInstance(); 

    $sql = "SELECT u.senha, u.id_usuario, p.nome FROM usuario u
            INNER JOIN pessoa p ON p.FK_usuario = u.id_usuario
            WHERE p.CPF = ?";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$CPF]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($senha, $user['senha'])) {
        return $user;
    }   

    return false;
}
