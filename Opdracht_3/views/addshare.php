<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Share Toevoegen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
