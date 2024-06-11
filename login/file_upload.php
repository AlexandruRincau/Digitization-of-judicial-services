<?php
require_once __DIR__ . '/../config/helper.php';
require_once '../config/connect.php';
checkAuth();
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
    <form action="../vendor/file_upload.php" method="POST" enctype="multipart/form-data" class="form_marg card ">
        Selectează fișierele pentru încărcare:
        <input type="file" name="files[]" multiple>
        <input type="submit" value="Transmite fișierele">
    </form>
    <div class="back">
        <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
    </div>
</body>
</html>
