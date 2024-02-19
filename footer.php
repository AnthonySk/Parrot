<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="/styleParrot.css" rel="stylesheet">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <footer class="">
        <div class="container-xxl">
            <div class="row">
                <div class="col-9 col-sm-9 col-md-9 col-lg-11">
                    <div class="row">
                        <h6 class="align-self-start mt-2 mb-2 ms-2 ms-sm-3 mt-sm-3 ms-md-5 mt-md-5">Horaires</h6>
                        <div class="d-flex col-12 col-sm-7 col-md-7 col-lg-6">
                            <?php require_once 'showSchedules.php' ?>
                        </div>
                        <div class="col-12 col-sm-5 col-md-5 col-lg-6">
                            <div class="col d-flex">
                                <div class="col-8 mt-3 m-1 col-lg-6">
                                    <h6 class="mt-3 m-1 mt-sm-0">Nous contacter</h6>
                                    <a class="ms-2 fs" href="contact.php">Écrivez-nous...</a>
                                    <p class="ms-2 fs">06 12 34 56 78</p>
                                    <p class="ms-2 fs">03 12 34 56 78</p>
                                </div>
                                <div class="col-2 d-flex flex-column justify-content-center align-items-center m-1">
                                    <a href="#"><img class="logoSocialMedia m-1" src="img/logo instagram.png" alt="logo instagram"></a>
                                    <a href="#"><img class="logoSocialMedia m-1" src="img/logo linkedin.png" alt="logo linkedin"></a>
                                    <a href="#"><img class="logoSocialMedia m-1" src="img/logo youtube.png" alt="logo youtube"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-sm-3 col-md-3 col-lg-1 d-flex flex-column align-items-end pt-2 pe-2 pe-md-5 pt-md-5">
                    <a href="index.php"><img class="logo rounded-circle m-1" src="img/Logo PARROT ECF.svg" alt="logo du garage"></a>
                    <a href="https://www.maisondelartisan.fr/sites/default/files/documents/brochure_label_v3.pdf"><img class="logo rounded-circle m-1" src="img/Logo qualite repair services.png" alt="logo label quali'auto"></a>
                    <a href="https://www.edf.fr/pulse/prix-locaux/occitanie"><img class="logo rounded-circle m-1" src="img/Logo relation client.png" alt="logo prix relation client occitanie EDF pulse"></a>
                    <a href="https://www.meilleursouvriersdefrance.info/accueil.html"><img class="logo rounded-circle m-1" src="img/Logo MOF.png" alt="logo meilleur ouvrier de france"></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
