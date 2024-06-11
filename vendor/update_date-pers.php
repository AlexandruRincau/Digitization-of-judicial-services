<?php


require_once __DIR__ . '/../config/helper.php';

$avatarPath = null;
$numele = $_POST["numele"] ?? null;
$prenumele = $_POST["prenumele"] ?? null;
$email = $_POST["email"] ?? null;
$tel_mob = $_POST["tel_mob"] ?? null;
$parola = $_POST["parola"] ?? null;
$parola_confirm = $_POST["parola_confirm"] ?? null;
$avatar = $_FILES["avatar"] ?? null;
$user = currentUser();

if (empty($numele)) {
    addValidationError('numele', 'Nume incorect');
}

if (empty($prenumele)) {
    addValidationError('prenumele', 'Prenume incorect');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    addValidationError('email', 'E-mail incorect');
}

if (!preg_match('/^0\d{8}$/', $tel_mob)) {
    addValidationError('tel_mob', 'Număr de telefon incorect');
}

if (empty($parola)) {
    addValidationError('parola', 'Nu a fost introdusă parola');
}

if ($parola != $parola_confirm) {
    addValidationError('parola', 'Parolele nu coincid');
}

if ($avatar['name'] != null) {
    $types = ['image/jpeg', 'image/jpg', 'image/png'];

    if (!in_array($avatar['type'], $types)) {
        addValidationError('avatar', 'Imaginea are extensie inadmisibilă');
    }

    if (($avatar['size'] / 1000000) >= 1) {
        addValidationError('avatar', 'Imaginea nu trebuie să conțină mai mult de 1 mb');
    }
}

if ($avatar['name'] == null) {
    addValidationError('avatar', ' Imaginea nu a fost setată');
}

if ($_SESSION['validation'] != null) {
    addOldValue('numele', $numele);
    addOldValue('prenumele', $prenumele);
    addOldValue('email', $email);
    addOldValue('tel_mob', $tel_mob);
    redirect("../login/update_date_pers.php");
} else {

    $avatarPath = uploadFile($avatar, 'avatar');

    $pdo = getPDO();

    $query = "UPDATE `date_pers` SET numele = :numele, prenumele = :prenumele, tel_mob = :tel_mob, email = :email, avatar = :avatar, parola = :parola WHERE `date_pers`.`id_pers` = :id";
    $params = [
        'id' => $user['id_pers'],
        'numele' => $numele,
        'prenumele' => $prenumele,
        'tel_mob' => $tel_mob,
        'email' => $email,
        'avatar' => $avatarPath,
        'parola' => password_hash($parola, PASSWORD_DEFAULT)
    ];

    $stmt = $pdo->prepare($query);
    try {
        $stmt->execute($params);
    } catch (\Exception $e) {
        die($e->getMessage());
    }
    redirect('../index.php');
}

