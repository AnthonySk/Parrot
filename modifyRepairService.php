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

    // Récupération des données
    $repair_service_id = $_POST['repair_service_id']; # repair_service_id
    $repair_service_column = $_POST['repair_service_column']; # colonne à modifier
    
    $new_value = $_POST['new_value']; # nouvelle valeur
    echo "id :" . $repair_service_id . "<br>" . "colonne :" . $repair_service_column . "<br>" . "new value :" . $new_value . "<br>";

    // Requête de modification
    $query = $pdo->prepare("UPDATE repairServices SET $repair_service_column = '$new_value' WHERE repair_service_id = ?");
    $query->execute([$repair_service_id]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
