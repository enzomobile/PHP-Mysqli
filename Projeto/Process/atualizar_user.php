<?php
    require_once '../Process/connection.php';
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $novo_nome = $_POST['novo_nome'];
        $novo_email = $_POST['novo_email'];
        $nova_senha = $_POST['nova_senha'];

        if (!isset($_POST['novo_nome']) && !isset($_POST['novo_email']) && !isset($_POST['nova_senha'])) {
            header('Location: ../Pages/home.php?erro=preencher');
            exit();
        }

        if (isset($novo_nome)) {
            $update = 'UPDATE tb_users SET nome = ? WHERE id_users = ?';
            $stmt = $mysqli->prepare($update);
            $stmt->bind_param('si', $novo_nome, $_SESSION['id']);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                $_SESSION['nome'] = $novo_nome;
                $stmt->close();
            } else {
                header('Location: ../Pages/home.php?erro=atualizar');
                $stmt->close();
                $mysqli->close();
                exit();
            }
        }

        if (isset($novo_email)) {
            $update = 'UPDATE tb_users SET email = ? WHERE id_users = ?';
            $stmt = $mysqli->prepare($update);
            $stmt->bind_param('si', $novo_email, $_SESSION['id']);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                $_SESSION['email'] = $novo_email;
                $stmt->close();
            } else {
                header('Location: ../Pages/home.php?erro=atualizar');
                $stmt->close();
                $mysqli->close();
                exit();
            }
        }

        if (isset($nova_senha)) {
            $update = 'UPDATE tb_users SET senha = ? WHERE id_users = ?';

            $senha_nova = password_hash($nova_senha, PASSWORD_DEFAULT);
            $stmt = $mysqli->prepare($update);
            $stmt->bind_param('si', $senha_nova, $_SESSION['id']);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                $_SESSION['senha'] = $senha_nova;
                $stmt->close();
            } else {
                header('Location: ../Pages/home.php?erro=atualizar');
                $stmt->close();
                $mysqli->close();
                exit();
            }
        }

        header('Location: ../Pages/home.php?sucesso=atualizar');
    }
?>