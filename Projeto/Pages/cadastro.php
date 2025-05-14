<?php
    if (isset($_GET['erro']) && $_GET['erro'] === 'email') {
        if ($_GET['erro'] == 'email') {
            echo "<script>alert('Email já cadastrado!');</script>";
            echo '<script>history.back();</script>';
        } elseif ($_GET['erro'] === 'campos') {
            echo "<script>alert('Preencha todos os campos!');</script>";
        } elseif ($_GET['erro'] === 'cadastro') {
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
        <input type="text" id="nome" name="nome" pattern="[A-Za-zÀ-ú\s]+" title="Use apenas letras e espaço" placeholder="Digite seu nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Digite um email válido" placeholder="exemplo@email.com" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="A senha deve ter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma minúscula, um número e um caractere especial." placeholder="Digite sua senha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <p>Já tem uma conta? <a href="login.php">Entre aqui</a></p>
</body>
</html>