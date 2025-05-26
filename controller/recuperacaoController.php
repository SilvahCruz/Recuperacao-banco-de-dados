<?php

require_once '../model/FuncaoDeValidacaoModel.php';

recuperacao($_POST["email"]);

$email = $_POST["email"];
$_SESSION['codigo_email'] = $email;
header('Location: ../view/PHP/validacao.php');