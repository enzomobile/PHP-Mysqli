<?php
    session_start();
    if (!isset($_SESSION['nome']) || !isset($_SESSION['email'])) {
        header('Location: login.php?erro=login');
        exit();
    }
    if (isset($_POST['deslogar'])) {
        session_destroy();
        header('Location: ../Pages/login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo, <?=$_SESSION['nome']?></title>
</head>
<body>
    <h1>Você fez login, <?=$_SESSION['nome']?>!</h1>
    <form action="../Pages/home.php" method="POST">
        <button type="submit" name="deslogar" value="Deslogar">Deslogar</button>
    </form>

    <hr>
    <h2>Atualizar Informações</h2>
    <form action="../Process/atualizar_user.php" method="POST">
        <label for="novo_nome">Novo Nome:</label>
        <input type="text" id="novo_nome" name="novo_nome" required>
        <br>
        <label for="novo_email">Novo Email:</label>
        <input type="email" id="novo_email" name="novo_email" required>
        <br>
        <button type="submit">Atualizar</button>
    </form>

    <hr>
    <h2>Deletar Usuário</h2>
    <form action="../Process/deletar_user.php" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar sua conta?');">
        <button type="submit" name="deletar" style="color: red;">Deletar Conta</button>
    </form>
</body>
</html>