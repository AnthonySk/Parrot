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
    $query = $pdo->prepare("SELECT * FROM repairServices");
    $query->execute();
    $repairServices = $query->fetchAll(PDO::FETCH_ASSOC);

    // afficher repairService
    echo $repairService['picture'];
    foreach ($repairServices as $repairService) {
        echo '<div class="col m-2">';
            echo '<div class="card repairService">';
                echo '<img class ="card-img-top img-fluid z-0" src="' . $repairService['picture'] . '" alt="image' . $repairService['name'] . '">';
                echo '<div class="badge z-1 position-absolute p-2">' . $repairService['price'] . '</div>';
                echo '<div class="card-body p-1">';
                    echo '<h3 class="card-title">' . $repairService['name'] . '</h3>';
                    echo '<p class="card-text">' . $repairService['description'] . '</p>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
