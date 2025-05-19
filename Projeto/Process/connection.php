<?php
    $mysqli = new mysqli('localhost', 'root', '', 'db_crud');

    if($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
        exit;
    }
?>