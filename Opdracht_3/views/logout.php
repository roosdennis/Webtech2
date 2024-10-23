<?php
session_start();

// Vernietig alle sessiegegevens
session_unset();
session_destroy();

// Stuur de gebruiker terug naar de homepage
header("Location: ../index.php?logout=success");
exit();