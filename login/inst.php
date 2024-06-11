<?php
require_once __DIR__ . '/../config/helper.php';
require_once '../config/connect.php';
checkAuth();
?>

<!doctype html>
<html lang="ro" data-theme="light">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>JusticeMD</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        function redirect() {
            var select = document.getElementById('pagina');
            var selectedOption = select.options[select.selectedIndex].value;

            if (selectedOption !== '') {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("director-continut").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "../vendor/inst.php?director=" + selectedOption, true);
                xhttp.send();
            } else {
                document.getElementById("director-continut").innerHTML = '';
            }
        }
    </script>
</head>
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
<body class="body2">

<form method="post" action="../vendor/accept.php" class="card">
    <label for="pagina">Documentele încărcate</label>
    <select id="pagina" onchange="redirect()" class="select" name="file_to_move">
        <option value="">Alege o pagină</option>
        <?php
        $directory = 'C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\file\file_upload';
        $files = scandir($directory);
        foreach ($files as $file) {
            if (!in_array($file, array(".", ".."))) {
                echo '<option value="' . $file . '">' . $file . '</option>';
            }
        }
        ?>
    </select>
    <div id="director-continut"></div>
    <textarea name="text_content" cols="50" rows="20"></textarea>
    <button type="submit" name="action" value="Primire">Primire spre examinare</button>
    <button type="submit" name="action" value="NuDaCurs">Nu da curs</button>
    <button type="submit" name="action" value="RefuzaPrimirea">Refuză primirea cererii</button>
</form>
<div class="back">
    <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
</div>
</body>
</html>
