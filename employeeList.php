<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // GET DATA
    $query = $pdo->prepare("SELECT first_name, last_name, user_id FROM Users");
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
