<?php

require_once __DIR__ . '/../config/helper.php';

checkAuth();
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

<form class="card" method="post" enctype="multipart/form-data" action="../vendor/pers_jur.php">
    <h2>Înregistrarea persoanei juridice</h2>

    <label for="den_comp">
        Denumirea companiei
        <input
            type="text"
            id="den_comp"
            name="den_comp"
            placeholder="Bucuria"

            value="<?php echo old('den_comp')?>"
            <?php hasError('den_comp') ?>
        >
        <?php if(hasValidationError('den_comp')): ?>

            <small><?php getError('den_comp');?></small>

        <?php endif; ?>
    </label>

    <label for="localitatea">
        Localitatea
        <input
                type="text"
                id="localitatea"
                name="localitatea"
                placeholder="Chișinău"

                value="<?php echo old('localitatea')?>"
            <?php hasError('localitatea') ?>
        >
        <?php if(hasValidationError('localitatea')): ?>

            <small><?php getError('localitatea');?></small>

        <?php endif; ?>
    </label>
    </label>

    <label for="strada">
        Strada
        <input
                type="text"
                id="strada"
                name="strada"
                placeholder="1 mai 23"

                value="<?php echo old('strada')?>"
            <?php hasError('strada') ?>
        >
        <?php if(hasValidationError('strada')): ?>

            <small><?php getError('strada');?></small>

        <?php endif; ?>
    </label>

    <label for="IDNO">
        IDNO
        <input
                type="text"
                id="IDNO"
                name="IDNO"
                placeholder="6523147852369"

                value="<?php echo old('IDNO')?>"
            <?php hasError('IDNO') ?>
        >
        <?php if(hasValidationError('IDNO')): ?>

            <small><?php getError('IDNO');?></small>

        <?php endif; ?>
    </label>

    <label for="codul_fisc">
        Codul fiscal
        <input
                type="text"
                id="codul_fisc"
                name="codul_fisc"
                placeholder="2536954123587"

                value="<?php echo old('codul_fisc')?>"
            <?php hasError('codul_fisc') ?>
        >
        <?php if(hasValidationError('codul_fisc')): ?>

            <small><?php getError('codul_fisc');?></small>

        <?php endif; ?>
    </label>

    <label for="IBAN">
        IBAN
        <input
                type="text"
                id="IBAN"
                name="IBAN"
                placeholder="RC66FGBSSV15630057650000"

                value="<?php echo old('IBAN')?>"
            <?php hasError('IBAN') ?>
        >
        <?php if(hasValidationError('IBAN')): ?>

            <small><?php getError('IBAN');?></small>

        <?php endif; ?>
    </label>

    <label for="codul_post">
        Codul postal
        <input
                type="text"
                id="codul_post"
                name="codul_post"
                placeholder="MD-2020"
                value="<?php echo old('codul_post')?>"
            <?php hasError('codul_post') ?>
        >
        <?php if(hasValidationError('codul_post')): ?>

            <small><?php getError('codul_post');?></small>

        <?php endif; ?>
    </label>

    <label for="email_comp">
        E-mail-ul companiei
        <input
            type="text"
            id="email_comp"
            name="email_comp"
            placeholder="ion@gmail.com"

            value="<?php echo old('email_comp')?>"
            <?php hasError('email_comp') ?>
        >
        <?php if(hasValidationError('email_comp')): ?>

            <small><?php getError('email_comp');?></small>

        <?php endif; ?>
    </label>

    <label for="telefon">
        Telefon companiei
        <input
                type="text"
                id="telefon"
                name="telefon"
                placeholder="063217452"

                value="<?php echo old('telefon')?>"
            <?php hasError('telefon') ?>
        >
        <?php if(hasValidationError('telefon')): ?>

            <small><?php getError('telefon');?></small>

        <?php endif; ?>
    </label>

    <button
        type="submit"
        id="submit"
    >Continuă</button>
</form>

<div class="back">
    <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
</div>

<script src="../assets/app.js"></script>
</body>
</html>