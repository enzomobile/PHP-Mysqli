<?php
    require_once('connection.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (empty($nome) || empty($email) || empty($senha)) {
            echo "Todos os campos são obrigatórios.";
            header("Location: ../Pages/cadastro.php?erro=campos");
            exit;
        }

        $stmt = $mysqli->prepare("SELECT id_users FROM tb_users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0) {
            $stmt->close();
            $mysqli->close();
            header("Location: ../Pages/cadastro.php?erro=email");
            exit;
        }
        $stmt->close();

        $hashSenha = password_hash($senha, PASSWORD_DEFAULT);
        
        $stmt = $mysqli->prepare("INSERT INTO tb_users (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $hashSenha);
        if($stmt->execute()) {
            $stmt->close();
            $mysqli->close();
            header("Location: ../Pages/login.php");
            exit;
        } else {
            $stmt->close();
            $mysqli->close();
            header("Location: ../Pages/cadastro.php?erro=cadastro");
            exit;
        }
    }
?>