<?php

require_once __DIR__ . '/config/helper.php';

checkGuest();

?>

<!DOCTYPE html>
<html lang="ro" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>JusticeMD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="assets/app.css">
</head>
<body class="body2">

<form class="card form_marg2" method="post" action="vendor/login.php">
    <h2>Autorizare</h2>

    <?php if(hasMessage('error')): ?>
    <div class="notice error"><?php echo getMessage('error') ?></div>
    <?php endif; ?>

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

    <label for="parola">
        Parola
        <input
            type="password"
            id="parola"
            name="parola"
            placeholder="******"

        >
    </label>

    <button
        type="submit"
        id="submit"
    >Continuă</button>
</form>

<p class="marg_bot">Eu nu am <a href="login/register.php">cont</a></p>

<script src="assets/app.js"></script>

<div class="back">
    <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
</div>
</body>
</html>
