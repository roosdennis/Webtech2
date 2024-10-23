<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>
    <!-- Bootstrap toevoegen voor styling (optioneel) -->
</head>
<body>
<h2>Registreren</h2>
<form action="../controllers/RegisterController.php" method="POST">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Wachtwoord:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="passwordRepeat">Herhaal wachtwoord:</label>
    <input type="password" id="passwordRepeat" name="passwordRepeat" required><br><br>

    <button type="submit" name="submit">Registreren</button>
</form>
</body>
</html>
