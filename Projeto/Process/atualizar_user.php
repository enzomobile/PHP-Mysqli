<?php
    require_once '../Process/connection.php';
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['novo_nome']) && isset($_POST['novo_email'])) {
            $novo_nome = $_POST['novo_nome'];
            $novo_email = $_POST['novo_email'];
            
            
        }
    }
?>