<?php

declare(strict_types = 1);
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'app.php';

// Check of het bestand is geselecteerd
if (isset($_GET['file'])) {
    $fileName = basename($_GET['file']); // Zorg ervoor dat er geen path traversal mogelijk is
    $filePath = FILES_PATH . $fileName;

    if (file_exists($filePath)) {
        // Haal de transacties van het geselecteerde bestand op
        $transactions = getTransactions($filePath);
    } else {
        die("Het geselecteerde bestand bestaat niet.");
    }
} else {
    die("Geen bestand geselecteerd.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacties</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th, table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th, tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>
<body>
<h1>Transacties voor bestand: <?php echo htmlspecialchars($fileName); ?></h1>
<table>
    <thead>
    <tr>
        <th>Datum</th>
        <th>Check #</th>
        <th>Beschrijving</th>
        <th>Bedrag</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($transactions)): ?>
        <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?php echo htmlspecialchars($transaction[0]); ?></td>
                <td><?php echo htmlspecialchars($transaction[1]); ?></td>
                <td><?php echo htmlspecialchars($transaction[2]); ?></td>
                <td style="color: <?php echo ($transaction[3] >= 0) ? 'green' : 'red'; ?>">
                    <?php echo htmlspecialchars($transaction[3]); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="4">Geen transacties gevonden</td></tr>
    <?php endif; ?>
    </tbody>
    <tfoot>
    <tr>
        <th colspan="3">Totale Inkomsten:</th>
        <td><?php echo number_format(totalIncome([$transactions]), 2, ',', '.'); ?></td>
    </tr>
    <tr>
        <th colspan="3">Totale Uitgaven:</th>
        <td><?php echo number_format(totalExpenses([$transactions]), 2, ',', '.'); ?></td>
    </tr>
    <tr>
        <th colspan="3">Netto totaal:</th>
        <?php $netTotal = totalIncome([$transactions]) + totalExpenses([$transactions]); ?>
        <td style="color: <?php echo ($netTotal >= 0) ? 'green' : 'red'; ?>">
            <?php echo number_format($netTotal, 2, ',', '.'); ?>
        </td>
    </tr>
    </tfoot>
</table>
</body>
</html>
