<?php
// Include de configuratie voor de base_url helper
include 'config.php';
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
        <a class="navbar-brand" href="<?php echo base_url(); ?>">ShareBoard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <span class="navbar-text">Ingelogd als: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('views/addshare.php'); ?>">Nieuwe Share</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('views/logout.php'); ?>">Uitloggen</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('views/login.php'); ?>">Inloggen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('views/register.php'); ?>">Registreren</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
