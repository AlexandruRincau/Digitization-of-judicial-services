<?php

require_once __DIR__ . '/../config/helper.php';
checkAuth();

$user = currentUser();
$directory = '../message/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_message'])) {
        $user_file = "user_" . $user['id_pers'] . ".txt";

        if (file_exists($directory . $user_file)) {
            unlink($directory . $user_file);
            echo "Mesajul a fost șters.";
            redirect('../login/home.php');
        } else {
            echo "Mesajul nu există și nu poate fi șters.";
        }
    }
}