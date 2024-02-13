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
    $query = $pdo->prepare("SELECT * FROM ratings WHERE is_validate = 1");
    $query->execute();
    $ratings = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($ratings as $rating) {
        echo '<div class="message d-none">';
            echo '<blockquote class="m-1 fs-2">« ' . $rating['message'] . ' »</blockquote>';
                echo '<div class="d-flex align-items-center justify-content-center">';
                    echo '<p class="pt-3 pe-1">' . $rating['name'] . '</p>';
                        for ($i = 1; $i <= 5; $i++) {
                            echo $i <= $rating['rate'] ? '<i class="blueStar bi bi-star-fill pt-3 ps-1"></i>' : '<i class="blueStar bi bi-star pt-3 ps-1"></i>';
                        };
                echo '</div>';
        echo '</div>';
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
