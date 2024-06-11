<?php

require_once __DIR__ . '/../config/helper.php';

?>
<!doctype html>
<html lang="ro" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>JusticeMD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="../assets/app.css">
</head>
<body class="body2" >

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

    <form action="../vendor/cerere.php" enctype="multipart/form-data" method="post" class="card">

        <h3>Datele despre datoria paratului</h3>

        <label for="datoria">
            Datoria
            <input
                    type="text"
                    id="datoria"
                    name="datoria"
                    placeholder="10000"
                    value= "<?php echo old('datoria')?>"
                <?php hasError('datoria') ?>
            >
            <?php if(hasValidationError('datoria')): ?>

                <small><?php getError('datoria');?></small>

            <?php endif; ?>
        </label>
        <label for="datoria_curat">
            Datoria curată
            <input
                    type="text"
                    id="datoria_curat"
                    name="datoria_curat"
                    placeholder="7000"
                    value= "<?php echo old('datoria_curat')?>"
                <?php hasError('datoria_curat') ?>
            >
            <?php if(hasValidationError('datoria_curat')): ?>

                <small><?php getError('datoria_curat');?></small>

            <?php endif; ?>
        </label>
        <label for="zile_pen">
            Zilele penale
            <input
                    type="text"
                    id="zile_pen"
                    name="zile_pen"
                    placeholder="365"
                    value= "<?php echo old('zile_pen')?>"
                <?php hasError('zile_pen') ?>
            >
            <?php if(hasValidationError('zile_pen')): ?>

                <small><?php getError('zile_pen');?></small>

            <?php endif; ?>
        </label>
        <label for="penalitate">
            Penalitățile
            <input
                    type="text"
                    id="penalitate"
                    name="penalitate"
                    placeholder="3000"
                    value= "<?php echo old('penalitate')?>"
                <?php hasError('penalitate') ?>
            >
            <?php if(hasValidationError('penalitate')): ?>

                <small><?php getError('penalitate');?></small>

            <?php endif; ?>
        </label>
        <label for="data1">
            Începutul penalității
            <input
                    type="date"
                    id="data1"
                    name="data1"
                    value= "<?php echo old('data1')?>"
                <?php hasError('data1') ?>
            >
            <?php if(hasValidationError('data1')): ?>

                <small><?php getError('data1');?></small>

            <?php endif; ?>
        </label>
        <label for="data2">
            Sfârșitul penalității
            <input
                    type="date"
                    id="data2"
                    name="data2"
                    value= "<?php echo old('data2')?>"
                <?php hasError('data2') ?>
            >
            <?php if(hasValidationError('data2')): ?>

                <small><?php getError('data2');?></small>

            <?php endif; ?>
        </label>

        <h3>Datele paratului</h3>

        <label for="numele2">
            Numele
            <input
                    type="text"
                    id="numele2"
                    name="numele2"
                    placeholder="Vasile"
                    value= "<?php echo old('numele2')?>"
                <?php hasError('numele2') ?>
            >
            <?php if(hasValidationError('numele2')): ?>

                <small><?php getError('numele2');?></small>

            <?php endif; ?>
        </label>
        <label for="prenumele2">
            Prenumele
            <input
                    type="text"
                    id="prenumele2"
                    name="prenumele2"
                    placeholder="Vasilescu"
                    value= "<?php echo old('prenumele2')?>"
                <?php hasError('prenumele2') ?>
            >
            <?php if(hasValidationError('prenumele2')): ?>

                <small><?php getError('prenumele2');?></small>

            <?php endif; ?>
        </label>
        <label for="patronimic">
            Patronimicul
            <input
                    type="text"
                    id="patronimic"
                    name="patronimic"
                    placeholder="Dorin"
                    value= "<?php echo old('patronimic')?>"
                <?php hasError('patronimic') ?>
            >
            <?php if(hasValidationError('patronimic')): ?>

                <small><?php getError('patronimic');?></small>

            <?php endif; ?>
        </label>
        <label for="localitatea2">
            Localitatea
            <input
                    type="text"
                    id="localitatea2"
                    name="localitatea2"
                    placeholder="Zaim"
                    value= "<?php echo old('localitatea2')?>"
                <?php hasError('localitatea2') ?>
            >
            <?php if(hasValidationError('localitatea2')): ?>

                <small><?php getError('localitatea2');?></small>

            <?php endif; ?>
        </label>
        <label for="codul_fisc2">
            Codul fiscal
            <input
                    type="text"
                    id="codul_fisc2"
                    name="codul_fisc2"
                    placeholder="1002365478954"
                    value= "<?php echo old('codul_fisc2')?>"
                <?php hasError('codul_fisc2') ?>
            >
            <?php if(hasValidationError('codul_fisc2')): ?>

                <small><?php getError('codul_fisc2');?></small>

            <?php endif; ?>
        </label>
        <label for="IDNP">
            IDNP
            <input
                    type="text"
                    id="IDNP"
                    name="IDNP"
                    placeholder="2003569741236"
                    value= "<?php echo old('IDNP')?>"
                <?php hasError('IDNP') ?>
            >
            <?php if(hasValidationError('IDNP')): ?>

                <small><?php getError('IDNP');?></small>

            <?php endif; ?>
        </label>
        <label for="den_comp2">
            Denumirea companiei
            <input
                    type="text"
                    id="den_comp2"
                    name="den_comp2"
                    placeholder="La Mămuca"
                    value= "<?php echo old('den_comp2')?>"
                <?php hasError('den_comp2') ?>
            >
            <?php if(hasValidationError('den_comp2')): ?>

                <small><?php getError('den_comp2');?></small>

            <?php endif; ?>
        </label>
        <br>
        <br>
        <button type="submit">Îndeplinește forma</button>
    </form>

    <div class="back">
        <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
    </div>

</body>
</html>
