<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion BDD réussie";

    // DATA FOR AUTHENTIFICATION
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    
    // QUERY
    $query = $pdo->prepare("SELECT * FROM Users WHERE mail = ?");
    $query->execute([$username]);
    $user = $query->fetch();

    // USER IN SESSION
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['role'] = $user['role'];
        $_SESSION['firstname'] = $user['first_name'];
        if ($user['role'] == "admin") {
            setcookie('role', 'admin', time() + 3600, '/');
        } elseif ($user['role'] == "employé") {
            setcookie('role', 'employé', time() + 3600, '/');
        }
        header("Location: index.php");

    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
