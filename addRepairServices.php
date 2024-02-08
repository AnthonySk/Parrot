<?php
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

$servername = "127.0.0.1";
$usernameDb = "root";
$passwordDb = "Ragnarok";
$database = "Parrot";
echo 'test connexion :';
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // Définir le mode d'erreur PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connexion avec la BDD établie <br>';

    echo 'recup data :';
    // Inscription new repairServices
    $repair_service_id = Uuid::uuid4()->toString();
    $name = trim($_POST['repairService_name']);
    $price = trim($_POST['repairService_price']);
    $describe = trim($_POST['repairService_describe']);
    $img = $_FILES['repairService_img'];

    echo 'debut du trasnfert img:<br>';
    // transfert de l'image
    $dir_target = "ImgRepairServices/";
    $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
    $img_path = $dir_target . $name . '.' . $extension;
    
    echo 'verification transfert img :';
    echo 'tmp_name :' . $img['tmp_name'] . '<br>' . 'chemin :' . $img_path;
    if (move_uploaded_file($img['tmp_name'], "$img_path")) {
        echo 'image transféré vers ' . $dir_target . 'à' . $img_path . '<br>';
    } else {
        echo 'problème de transfert <br>';
        $img['error'];
    }
    echo 'lancement de la requete save date in bdd';
    // requête
    $query = $pdo->prepare("INSERT INTO repairServices (repair_service_id, name, price, picture, description) VALUES (?, ?, ?, ?, ?)");
    $query->execute([$repair_service_id, $name, $price, $img_path, $describe]); // img

    // redirection
    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
