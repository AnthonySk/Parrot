<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // QUERY
    $query = $pdo->prepare("SELECT * FROM ratings WHERE is_validate = 1");
    $query->execute();
    $ratings = $query->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
