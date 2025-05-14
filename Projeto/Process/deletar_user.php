<?php
    require_once '../Process/connection.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $delete = "DELETE FROM tb_users WHERE id_users = ?";
        $stmt = $mysqli->prepare($delete);
        $stmt->bind_param("i", $_SESSION['id']);

        if ($stmt->execute()) {
            session_destroy();
            $stmt->close();
            $mysqli->close();
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header('Location: ../Pages/login.php?sucesso=deletar');
            exit();
        } else {
            $stmt->close();
            $mysqli->close();
            header('Location: ../Pages/home.php?erro=deletar');
            exit();
        }
    }
?>