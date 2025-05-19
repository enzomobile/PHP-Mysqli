<?php
    require_once '../connection.php';
    session_destroy();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = "SELECT * FROM tb_users WHERE email = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->admin != 1) {
            header('Location: ../../Pages/Admin/entrar.php?erro=nao_admin');
            exit();
        } else {
            $user = $result->fetch_assoc();

            if (password_verify($senha, $user['senha'])) {
                session_destroy();
                session_start();
                $_SESSION['id'] = $user['id_users'];
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['admin'] = $user['admin'];

                header('Location: ../Pages/Admin/home.php');
                $stmt->close();
                $mysqli->close();
                exit();
            } else {
                header('Location: ../Pages/Admin/entrar.php?erro=senha');
                $stmt->close();
                $mysqli->close();
                exit();
            }
        }
    } else {
        header('Location: ../../Pages/Admin/entrar.php');
        exit();
    }
?>