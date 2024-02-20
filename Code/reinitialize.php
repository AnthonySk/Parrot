<?php
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // DATA FOR MOD PWD
    $token = $_POST['token'];
    $mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $confirmPassword = htmlspecialchars($_POST['confirm_password'], ENT_QUOTES, 'UTF-8');
    
        // VERIFICATION PWD
        if ($password == $confirmPassword) {
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

            $query = $pdo->prepare("UPDATE Users SET password = ? WHERE mail = ?");
            if ($query->execute([$passwordHashed, $mail])) {

                header("Location: index.php");
                exit;
            } else {
                exit('erreur de réinitialisation du mot de passe');
            }
        } else {
            exit('Les mots de passe ne correspondent pas');
        }

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
