<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // DATA FOR MOD SCHEDULES
    $days = htmlspecialchars($_POST['schedules_column'], ENT_QUOTES, 'UTF-8');
    $houry_start = htmlspecialchars($_POST['houry_start']) == '' ? null : htmlspecialchars($_POST['houry_start'], ENT_QUOTES, 'UTF-8');
    $houry_end =  htmlspecialchars($_POST['houry_end']) == '' ? null : htmlspecialchars($_POST['houry_end'], ENT_QUOTES, 'UTF-8');
    $houry_start_opt = htmlspecialchars($_POST['houry_start_opt']) == '' ? null : htmlspecialchars($_POST['houry_start_opt'], ENT_QUOTES, 'UTF-8');
    $houry_end_opt = htmlspecialchars($_POST['houry_end_opt']) == '' ? null : htmlspecialchars($_POST['houry_end_opt'], ENT_QUOTES, 'UTF-8');

    // SECURITY
    $columnAuthorized = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
    if (!in_array($days, $columnAuthorized)) {
        exit('Champ de modification inconnu');
    }

    // QUERY
    $query = $pdo->prepare("UPDATE Schedules SET houry_start = ?, houry_end = ?, houry_start_opt = ?, houry_end_opt = ? WHERE days = ?");
    $query->execute([$houry_start, $houry_end, $houry_start_opt, $houry_end_opt, $days]);
    
    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
