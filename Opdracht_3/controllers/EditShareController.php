<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php?error=notloggedin");
    exit();
}

// Controleer of het formulier is verstuurd
if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['body'])) {
    $shareId = $_POST['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $link = isset($_POST['link']) ? $_POST['link'] : null;

    // Voeg het autoload script toe
    require_once '../includes/class-autoload.inc.php';

    // Update de share
    $shareController = new SharesContr();
    $shareController->updateShare($shareId, $title, $body, $link);

    // Redirect naar de homepagina
    header("Location: ../index.php?share=updated");
    exit();
} else {
    header("Location: ../index.php?error=invalidinput");
    exit();
}
?>
