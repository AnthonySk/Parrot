<?php
require_once "config.php";
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connexion avec la BDD établie <br>';

    // DATA FOR NEW EMPLOYEES
    $user_id = Uuid::uuid4()->toString();
    $firstname = htmlspecialchars($_POST['first_name'], ENT_QUOTES, 'UTF-8');
    $lastname = htmlspecialchars($_POST['last_name'], ENT_QUOTES, 'UTF-8');
    $role = htmlspecialchars($_POST['role'], ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
    $birthdate = htmlspecialchars($_POST['birthdate'], ENT_QUOTES, 'UTF-8');
    $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
    // QUERY
    $query = $pdo->prepare("INSERT INTO Users (user_id, mail, password, first_name, last_name, address, birthdate, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$user_id, $mail, $hashedPassword, $firstname, $lastname, $address, $birthdate, $role]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
