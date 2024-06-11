<?php

require_once __DIR__ . '/../config/helper.php';
require_once '../config/connect.php';

checkAuth();

$user = currentUser();
$userEmail = $user['email'];
$pers_jur = currentPers_jur();

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
    <div class="card home form_width">
        <img
            class="avatar"
            src="../<?php echo $user['avatar'] ?>"
            alt="<?php echo $user['prenumele']?>"
        >
        <h1><?php echo $user['numele']?> <?php echo $user['prenumele']?></h1>
        <div class="textSt"><?php echo $user['email']?></div>
        <div class="textSt"><?php echo $user['tel_mob']?></div>

        <a href="../login/update_date_pers.php"><button>Modifică datele personale</button></a>

        <form action="../login/pers_jur.php" class="
            <?php
                if($pers_jur != null){
                    echo'hidden';
                }
            ?>
         ">
            <button role="button">Înregistrarea persoanei juridice</button>
        </form>

        <h1 class="
            <?php
        if($pers_jur == null){
            echo'hidden';
        }
        ?>
        ">Datele persoanei juridice</h1>
        <div class="textSt2">
            <?php
            if($pers_jur != null){
                    echo $pers_jur['den_comp']. "<br>";
                    echo $pers_jur['localitatea']. "<br>";
                    echo $pers_jur['strada']. "<br>";
                    echo $pers_jur['IDNO']. "<br>";
                    echo $pers_jur['codul_fisc']. "<br>";
                    echo $pers_jur['IBAN']. "<br>";
                    echo $pers_jur['codul_post']. "<br>";
                    echo $pers_jur['telefon']. "<br>";
                    echo $pers_jur['email_comp']. "<br>";
            }
            ?>
        </div>

        <a href="../login/update_pers_jur.php" class="<?php if($pers_jur == null){ echo'hidden';} ?>"><button>Modifică datele persoanei juridice</button></a>

        <h1>Mesaje</h1>

        <form method="post" action="../vendor/delete.php" class="textSt2">
            <?php

            $directory = '../message/';

            $user_file = "user_" . $user['id_pers'] . ".txt";

            if (file_exists($directory . $user_file)) {
                $file_content = file_get_contents($directory . $user_file);
                echo "$file_content";
            } else {
                echo "Mesaje pentru dumneavoastră nu sunt.";
            }

            ?>
            <br>
            <br>

            <input
                    type="submit"
                    name="delete_message"
                    value="Am citit mesajul"
                    class="
            <?php
            if (!file_exists($directory . $user_file)) {
                echo'hidden';
            }
            ?>
            ">

        </form>

        <form action="inst.php" method="post" class="
            <?php
        if ($user['valid'] == null) {
            echo'hidden';
        }
        ?>
            cont_width">
            <button role="button">Cererile trimise</button>
        </form>

        <form action="cerere.php" method="post" class="cont_width">
            <button role="button">Crearea cererii</button>
        </form>

        <form action="../vendor/logout.php" method="post" class="cont_width">
            <button role="button">Ieșire din cont</button>
        </form>
    </div>

    <div class="back">
        <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
    </div>
</body>
</html>
