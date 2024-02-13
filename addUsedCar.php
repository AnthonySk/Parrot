<?php
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

$servername = "127.0.0.1";
$usernameDb = "root";
$passwordDb = "Ragnarok";
$database = "Parrot";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // Définir le mode d'erreur PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connexion avec la BDD établie <br>';

    // Inscription new users
    $usedCarAd_id = Uuid::uuid4()->toString();
    $brand = trim($_POST['usedCar_brand']);
    $price = trim($_POST['usedCar_price']);
    $year = trim($_POST['usedCar_year']);
    $gearbox = trim($_POST['usedCar_gearbox']);
    $motorisation = trim($_POST['usedCar_motorisation']);
    $description = trim($_POST['usedCar_description']);
    $color = trim($_POST['usedCar_color']);
    $model = trim($_POST['usedCar_model']);
    $kilometers = trim($_POST['usedCar_kilometers']);
    $img = $_FILES['usedCar_img'];
    
    // transfert de l'image
    $dir_target = "ImgVehicles/";
    $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
    $img_path = $dir_target . $model . '.' . $extension;

    if (move_uploaded_file($img['tmp_name'], "$img_path")) {
        echo 'image transféré vers ' . $dir_target . 'à' . $img_path . '<br>';
    } else {
        echo 'problème de transfert <br>' . $img['error'];
    }

    // requête
    $query = $pdo->prepare("INSERT INTO UsedCarsAd (used_car_ad_id, brand, price, year, gearbox, motorisation, description, color, model, kilometers, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$usedCarAd_id, $brand, $price, $year, $gearbox, $motorisation, $description, $color, $model, $kilometers, $img_path]);

    if ($query->rowCount() > 0) {
        echo "Véhicules enregistré avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement du véhicules.";
    }

        // redirection
        header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
