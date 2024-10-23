<?php
// Bepaal het rootpad van je project
function base_url($path = '') {
    // Dynamisch bepalen waar je project draait
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    return rtrim($protocol . $domainName, '/') . '/' . ltrim($path, '/');
}
?>
