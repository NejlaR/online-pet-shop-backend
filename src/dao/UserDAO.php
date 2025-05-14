<?php

class UserDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function findAll() {
        $stmt = $this->db->query("SELECT id, full_name, username, email FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($full_name, $username, $email, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (full_name, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$full_name, $username, $email, $password]);
    }

    // Milestone 3 test
}
?>
