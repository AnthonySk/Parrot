<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ID TO DELETE
    $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');

    // QUERY
    $query = $pdo->prepare("DELETE FROM Users WHERE user_id = ?");
    $query->execute([$user_id]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
