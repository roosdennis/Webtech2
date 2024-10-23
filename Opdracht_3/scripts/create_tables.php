<?php
try {
    // Verbind met de SQLite-database
    $pdo = new PDO('sqlite:../db/shareboard.sqlite3');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lees het SQL-bestand uit de 'db' map
    $sql = file_get_contents('../db/create_sqlite_tables.sql');

    // Voer de SQL-queries uit om de tabellen aan te maken
    $pdo->exec($sql);

    echo "Tabellen succesvol aangemaakt!";
} catch (PDOException $e) {
    echo "Fout bij het aanmaken van tabellen: " . $e->getMessage();
}
?>
