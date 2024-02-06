<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>


<!------- START BODY ------->

<body>

    <!------- START HEADER ------->
<?php require_once "header.html" ?>
    <!------- END HEADER ------->




    <!------- START MAIN ------->
    <main>

        <!-- espace employés /admin -->
<?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { ?>
    <h4>bienvenue <?php echo $_SESSION['firstname']?></h4>
    <div class="d-flex justify-content-center m-2">
        <div class="card p-3 d-flex align-items-center">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
                Gestion des employés
            </button>

            <div class="collapse" id="collapse">
                <div class="m-2 card card-body">
                    <form action="addEmployee.php" method="POST">
                        <div>
                            <label for="last_name">Nom</label>
                            <input type="last_name" name="last_name" id="last_name" placeholder="nom" required>
                        </div>
                        <div>
                            <label for="first_name">Prénom</label>
                            <input type="first_name" name="first_name" id="first_name" placeholder="Prénom" required>
                        </div>
                        <div>
                            <label for="role">Rôle</label>
                            <select name="role" id="role" required>
                                <option value="employé">employé</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                        <div>
                            <label for="address">Adresse</label>
                            <input type="text" name="address" id="address" placeholder="adresse" required>
                        </div>
                        <div>
                            <label for="birthdate">Date de naissance</label>
                            <input type="date" name="birthdate" id="birthdate" value=2009-12-31 min="1954-01-01" max="2009-12-31" placeholder="AAAA-MM-JJ" required >
                        </div>
                        <div>
                            <label for="mail">Email</label>
                            <input type="email" name="mail" id="mail" placeholder="exemple@exemple.com" required>
                        </div>
                        <div>
                            <label for="password">Mot de passe</label>
                            <input type="text" name="password" id="password" placeholder="mot de passe" required>
                        </div>
                        <button class="btn btn-primary w-50" type="submit">Ajouter</button>
                    </form>
                </div>
                <div class="m-2 card card-body">
                    <input type="checkbox">
                    <input type="text">
                </div>
            </div>
        </div>
    </div>
<?php } elseif (isset($_SESSION['role']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "employé")) { ?>
    <h4>bienvenue <?php echo $_SESSION['firstname']?></h4>
<?php } ?>

        <div class="imgCover"></div>
        <h2 class="p-3 d-flex justify-content-center">Nos services</h2>
        <div class="container">
            <div class="p-3 row  gap-1">
                <div class="col">
                    <div class="card">
                        <img class ="card-img-top img-fluid" src="img/services vidange.jpg" alt="image vidange">
                        <div class="card-body p-1">
                            <h3 class="card-title">Vidange</h3>
                            <p class="card-text">Nous changeons les filtres de votre véhicules (air, habitacle et huile)</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img class ="card-img-top img-fluid" src="img/services vidange.jpg" alt="image vidange">
                        <div class="card-body p-1">
                            <h3 class="card-title">Vidange</h3>
                            <p class="card-text">Nous changeons les filtres de votre véhicules (air, habitacle et huile)</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img class ="card-img-top img-fluid" src="img/services vidange.jpg" alt="image vidange">
                        <div class="card-body p-1">
                            <h3 class="card-title">Vidange</h3>
                            <p class="card-text">Nous changeons les filtres de votre véhicules (air, habitacle et huile)</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img class ="card-img-top img-fluid" src="img/services vidange.jpg" alt="image vidange">
                        <div class="card-body p-1">
                            <h3 class="card-title">Vidange</h3>
                            <p class="card-text">Nous changeons les filtres de votre véhicules (air, habitacle et huile)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!------- END MAIN ------->




    <!------- START FOOTER ------->
    <footer>

    </footer>
    <!------- END FOOTER ------->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

<!------- END BODY ------->


</html>
