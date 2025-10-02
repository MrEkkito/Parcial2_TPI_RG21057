<?php
namespace app\models;

require_once $_SERVER['DOCUMENT_ROOT'] . "/conexionphp/database.php";

use Database;

class DatosModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        return $this->db->select("SELECT * FROM tbl_estudiantes");
    }

    public function insert($nombre, $email) {
    $sql = "INSERT INTO tbl_estudiantes (nombre, email) VALUES (:nombre, :email)";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
}

public function delete($id) {
    $sql = "DELETE FROM tbl_estudiantes WHERE id = :id";
    $stmt = $this->db->getConnection()->prepare($sql);
    $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
    return $stmt->execute();
}

}
