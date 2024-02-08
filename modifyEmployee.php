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
    $user_id = $_POST['user_id']; # user_id
    $user_column = $_POST['user_column']; # colonne à modifier
    $new_value = $_POST['new_value']; # nouvelle valeur
    echo "id :" . $user_id . "<br>" . "colonne :" . $user_column . "<br>" . "new value :" . $new_value . "<br>";

    // Requête de modification
    $query = $pdo->prepare("UPDATE Users SET $user_column = '$new_value' WHERE user_id = ?");
    $query->execute([$user_id]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
