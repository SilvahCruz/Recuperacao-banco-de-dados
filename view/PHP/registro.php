<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registro Atividade Jean</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/style.css'>
    <script src='registro.js'></script>
</head>
<body>
    
        <div class="container">
            <h1>Atividade Jean</h1>
        <form id="form" action="../../controller/CadastroController.php" method="POST">
                <label for="">Nome:</label>
                <input type="text" id="name" name="fullname" required><br><br>
                <label for="">CPF:</label>
                <input type="number" id="CPF" name="CPF" required><br><br>
                <label for="">Endereço:</label>
                <input type="text" id="end" name="endereco" required><br><br>
                <label for="">Senha:</label>
                <input type="password" id="senha" name="senha" required><br><br>
                <label for="">Email:</label>
                <input type="" id="email" name="email" required>
                <button type="submit" value="Registrar" name="cadastrar" id="botao">Registrar</button>
                <?php
                session_start();
                    if (!empty($_SESSION['mensagemdeconclusao'])): ?>
                        <p class="mensagemdeconclusao"><?= $_SESSION['mensagemdeconclusao']; unset($_SESSION['mensagemdeconclusao']); ?></p>
                <?php endif; ?>
        </div>  

        </form>
</body>

</html>