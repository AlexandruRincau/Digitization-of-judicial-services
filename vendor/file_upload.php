<?php

require_once __DIR__ . '/../config/helper.php';
require_once '../config/connect.php';

$user = currentUser();
$userId = $user['id_pers'];
if (isset($_FILES['files'])) {
    $uploadDir = '../file/file_upload/user_' . $userId . '/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_destination = $uploadDir . $file_name;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            echo "Fișierul '$file_name' a fost încărcat cu succes.";
            redirect('../login/taxa.php');
        } else {
            echo "Eroare la încărcarea fișierului '$file_name'.";
        }
    }
} else {
    echo "Nu s-au găsit fișiere de încărcat.";
}

