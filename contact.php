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
<header>
<?php require_once "header.html" ?>
</header>
    <!------- END HEADER ------->



    <!------- START MAIN ------->

    <main class="d-flex justify-content-center m-5">
        <div class="card z-n1 d-flex align-items-center p-3 colorForm">
            <h5 class="m-3">Nous contacter</h5>
            <form class="" action="sendMail.php" method="POST">
                <div class="row">
                    <div class="col">
                        <input class="rounded d-inline-flex m-1 p-1" minlength="3" placeholder="prénom" type="text" name="contact_first_name" id="contact_first_name" required>
                        <input class="rounded d-inline-flex m-1 p-1" minlength="2" placeholder="nom" type="text" name="contact_last_name" id="contact_last_name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="rounded d-inline-flex m-1 p-1" placeholder="email" type="email" name="contact_mail" id="contact_mail" required>
                        <input class="rounded d-inline-flex m-1 p-1" placeholder="xx-xx-xx-xx-xx" type="tel" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" name="contact_phone_number" id="contact_phone_number" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex">
                        <input class="rounded w-100 m-1 p-1" minlength="5" placeholder="objet du message" type="text" name="contact_subject" id="contact_subject" required>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">
                        <textarea class="rounded w-100 p-1 m-1" maxlength="150" name="contact_message" id="contact_message" placeholder="Votre message" required></textarea>
                    </div>
                </div>
                <div class="d-flex flex-column d-flex align-items-center m-1">
                    <button class="btn" type="submit">Valider</button>
                </div>
            </form>
        </div>
    </main>

    <!------- END MAIN ------->



    <!------- START FOOTER ------->
    <?php require_once "footer.php"?>
    <!------- END FOOTER ------->
    <script src="scriptParrot.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
