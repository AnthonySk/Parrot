<?php
session_start();
require_once "config.php";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $usernameDb, $passwordDb);
    // Définir le mode d'erreur PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // QUERY GET SCHEDULES
    $query = $pdo->prepare("SELECT days, houry_start, houry_end, houry_start_opt, houry_end_opt FROM schedules ORDER BY FIELD(days, 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche')");
    $query->execute();
    $schedules = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach ($schedules as $schedule) {
        $houry_start_formated = substr($schedule['houry_start'], 0, -3);
        $houry_end_formated = substr($schedule['houry_end'], 0, -3);
        $houry_start_opt_formated = substr($schedule['houry_start_opt'], 0, -3);
        $houry_end_opt_formated = substr($schedule['houry_end_opt'], 0, -3);

        if (isset($schedule['houry_start']) && isset($schedule['houry_end'])) {
            $dailyHours = $houry_start_formated . '-' . $houry_end_formated;
            if (isset($schedule['houry_start_opt']) && isset($schedule['houry_end_opt'])) {
                $dailyHours .= ' ' . $houry_start_opt_formated . '-' . $houry_end_opt_formated;
            }
        } else {
            $dailyHours = 'Fermé';
        }
        $days .= '<div class="schedules ms-1 ps-1 ms-sm-3 ms-md-5 fs">' . htmlspecialchars($schedule['days'], ENT_QUOTES, 'UTF-8') . '</div>';
        $hours .= '<div class="schedules m-1 fs">' . htmlspecialchars($dailyHours, ENT_QUOTES, 'UTF-8') . '</div>';
    }

    // afficher schedules
    echo '<div class=" d-flex flex-column justify-content-around col-4 col-md-5 col-lg-4">' . $days . '</div>';
    echo '<div class="col-8 col-md-7 col-lg-6">' . $hours . '</div>';
    
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
