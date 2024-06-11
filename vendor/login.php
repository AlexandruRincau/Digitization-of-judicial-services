<?php

require_once __DIR__ . '/../config/helper.php';

$email = $_POST["email"] ?? null;
$parola = $_POST["parola"] ?? null;

$user = findUser($email);

addOldValue('email', $email);

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){

    addValidationError('email', 'Format incorect pentru e-mail');
    setMessage('error', 'Eroare în validare');
    redirect('../index.php');

} elseif (!$user){

    setMessage('error', "Utilizatorul nu a fost găsit");
    redirect('../index.php');

} elseif (!password_verify($parola, $user['parola'])) {

    setMessage('error', 'Parolă incorectă');
    redirect('../index.php');

} else {

    $_SESSION['user']['id'] = $user["id_pers"];
    redirect('../login/home.php');

}