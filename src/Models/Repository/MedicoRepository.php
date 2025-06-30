<?php

namespace Htdocs\Src\Models\Repository;

use Htdocs\Src\Config\Connection;
use Htdocs\Src\Models\Entity\Medico;
use PDO;

class MedicoRepository {
    public $conn;

    public function isConnected() {
        return $this->conn !== null;
    }

    public function __construct() {
        $database = new Connection();
        $this->conn = $database->getConnection();
        if (!$this->conn) {
            echo "Erro: Não foi possível conectar ao banco de dados.\n";
            exit(1);
        }
    }

    public function save(Medico $medico) {
        $sql = "INSERT INTO medico (id_usuario, crm_medico) VALUES (:id_usuario, :crm_medico)";
        $stmt = $this->conn->prepare($sql);
        $id_usuario = $medico->getIdUsuario();
        $crm_medico = $medico->getCrmMedico();
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':crm_medico', $crm_medico);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function findById($id) {
        $sql = "SELECT * FROM medico WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll() {
        $sql = "SELECT * FROM medico";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(Medico $medico) {
        $id_usuario = $medico->getIdUsuario();
        $crm_medico = $medico->getCrmMedico();

        $sql = "UPDATE medico SET crm_medico = :crm_medico WHERE id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':crm_medico', $crm_medico);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM medico WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM medico WHERE email_usuario = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>