<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Recuperacao Atividade Jean</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/style.css'>
    <script src='../JS/recuperacao.js'></script>
</head>
<body>
    
        <div class="container">
            <h1>Atividade Jean</h1>
        <form id="form" action="../../controller/FuncaoDeValidacaoController.php" method="post">
                <label for="Senha_Nova">Nova senha:</label>
                <input type="password" id="name" name="Senha_Nova" required><br><br>
                <label for="Confirm-senha">Confirmar Senha:</label>
                <input type="password" id="email" name="confirm-senha" required>
                <button type="submit" value="Alterar Senha" id="botao">Alterar Senha</button>
        </div>  

        </form>
</body>

</html>