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
    
    // Récupér les users en BDD
    $query = $pdo->prepare("SELECT brand, model, used_car_ad_id FROM usedCarsAd");
    $query->execute();
    $usedCars = $query->fetchAll(PDO::FETCH_ASSOC);
    
    // afficher vehicles
    foreach ($usedCars as $car) {
        echo '<div class="d-flex justify-content-left p-2">';
        echo '<input class="m-2" type="checkbox" name="used_car_ad_id" value="' . $car['used_car_ad_id'] . '">';
        echo '<p class="align-self-center">' . $car['brand'] . " " . $car['model'] . "<p>" . "<br>";
        echo '</div>';
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
