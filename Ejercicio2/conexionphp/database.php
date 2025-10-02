<?php

class Database {
    private $host = "db";
    private $db_name = "db_estudiantes";
    private $username = "root";
    private $password = "rootpass";
    private $conn;

    public function getConnection() {
        if ($this->conn == null) {
            try {
                $this->conn = new PDO(
                    "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                    $this->username,
                    $this->password
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception) {
                die("Error de conexión: " . $exception->getMessage());
            }
        }
        return $this->conn;
    }

    public function select($query, $params = []) {
        $stmt = $this->getConnection()->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($query, $params = []) {
        $stmt = $this->getConnection()->prepare($query);
        return $stmt->execute($params);
    }

    public function update($query, $params = []) {
        $stmt = $this->getConnection()->prepare($query);
        return $stmt->execute($params);
    }

    public function delete($query, $params = []) {
        $stmt = $this->getConnection()->prepare($query);
        return $stmt->execute($params);
    }
}
