<?php
    class Connection {
        private $con;
        
        public function __construct() {
            $this->con = mysqli_connect("localhost", "root", "", "db_crud");
            if (mysqli_connect_error()) {
                echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
            } else {
                echo "";
            }
        }

        public function Cadastrar($data) {
            echo "<pre>"; print_r($data);
        }
        public function mostrarDados() {
            $sql = "SELECT * FROM tb_users";
            $result = mysqli_query($this->con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<pre>"; print_r($row);
                }
            } else {
                echo "0 results";
            }
        }
    }
    $connection = new Connection();

    if ($_POST) {
        $connection->Cadastrar($_POST);
        $connection->mostrarDados();
    }
?>