<?php

declare(strict_types = 1);
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* HIER CODE (zie de instructies op Blackboard) */
require_once APP_PATH . 'app.php';

$files = getTransactionFiles(FILES_PATH);

$transactions= [];
foreach ($files as $file){
    $transactions[] = array_merge($transactions, getTransactions($file));
}

require_once VIEWS_PATH . 'transactions.php';