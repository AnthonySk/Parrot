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
<body class="d-flex flex-column min-vh-100">

    <!------- START HEADER ------->
    <header>
        <?php require_once "header.html" ?>
    </header>
    <!------- END HEADER ------->



    <!------- START MAIN ------->

    <main class="flex-fill d-flex align-items-center justify-content-center">
        <div class="d-flex justify-content-center m-5">
            <div class="card d-flex align-items-center p-3 colorForm">
                <h5 class="text-center m-2">Récupération du mot de passe</h5>
                <form class="w-100" action="getMailRecupPwd.php" method="POST">
                    <label for="username">Email</label>
                    <div class="w-100 d-flex flex-column d-flex align-items-center">
                        <input class="rounded w-100 ps-1" placeholder="email" type="text" name="username" id="username" required>
                    </div>
                    <div class="d-flex flex-column align-items-center mt-3">
                        <button class="btn" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!------- END MAIN ------->



    <!------- START FOOTER ------->
    <footer>
        <?php require_once "footer.php"?>
    </footer>
    <!------- END FOOTER ------->
    <script src="scriptParrot.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
