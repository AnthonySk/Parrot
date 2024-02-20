<?php
session_start();

require_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/styleParrot.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Parrot Garage</title>
</head>


<!------- START BODY ------->

<body>

    <!------- START HEADER ------->
<?php require_once "header.html" ?>
    <!------- END HEADER ------->




    <!------- START MAIN ------->
    <main>

        <!------- ESPACE EMPLOYES ------->
            <?php if ($_SESSION['role'] === "admin" || $_SESSION['role'] === "employé") : ?>
                <h4>Bienvenue <?= $_SESSION['firstname']?></h4>
                <form action="logout.php" method="POST">
                    <button class="btn" type="submit">Se Déconnecter</button>
                </form>
                <div class="d-flex justify-content-center m-2 mb-5">
                    <div class="d-flex align-items-center card p-3 employeeArea">
                    <h2>ESPACE EMPLOYÉ</h2>
                    <!------- GESTION DES VEHICULES -------->
                        <button class="btn m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_vehicles" aria-expanded="false" aria-controls="collapse">
                            Gestion des véhicules
                        </button>
                        <div class="collapse" id="collapse_vehicles">

                            <div class="card vehiclesArea p-3">
                                <div class="row">
                                    <!-- ADD USED CARS -->
                                        <div class="col mt-1 mb-1">
                                            <div class="card card-body m-1 p-2">
                                                <h6 class="fw-bold">Ajouter un véhicule</h6>
                                                <form enctype="multipart/form-data" action="addUsedCar.php" method="POST">
                                                    <div class="p-1">
                                                        <label for="usedCar_brand">Marque :</label>
                                                        <input class="rounded ps-1" type="text" name="usedCar_brand" id="usedCar_brand" placeholder="Peugeot, Tesla..." required>
                                                    </div>
                                                    <div class="p-1">
                                                        <label for="usedCar_model">Modèle :</label>
                                                        <input class="rounded ps-1" type="text" name="usedCar_model" id="usedCar_model" placeholder="modèle" required>
                                                    </div>
                                                    <div class="p-1">
                                                        <label for="usedCar_kilometers">Kilomètres :</label>
                                                        <input class="rounded ps-1" type="number" step="1" name="usedCar_kilometers" id="usedCar_kilometers" placeholder="20 000" required>
                                                    </div>
                                                    <div class="p-1">
                                                        <label for="usedCar_motorisation">Motorisation :</label>
                                                        <select class="rounded ps-1" name="usedCar_motorisation" id="usedCar_motorisation" required>
                                                            <option value="essence">Essence</option>
                                                            <option value="diesel">Diesel</option>
                                                            <option value="Électrique">Électrique</option>
                                                            <option value="Hybride">Hybride</option>
                                                            <option value="Hybride rechargeable">Hybride rechargeable</option>
                                                            <option value="GPL">GPL</option>
                                                            <option value="E85">E85</option>
                                                        </select>
                                                    </div>
                                                    <div class="p-1">
                                                        <label for="usedCar_year">Année :</label>
                                                        <input class="rounded ps-1 getThisYear" type="number" step="1" min="1900" name="usedCar_year" id="usedCar_year" required>
                                                    </div>
                                                    <div class="p-1">
                                                        <label for="usedCar_gearbox">Boîte de vitesse :</label>
                                                        <select class="rounded ps-1" name="usedCar_gearbox" id="usedCar_gearbox" required>
                                                            <option value="Manuelle">Manuelle</option>
                                                            <option value="Automatique">Automatique</option>
                                                            <option value="Séquentielle">Séquentielle</option>
                                                        </select>
                                                    </div>
                                                    <div class="p-1">
                                                        <label for="usedCar_color">Couleur :</label>
                                                        <input class="rounded ps-1" type="text" name="usedCar_color" id="usedCar_color" placeholder="bleu, rouge..." required>
                                                    </div>
                                                    <div class="p-1">
                                                        <label for="usedCar_price">Prix :</label>
                                                        <input class="rounded ps-1" type="number" step="10" name="usedCar_price" id="usedCar_price" required>
                                                    </div>
                                                    <div class="d-inline-flex flex-column">
                                                            <label class="d-inline-flex" for="usedCar_description">Description :</label>
                                                            <textarea class="rounded d-inline-flex p-1" name="usedCar_description" id="usedCar_description" placeholder="..." required></textarea>
                                                            <label class="d-inline-flex" for="usedCar_img">Photo :</label>
                                                            <input class="rounded d-inline-flex w-75" type="file" accept=".jpeg, .jpg, .webp" name="usedCar_img" id="usedCar_img" required></input>
                                                        </div>
                                                    <div class="d-flex justify-content-center pt-2">
                                                        <button class="btn w-50" type="submit">Ajouter le véhicule</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <!-- MODIFY USED CARS -->
                                        <div class="col mt-1 mb-1">
                                            <div class="card card-body p-2">
                                                <h6 class="fw-bold">Modifier un véhicule</h6>
                                                <form enctype="multipart/form-data" action="modifyUsedCar.php" method="POST">
                                                    <?php require "usedCarList.php";?>
                                                        <?php foreach ($usedCars as $car) : ?>
                                                            <div class="d-flex justify-content-left p-2">
                                                            <input class="m-2" type="checkbox" name="used_car_ad_id" value="<?= htmlspecialchars($car['used_car_ad_id'], ENT_QUOTES, 'UTF-8') ?>">
                                                            <p class="align-self-center"><?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($car['model'], ENT_QUOTES, 'UTF-8') ?><p>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <div class="p-1">
                                                            <label for="champUsedCar">Attribut de modification :</label>
                                                            <div class="p-1">
                                                                    <!-- CHOIX DE MODIFICATION -->
                                                                <select class="rounded ps-1" name="used_car_column" id="champUsedCar" value="choisir" required>
                                                                    <option value="brand">marque</option>
                                                                    <option value="model">modèle</option>
                                                                    <option value="color">couleur</option>
                                                                    <option value="description">description</option>

                                                                    <option value="gearbox">boîte de vitesse</option>
                                                                    <option value="motorisation">motorisation</option>

                                                                    <option value="kilometers">kilomètre</option>
                                                                    <option value="price">prix</option>
                                                                    <option value="year">année</option>

                                                                    <option value="picture">photo</option>
                                                                </select>
                                                                    <!-- INPUT A AFFICHER SELON CHOIX DE MODIFICATION-->
                                                                <input class="rounded ps-1" type="text" name="new_value_brand" id="new_value_brand" placeholder="marque">
                                                                <input class="rounded ps-1 toHide" type="text" name="new_value_model" id="new_value_model" placeholder="modèle">
                                                                <input class="rounded ps-1 toHide" type="text" name="new_value_color" id="new_value_color" placeholder="couleur">
                                                                <input class="rounded ps-1 toHide" type="text" name="new_value_description" id="new_value_description" placeholder="description">
                                                                <select class="toHide" name="new_value_gearbox" id="new_value_gearbox">
                                                                    <option value="Manuelle">Manuelle</option>
                                                                    <option value="Automatique">Automatique</option>
                                                                    <option value="Séquentielle">Séquentielle</option>
                                                                </select>
                                                                <select class="toHide" name="new_value_motorisation" id="new_value_motorisation">
                                                                    <option value="essence">Essence</option>
                                                                    <option value="diesel">Diesel</option>
                                                                    <option value="Électrique">Électrique</option>
                                                                    <option value="Hybride">Hybride</option>
                                                                    <option value="Hybride rechargeable">Hybride rechargeable</option>
                                                                    <option value="GPL">GPL</option>
                                                                    <option value="E85">E85</option>
                                                                </select>
                                                                
                                                                <input class="rounded ps-1 toHide" type="number" step="1" name="new_value_kilometers" id="new_value_kilometers" placeholder="93 457">
                                                                <input class="rounded ps-1 toHide" type="number" step="10" name="new_value_price" id="new_value_price" placeholder="23 000">
                                                                <input class="rounded ps-1 getThisYear toHide" type="number" step="1" min="1900" name="new_value_year" id="new_value_year" placeholder="2000">

                                                                <input class="rounded ps-1 file w-75 toHide" accept=".jpeg, .jpg, .webp" type="file" name="new_value_file" id="new_value_file">
                                                            </div>
                                                        </div>
                                                    <div class="d-flex justify-content-center pt-2">
                                                        <button class="btn w-50" name="button" value="modify" type="submit">Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <!-- DELETE USED CARS -->
                                        <div class="col mt-1 mb-1">
                                            <div class="card card-body p-2">
                                                <h6 class="fw-bold">Supprimer un véhicule</h6>
                                                <form action="deleteUsedCar.php" method="POST">
                                                    <?php require "usedCarList.php";?>
                                                        <?php foreach ($usedCars as $car) : ?>
                                                            <div class="d-flex justify-content-left p-2">
                                                            <input class="m-2" type="checkbox" name="used_car_ad_id" value="<?= htmlspecialchars($car['used_car_ad_id'], ENT_QUOTES, 'UTF-8') ?>">
                                                            <p class="align-self-center"><?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($car['model'], ENT_QUOTES, 'UTF-8') ?><p>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <div class="d-flex justify-content-center pt-2">
                                                        <button class="btn w-50" name="button" value="delete" type="submit">Supprimer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                    <!------- GESTION DES COMMENTAIRES ------->
                        <button class="btn m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_ratings" aria-expanded="false" aria-controls="collapse">
                            Gestion des témoignages
                        </button>
                            <div class="collapse" id="collapse_ratings">

                                <div class="card ratingsArea p-3">
                                    <div class="row">
                                        <!-- ADD RATING -->
                                            <div class="col m-1">
                                                <div class="card card-body p-2">
                                                    <h5 class="fw-bold">Ajouter un témoigage</h5>
                                                    <form action="addRating.php" method="POST">
                                                        <div class="row">
                                                            <div class="col w-100">
                                                                <input class="rounded m-1 ps-1" placeholder="nom" type="text" name="rating_name" id="rating_name" required>
                                                            </div>
                                                            <div class="row w-100">
                                                                <div class="rating m-1">
                                                                    <!-- 1 -->
                                                                    <input class="d-none" type="radio" name="rating_rate" id="star1" value="1">
                                                                    <label class="star bi bi-star" for="star1"></label>
                                                                    <!-- 2 -->
                                                                    <input class="d-none" type="radio" name="rating_rate" id="star2" value="2">
                                                                    <label class="star bi bi-star" for="star2"></label>
                                                                    <!-- 3 -->
                                                                    <input class="d-none" type="radio" name="rating_rate" id="star3" value="3">
                                                                    <label class="star bi bi-star" for="star3"></label>
                                                                    <!-- 4 -->
                                                                    <input class="d-none" type="radio" name="rating_rate" id="star4" value="4">
                                                                    <label class="star bi bi-star" for="star4"></label>
                                                                    <!-- 5 -->
                                                                    <input class="d-none" type="radio" name="rating_rate" id="star5" value="5">
                                                                    <label class="star bi bi-star" for="star5"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row w-100">
                                                            <label class="d-flex justify-content-center m-1" for="rating_message">Témoignage :</label>
                                                            <textarea class="rounded p-1 m-1" maxlength="150" name="rating_message" id="rating_message" placeholder="..." required></textarea>
                                                        </div>
                                                        <div class="d-flex flex-column d-flex align-items-center m-1">
                                                            <button class="btn" type="submit">Valider</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <!-- MODERATE RATING -->
                                            <div class="col m-1">
                                                <div class="card card-body p-2">
                                                    <h5 class="fw-bold">Modérer les témoignages</h5>
                                                    <form action="moderatedRating.php" method="POST">
                                                        <?php require_once "ratingToModerateList.php";?>
                                                            <div class="d-flex justify-content-between p-1">
                                                                <div class="pt-2">
                                                                    <input class="btn" name="button_accepted" value="Accepter" type="submit"></input>
                                                                </div>
                                                                <div class="pt-2">
                                                                    <input class="btn" name="button_refused" value="Refuser" type="submit"></input>
                                                                </div>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            <!------- ESPACE ADMIN ------->
                <?php if ($_SESSION['role'] === "admin") : ?>
                    <div class="d-flex justify-content-center m-2">
                        <div class="d-flex align-items-center card p-3 adminArea">
                        <h2>ESPACE ADMIN</h2>
                        <!------- GESTION DES EMPLOYES ------->
                            <button class="btn m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_employees" aria-expanded="false" aria-controls="collapse">
                                Gestion des employés
                            </button>
                            <div class="collapse" id="collapse_employees">

                                <div class="card handlerEmployeesArea p-3">
                                    <div class="row">
                                    <!-- ADD EMPLOYEE -->
                                            <div class="col mt-1 mb-1">
                                                <div class="card card-body m-1 p-2">
                                                    <h6 class="fw-bold">Ajouter un employé</h6>
                                                    <form action="addEmployee.php" method="POST">
                                                        <div class="p-1">
                                                            <label for="last_name">Nom :</label>
                                                            <input class="rounded ps-1" type="text" name="last_name" id="last_name" placeholder="nom" required>
                                                        </div>
                                                        <div class="p-1">
                                                            <label for="first_name">Prénom :</label>
                                                            <input class="rounded ps-1" type="text" name="first_name" id="first_name" placeholder="prénom" required>
                                                        </div>
                                                        <div class="p-1">
                                                            <label for="role">Rôle :</label>
                                                            <select class="rounded ps-1" name="role" id="role" required>
                                                                <option value="employé">employé</option>
                                                                <option value="admin">admin</option>
                                                            </select>
                                                        </div>
                                                        <div class="p-1">
                                                            <label for="address">Adresse :</label>
                                                            <input class="rounded ps-1" type="text" name="address" id="address" placeholder="adresse" required>
                                                        </div>
                                                        <div class="p-1">
                                                            <label for="birthdate">Date de naissance :</label>
                                                            <input class="rounded ps-1" type="date" name="birthdate" id="birthdate" value=2009-12-31 min="1954-01-01" max="2009-12-31" placeholder="AAAA-MM-JJ" required >
                                                        </div>
                                                        <div class="p-1">
                                                            <label for="mail">Email :</label>
                                                            <input class="rounded ps-1" type="email" name="mail" id="mail" placeholder="exemple@exemple.com" required>
                                                        </div>
                                                        <div class="p-1">
                                                            <label for="password">Mot de passe :</label>
                                                            <input class="rounded ps-1" type="password" name="password" id="password" placeholder="********" required>
                                                            <div class="informations" id="informationPassword"></div>
                                                        </div>
                                                        <div class="p-1">
                                                            <label for="password">Confirmer le mot de passe :</label>
                                                            <input class="rounded ps-1" type="password" name="password" id="confirm_password" placeholder="********" required>
                                                            <div class="informations" id="messagePasswordMatches"></div>
                                                        </div>
                                                        <div class="d-flex justify-content-center pt-2">
                                                            <button class="btn w-50" type="submit">Ajouter</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <!-- MODIFY EMPLOYEE -->
                                            <div class="col mt-1 mb-1">
                                                <div class="card card-body m-1 p-2">
                                                    <h6 class="fw-bold">Modifier un employé</h6>
                                                    <form action="modifyEmployee.php" method="POST">
                                                        <?php require "employeeList.php";?>
                                                        <?php foreach ($users as $user) : ?>
                                                            <div class="d-flex justify-content-left p-2">
                                                            <input class="m-2" type="checkbox" name="user_id" value="<?= htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') ?>">
                                                            <p class="align-self-center"><?= htmlspecialchars($user['first_name'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($user['last_name'], ENT_QUOTES, 'UTF-8') ?></p>
                                                            </div>
                                                        <?php endforeach; ?>
                                                            <div class="p-1">
                                                                <label for="champEmployee">Attribut de modification :</label>
                                                            </div>
                                                            <div class="p-1">
                                                                    <!-- CHAMP DE MODIFICATION -->
                                                                <select class="rounded m-1 ps-1" name="user_column" id="champEmployee" required>
                                                                    <option value="last_name">nom</option>
                                                                    <option value="first_name">prénom</option>
                                                                    <option value="role">rôle</option>
                                                                    <option value="address">adresse</option>
                                                                    <option value="birthdate">date de naissance</option>
                                                                    <option value="mail">mail</option>
                                                                </select>
                                                                    <!-- INPUT A AFFICHER -->
                                                                <input class="rounded m-1 ps-1" type="text" name="last_name" id="new_value_last_name" placeholder="nom">
                                                                <input class="rounded m-1 ps-1 toHide" type="text" name="first_name" id="new_value_first_name" placeholder="prenom">
                                                                <input class="rounded m-1 ps-1 toHide" type="text" name="address" id="new_value_address" placeholder="adresse">
                                                                <input class="rounded m-1 ps-1 toHide" type="email" name="mail" id="new_value_mail" placeholder="exemple@exemple.exemple">
                                                                <select class="rounded m-1 ps-1 toHide" name="role" id="new_value_role">
                                                                        <option value="admin">admin</option>
                                                                        <option value="employé">employé</option>
                                                                </select>
                                                                <input class="rounded m-1 ps-1 toHide" type="date" name="birthdate" id="new_value_birthdate">
                                                            </div>
                                                        <div class="d-flex justify-content-center pt-2">
                                                            <button class="btn w-50" name="button" value="modify" type="submit">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <!-- DELETE EMPLOYEE -->
                                            <div class="col mt-1 mb-1">
                                                <div class="card card-body m-1 p-2">
                                                    <h6 class="fw-bold">Supprimer un employé</h6>
                                                    <form action="deleteEmployee.php" method="POST">
                                                        <?php require "employeeList.php";?>
                                                            <?php foreach ($users as $user) : ?>
                                                                <div class="d-flex justify-content-left p-2">
                                                                <input class="m-2" type="checkbox" name="user_id" value="<?= htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') ?>">
                                                                <p class="align-self-center"><?= htmlspecialchars($user['first_name'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($user['last_name'], ENT_QUOTES, 'UTF-8') ?></p>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <div class="d-flex justify-content-center">
                                                            <button class="btn w-50" name="button" value="delete" type="submit">Supprimer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>



                        <!------- GESTION DES SERVICES ------->
                            <button class="btn m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_repairServices" aria-expanded="false" aria-controls="collapse">
                                Gestion des services de réparation
                            </button>
                            <div class="collapse" id="collapse_repairServices">

                                <div class="card repairServicesArea p-3">
                                    <div class="row">
                                        <!-- ADD REPAIR SERVICE -->
                                            <div class="col mt-1 mb-1">
                                                <div class="card card-body p-2">
                                                    <h6 class="fw-bold">Ajouter un service de réparation</h6>
                                                    <form enctype="multipart/form-data" action="addRepairServices.php" method="POST">
                                                        <div class="d-inline-flex">
                                                            <label for="repairService_name">Nom :</label>
                                                            <input class="rounded ps-1" type="text" name="repairService_name" id="repairService_name" placeholder="vidange, freins..." required>
                                                        </div>
                                                        <div class="d-inline-flex">
                                                            <label for="repairService_price">Prix :</label>
                                                            <input class="rounded" type="number" step="0.1" name="repairService_price" id="repairService_price" placeholder="xx,xx €" required>
                                                        </div>
                                                        <div class="d-inline-flex flex-column">
                                                            <label class="d-inline-flex" for="repairService_describe">Description :</label>
                                                            <textarea class="rounded d-inline-flex p-1" name="repairService_describe" id="repairService_describe" placeholder="..." required></textarea>
                                                            <label class="d-inline-flex" for="repairService_img">Photo :</label>
                                                            <input class="rounded d-inline-flex w-75" type="file" accept=".jpeg, .jpg, .webp" name="repairService_img" id="repairService_img" required></input>
                                                        </div>
                                                        <div class="d-flex justify-content-center pt-2">
                                                            <button class="btn fs-6" name="button" value="add" type="submit">Ajouter le service de réparation</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <!-- MODIFY REPAIR SERVICE -->
                                            <div class="col mt-1 mb-1">
                                                <div class="card card-body p-2">
                                                    <h6 class="fw-bold">Modifier un service de réparation</h6>
                                                    <form enctype="multipart/form-data" action="modifyRepairService.php" method="POST">
                                                        <?php require "repairServiceList.php";?>
                                                        <?php foreach ($repairServices as $repairService) : ?>
                                                            <div class="d-flex justify-content-left p-2">
                                                                <input class="m-2" type="checkbox" name="repair_service_id" value="<?= htmlspecialchars($repairService['repair_service_id'], ENT_QUOTES, 'UTF-8') ?>">
                                                                <p class="align-self-center"><?= htmlspecialchars($repairService['name'], ENT_QUOTES, 'UTF-8') ?> </p>
                                                            </div>
                                                        <?php endforeach; ?>
                                                            <div class="p-1">
                                                                <label for="champRepairService">Attribut de modification :</label>
                                                                <div class="p-1">
                                                                        <!-- CHOIX DE MODIFICATION -->
                                                                    <select class="rounded m-1 ps-1" name="repair_service_column" id="champRepairService" value="choisir" required>
                                                                        <option value="name">nom</option>
                                                                        <option value="price">prix</option>
                                                                        <option value="description">description</option>
                                                                        <option value="picture">photo</option>
                                                                    </select>
                                                                        <!-- INPUT A AFFICHER -->
                                                                    <input class="rounded m-1 ps-1" type="text" name="new_value_name" id="new_value_name" placeholder="nom">
                                                                    <input class="rounded m-1 ps-1 toHide" type="number" name="new_value_price_repairService" id="new_value_price_repairService" placeholder="prix">
                                                                    <input class="rounded m-1 ps-1 toHide" type="text" name="new_value_describe" id="new_value_describe" placeholder="description">
                                                                    <input class="rounded m-1 ps-1 w-75 toHide" accept=".jpeg, .jpg, .webp" type="file" name="new_value_file_repairService" id="new_value_file_repairService" >
                                                                </div>
                                                            </div>
                                                        <div class="d-flex justify-content-center pt-2">
                                                            <button class="btn w-50" name="button" value="modify" type="submit">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <!-- DELETE REPAIR SERVICE -->
                                            <div class="col mt-1 mb-1">
                                                <div class="card card-body p-2">
                                                    <h6 class="fw-bold">Supprimer un service de réparation</h6>
                                                    <form action="deleteRepairService.php" method="POST">
                                                    <?php require "repairServiceList.php";?>
                                                        <?php foreach ($repairServices as $repairService) : ?>
                                                            <div class="d-flex justify-content-left p-2">
                                                                <input class="m-2" type="checkbox" name="repair_service_id" value="<?= htmlspecialchars($repairService['repair_service_id'], ENT_QUOTES, 'UTF-8') ?>">
                                                                <p class="align-self-center"><?= htmlspecialchars($repairService['name'], ENT_QUOTES, 'UTF-8') ?> </p>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <div class="d-flex justify-content-center pt-2">
                                                            <button class="btn w-50" name="button" value="delete" type="submit">Supprimer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        <!------- GESTION DES HORAIRES ------->
                            <button class="btn m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_schedules" aria-expanded="false" aria-controls="collapse">
                                Gestion des horaires
                            </button>
                            <div class="collapse" id="collapse_schedules">

                                <div class="card schedulesArea p-3">
                                    <div class="row">
                                        <!-- MODIFY SCHEDULES -->
                                            <div class="col">
                                                <div class="card card-body p-2">
                                                    <h6 class="fw-bold">Modifier les horaires</h6>
                                                    <form action="modifySchedules.php" method="POST"> <!------- modifySchedules.php ------->
                                                            <div class="p-1">
                                                                <div>
                                                                    <label for="durationChoice">Pas de fermeture méridienne : </label>
                                                                    <input id="durationChoice" type="checkbox">
                                                                </div>
                                                                <label for="champSchedules">Jour à modifier :</label>
                                                                <div class="p-1">
                                                                    <select class="rounded ps-1" name="schedules_column" id="champSchedules" value="choisir" required>
                                                                        <option value="lundi">lundi</option>
                                                                        <option value="mardi">mardi</option>
                                                                        <option value="mercredi">mercredi</option>
                                                                        <option value="jeudi">jeudi</option>
                                                                        <option value="vendredi">vendredi</option>
                                                                        <option value="samedi">samedi</option>
                                                                        <option value="dimanche">dimanche</option>
                                                                    </select>
                                                                </div>
                                                                <input class="rounded ps-1 text" type="time" id="houry_start" name="houry_start">
                                                                <input class="rounded ps-1 text" type="time" id="houry_end" name="houry_end">
                                                                <input class="rounded ps-1 text" type="time" id="houry_start_opt" name="houry_start_opt">
                                                                <input class="rounded ps-1 text" type="time" id="houry_end_opt" name="houry_end_opt">
                                                            </div>
                                                        <div class="d-flex justify-content-center pt-2">
                                                            <button class="btn w-50" name="button" value="modify" type="submit">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>


        <!------- ESPACE VISITEUR ------->
            <!-- IMAGE D'ACCUEIL -->
                <div class="imgCover vw-100"></div>
            <!-- SERVICES -->
                <h2 class="d-flex justify-content-center p-3">Nos services</h2>
                <div class="container mx-auto">
                    <div class="p-3 row">
                        <?php require_once "showRepairService.php";?>
                        <?php foreach ($repairServices as $repairService) : ?>
                            <div class="col d-flex justify-content-center m-2 ">
                                <div class="card repairServiceAd">
                                    <img class="card-img-top img-fluid z-0" src="<?= htmlspecialchars($repairService['picture'], ENT_QUOTES, 'UTF-8') ?>" alt="image<?= htmlspecialchars($repairService['name'], ENT_QUOTES, 'UTF-8') ?>">
                                    <div class="badge z-1 position-absolute p-2"><?= htmlspecialchars($repairService['price'], ENT_QUOTES, 'UTF-8') ?> €</div>
                                    <div class="card-body p-1">
                                        <h3 class="card-title"><?= htmlspecialchars($repairService['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                                        <p class="card-text"><?= htmlspecialchars($repairService['description'], ENT_QUOTES, 'UTF-8') ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <!-- COMMENTAIRES -->
                <section class="showRating vw-100 d-flex flex-column justify-content-between">
                    <div class="d-flex flex-column align-items-center justify-content-center flex-grow-1 w-100">
                        <div class="text-center">
                            <?php require_once "showModeratedRating.php"; ?>
                            <?php foreach($ratings as $rating) : ?>
                                <div class="message d-none">
                                    <blockquote class="m-1 fs-2">« <?= htmlspecialchars($rating['message'], ENT_QUOTES, 'UTF-8') ?> »</blockquote>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <p class="pt-3 pe-1"><?= htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') ?></p>
                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <?= $i <= htmlspecialchars($rating['rate'], ENT_QUOTES, 'UTF-8') ? '<i class="blueStar bi bi-star-fill pt-3 ps-1"></i>' : '<i class="blueStar bi bi-star pt-3 ps-1"></i>' ?>
                                                <?php endfor; ?>
                                        </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end me-3 mb-3">
                        <a class="fs-4" href="rating.php">Laisser mon témoignage...</a>
                    </div>
                </section>

    </main>
    <!------- END MAIN ------->




    <!------- START FOOTER ------->
    <footer>
    <?php require_once "footer.php" ?>
    </footer>
    <!------- END FOOTER ------->
        <!-- SCRIPT -->
            <script src="scriptParrot.js"></script>
            <script src="scriptPassword.js"></script>
            <script src="scriptParrotEspaceEmployee.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

<!------- END BODY ------->
</html>
