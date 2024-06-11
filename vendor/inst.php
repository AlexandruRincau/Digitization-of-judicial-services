<?php
if(isset($_GET['director'])) {
    $director_selectat = $_GET['director'];
    $cale_director = '../file/file_upload/' . $director_selectat;

    if(is_dir($cale_director)) {
        $fisiere_director = scandir($cale_director);
        foreach($fisiere_director as $fisier) {
            if (!in_array($fisier, array(".", ".."))) {
                echo '<a href="' . $cale_director . '/' . $fisier . '" download>' . $fisier . '</a><br>';
            }
        }
    } else {
        echo "Directorul nu există.";
    }
}





