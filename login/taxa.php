<?php
require_once __DIR__ . '/../config/helper.php';
require_once '../config/connect.php';
checkAuth();
$data = currentData();

?>

<!DOCTYPE html>
<html lang="ro" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>JusticeMD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="../assets/app.css">
    <script src="../assets/app.js"></script>
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

<form class="card marg_bot2 marg_top" action="../vendor/taxa.php" method="POST">

    <h2>Achitare</h2>
    <p>Suma spre achitare <?php echo taxa($data['datoria']) ?></p>
    <div class="form-group">
        <label for="name_card">Nume card</label>
        <input type="text"
               id="name_card"
               name="name_card"
               placeholder="IONESCU ION"
               value= "<?php echo old('name_card')?>"
            <?php hasError('name_card') ?>
        >
        <?php if(hasValidationError('name_card')): ?>

            <small><?php getError('name_card');?></small>

        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="card_number">Număr card</label>
        <input type="text"
               id="card_number"
               name="card_number"
               placeholder="5467 3456 2345 6789"
               value= "<?php echo old('card_number')?>"
            <?php hasError('card_number') ?>
        >
        <?php if(hasValidationError('card_number')): ?>

            <small><?php getError('card_number');?></small>

        <?php endif; ?>
    </div>
    <div class="inline-group">
        <div class="form-group">
            <label for="expiry_date">Data expirării</label>
            <input type="text"
                   id="expiry_date"
                   name="expiry_date"
                   placeholder="MM/YY"
                   value= "<?php echo old('expiry_date')?>"
                <?php hasError('expiry_date') ?>
            >
            <?php if(hasValidationError('expiry_date')): ?>

                <small><?php getError('expiry_date');?></small>

            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="text"
                   id="cvv"
                   name="cvv"
                   placeholder="CVV"
                   value= "<?php echo old('cvv')?>"
                <?php hasError('cvv') ?>
            >
            <?php if(hasValidationError('cvv')): ?>

                <small><?php getError('cvv');?></small>

            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <button type="submit">Achită</button>
    </div>
</form>

<div class="back">
    <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
</div>
</body>
</html>
