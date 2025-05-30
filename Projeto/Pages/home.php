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
    if (isset($_GET['sucesso'])) {
        if ($_GET['sucesso'] === 'atualizar') {
            echo "<script>alert('Informações atualizadas com sucesso!');</script>";
        }
    }
    if (isset($_GET['erro'])) {
        if ($_GET['erro'] === 'atualizar') {
            echo "<script>alert('Erro ao atualizar informações!');</script>";
        } elseif ($_GET['erro'] === 'preencher') {
            echo "<script>alert('Preencha todos os campos!');</script>";
        } elseif ($_GET['erro'] === 'login') {
            echo "<script>alert('Você precisa fazer login primeiro!');</script>";
        } elseif ($_GET['erro'] === 'deletar') {
            echo "<script>alert('Erro ao deletar conta!');</script>";
        }
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
        <input type="text" id="novo_nome" name="novo_nome" pattern="[A-Za-zÀ-ÿ\s]+" title="Somente letras e espaços são permitidos" placeholder="Digite seu novo nome" required>
        <br>
        <label for="novo_email">Novo Email:</label>
        <input type="email" id="novo_email" name="novo_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Digite um email válido" placeholder="exemplo@email.com" required>
        <br>
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" id="nova_senha" name="nova_senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="A senha deve ter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma minúscula, um número e um caractere especial." placeholder="Digite sua nova senha" required>
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