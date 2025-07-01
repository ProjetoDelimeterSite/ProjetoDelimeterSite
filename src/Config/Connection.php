<?php
namespace Htdocs\Src\Config;

use PDO;
use PDOException;

class Connection {
    private $host = "sql312.infinityfree.com"; // nome do serviço do banco no docker-compose
    private $db_name = "if0_39363106_delimeter"; // alterado para o nome correto do banco de dados
    private $username = "if0_39363106"; // alterado para o usuário correto
    private $password = "SGlec96032"; // alterado para a senha correta
    private $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->exec('set names utf8');
            return $this->conn;
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
            return null;
        }
        return $this->conn;
    }
}
?>