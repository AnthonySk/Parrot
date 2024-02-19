<?php
require_once "config.php";
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connexion avec la BDD établie <br>';

    // DATA FOR NEW USED CAR
    $usedCarAd_id = Uuid::uuid4()->toString();
    $brand = htmlspecialchars($_POST['usedCar_brand'], ENT_QUOTES, 'UTF-8');
    $price = htmlspecialchars($_POST['usedCar_price'], ENT_QUOTES, 'UTF-8');
    $year = htmlspecialchars($_POST['usedCar_year'], ENT_QUOTES, 'UTF-8');
    $gearbox = htmlspecialchars($_POST['usedCar_gearbox'], ENT_QUOTES, 'UTF-8');
    $motorisation = htmlspecialchars($_POST['usedCar_motorisation'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST['usedCar_description'], ENT_QUOTES, 'UTF-8');
    $color = htmlspecialchars($_POST['usedCar_color'], ENT_QUOTES, 'UTF-8');
    $model = htmlspecialchars($_POST['usedCar_model'], ENT_QUOTES, 'UTF-8');
    $kilometers = htmlspecialchars($_POST['usedCar_kilometers'], ENT_QUOTES, 'UTF-8');
    $img = $_FILES['usedCar_img'];
    
    // IMG DATA FOR TRANSFER
    $dir_target = "ImgVehicles/";
    $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
    $mimeTypeAuthorised = ['image/jpeg', 'image/jpg', 'image/webp'];
    $mimeTypeImg = mime_content_type($img['tmp_name']);
    $sizeFileMax = 2 * 1024 * 1024;
    $sizeFile = $img['size'];

    // VALIDATION
        // VALIDATION PRICE
        if (filter_var($price, FILTER_VALIDATE_FLOAT)) {
            $price = floatval($price);
        } else {
            exit('Prix invalide');
        }

        // VALIDATION IMG
    if ($sizeFile < $sizeFileMax) {
        if (in_array($mimeTypeImg, $mimeTypeAuthorised)) {
            $img_path = $dir_target . $model . '.' . $extension;
            if (move_uploaded_file($img['tmp_name'], $img_path)) {
                echo 'image transféré vers ' . $dir_target . 'à' . $img_path . '<br>';
            } else {
                exit('problème de transfert :' . $img['error']);
            }
        } else {
            exit('type MIME du fichier non autorisé');
        }
    } else {
        exit('Taille maximale de fichier dépassée');
    }

    // QUERY
    $query = $pdo->prepare("INSERT INTO UsedCarsAd (used_car_ad_id, brand, price, year, gearbox, motorisation, description, color, model, kilometers, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$usedCarAd_id, $brand, $price, $year, $gearbox, $motorisation, $description, $color, $model, $kilometers, $img_path]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
