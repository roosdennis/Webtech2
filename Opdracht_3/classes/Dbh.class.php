<?php
class Dbh {
    private $dbPath = __DIR__ . '/../db/shareboard.sqlite3';  // Absoluut pad naar de database

    protected function connect() {
        $dsn = 'sqlite:' . $this->dbPath;
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
?>
