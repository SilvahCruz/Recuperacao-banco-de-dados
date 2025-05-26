<?php
 
class usePDO
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "atividade_jean";
    private $instance;
 
    function getInstance()
    {
        if (empty($this->instance)) {
            $this->instance = $this->connection();
        }
        return $this->instance;
    }
 
    private function connection()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die ("Connection failed: " . $e->getMessage() . "<br>");
        }
    }
}


function getInstance2() {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "atividade_jean";
    
    // Criar conexão
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);
    
    // Verificar conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }
    
    // Definir charset para UTF-8
    $conexao->set_charset("utf8");
}


    
 