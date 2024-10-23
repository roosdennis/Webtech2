<?php
if (isset($_POST['submit'])) {
    // Haal de gegevens op uit het formulier
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validaties
    if (empty($username) || empty($password)) {
        header("Location: ../views/login.php?error=emptyfields");
        exit();
    }

    // Voeg het autoload script toe
    require_once '../includes/class-autoload.inc.php';

    // Maak een nieuwe gebruiker controller aan
    $userController = new UsersContr();

    // Controleer of de gebruiker bestaat en verifieer wachtwoord
    if ($userController->loginUser($username, $password)) {
        // Succesvol ingelogd
        session_start();
        $_SESSION['username'] = $username;
        header("Location: ../index.php?login=success");
        exit();
    } else {
        // Fout bij inloggen
        header("Location: ../views/login.php?error=invalidlogin");
        exit();
    }
} else {
    // Onjuist gebruik van het formulier
    header("Location: ../views/login.php");
    exit();
}
