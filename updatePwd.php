<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Ragnarok";
$database = "Parrot";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Définir le mode d'erreur PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";

    // Sélectionner tous les utilisateurs
    $query = $pdo->query("SELECT user_id, password FROM Users");
    echo "Sélection des utilisateurs";

    while ($user = $query->fetch()) {
        // Hacher le mot de passe en clair
        $hashedPassword = password_hash("P@rrot31V!ncent", PASSWORD_BCRYPT);
        echo "Mot de passe haché : " . $hashedPassword;

        // Mettre à jour l'entrée avec le nouveau mot de passe haché
        $updateQuery = $pdo->prepare("UPDATE Users SET password = ? WHERE user_id = ?");
        $updateQuery->execute([$hashedPassword, $user['user_id']]);

        if ($updateQuery->rowCount() > 0) {
            // La mise à jour a réussi, le mot de passe a été modifié
            echo "Mot de passe mis à jour en base de données.";
        } else {
            // Aucune ligne n'a été affectée, la mise à jour a échoué
            echo "La mise à jour du mot de passe a échoué.";
        }
    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

