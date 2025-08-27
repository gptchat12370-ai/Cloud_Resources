<?php
// Single source of truth comes from getAppParameters.php (written by user-data).
// Falls back to environment variables (or safe defaults) if that file isn't present.

$cfg = __DIR__ . '/getAppParameters.php';
if (is_readable($cfg)) {
    require $cfg;   // defines $APP_ENDPOINT, $APP_USER, $APP_PASSWORD, $APP_DATABASE
} else {
    $APP_ENDPOINT = getenv('APP_ENDPOINT') ?: 'msricloud-database.cmhaqoq2usks.us-east-1.rds.amazonaws.com';
    $APP_USER     = getenv('APP_USER')     ?: 'msriapp';
    $APP_PASSWORD = getenv('APP_PASSWORD') ?: 'StrongPass!123';
    $APP_DATABASE = getenv('APP_DATABASE') ?: 'country_schema';
}

// Back-compat variables many pages expect
$ep = $APP_ENDPOINT;
$un = $APP_USER;
$pw = $APP_PASSWORD;
$db = $APP_DATABASE;
