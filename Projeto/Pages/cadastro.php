<?php
    if (isset($_GET['erro']) && $_GET['erro'] === 'email') {
        if ($_GET['erro'] == 'email') {
            echo "<script>alert('Email já cadastrado!');</script>";
            echo '<script>history.back();</script>';
        } else if ($_GET['erro'] === 'campos') {
            echo "<script>alert('Preencha todos os campos!');</script>";
        } else if ($_GET['erro'] === 'cadastro') {
            echo "<script>alert('Erro ao cadastrar!');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça uma conta</title>
</head>
<body>
    <h1>Faça sua conta</h1>
    <form action="..\Process\cadastramento.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <p>Já tem uma conta? <a href="login.php">Entre aqui</a></p>
</body>
</html>