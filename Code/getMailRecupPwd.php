<?php
session_start();
require_once "config.php";
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // DATA FOR AUTHENTIFICATION
    $mail = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    
    // VERIFICATION
    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    
        // QUERY
        $query = $pdo->prepare("SELECT * FROM Users WHERE mail = ?");
        $query->execute([$mail]);
        $user = $query->fetch();

        // EMAIL MATCHED
        if ($user) {
            echo 'adresse valide';

            // PREPARE QUERY TOKEN
            $token = bin2hex(random_bytes(32));
            $user_id = $user['user_id'];
            $reset_request_id = Uuid::uuid4()->toString();

            $queryToken = $pdo->prepare("INSERT INTO password_reset_requests (reset_request_id, user_id, token) VALUES (?, ?, ?)");
            $queryToken->execute([$reset_request_id, $user_id, $token]);

            $user_mail = $user['mail'];
            $url = 'https://reset_password.php?token=' . $token . '&email=' . urlencode($user_mail);

            // MAIL CONTENT
            $to = $user_mail;
            $subject = 'Réinitialisation du mot de passe';
            $message = 'Hello ! Pour réinitialiser ton mot de passe, veuillez cliquer sur ce lien:' . $url;

            // SEND MAIL
            if (mail($to, $subject, $message)) {
                header("Location: index.php");
            exit;
            } else {
                exit('L\'envoi de l\'e-mail a échoué');
            }
        } else {
            exit('adresse mail inconnue');
        }
    } else {
        exit('format d\'adresse email invalide');
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
