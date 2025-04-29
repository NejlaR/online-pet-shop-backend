<?php

class UserService {
    private $dao;

    public function __construct($dao) {
        $this->dao = $dao;
    }

    public function register($full_name, $username, $email, $password) {
        $existingUser = $this->dao->findByUsername($username);
        if ($existingUser) {
            throw new Exception('Username already exists');
        }
        $this->dao->addUser($full_name, $username, $email, password_hash($password, PASSWORD_DEFAULT));
    }

    public function login($username, $password) {
        $user = $this->dao->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>
