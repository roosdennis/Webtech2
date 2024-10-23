<?php
class SharesView extends Shares {
    public function showShares() {
        $shares = $this->getShares();

        if (!$shares) {
            echo "Nog geen shares.";
            return;
        }

        foreach ($shares as $share) {
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h3 class='card-title'>" . htmlspecialchars($share['title']) . "</h3>";
            echo "<p class='card-text'>" . htmlspecialchars($share['body']) . "</p>";

            if (!empty($share['link'])) {
                echo "<a href='" . htmlspecialchars($share['link']) . "'>Lees meer</a>";
            }

            // "Bewereken" en "Verwijder" knoppen voor ingelogde gebruikers
            if (isset($_SESSION['username'])) {
                echo "<div class='d-flex flex-column align-items-end mt-3'>";
                echo "<a href='/views/editshare.php?id=" . $share['id'] . "' class='btn btn-warning mb-2'>Bewerken</a>";
                echo "<a href='/controllers/DeleteShareController.php?id=" . $share['id'] . "' class='btn btn-danger'>Verwijderen</a>";
                echo "</div>";
            }

            echo "</div>";
            echo "</div>";
        }
    }
}
?>