<?php
require_once "config.php";
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

session_start();

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // ERROR PDO ON EXCEPTION
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // DATA FOR NEW MAIL
    $form_contact_id = Uuid::uuid4()->toString();
    $first_name = htmlspecialchars($_POST['contact_first_name'], ENT_QUOTES, 'UTF-8');
    $last_name = htmlspecialchars($_POST['contact_last_name'], ENT_QUOTES, 'UTF-8');
    $mail = htmlspecialchars($_POST['contact_mail'], ENT_QUOTES, 'UTF-8');
    $phone_number = htmlspecialchars($_POST['contact_phone_number'], ENT_QUOTES, 'UTF-8');
    $subject = htmlspecialchars($_POST['contact_subject'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['contact_message'], ENT_QUOTES, 'UTF-8');

    // QUERY
    $querySend = $pdo->prepare("INSERT INTO formsContact (form_contact_id, first_name, last_name, mail, phone_number, subject, message) VALUE (?, ?, ?, ?, ?, ?, ?)");
    $querySend->execute($form_contact_id, $first_name, $last_name, $mail, $phone_number, $subject, $message);

    // GET EMPLOYEE FOR MAIL
    $queryReceive = $pdo->prepare("SELECT mail FROM Users WHERE role != 'admin' ");
    $queryReceive->execute();
    $employeesEmail = $query->fetchAll(PDO::FETCH_ASSOC);

    // CHOICE RANDOM EMPLOYEE
    if (!empty($employeesEmail)) {
        $randomEmployee = array_rand($employeesEmail, 1);
        $mailTo = $employeesEmail[$randomEmployee]['mail'];
    } else {
        exit('pas d\'employés disponible');
    }

    // MAIL
    $subject = 'Nouveau formulaire de contact';
    mail($mailTo, $subject, $message);

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
