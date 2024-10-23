<?php
class SharesContr extends Shares {

    // Voeg een nieuwe share toe
    public function addShare($username, $title, $body, $link) {
        // Haal het ID van de gebruiker op via de gebruikersnaam
        $userModel = new Users();
        $user = $userModel->getUser($username);

        if ($user) {
            $this->setShare($user['id'], $title, $body, $link);
        }
    }

    // Haal alle shares op
    public function getAllShares() {
        return $this->getShares();
    }
}
?>
