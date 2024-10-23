<?php
session_start();

// Voeg autoload toe voor het laden van klassen
require_once 'includes/class-autoload.inc.php';

// Functie om een passend welkomstbericht te geven op basis van de tijd
function getWelcomeMessage($name) {
$hour = date('H'); // Haal het huidige uur op (24-uursnotatie)

if ($hour >= 5 && $hour < 12) {
return "Goedemorgen, " . htmlspecialchars($name);
} elseif ($hour >= 12 && $hour < 18) {
return "Goedemiddag, " . htmlspecialchars($name);
} elseif ($hour >= 18 && $hour < 22) {
return "Goedenavond, " . htmlspecialchars($name);
} else {
return "Goedenacht, " . htmlspecialchars($name);
}
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareBoard</title>

    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- Navigatie en header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ShareBoard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <span class="navbar-text">Ingelogd als: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="views/addshare.php">Nieuwe Share</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="views/logout.php">Uitloggen</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="views/login.php">Inloggen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="views/register.php">Registreren</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Melding voor succesvolle registratie -->
<div class="container mt-3">
    <?php if (isset($_GET['register']) && $_GET['register'] == 'success'): ?>
        <div class="alert alert-success" role="alert">
            Dank voor de registratie! Je kunt nu inloggen.
        </div>
    <?php endif; ?>
</div>

<!-- Welkomstbericht bij succesvol inloggen -->
<div class="container mt-3">
    <?php if (isset($_GET['login']) && $_GET['login'] == 'success' && isset($_SESSION['username'])): ?>
        <div class="alert alert-success" role="alert">
            <?php echo getWelcomeMessage($_SESSION['username']); ?>! Welkom terug.
        </div>
    <?php endif; ?>
</div>

<!-- Sectie voor shares -->
<div class="container mt-5">
    <h2 class="mb-4">Alle Shares</h2>

    <?php
    // Haal alle shares op en toon ze
    $sharesView = new SharesView();
    $sharesView->showShares();
    ?>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    &copy; 2024 ShareBoard
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
