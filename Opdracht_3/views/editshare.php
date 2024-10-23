<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php?error=notloggedin");
    exit();
}

// Haal de share ID op
if (isset($_GET['id'])) {
    $shareId = $_GET['id'];

    // Voeg het autoload script toe
    require_once '../includes/class-autoload.inc.php';

    // Haal de huidige gegevens van de share op
    $shareController = new SharesContr();
    $share = $shareController->getShareById($shareId);
} else {
    header("Location: ../index.php?error=noshareid");
    exit();
}
include '../includes/header.php'
?>

<div class="container mt-5">
    <h2>Share Bewerken</h2>
    <form action="../controllers/EditShareController.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($share['id']); ?>">

        <div class="mb-3">
            <label for="title" class="form-label">Titel:</label>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($share['title']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Inhoud:</label>
            <textarea id="body" name="body" class="form-control" required><?php echo htmlspecialchars($share['body']); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link (optioneel):</label>
            <input type="url" id="link" name="link" class="form-control" value="<?php echo htmlspecialchars($share['link']); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>

<?php
include '../includes/footer.php'
?>
