<?php
class Dbh {
    private $dbPath = './db/shareboard.sqlite3';  // Path naar database in de 'db' map

    protected function connect() {
        $dsn = 'sqlite:' . $this->dbPath;
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
?>