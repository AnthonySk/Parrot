<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON ECXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // GET USERCARDATA IN BDD
    $data = json_decode(file_get_contents('php://input'), true);
    
    $kmMin = $data['kmMin'];
    $kmMax = $data['kmMax'];
    $priceMin = $data['priceMin'];
    $priceMax = $data['priceMax'];
    $yearMin = $data['yearMin'];
    $yearMax = $data['yearMax'];

    header('Content-Type: application/json');

    $query = $pdo->prepare("SELECT * FROM UsedCarsAd WHERE  kilometers BETWEEN ? AND ? AND price BETWEEN ? AND ? AND year BETWEEN ? AND ?");
    $query->execute([$kmMin, $kmMax, $priceMin, $priceMax, $yearMin, $yearMax]);
    $cars = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($cars);

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
