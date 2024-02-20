<?php
require_once "config.php";
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connexion avec la BDD établie <br>';

    // DATA FOR NEW RATING
    $rating_id = Uuid::uuid4()->toString();
    $rating_name = htmlspecialchars($_POST['rating_name'], ENT_QUOTES, 'UTF-8');
    $rating_rate = filter_var($_POST['rating_rate'], FILTER_VALIDATE_INT);
    $rating_message = htmlspecialchars($_POST['rating_message'], ENT_QUOTES, 'UTF-8');

    // QUERY
    $query = $pdo->prepare("INSERT INTO Ratings (rating_id, name, rate, message) VALUES (?, ?, ?, ?)");
    $query->execute([$rating_id, $rating_name, $rating_rate, $rating_message]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
