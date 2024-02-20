<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // DATA FOR MOD USED CARS
    $usedCars_id = htmlspecialchars($_POST['used_car_ad_id'], ENT_QUOTES, 'UTF-8');
    $usedCar_column = htmlspecialchars($_POST['used_car_column'], ENT_QUOTES, 'UTF-8');

    // GET DATA OF THIS ID
    $query = $pdo->prepare("SELECT * FROM UsedCarsAd WHERE used_car_ad_id = ?");
    $query->execute([$usedCars_id]);
    $thisCar = $query->fetch(PDO::FETCH_ASSOC);

    $new_value_brand = htmlspecialchars($_POST['new_value_brand'], ENT_QUOTES, 'UTF-8');
    $new_value_model = htmlspecialchars($_POST['new_value_model'], ENT_QUOTES, 'UTF-8');
    $new_value_color = htmlspecialchars($_POST['new_value_color'], ENT_QUOTES, 'UTF-8');
    $new_value_description = htmlspecialchars($_POST['new_value_description'], ENT_QUOTES, 'UTF-8');

    $new_value_motorisation = htmlspecialchars($_POST['new_value_motorisation'], ENT_QUOTES, 'UTF-8');
    $new_value_gearbox = htmlspecialchars($_POST['new_value_gearbox'], ENT_QUOTES, 'UTF-8');

    $new_value_kilometers = htmlspecialchars($_POST['new_value_kilometers'], ENT_QUOTES, 'UTF-8');
    $new_value_price = htmlspecialchars($_POST['new_value_price'], ENT_QUOTES, 'UTF-8');
    $new_value_year = htmlspecialchars($_POST['new_value_year'], ENT_QUOTES, 'UTF-8');

    $new_value_file = $_FILES['new_value_file'];


    // NEW VALUE
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
                // DATA FOR NEW IMG
                $dir_target = "ImgVehicles/";
                $extension = pathinfo($new_value_file['name'], PATHINFO_EXTENSION);
                $mimeTypeAuthorised = ['image/jpeg', 'image/jpg', 'image/webp'];
                $mimeTypeImg = mime_content_type($new_value_file['tmp_name']);
                $sizeFileMax = 2 * 1024 * 1024;
                $sizeFile = $new_value_file['size'];
                
                // VALIDATION IMG
                if ($sizeFile < $sizeFileMax) {
                    if (in_array($mimeTypeImg, $mimeTypeAuthorised)) {
                        $new_value_file_path = $dir_target . $thisCar['model'] . '.' . $extension;
                        $new_value_to_modify = $new_value_file_path;
                // TRANSFER IMG
                        if (move_uploaded_file($new_value_file['tmp_name'], $new_value_file_path)) {
                            echo 'image transféré vers ' . $dir_target . 'à' . $new_value_file_path . '<br>';
                            unlink($thisCar['picture']);
                        } else {
                            exit('problème de transfert :' . $new_value_file['error']);
                        }
                    } else {
                        exit('type MIME du fichier non autorisé');
                    }
                } else {
                    exit('Taille maximale de fichier dépassée');
                }
            }
        break;
        default:
            exit('champ de modification non reconnu');
    }


    // QUERY
    $query = $pdo->prepare("UPDATE UsedCarsAd SET $usedCar_column = ?  WHERE used_car_ad_id = ?");
    $query->execute([$new_value_to_modify, $usedCars_id]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
