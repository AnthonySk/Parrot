<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // GET DATA
    $query = $pdo->prepare("SELECT name, repair_service_id FROM repairServices");
    $query->execute();
    $repairServices = $query->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
