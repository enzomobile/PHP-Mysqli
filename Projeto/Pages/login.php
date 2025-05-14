<?php
    if (isset($_GET['erro'])) {
        if ($_GET['erro'] === 'senha') {
            echo "<script>alert('Senha incorreta!');</script>";
        } elseif ($_GET['erro'] === 'email') {
            echo "<script>alert('Email não encontrado!');</script>";
        } elseif ($_GET['erro'] === 'campos') {
            echo "<script>alert('Preencha todos os campos!');</script>";
        } elseif ($_GET['erro'] === 'login') {
            echo "<script>alert('Você precisa fazer login!');</script>";
        }
        echo '<script>history.back();</script>';
    }
    if (isset($_GET['sucesso'])) {
        echo "<script>alert('Conta deletada com sucesso!');</script>";
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
        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Digite um email válido" placeholder="exemplo@email.com" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="A senha deve ter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma minúscula, um número e um caractere especial." placeholder="Digite sua senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>
    <br>
    <p>Não tem uma conta? <a href="../Pages/cadastro.php">Crie uma aqui</a></p>
</body>
</html>