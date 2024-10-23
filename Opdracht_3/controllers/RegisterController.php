<?php
// Controleren of het formulier is verstuurd
if (isset($_POST['submit'])) {
    // Haal de gegevens op uit het formulier
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];

    // Validaties
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../views/register.php?error=emptyfields");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../views/register.php?error=invalidemail");
        exit();
    } elseif ($password !== $passwordRepeat) {
        header("Location: ../views/register.php?error=passwordcheck");
        exit();
    }

    // Voeg het autoload script toe
    require_once '../includes/class-autoload.inc.php';

    // Maak een nieuwe gebruiker aan via de UsersContr controller
    $userController = new UsersContr();

    // Controleer of de gebruikersnaam of e-mail al bestaat
    if ($userController->userExists($username, $email)) {
        header("Location: ../views/register.php?error=usertaken");
        exit();
    }

    // Voeg de gebruiker toe aan de database
    $userController->registerUser($username, $email, $password);

    // Succesvol geregistreerd
    header("Location: ../views/register.php?register=success");
    exit();
} else {
    // Als de gebruiker het formulier niet correct invult
    header("Location: ../views/register.php");
    exit();
}
