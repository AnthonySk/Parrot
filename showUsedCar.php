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
    $query = $pdo->prepare("SELECT * FROM usedCarsAd");
    $query->execute();
    $usedCarsAd = $query->fetchAll(PDO::FETCH_ASSOC);

    // afficher repairService

    foreach ($usedCarsAd as $car) {
        echo '<div class="col d-flex justify-content-center m-2 ">';
            echo '<div class="card usedCardAd">';
                echo '<img class="card-img-top img-fluid z-0" src="' . $car['picture'] . '" alt="photo de ' . $car['brand'] . " " . $car['model'] . '">';
                echo '<div class="badge z-1 position-absolute p-2">' . $car['price'] . ' €</div>';
                echo '<div class="card-body p-1">';
                    echo '<h3 class="card-title">' . $car['brand'] . $car['model'] . '</h3>';
                    echo '<p class="card-text">' . $car['year'] . '</p>';
                    echo '<p class="card-text">' . $car['motorisation'] . '</p>';
                    echo '<p class="card-text">' . $car['kilometers'] . '</p>';
                    echo '<p class="card-text">' . $car['price'] . '</p>';
                    echo '<button class="btn m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_repairServices" aria-expanded="false" aria-controls="collapse">';
                        echo 'Détails';
                    echo '</button>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
