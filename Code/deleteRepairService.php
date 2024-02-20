<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ID TO DELETE
    $repair_service_id = htmlspecialchars($_POST['repair_service_id'], ENT_QUOTES, 'UTF-8');

    // DELETE IMG OF DIR
    $query = $pdo->prepare("SELECT picture FROM RepairServices WHERE repair_service_id = ?");
    $query->execute([$repair_service_id]);
    $image = $query->fetch();

    if ($image && file_exists($image['picture'])) {
        unlink($image['picture']);
    }

    // QUERY
    $query = $pdo->prepare("DELETE FROM RepairServices WHERE repair_service_id = ?");
    $query->execute([$repair_service_id]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
