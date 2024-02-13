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
    $query = $pdo->prepare("SELECT rating_id, name, rate, message, is_validate FROM ratings WHERE is_validate IS NULL");
    $query->execute();
    $ratings = $query->fetchAll(PDO::FETCH_ASSOC);
    // afficher repairService
    foreach ($ratings as $rating) {
        echo '<div class="card">';
            echo '<div class="card-body">';
                echo '<div class="row">';
                    echo '<div class="col">';
                        echo '<input class="m-2" type="checkbox" name="rating_id" value="' . $rating['rating_id'] . '">';
                    echo '</div>';
                    echo '<div class="col">';
                        echo '<p class="d-inline-flex">' . $rating['name'] . '<p>';
                    echo '</div>';
                    echo '<div class="col">';
                        for ($i = 1; $i <= 5; $i++) {
                            echo $i <= $rating['rate'] ? '<i class="bi bi-star-fill"></i>' : '<i class="bi bi-star"></i>';
                        }
                    echo '</div>';
                echo '</div>';
                echo '<div class="row">';
                    echo '<p class="text-center"><< ' . $rating['message'] .  ' >><p>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
