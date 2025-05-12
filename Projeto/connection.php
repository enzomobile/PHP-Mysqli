<?php
    class Connection {
        private $con;
        
        public function __construct() {
            $this->con = mysqli_connect("localhost", "root", "", "bd_crud");
            if (mysqli_connect_error()) {
                echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
            } else {
                echo "Conexão bem-sucedida.";
            }
        }
    }
    $user = new Connection();
?>