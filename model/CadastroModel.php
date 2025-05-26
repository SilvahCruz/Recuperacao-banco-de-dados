<?php 

require '../service/conexao.php';

function register($fullname, $CPF, $endereco, $senha, $email){
    $conn = new usePDO;
    $instance = $conn->getInstance();

    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    //cadastro de usuario
    $sql = "INSERT INTO usuario (nome, senha, email) VALUES (?, ?, ?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$fullname, $hashed_password, $email]);
    $id_usuario = $instance->lastInsertId();

    //cadastro de pessoa
    $sql = "INSERT INTO pessoa (nome, CPF, endereco, FK_usuario) VALUES (?, ?, ?, ?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$fullname, $CPF, $endereco, $id_usuario]);

    return $id_usuario;

    //reivindicar o email
    $sql = "INSERT INTO code (nome, code, FK_usuario_code) VALUES (?, ?, ?, ?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([]);

}

function gerarCodigoAleatorio($tamanho = 8) {
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $codigo = '';
    for ($i = 0; $i < $tamanho; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

function criarCodigoDeRecuperacao($conexao, $idUsuario) {
    $codigo = gerarCodigoAleatorio();

    $sql = "INSERT INTO code (code, FK_usuario_code) VALUES (?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("si", $codigo, $idUsuario);

    if ($stmt->execute()) {
        return $codigo; // você pode usar isso para exibir ou enviar por email
    } else {
        return false;
    }
}



?>