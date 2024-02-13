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
    $days = $_POST['schedules_column']; # colonne à modifier

    $houry_start = $_POST['houry_start']; # value
    $houry_end = $_POST['houry_end']; # value
    $houry_start_opt = $_POST['houry_start_opt'] !== '' ? $_POST['houry_start_opt'] : null;
    $houry_end_opt = $_POST['houry_end_opt'] !== '' ? $_POST['houry_end_opt'] : null;

    echo "<br> colonne :" . $days . "<br>" . "ouvert :" . $houry_start . "<br>" . "fermé :" . $houry_end . "<br>" . "ouvert option :" . $houry_start_opt . "<br>" . "fermé option :" . $houry_end_opt ;

    // Requête de modification
    $query = $pdo->prepare("UPDATE Schedules SET houry_start = ?, houry_end = ?, houry_start_opt = ?, houry_end_opt = ? WHERE days = ?");
    $query->execute([$houry_start, $houry_end, $houry_start_opt, $houry_end_opt, $days]);
    

    echo 'requête envoyé';
    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
