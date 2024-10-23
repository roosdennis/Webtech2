<?php
class Users extends Dbh {

    // Methode om een nieuwe gebruiker toe te voegen
    protected function setUser($username, $email, $hashedPwd) {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email, $hashedPwd]);
    }

    // Methode om te controleren of een gebruiker al bestaat
    protected function checkUser($username, $email) {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email]);
        return $stmt->fetch();
    }

    // Haal gebruiker op met gebruikersnaam
    public function getUser($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
}
