
<?php
require_once __DIR__ . '/../config/helper.php';

checkAuth();

$user = currentUser();
$data = currentData();
$pers_jur = currentPers_jur();
$file = pathinfo(__FILE__, PATHINFO_FILENAME);
$stmt = $connect->prepare("SELECT Content FROM Content WHERE numeFisier = :numeFisier");
$stmt->bindParam(':numeFisier', $file, SQLITE3_TEXT);
$result = $stmt->execute();
$editorContent = $result->fetchArray(SQLITE3_ASSOC);
?>
<!doctype html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>JusticeMD</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.tiny.cloud/1/48pg52737x04x4vx1cybbvf1jh0lpjh4l75nqlt8cuqj70v3/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
            tinymce.init({
            selector: '#editor',
            plugins: 'image',
            content_css: '../style/custom-style.css',
            setup: function(editor) {
                editor.on('change', function(e) {
                    $.ajax({
                        type: 'POST',
                        url: 'config/save.php',
                        data: {
                        editor: tinymce.get('editor').getContent()
                        },
                        success: function(data) {
                        $('#editor').val('');
                        console.log(data);
                    }
                    });
                });
            }
        });
    </script>
    <script>
            function redirect() {
                var selectBox = document.getElementById("pagina");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                if (selectedValue) {
                    window.location.href = selectedValue;
                }
            }
    </script>
</head>
<body class="body1">

<header>
    <nav>
        <ul>
            <li><a href="../login/home.php"><img class="img2" src="../img/logo.png" alt="Logo"></a></li>
            <li><a href="../login/home.php" class="logo">JusticeMD</a></li>
            <li><a href="../login/home.php">Profil</a></li>
            <li><a href="../login/cerere.php">Cerere</a></li>
            <li><a href="../login/file_upload.php">Trimite cererea</a></li>
            <li><a href="../sablon/form.php">Forma</a></li>
        </ul>
    </nav>
</header>

    <label for="pagina" class="textSt2">Schimbarea șablonului</label><br>
    <select id="pagina" onchange="redirect()" class="select">
    <option value="">Alege o pagină</option>
        <?php
        $directory = 'C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\sablon';
        $files = scandir($directory);
        foreach ($files as $file) {
            if (!in_array($file, array(".", ".."))) {
                echo '<option value="' . $file . '">' . $file . '</option>';
            }
        }
        ?>
</select>

    <form method="post" action="../config/save.php" class="form">
        <div id="editor">
            <?php echo implode($editorContent); ?>
        </div>
        <label class="font14" for="numeFisier">Denumirea fișierului</label>
        <input
                type="text"
                id="numeFisier"
                name="numeFisier"
                value= "<?php echo old('numeFisier')?>"
            <?php hasError('numeFisier') ?>
        >
        <?php if(hasValidationError('numeFisier')): ?>

            <small><?php getError('numeFisier');?></small>

        <?php endif; ?>
        <input type="submit" id="btnTrimite" value="Trimite">
    </form>

    <div class="\back">
        <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
    </div>

</body>
</html>
