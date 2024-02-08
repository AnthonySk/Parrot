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
    <h2>bienvenue <?php echo $_SESSION['firstname']?></h2>
    <div class="d-flex justify-content-center m-2">
        <div class="d-flex align-items-center card p-3">



        <!------- GESTION DES EMPLOYES ------->
            <button class="btn m-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_employees" aria-expanded="false" aria-controls="collapse">
                Gestion des employés
            </button>
            <div class="collapse" id="collapse_employees">

            <!-- ADD EMPLOYEE -->
                <div class="card card-body m-2 p-3">
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
                <div class="card card-body m-2 p-3">
                    <h6 class="fw-bold">Modifier un employé</h6>
                    <form action="modifyEmployee.php" method="POST">
                        <?php require "employeeList.php";?>
                            <div class="p-1">
                                <label for="champ">Attribut de modification :</label>
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
                <div class="card card-body m-2 p-3">
                    <h6 class="fw-bold">Supprimer un employé</h6>
                    <form action="deleteEmployee.php" method="POST">
                        <?php require "employeeList.php";?>
                        <div class="d-flex justify-content-center">
                            <button class="btn w-50" name="button" value="delete" type="submit">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>



        <!------- GESTION DES INFORMATIONS ------->
            <button class="btn m-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_informations" aria-expanded="false" aria-controls="collapse">
                Gestion des informations
            </button>
            <div class="collapse" id="collapse_informations">

            <!-- ADD REPAIR SERVICE -->
                <div class="card card-body p-3 m-2">
                    <h6 class="fw-bold">Ajouter un service de réparation</h6>
                    <form enctype="multipart/form-data" action="addRepairServices.php" method="POST">
                        <div class="p-1">
                            <label for="repairService_name">Nom :</label>
                            <input class="rounded ps-1" type="text" name="repairService_name" id="repairService_name" placeholder="vidange, freins..." required>
                        </div>
                        <div class="p-1">
                            <label for="repairService_price">Prix :</label>
                            <input class="rounded ps-1" type="number" step="0.01" name="repairService_price" id="repairService_price" placeholder="xx,xx €" required>
                        </div>
                        <div class="d-flex flex-column p-1">
                            <label for="repairService_describe">Description :</label>
                            <textarea class="rounded ps-1" name="repairService_describe" id="repairService_describe" row="5" col="25" maxlength="255" placeholder="..." required></textarea>
                        </div>
                        <div class="d-flex flex-column p-1">
                            <label for="repairService_img">Photo :</label>
                            <input class="rounded" type="file" accept=".jpeg, .jpg, .webp" name="repairService_img" id="repairService_img" required></input>
                        </div>
                        <div class="d-flex p-1">
                            <button class="btn fs-6" name="button" value="add" type="submit">Ajouter le service de réparation</button>
                        </div>
                    </form>
                </div>
            <!-- MODIFY REPAIR SERVICE -->
                <div class="card card-body m-2 p-3">
                    <h6 class="fw-bold">Modifier un service de réparation</h6>
                    <form enctype="multipart/form-data" action="modifyRepairService.php" method="POST">
                        <?php require "repairServiceList.php";?>
                            <div class="p-1">
                                <label for="champ">Attribut de modification :</label>
                                <div class="p-1">
                                    <select class="rounded ps-1" name="repair_service_column" id="champRepairService" value="choisir" required>
                                        <option value="name">nom</option>
                                        <option value="price">prix</option>
                                        <option value="description">description</option>
                                        <option value="picture">photo</option>
                                    </select>
                                    <input class="rounded ps-1 text" type="text" name="new_value" placeholder="modification">
                                    <input class="rounded ps-1 file d-none" accept=".jpeg, .jpg, .webp" type="file" name="new_value_file">
                                </div>
                            </div>
                        <div class="d-flex justify-content-center pt-2">
                            <button class="btn w-50" name="button" value="modify" type="submit">Modifier</button>
                        </div>
                    </form>
                </div>
            <!-- DELETE REPAIR SERVICE -->
                <div class="card card-body m-2 p-3">
                    <h6 class="fw-bold">Supprimer un service de réparation</h6>
                    <form action="deleteRepairService.php" method="POST">
                        <?php require "repairServiceList.php";?>
                        <div class="d-flex justify-content-center">
                            <button class="btn w-50" name="button" value="delete" type="submit">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!------- ESPACE EMPLOYES ------->
<?php } elseif (isset($_SESSION['role']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "employé")) { ?>
    <h4>bienvenue <?php echo $_SESSION['firstname']?></h4>
<?php } ?>



    <!------- ESPACE VISITEUR ------->
        <!-- IMAGE D'ACCUEIL -->
        <div class="imgCover"></div>

        <!-- SERVICES -->
        <h2 class="d-flex justify-content-center p-3">Nos services</h2>
        <div class="container mx-auto">
            <div class="p-3 row gap-5">
                <!-- REPAIR SERVICES -->
                <?php require_once "showRepairService.php";?>                
            </div>
        </div>
    </main>
    <!------- END MAIN ------->




    <!------- START FOOTER ------->
    <footer>

    </footer>
    <!------- END FOOTER ------->

    <script src="/scriptParrot.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

<!------- END BODY ------->


</html>
