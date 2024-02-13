<?php
session_start();
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

        <!------- ESPACE ADMIN ------->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { ?>
                <h2>Bienvenue <?php echo $_SESSION['firstname']?></h2>
                <div class="d-flex justify-content-center m-2">
                    <div class="d-flex align-items-center card p-3 adminArea">

                    <!------- GESTION DES EMPLOYES ------->
                        <button class="btn m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_employees" aria-expanded="false" aria-controls="collapse">
                            Gestion des employés
                        </button>
                        <div class="collapse" id="collapse_employees">

                            <div class="card employeesArea p-3">
                                <div class="row">
                                <!-- ADD EMPLOYEE -->
                                    <div class="col">
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
                                                    <input class="rounded ps-1" type="text" name="password" id="password" placeholder="********" required>
                                                </div>
                                                <div class="d-flex justify-content-center pt-2">
                                                    <button class="btn w-50" type="submit">Ajouter</button>
                                                </div>
                                            </form>
                                        </div>
                                    <!-- MODIFY EMPLOYEE -->
                                        <div class="card card-body m-1 p-2">
                                            <h6 class="fw-bold">Modifier un employé</h6>
                                            <form action="modifyEmployee.php" method="POST">
                                                <?php require "employeeList.php";?>
                                                    <div class="p-1">
                                                        <label for="champEmployee">Attribut de modification :</label>
                                                    </div>
                                                    <div class="p-1">
                                                        <select class="rounded ps-1" name="user_column" id="champEmployee" required>
                                                            <option value="last_name">nom</option>
                                                            <option value="first_name">prénom</option>
                                                            <option value="role">rôle</option>
                                                            <option value="address">adresse</option>
                                                            <option value="birthdate">birthdate</option>
                                                            <option value="mail">mail</option>
                                                            <option value="password">mot de passe</option>
                                                        </select>
                                                        <input class="rounded ps-1" type="text" name="new_value" placeholder="modification">
                                                    </div>
                                                <div class="d-flex justify-content-center pt-2">
                                                    <button class="btn w-50" name="button" value="modify" type="submit">Modifier</button>
                                                </div>
                                            </form>
                                        </div>
                                    <!-- DELETE EMPLOYEE -->
                                        <div class="card card-body m-1 p-2">
                                            <h6 class="fw-bold">Supprimer un employé</h6>
                                            <form action="deleteEmployee.php" method="POST">
                                                <?php require "employeeList.php";?>
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
                                        <div class="col m-1">
                                            <div class="card card-body p-2">
                                                <h6 class="fw-bold">Ajouter un service de réparation</h6>
                                                <form enctype="multipart/form-data" action="addRepairServices.php" method="POST">
                                                    <div class="d-inline-flex">
                                                        <label for="repairService_name">Nom :</label>
                                                        <input class="rounded ps-1" type="text" name="repairService_name" id="repairService_name" placeholder="vidange, freins..." required>
                                                    </div>
                                                    <div class="d-inline-flex">
                                                        <label for="repairService_price">Prix :</label>
                                                        <input class="rounded" type="number" step="10" name="repairService_price" id="repairService_price" placeholder="xx,xx €" required>
                                                    </div>
                                                    <div class="d-inline-flex flex-column">
                                                        <label class="d-inline-flex" for="repairService_describe">Description :</label>
                                                        <textarea class="rounded d-inline-flex" name="repairService_describe" id="repairService_describe" placeholder="..." required></textarea>
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
                                        <div class="col m-1">
                                            <div class="card card-body p-2">
                                                <h6 class="fw-bold">Modifier un service de réparation</h6>
                                                <form enctype="multipart/form-data" action="modifyRepairService.php" method="POST">
                                                    <?php require "repairServiceList.php";?>
                                                        <div class="p-1">
                                                            <label for="champRepairService">Attribut de modification :</label>
                                                            <div class="p-1">
                                                                <select class="rounded ps-1" name="repair_service_column" id="champRepairService" value="choisir" required>
                                                                    <option value="name">nom</option>
                                                                    <option value="price">prix</option>
                                                                    <option value="description">description</option>
                                                                    <option value="picture">photo</option>
                                                                </select>
                                                                <input class="rounded ps-1 text" type="text" name="new_value" placeholder="modification">
                                                                <input class="rounded ps-1 file d-none w-75" accept=".jpeg, .jpg, .webp" type="file" name="new_value_file">
                                                            </div>
                                                        </div>
                                                    <div class="d-flex justify-content-center pt-2">
                                                        <button class="btn w-50" name="button" value="modify" type="submit">Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <!-- DELETE REPAIR SERVICE -->
                                        <div class="col m-1">
                                            <div class="card card-body p-2">
                                                <h6 class="fw-bold">Supprimer un service de réparation</h6>
                                                <form action="deleteRepairService.php" method="POST">
                                                    <?php require "repairServiceList.php";?>
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



        <!------- ESPACE EMPLOYES ------->
            <?php } elseif (isset($_SESSION['role']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "employé")) { ?>
                <h4>Bienvenue <?php echo $_SESSION['firstname']?></h4>
            <?php } ?>
                <div class="d-flex justify-content-center m-2 mb-5">
                    <div class="d-flex align-items-center card p-3 adminArea">

                    <!------- GESTION DES VEHICULES -------->
                        <button class="btn m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_vehicles" aria-expanded="false" aria-controls="collapse">
                            Gestion des véhicules
                        </button>
                        <div class="collapse" id="collapse_vehicles">

                            <div class="card vehiclesArea p-3">
                                <div class="row">
                                    <!-- ADD VEHICLES -->
                                        <div class="col">
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
                                                            <textarea class="rounded d-inline-flex" name="usedCar_description" id="usedCar_description" placeholder="..." required></textarea>
                                                            <label class="d-inline-flex" for="usedCar_img">Photo :</label>
                                                            <input class="rounded d-inline-flex w-75" type="file" accept=".jpeg, .jpg, .webp" name="usedCar_img" id="usedCar_img" required></input>
                                                        </div>
                                                    <div class="d-flex justify-content-center pt-2">
                                                        <button class="btn w-50" type="submit">Ajouter le véhicule</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <!-- MODIFY REPAIR SERVICE -->
                                        <div class="col m-1">
                                            <div class="card card-body p-2">
                                                <h6 class="fw-bold">Modifier un service de réparation</h6>
                                                <form enctype="multipart/form-data" action="modifyUsedCar.php" method="POST">
                                                    <?php require "usedCarList.php";?>
                                                        <div class="p-1">
                                                            <label for="champUsedCar">Attribut de modification :</label>
                                                            <div class="p-1">
                                                                    <!-- CHOIX DE MODIFICATION -->
                                                                <select class="rounded ps-1" name="used_car_column" id="champUsedCar" value="choisir" required>
                                                                    <option value="brand">marque</option> <!-- new_value_brand -->
                                                                    <option value="model">modèle</option> <!-- new_value_model -->
                                                                    <option value="color">couleur</option>  <!-- new_value_color -->
                                                                    <option value="description">description</option> <!-- new_value_description -->

                                                                    <option value="gearbox">boîte de vitesse</option> <!-- new_value_gearbox -->
                                                                    <option value="motorisation">motorisation</option> <!-- new_value_motorisation -->

                                                                    <option value="kilometers">kilomètre</option> <!-- new_value_kilometers -->
                                                                    <option value="price">prix</option> <!-- new_value_price -->
                                                                    <option value="year">année</option> <!-- new_value_year -->

                                                                    <option value="picture">photo</option>  <!-- new_value_file -->
                                                                </select>
                                                                    <!-- INPUT A AFFICHER SELON CHOIX DE MODIFICATION-->
                                                                <input class="rounded ps-1 toHide" type="text" name="new_value_brand" id="new_value_brand" placeholder="marque">
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
                                    <!-- DELETE VEHICLES -->
                                        <div class="col m-1">
                                            <div class="card card-body p-2">
                                                <h6 class="fw-bold">Supprimer un véhicules</h6>
                                                <form action="deleteUsedCar.php" method="POST">  <!-- a faire DeleteUseCar-->
                                                    <?php include "usedCarList.php";?> <!-- a faire UsedCarList-->
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
                                                                <input class="m-1" placeholder="nom" type="text" name="rating_name" id="rating_name" required>
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
                                                    <h6 class="fw-bold">Modérer les témoignages</h6>
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


        <!------- ESPACE VISITEUR ------->
            <!-- IMAGE D'ACCUEIL -->
                <div class="imgCover vw-100"></div>

            <!-- SERVICES -->
                <h2 class="d-flex justify-content-center p-3">Nos services</h2>
                <div class="container mx-auto">
                    <div class="p-3 row">
                        <?php require_once "showRepairService.php";?>
                    </div>
                </div>
            <!-- COMMENTAIRES -->
            <section class="showRating vw-100 d-flex flex-column justify-content-between">
                <div class="d-flex flex-column align-items-center justify-content-center flex-grow-1 w-100">
                    <div class="text-center">
                        <?php require_once "showModeratedRating.php"; ?>
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

    </footer>
    <!------- END FOOTER ------->
    <script src ="scriptParrot.js"></script>
    <script src="scriptRating.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

<!------- END BODY ------->


</html>
