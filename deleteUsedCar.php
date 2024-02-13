<?php
session_start();
$servername = "127.0.0.1";
$usernameDb = "root";
$passwordDb = "Ragnarok";
$database = "Parrot";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // Définir le mode d'erreur PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $usedCar_id = $_POST['used_car_ad_id'];

    // Requête
    $query = $pdo->prepare("DELETE FROM UsedCarsAd WHERE used_car_ad_id = ?");
    $query->execute([$usedCar_id]);

    header("Location: index.php");
    
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
