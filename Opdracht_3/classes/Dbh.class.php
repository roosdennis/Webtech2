<?php
class Dbh {
    private $dbPath = __DIR__ . '/../db/shareboard.sqlite3';
    private $sqlFile = __DIR__ . '/../db/create_sqlite_tables.sql';

    protected function connect() {
        // Controleer of de database bestaat
        if (!file_exists($this->dbPath)) {
            $this->createDatabase();
        }

        $dsn = 'sqlite:' . $this->dbPath;
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    // Functie om de database aan te maken als deze niet bestaat
    private function createDatabase() {
        $dsn = 'sqlite:' . $this->dbPath;
        $pdo = new PDO($dsn);

        // Controleer of het SQL-bestand bestaat
        if (file_exists($this->sqlFile)) {
            // Lees het SQL-bestand in
            $sql = file_get_contents($this->sqlFile);

            // Voer de SQL uit om de tabellen aan te maken
            $pdo->exec($sql);
        } else {
            echo "Fout: SQL-bestand niet gevonden!";
        }
    }
}
?>

