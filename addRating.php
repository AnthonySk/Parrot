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

    // save rating in db
    $rating_id = Uuid::uuid4()->toString();
    $rating_name = trim($_POST['rating_name']);
    $rating_rate = trim($_POST['rating_rate']);
    $rating_message = trim($_POST['rating_message']);
    echo $rating_rate;
    // requête
    $query = $pdo->prepare("INSERT INTO Ratings (rating_id, name, rate, message) VALUES (?, ?, ?, ?)");
    $query->execute([$rating_id, $rating_name, $rating_rate, $rating_message]);

    if ($query->rowCount() > 0) {
        echo "témoignage enregistré avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement du témoignage.";
    }

    // redirection
    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
