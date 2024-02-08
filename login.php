<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="/styleParrot.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <!------- START HEADER ------->
<header> 
<?php require_once "header.html" ?>
</header>
    <!------- END HEADER ------->



    <!------- START MAIN ------->

    <main class="d-flex justify-content-center m-5">
        <div class="card p-3 d-flex align-items-center loginCard">
            <h5>Login</h5>
            <form class="w-100" action="authentication.php" method="POST">
                <label for="username">Email</label>
                <div class="w-100 d-flex flex-column d-flex align-items-center">
                    <input class="w-100" placeholder="email" type="text" name="username" id="username" required>
                </div>
                <label for="password">Mot de passe</label>
                <div class="w-100 d-flex flex-column d-flex align-items-center">
                    <input class="w-100" placeholder="mot de passe" type="password" name="password" id="password" required>
                </div>
                <div class="d-flex flex-column d-flex align-items-center">
                    <a href="#">Récupérer mon mot de passe...</a>
                    <button class="btn" type="submit">Connexion</button>
                </div>
            </form>
        </div>
    </main>

    <!------- END MAIN ------->



    <!------- START FOOTER ------->

    <!------- END FOOTER ------->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
