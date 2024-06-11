<?php

require_once __DIR__ . '/../config/helper.php';

checkGuest();

?>

<!DOCTYPE html>
<html lang="ro" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>JusticeMD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="../assets/app.css">
</head>
<body class="body2">

<form class="card" method="post" enctype="multipart/form-data" action="../vendor/register.php">
    <h2>Înregistrarea</h2>

    <label for="numele">
        Numele
        <input
            type="text"
            id="numele"
            name="numele"
            placeholder="Ionescu"
            value= "<?php echo old('numele')?>"
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
                value = "<?php echo old('prenumele')?>"
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
            value= "<?php echo old('email')?>"
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
                value= "<?php echo old('tel_mob')?>"
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

    <fieldset>
        <label for="terms">
            <input
                type="checkbox"
                id="terms"
                name="terms"
            >
            Accept toți termenii de utilizare
        </label>
    </fieldset>

    <button
        type="submit"
        id="submit"
        disabled
    >Continuă</button>
</form>

<p>Eu am <a href="../index.php">cont</a></p>

<div class="back">
    <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
</div>

<script src="../assets/app.js"></script>
</body>
</html>
