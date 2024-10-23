<?php
class SharesView extends Shares {
    public function showShares() {
        $shares = $this->getShares();

        if (!$shares) {
            echo "Nog geen shares.";
            return;
        }

        foreach ($shares as $share) {
            echo "<h3>" . htmlspecialchars($share['title']) . "</h3>";
            echo "<p>" . htmlspecialchars($share['body']) . "</p>";
            if (!empty($share['link'])) {
                echo "<a href='" . htmlspecialchars($share['link']) . "'>Lees meer</a><br>";
            }
            echo "<hr>";
        }
    }
}
?>
