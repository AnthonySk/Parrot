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
    echo "connexion bdd ok <br>";
    $repair_service_id = $_POST['repair_service_id'];
    echo "preparation ok";
    // Requête
    $query = $pdo->prepare("DELETE FROM RepairServices WHERE repair_service_id = ?");
    $query->execute([$repair_service_id]);
    echo 'requête réussie';
    header("Location: index.php");
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
