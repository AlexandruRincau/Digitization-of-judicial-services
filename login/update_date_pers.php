<?php

require_once __DIR__ . '/../config/helper.php';
$user = currentUser();
checkAuth();
?>

<!doctype html>
<html lang="ro" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="../assets/app.css">
    <link rel="stylesheet" href="../assets/app.js">
    <title>JusticeMD</title>
</head>
<body class="body2">

<header>
    <nav>
        <ul>
            <li><a href="home.php"><img class="img2" src="../img/logo.png" alt="Logo"></a></li>
            <li><a href="home.php" class="logo">JusticeMD</a></li>
            <li><a href="home.php">Profil</a></li>
            <li><a href="cerere.php">Cerere</a></li>
            <li><a href="file_upload.php">Trimite cererea</a></li>
            <li><a href="../sablon/form.php">Forma</a></li>
        </ul>
    </nav>
</header>

<form class="card" method="post" enctype="multipart/form-data" action="../vendor/update_date-pers.php">
    <h2>Modificarea datelor personale</h2>

    <label for="numele">
        Numele
        <input
            type="text"
            id="numele"
            name="numele"
            placeholder="Ionescu"
            value= "<?= $user['numele']?>"
            <?php hasError('numele') ?>
        >
        <?php if(hasValidationError('numele')): ?>

            <small><?php getError('numele');?></small>

        <?php endif; ?>
    </label>

    <label for="prenumele">
        Prenumele
        <input
            type="text"
            id="prenumele"
            name="prenumele"
            placeholder="Ion"
            value = "<?= $user['prenumele']?>"
            <?php hasError('prenumele') ?>
        >
        <?php if(hasValidationError('prenumele')): ?>

            <small><?php getError('prenumele');?></small>

        <?php endif; ?>
    </label>

    <label for="email">
        E-mail
        <input
            type="text"
            id="email"
            name="email"
            placeholder="ion@gmail.com"
            value= "<?= $user['email']?>"
            <?php hasError('email') ?>
        >
        <?php if(hasValidationError('email')): ?>

            <small><?php getError('email');?></small>

        <?php endif; ?>
    </label>

    <label for="tel_mob">
        Telefon mobil
        <input
            type="text"
            id="tel_mob"
            name="tel_mob"
            placeholder="063217452"
            value= "<?= $user['tel_mob']?>"
            <?php hasError('tel_mob') ?>
        >
        <?php if(hasValidationError('tel_mob')): ?>

            <small><?php getError('tel_mob');?></small>

        <?php endif; ?>
    </label>

    <label for="avatar">Imaginea profilului
        <input
            type="file"
            id="avatar"
            name="avatar"
            <?php hasError('avatar') ?>
        >
        <?php if(hasValidationError('avatar')): ?>

            <small><?php getError('avatar');?></small>

        <?php endif; ?>
    </label>

    <div class="grid">
        <label for="password">
            Parola
            <input
                type="password"
                id="parola"
                name="parola"
                placeholder="******"
                <?php hasError('parola') ?>
            >
            <?php if(hasValidationError('parola')): ?>

                <small><?php getError('parola');?></small>

            <?php endif; ?>
        </label>

        <label for="password_confirmation">
            Confirmare
            <input
                type="password"
                id="parola_confirm"
                name="parola_confirm"
                placeholder="******"
            >
        </label>
    </div>

    <button
        type="submit"
        id="submit"
    >Continuă</button>
</form>

<div class="back">
    <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
</div>

</body>
</html>
