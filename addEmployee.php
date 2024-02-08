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
    $user_id = Uuid::uuid4()->toString();
    $firstname = trim($_POST['first_name']);
    $lastname = trim($_POST['last_name']);
    $role = trim($_POST['role']);
    $address = trim($_POST['address']);
    $birthdate = trim($_POST['birthdate']);
    $mail = trim($_POST['mail']);
    $password = trim($_POST['password']);
    echo "prise en charge des données";
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    echo "password hashé";
    
    // requête
    $query = $pdo->prepare("INSERT INTO Users (user_id, mail, password, first_name, last_name, address, birthdate, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$user_id, $mail, $hashedPassword, $firstname, $lastname, $address, $birthdate, $role]);

    if ($query->rowCount() > 0) {
        // L'insertion a réussi
        echo "Utilisateur enregistré avec succès.";
    } else {
        // L'insertion a échoué
        echo "Erreur lors de l'enregistrement de l'utilisateur.";
    }

        // redirection
        header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
