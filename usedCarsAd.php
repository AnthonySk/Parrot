<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos véhicules</title>
    <link href="/styleParrot.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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

    <main class="">
        <h2 class="d-flex justify-content-center p-3">Nos plus belles voitures</h2>
        <!-- kilometer -->
        <div class="row d-flex justify-content-start m-1 ms-3">
        <div class="d-flex justify-content-start">
                <button id="resetSliderKm"><i class="m-1 bi bi-arrow-clockwise"></button></i>
                <h6 class="m-1 text-end">Kilomètrage</h6>
            </div>
            <div id="slider-kilometer-range" class="w-50"></div>
            <div id="slider-range-km" class="text-start"></div>
        </div>
        <!-- price -->
        <div class="row d-flex justify-content-center m-1">
        <div class="d-flex justify-content-center">
            <button id="resetSliderPrice"><i class="m-1 bi bi-arrow-clockwise"></button></i>
                <h6 class="m-1 text-end">Prix</h6>
            </div>
            <div id="slider-price-range" class="w-50"></div>
            <div id="slider-range-price" class="text-center"></div>
        </div>
        <!-- year -->
        <div class="row d-flex justify-content-end m-1 me-4">
            <div class="d-flex justify-content-end">
                <button id="resetSliderYear"><i class="m-1 bi bi-arrow-clockwise"></button></i>
                <h6 class="m-1 text-end">Année</h6>
            </div>
            <div id="slider-year-range" class="w-50"></div>
            <div id="slider-range-year" class="text-end"></div>
        </div>
        <div class="container mx-auto">
            <div class="p-3 row" id="carList">
                <?php require_once "showUsedCar.php" ?>
                <?php foreach ($usedCarsAd as $car) : ?>
                    <!-- CAR AD -->
                    <div class="col d-flex justify-content-center m-2">
                        <div class="card usedCardAd">
                            <img class="card-img-top img-fluid z-0" src="<?= htmlspecialchars($car['picture'], ENT_QUOTES, 'UTF-8') ?>" alt="photo de <?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($car['model'], ENT_QUOTES, 'UTF-8') ?>">
                            <div class="badge z-1 position-absolute p-2"><?= htmlspecialchars(number_format($car['price'], 0), ENT_QUOTES, 'UTF-8') ?> €</div>
                            <div class="card-body">
                                <h3 class="card-title p-1"><?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($car['model'], ENT_QUOTES, 'UTF-8') ?></h3>
                                <p class="card-text p-1"><?= htmlspecialchars($car['year'], ENT_QUOTES, 'UTF-8') ?></p>
                                <p class="card-text p-1"><?= htmlspecialchars($car['motorisation'], ENT_QUOTES, 'UTF-8') ?></p>
                                <p class="card-text p-1"><?= htmlspecialchars($car['kilometers'], ENT_QUOTES, 'UTF-8') ?> km</p>
                                <p class="card-text p-1"><?= htmlspecialchars(number_format($car['price'], 0), ENT_QUOTES, 'UTF-8') ?> €</p>
                                <button type="button" class="btn w-25 mx-auto" data-bs-toggle="modal" data-bs-target="#<?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?><?= htmlspecialchars($car['year'], ENT_QUOTES, 'UTF-8') ?>">
                                    <p>Détails</p>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL -->
                            <div class="modal fade" id="<?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?><?= htmlspecialchars($car['year'], ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" role="dialog" aria-labelledby="<?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($car['year'], ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable w-75 mx-auto" role="document">
                                    <!-- CAR AD -->
                                    <div class="modal-content p-3">
                                        <div class="modal-header">
                                            <h5 class="modal-title m-1" id="<?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($car['year'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($car['model'], ENT_QUOTES, 'UTF-8') ?></h5>
                                            <i class="bi bi-x-circle m-2" aria-hidden="true" data-bs-dismiss="modal"></i>
                                        </div>
                                        <div class="modal-body">
                                            <div class="usedCardAd">
                                                <div class="badge z-1 position-absolute p-2"><?= htmlspecialchars(number_format($car['price'], 0), ENT_QUOTES, 'UTF-8') ?> €</div>
                                                <img class="img-fluid rounded z-0" src="<?= htmlspecialchars($car['picture'], ENT_QUOTES, 'UTF-8') ?>" alt="photo de<?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($car['model'], ENT_QUOTES, 'UTF-8') ?>">
                                                    <div class="card-body p-1">
                                                        <h3 class="card-title"><?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($car['model'], ENT_QUOTES, 'UTF-8') ?></h3>
                                                        <p class="card-text"><?= htmlspecialchars($car['year'], ENT_QUOTES, 'UTF-8') ?></p>
                                                        <p class="card-text"><?= htmlspecialchars($car['motorisation'], ENT_QUOTES, 'UTF-8') ?></p>
                                                        <p class="card-text"><?= htmlspecialchars($car['kilometers'], ENT_QUOTES, 'UTF-8') ?> km</p>
                                                        <p class="card-text"><?= htmlspecialchars(number_format($car['price'], 0), ENT_QUOTES, 'UTF-8') ?> €</p>
                                                    </div>
                                            </div>
                                            <div class="card d-flex align-items-center m-1 p-3 colorForm">
                                                <h5 class="m-3">Nous contacter</h5>
                                                <form class="" action="sendMail.php" method="POST">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input class="rounded d-inline-flex m-1 p-1" placeholder="prénom" type="text" name="contact_first_name" id="contact_first_name" required>
                                                            <input class="rounded d-inline-flex m-1 p-1" placeholder="nom" type="text" name="contact_last_name" id="contact_last_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input class="rounded d-inline-flex m-1 p-1" placeholder="email" type="email" pattern=".+@example\.com" name="contact_mail" id="contact_mail" required>
                                                            <input class="rounded d-inline-flex m-1 p-1" placeholder="06-12-34-56-78" type="tel" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" name="contact_phone_number" id="contact_phone_number" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex">
                                                            <input class="rounded w-100 m-1 p-1" type="text" name="contact_subject" id="contact_subject" value="<?= htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($car['model'], ENT_QUOTES, 'UTF-8') ?>" disabled>
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
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <!------- END MAIN ------->



    <!------- START FOOTER ------->
    <?php require_once "footer.php" ?>
    <!------- END FOOTER ------->
    <script src="scriptUsedCars.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
