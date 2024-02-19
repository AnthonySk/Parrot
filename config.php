<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// CONFIG.PHP = .ENV
$servername = $_ENV['DB_HOST'];
$database = $_ENV['DB_NAME'];
$usernameDb = $_ENV['DB_USER'];
$passwordDb = $_ENV['DB_PASS'];
