<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Share Toevoegen</title>
</head>
<body>
<h2>Nieuwe Share Toevoegen</h2>
<form action="../controllers/AddShareController.php" method="POST">
    <label for="title">Titel:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="body">Inhoud:</label>
    <textarea id="body" name="body" required></textarea><br><br>

    <label for="link">Link (optioneel):</label>
    <input type="url" id="link" name="link"><br><br>

    <button type="submit" name="submit">Share Toevoegen</button>
</form>
</body>
</html>
