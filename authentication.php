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
    echo "Connexion BDD réussie";

    // Récupérer les données du formulaire
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Rechercher l'utilisateur dans la base de données
    $query = $pdo->prepare("SELECT * FROM Users WHERE mail = ?");
    $query->execute([$username]);
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Si les identifiants sont corrects, enregistrer l'utilisateur dans la session
        $_SESSION['role'] = $user['role'];
        $_SESSION['firstname'] = $user['first_name'];
        setcookie('role', 'admin', time() + 3600, '/');
        // Rediriger vers une page sécurisée
        header("Location: index.php");
    } else {
        // Identifiants incorrects
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
