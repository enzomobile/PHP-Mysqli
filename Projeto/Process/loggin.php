<?php
    require_once '../Process/connection.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['email'], $_POST['senha'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            // Prevent SQL injection
            $stmt = $mysqli->prepare('SELECT id_users, nome, senha FROM tb_users WHERE email = ?');
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $nome, $senha_hash);
                $stmt->fetch();
                if (password_verify($senha, $senha_hash)) {
                    // Login successful
                    session_destroy();
                    session_start();
                    $_SESSION['nome'] = $nome;
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $id;
                    $_SESSION['senha'] = $senha;
                    echo 'Login realizado com sucesso!';
                    $stmt->close();
                    $mysqli->close();
                    header('Location: ../Pages/home.php');
                    exit();
                } else {
                    echo 'Senha incorreta.';
                    $stmt->close();
                    $mysqli->close();
                    header('Location: ../Pages/login.php?erro=senha');
                    exit();
                }
            } else {
                echo 'Usuário não encontrado.';
                $stmt->close();
                $mysqli->close();
                header('Location: ../Pages/login.php?erro=email');
                exit();
            }
        } else {
            echo 'Preencha todos os campos.';
            header('Location: ../Pages/login.php?erro=campos');
            exit();
        }
    }
?>