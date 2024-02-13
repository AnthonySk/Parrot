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
    $query = $pdo->prepare("SELECT days, houry_start, houry_end, houry_start_opt, houry_end_opt FROM schedules ORDER BY FIELD('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche')");
    $query->execute();
    $schedules = $query->fetchAll(PDO::FETCH_ASSOC);

    // afficher schedules
    foreach ($schedules as $schedule) {
        echo $schedule['days'] . ' : ' . $schedule['houry_start'] . '-' . $schedule['houry_end'] . ' | ' .  $schedule['houry_start_opt'] . '-' . $schedule['houry_end_opt'];
    }

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
