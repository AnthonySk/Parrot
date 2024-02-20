<?php
require_once "config.php";
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // DATA FOR NEW REPAIR SERVICES
    $repair_service_id = Uuid::uuid4()->toString();
    $name =  htmlspecialchars($_POST['repairService_name'], ENT_QUOTES, 'UTF-8');
    $describe = htmlspecialchars($_POST['repairService_describe'], ENT_QUOTES, 'UTF-8');
    $price =  htmlspecialchars($_POST['repairService_price'], ENT_QUOTES, 'UTF-8');
    $img = $_FILES['repairService_img'];

    // IMG DATA FOR TRANSFER
    $dir_target = "ImgRepairServices/";
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
        echo "Prix invalide";
        die();
    }

        // VALIDATION IMG
    if ($sizeFile < $sizeFileMax) {
        if (in_array($mimeTypeImg, $mimeTypeAuthorised)) {
            $img_path = $dir_target . $name . '.' . $extension;
            if (move_uploaded_file($img['tmp_name'], $img_path)) {
                echo 'image transféré vers ' . $dir_target . 'à' . $img_path . '<br>';

                // QUERY
                $query = $pdo->prepare("INSERT INTO repairServices (repair_service_id, name, price, picture, description) VALUES (?, ?, ?, ?, ?)");
                $query->execute([$repair_service_id, $name, $price, $img_path, $describe]);

                header("Location: index.php");
                exit;
            } else {
                exit('problème de transfert :' . $img['error']);
            }
        } else {
            exit('type MIME du fichier non autorisé');
        }
    } else {
        exit('Taille maximale de fichier dépassée');
    }

    

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
