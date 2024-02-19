<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // DATA FOR MOD REPAIR SERVICES
    $repair_service_id = htmlspecialchars($_POST['repair_service_id'], ENT_QUOTES, 'UTF-8');
    $repair_service_column = htmlspecialchars($_POST['repair_service_column'], ENT_QUOTES, 'UTF-8');

    // GET DATA OF THIS ID
    $query = $pdo->prepare("SELECT * FROM repairServices WHERE repair_service_id = ?");
    $query->execute([$repair_service_id]);
    $thisRepairService = $query->fetch(PDO::FETCH_ASSOC);

    $new_value_name = htmlspecialchars($_POST['new_value_name'], ENT_QUOTES, 'UTF-8');
    $new_value_price = htmlspecialchars($_POST['new_value_price_repairService'], ENT_QUOTES, 'UTF-8');
    $new_value_describe = htmlspecialchars($_POST['new_value_describe'], ENT_QUOTES, 'UTF-8');
    $new_value_file = $_FILES['new_value_file_repairService'];

    // NEW VALUE
    switch($repair_service_column) {
        case 'name':
            $new_value_to_modify = $new_value_name;
            break;
        case 'price':
            $new_value_to_modify = $new_value_price;
            break;
        case 'describe':
            $new_value_to_modify = $new_value_describe;
            break;
        case 'picture':
            if ($new_value_file !== null) {
                // DATA FOR NEW IMG
                $dir_target = "ImgRepairServices/";
                $extension = pathinfo($new_value_file['name'], PATHINFO_EXTENSION);
                $mimeTypeAuthorised = ['image/jpeg', 'image/jpg', 'image/webp'];
                $mimeTypeImg = mime_content_type($new_value_file['tmp_name']);
                $sizeFileMax = 2 * 1024 * 1024;
                $sizeFile = $new_value_file['size'];
                
                // VALIDATION IMG
                if ($sizeFile < $sizeFileMax) {
                    if (in_array($mimeTypeImg, $mimeTypeAuthorised)) {
                        $new_value_file_path = $dir_target . $thisRepairService['name'] . '.' . $extension;
                        $new_value_to_modify = $new_value_file_path;
                // TRASNFER IMG
                        if (move_uploaded_file($new_value_file['tmp_name'], $new_value_file_path)) {
                            echo 'image transféré vers ' . $dir_target . ' à ' . $new_value_file_path . '<br>';
                            unlink($thisRepairService['picture']);
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
    $query = $pdo->prepare("UPDATE repairServices SET $repair_service_column = ? WHERE repair_service_id = ?");
    $query->execute([$new_value_to_modify, $repair_service_id]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
