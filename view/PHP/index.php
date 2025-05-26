<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Login Atividade Jean</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/style.css'>
    <script src='../JS/main.js'></script>
</head>

<body>
    <div class="container">
        <h1>Atividade Jean</h1>
        <form id="form" action="../../controller/AuthController.php" method="POST">
            <label for="name">CPF:</label>
            <input type="text" id="name" name="CPF" required><br><br>
            <label for="email">Senha:</label>
            <input type="password" id="email" name="senha" required>
            <div class="divcheck">
                <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
            </div>
            <p class="relembrar">Relembre-me</p>
            <a href="./email.php" target="_self" id="esqueci">esqueceu a senha?</a>
            <a href="./registro.php" target="_self" id="registro">Registrar-se</a>
            <input type="submit" value="Logar" id="botao">
            <?php
                session_start();
                    if (!empty($_SESSION['mensagem'])): ?>
                        <p class="mensagemdeerro"><?= $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></p>
            <?php endif; ?>
    </div>
        </form>
</body>

</html>