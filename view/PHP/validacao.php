<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>validação Atividade Jean</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/validacao.css'>
    <script src='../JS/validacao.js'></script>
</head>

<body>
    <div class="container">
        <h1>Atividade Jean</h1>
        <form class="formulario" Action="../../controller/FuncaoDeValidacaoController.php" method="post">
            <div class="cubo">
                <input type="text" id="cod" name="cod" required><br><br>
                <input type="text" id="cod2" name="cod2" required>
                <input type="text" id="cod3" name="cod3" required><br><br>
                <input type="text" id="cod4" name="cod4" required>
                <input type="text" id="cod5" name="cod5" required><br><br>
                <input type="text" id="cod6" name="cod6" required>
            </div>
            <div>
                <button type="submit" value="Validar" id="botao">Validar</button>
            </div>
            <?php
            session_start();
            if (!empty($_SESSION['mensagem'])): ?>
                <p class="mensagemdeerro"><?= $_SESSION['mensagem'];
                unset($_SESSION['mensagem']); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>