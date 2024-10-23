<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php?error=notloggedin");
    exit();
}

// Controleer of een share-id is meegegeven
if (isset($_GET['id'])) {
    $shareId = $_GET['id'];

    // Voeg het autoload script toe
    require_once '../includes/class-autoload.inc.php';

    // Maak een nieuwe shares-controller aan
    $shareController = new SharesContr();

    // Verwijder de share
    $shareController->deleteShare($shareId);

    // Redirect terug naar de homepage
    header("Location: ../index.php?share=deleted");
    exit();
} else {
    header("Location: ../index.php?error=noshareid");
    exit();
}
?>
