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
    $usedCars_id = $_POST['used_car_ad_id'];
    $usedCar_column = $_POST['used_car_column'];
        
        // data to modify
    $new_value_brand = $_POST['new_value_brand'];
    $new_value_model = $_POST['new_value_model'];
    $new_value_color = $_POST['new_value_color'];
    $new_value_description = $_POST['new_value_description'];

    $new_value_motorisation = $_POST['new_value_motorisation'];
    $new_value_gearbox = $_POST['new_value_gearbox'];

    $new_value_kilometers = $_POST['new_value_kilometers'];
    $new_value_price = $_POST['new_value_price'];
    $new_value_year = $_POST['new_value_year'];

    $new_value_file = $_FILES['new_value_file'];


    // Affecter la valeur modifié a $new_value_to_use
    switch ($usedCar_column) {
        case 'brand':
            $new_value_to_modify = $new_value_brand;
            break;
        case 'model':
            $new_value_to_modify = $new_value_model;
            break;
        case 'color':
            $new_value_to_modify = $new_value_color;
            break;
        case 'description':
            $new_value_to_modify = $new_value_description;
            break;

        case 'motorisation':
            $new_value_to_modify = $new_value_motorisation;
            break;
        case 'gearbox':
            $new_value_to_modify = $new_value_gearbox;
            break;

        case 'kilometers':
            $new_value_to_modify = $new_value_kilometers;
            break;
        case 'price':
            $new_value_to_modify = $new_value_price;
            break;
        case 'year':
            $new_value_to_modify = $new_value_year;
            break;
        case 'picture':
            if ($new_value_file !== null) {
                $dir_target = "ImgVehicles/";
                $extension = pathinfo($new_value_file['name'], PATHINFO_EXTENSION);
                $new_value_file_path = $dir_target . $model . '.' . $extension; // regler le probleme de nom du fichier -> $model ???
                $new_value_to_modify = $new_value_file_path;
            }
        break;
        default:
            echo 'champ de modification non reconnu';
    }
    var_dump($usedCar_column, $new_value_to_modify, $usedCars_id);


    // Requête de modification
    $query = $pdo->prepare("UPDATE UsedCarsAd SET $usedCar_column = '$new_value_to_modify'  WHERE used_car_ad_id = ?");
    $query->execute([$usedCars_id]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
