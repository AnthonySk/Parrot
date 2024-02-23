<?php
require_once "config.php";
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // QUERY GET PWD
    $queryGet = $pdo->prepare("SELECT password, user_id FROM USERS WHERE user_id = 1");
    $queryGet->execute();
    $admin = $queryGet->fetch();
    
    $passwordHashed = password_hash($admin['password'], PASSWORD_BCRYPT);
    $user_id = Uuid::uuid4()->toString();

    // QUERY UPDATE PWD
    $queryUpdatePwd = $pdo->prepare("UPDATE USERS SET password = ?, user_id = ? WHERE user_id = 1");
    $queryUpdatePwd->execute([$passwordHashed, $user_id]);
    
    

    header("Location: index.php");
    exit;

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
