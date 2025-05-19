<?php
    require_once '../../Process/connection.php';
    session_start();
    if (!isset($_SESSION['id']) || $_SESSION['admin'] != 1) {
        header('Location: entrar.php');
        exit();
    }
    if (isset($_POST['deslogar'])) {
        session_destroy();
        header('Location: entrar.php');
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
    <h1>Bem vindo!</h1>
    <form action="home.php" method="POST">
        <button type="submit" name="deslogar">Deslogar</button>
    </form>
</body>
</html>