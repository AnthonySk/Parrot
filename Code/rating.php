<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="/styleParrot.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <!------- START HEADER ------->
<header class="z-1">
<?php require_once "header.html" ?>
</header>
    <!------- END HEADER ------->



    <!------- START MAIN ------->

    <main class="d-flex z-n1 justify-content-center m-5">
        <div class="card d-flex align-items-center p-3 colorForm">
            <h5 class="m-3">Mon témoigage</h5>
            <form class="w-100 " action="addRating.php" method="POST">
                <div class="row">
                    <div class="col w-100">
                        <input class="rounded m-1 ps-1" placeholder="nom" type="text" name="rating_name" id="rating_name" required>
                    </div>
                    <div class="row w-100">
                        <div class="rating m-1">
                            <!-- 1 -->
                            <input class="d-none" type="radio" name="rating_rate" id="star1" value="1">
                            <label class="blueStar star bi bi-star" for="star1"></label>
                            <!-- 2 -->
                            <input class="d-none" type="radio" name="rating_rate" id="star2" value="2">
                            <label class="blueStar star bi bi-star" for="star2"></label>
                            <!-- 3 -->
                            <input class="d-none" type="radio" name="rating_rate" id="star3" value="3">
                            <label class="blueStar star bi bi-star" for="star3"></label>
                            <!-- 4 -->
                            <input class="d-none" type="radio" name="rating_rate" id="star4" value="4">
                            <label class="blueStar star bi bi-star" for="star4"></label>
                            <!-- 5 -->
                            <input class="d-none" type="radio" name="rating_rate" id="star5" value="5">
                            <label class="blueStar star bi bi-star" for="star5"></label>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <label class="d-inline-flex m-1" for="rating_message">Témoignage :</label>
                    <textarea class="rounded d-inline-flex p-1 m-1" maxlength="150" name="rating_message" id="rating_message" placeholder="..." required></textarea>
                </div>
                <div class="d-flex flex-column d-flex align-items-center m-1">
                    <button class="btn" type="submit">Valider</button>
                </div>
            </form>
        </div>
    </main>

    <!------- END MAIN ------->



    <!------- START FOOTER ------->
    <footer>
    <?php require_once "footer.php" ?>
    </footer>
    <!------- END FOOTER ------->
    <script src="scriptParrot.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
