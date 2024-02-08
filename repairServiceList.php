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
    $query = $pdo->prepare("SELECT name, repair_service_id FROM repairServices");
    $query->execute();
    $repairServices = $query->fetchAll(PDO::FETCH_ASSOC);
    // afficher repairService
    foreach ($repairServices as $repairService) {
        echo '<div class="d-flex justify-content-left p-2">';
        echo '<input class="m-2" type="checkbox" name="repair_service_id" value="' . $repairService['repair_service_id'] . '">';
        echo '<p class="align-self-center">' . $repairService['name'] . "<p>" . "<br>";
        echo '</div>';
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
