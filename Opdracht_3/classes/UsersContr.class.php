<?php
class UsersContr extends Users {

    // Registreer de gebruiker
    public function registerUser($username, $email, $password) {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $this->setUser($username, $email, $hashedPwd);
    }

    // Controleer of de gebruiker al bestaat
    public function userExists($username, $email) {
        return $this->checkUser($username, $email) ? true : false;
    }

    // Inloggen van de gebruiker
    public function loginUser($username, $password) {
        // Haal de gebruiker op uit de database
        $user = $this->getUser($username);

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }
}
