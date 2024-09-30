<?php

declare(strict_types = 1);
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* HIER CODE (zie de instructies op Blackboard) */
require APP_PATH . 'app.php';
$files = getTransactionFiles(FILES_PATH);
//
//$transactions= [];
//foreach ($files as $file){
//    $transactions[] = array_merge($transactions, getTransactions($file));
//}
//
//print("<br><br><br><br><br><br><br><br><br><br><br><br>");
//require VIEWS_PATH . 'transactions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactiebestanden</title>
</head>
<body>
<h1>Klik op een bestand om de transacties te bekijken</h1>
<ul>
    <?php foreach ($files as $file): ?>
        <li>
            <a href="../views/transactions.php?file=<?php echo urlencode(basename($file)); ?>">
                <?php echo basename($file); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
