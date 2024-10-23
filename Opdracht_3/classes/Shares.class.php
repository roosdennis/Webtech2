<?php
class Shares extends Dbh {

    // Voeg een nieuwe share toe
    protected function setShare($userId, $title, $body, $link) {
        $sql = "INSERT INTO shares (user_id, title, body, link) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId, $title, $body, $link]);
    }

    // Haal shares op uit de database
    protected function getShares() {
        $sql = "SELECT * FROM shares";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }
}
?>
