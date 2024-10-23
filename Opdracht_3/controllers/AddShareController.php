<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['username'])) {
    header("Location: ../views/login.php?error=notloggedin");
    exit();
}

// Controleer of het formulier is verstuurd
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $link = isset($_POST['link']) ? $_POST['link'] : null;

    // Validaties
    if (empty($title) || empty($body)) {
        header("Location: ../views/addshare.php?error=emptyfields");
        exit();
    }

    // Voeg het autoload script toe
    require_once '../includes/class-autoload.inc.php';

    // Maak een nieuwe Share controller aan
    $shareController = new SharesContr();

    // Voeg de share toe aan de database
    $shareController->addShare($_SESSION['username'], $title, $body, $link);

    // Succesvol toegevoegd
    header("Location: ../index.php?share=success");
    exit();
} else {
    header("Location: ../views/addshare.php");
    exit();
}
?>
