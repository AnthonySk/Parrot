<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // Définir le mode d'erreur PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Récupér les users en BDD
    $query = $pdo->prepare("SELECT * FROM repairServices");
    $query->execute();
    $repairServices = $query->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
