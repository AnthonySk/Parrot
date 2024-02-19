<?php
require_once "config.php";
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // Définir le mode d'erreur PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // validated or refused Rating in db
    $rating_id = $_POST['rating_id'];
    $rating_moderated = $_POST['rating_name'];
    $validated = $_POST['button_accepted'];
    $refused = $_POST['button_refused'];

    if (isset($validated)) {
        $is_validate = 1;
    } elseif (isset($refused)) {
        $is_validate = 0;
    }
echo $is_validate;
    // requête
    $query = $pdo->prepare("UPDATE ratings SET is_validate = '$is_validate' WHERE rating_id = ?");
    $query->execute([$rating_id]);

    // redirection
    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
