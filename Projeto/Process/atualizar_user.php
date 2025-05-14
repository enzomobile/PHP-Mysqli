<?php
    require_once '../Process/connection.php';
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['novo_email']) || !isset($_POST['nova_senha']) || !isset($_POST['novo_nome'])) {
            header('Location: ../Pages/login.php?erro=preencher');
            exit();
        }
        if (isset($_POST['novo_nome'])) {
            $novo_nome = $_POST['novo_nome'];

            $update = "UPDATE tb_users SET nome = ? WHERE id_users = ?";
            $stmt = $mysqli->prepare($update);
            $stmt->bind_param('si', $novo_nome, $_SESSION['id_users']);
            if ($stmt->execute()) {
                $_SESSION['nome'] = $novo_nome;
                header('Location: ../Pages/home.php?sucesso=atualizar');
            } else {
                header('Location: ../Pages/home.php?erro=atualizar');
            }
            $stmt->close();
        }
        if (isset($_POST['novo_email'])) {
            $novo_email = $_POST['novo_email'];

            $update = "UPDATE tb_users SET email = ? WHERE id_users = ?";
            $stmt = $mysqli->prepare($update);
            $stmt->bind_param('si', $novo_email, $_SESSION['id_users']);
            if ($stmt->execute()) {
                $_SESSION['email'] = $novo_email;
                header('Location: ../Pages/home.php?sucesso=atualizar');
            } else {
                header('Location: ../Pages/home.php?erro=atualizar');
            }
            $stmt->close();
        }
        if (isset($_POST['nova_senha'])) {
            $nova_senha = $_POST['nova_senha'];

            $update = "UPDATE tb_users SET senha = ? WHERE id_users = ?";
            $stmt = $mysqli->prepare($update);
            $nova_senha = password_hash($nova_senha, PASSWORD_DEFAULT);
            $stmt->bind_param('si', $nova_senha, $_SESSION['id_users']);
            if ($stmt->execute()) {
                $_SESSION['senha'] = $nova_senha;
                header('Location: ../Pages/home.php?sucesso=atualizar');
            } else {
                header('Location: ../Pages/home.php?erro=atualizar');
            }
            $stmt->close();
        }
        $mysqli->close();
    }
?>