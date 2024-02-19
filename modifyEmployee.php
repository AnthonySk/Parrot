<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // // DATA FOR MOD EMPLOYEE
    $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');
    $user_column = htmlspecialchars($_POST['user_column'], ENT_QUOTES, 'UTF-8');

    $new_value_firstname = htmlspecialchars($_POST['first_name'], ENT_QUOTES, 'UTF-8');
    $new_value_lastname = htmlspecialchars($_POST['last_name'], ENT_QUOTES, 'UTF-8');
    $new_value_role = htmlspecialchars($_POST['role'], ENT_QUOTES, 'UTF-8');
    $new_value_address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
    $new_value_birthdate = htmlspecialchars($_POST['birthdate'], ENT_QUOTES, 'UTF-8');
    $new_value_mail = htmlspecialchars($_POST['mail'], ENT_QUOTES, 'UTF-8');

    switch($user_column) {
        case 'mail' :
            $new_value_to_modify = $new_value_mail;
            break;
        case 'first_name' :
            $new_value_to_modify = $new_value_firstname ;
            break;
        case 'last_name' :
            $new_value_to_modify = $new_value_lastname ;
            break;
        case 'address' :
            $new_value_to_modify = $new_value_address;
            break;
        case 'birthdate' :
            $new_value_to_modify = $new_value_birthdate;
            break;
        case 'role' :
            $new_value_to_modify = $new_value_role;
            break;
        default:
            exit('champ de modification non reconnu');
    }

    // QUERY
    $query = $pdo->prepare("UPDATE Users SET $user_column = ? WHERE user_id = ?");
    $query->execute([$new_value_to_modify, $user_id]);

    header("Location: index.php");

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
