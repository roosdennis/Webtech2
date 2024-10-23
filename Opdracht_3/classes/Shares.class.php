<?php
class Shares extends Dbh {

    // Voeg een nieuwe share toe
    protected function setShare($userId, $title, $body, $link) {
        $sql = "INSERT INTO shares (user_id, title, body, link) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId, $title, $body, $link]);
    }

    // Haal alle shares op
    protected function getShares() {
        $sql = "SELECT * FROM shares";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    // Haal een specifieke share op uit de database
    protected function fetchShareById($shareId) {
        $sql = "SELECT * FROM shares WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$shareId]);
        return $stmt->fetch();  // Haal de eerste rij op (de share)
    }

    // Wijzig een share
    protected function editShare($shareId, $title, $body, $link) {
        $sql = "UPDATE shares SET title = ?, body = ?, link = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $body, $link, $shareId]);
    }

    // Verwijder een share
    protected function removeShare($shareId) {
        $sql = "DELETE FROM shares WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$shareId]);
    }
}
?>
