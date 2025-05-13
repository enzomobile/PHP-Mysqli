<?php
    if (isset($_GET['erro'])) {
        if ($_GET['erro'] == 'senha') {
            echo "<script>alert('Senha incorreta!');</script>";
        } else if ($_GET['erro'] === 'email') {
            echo "<script>alert('Email não encontrado!');</script>";
        } else if ($_GET['erro'] === 'campos') {
            echo "<script>alert('Preencha todos os campos!');</script>";
        }
        echo '<script>history.back();</script>';
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entre na sua conta</title>
</head>
<body>
    <h1>Entre com sua conta</h1>
    <form action="..\Process\loggin.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>