<?php

require_once __DIR__ . '/../config/helper.php';

$user = currentUser();

$den_comp = $_POST["den_comp"] ?? null;
$localitatea = $_POST["localitatea"] ?? null;
$strada = $_POST["strada"] ?? null;
$IDNO = $_POST["IDNO"] ?? null;
$codul_fisc = $_POST["codul_fisc"] ?? null;
$IBAN = $_POST["IBAN"] ?? null;
$codul_post= $_POST["codul_post"] ?? null;
$telefon = $_POST["telefon"] ?? null;
$email_comp = $_POST["email_comp"] ?? null;
$user = currentUser();

var_dump($telefon);

if (empty($den_comp)){
    addValidationError('den_comp', 'Denumirea nu a fost introdusă');
}

if (empty($localitatea)){
    addValidationError('localitatea', 'Localitatea nu a fost introdusă');
}

if (empty($strada)){
    addValidationError('strada', 'Strada nu a fost introdusă');
}

if (empty($IDNO)){
    addValidationError('IDNO', 'IDNO nu a fost introdus');
} elseif (!preg_match('/^\d{13}$/',$IDNO)){
    addValidationError('IDNO', 'IDNO invalid');
}

if (empty($codul_fisc)){
    addValidationError('codul_fisc', 'Codul fiscal nu a fost introdus');
} elseif (!preg_match('/^\d{13}$/',$codul_fisc)){
    addValidationError('codul_fisc', 'Cod fiscal invalid');
}

if (empty($IBAN)){
    addValidationError('IBAN', 'IBAN nu a fost introdus');
} elseif (!preg_match('/^[A-Z0-9]{24}$/',$IBAN)){
    addValidationError('IBAN', 'IBAN invalid');
}

if (empty($codul_post)){
    addValidationError('codul_post', 'Codul poștal nu a fost introdus');
} elseif (!preg_match('/^[A-Z]{2}-\d{4}$/',$codul_post)){
    addValidationError('codul_post', 'Cod poștal invalid');
}

if (!filter_var($email_comp, FILTER_VALIDATE_EMAIL)){
    addValidationError('email_comp', 'E-mail invalid');
}

if (!preg_match('/^0\d{8}$/',$telefon)){
    addValidationError('telefon', 'Număr de telefon greșit');
}


if ($_SESSION['validation'] != null) {
    addOldValue('den_comp', $den_comp);
    addOldValue('localitatea', $localitatea);
    addOldValue('strada', $strada);
    addOldValue('IDNO', $IDNO);
    addOldValue('codul_fisc', $codul_fisc);
    addOldValue('IBAN', $IBAN);
    addOldValue('codul_post', $codul_post);
    addOldValue('telefon', $telefon);
    addOldValue('email_comp', $email_comp);
    redirect("../login/update_pers_jur.php");
}else {

    $pdo = getPDO();

    $query = "UPDATE reclamant SET den_comp = :den_comp, localitatea = :localitatea, strada = :strada, IDNO = :IDNO, codul_fisc = :codul_fisc, IBAN = :IBAN, codul_post = :codul_post, telefon = :telefon, email_comp = :email_comp WHERE id_pers = :id";
    $params = [

        'den_comp' => $den_comp,
        'localitatea' => $localitatea,
        'strada' => $strada,
        'IDNO' => $IDNO,
        'codul_fisc' => $codul_fisc,
        'IBAN' => $IBAN,
        'codul_post' => $codul_post,
        'telefon' => $telefon,
        'email_comp' => $email_comp,
        'id' => $user['id_pers']

    ];

    $stmt = $pdo->prepare($query);
    try {
        $stmt->execute($params);
    } catch (\Exception $e) {
        die($e->getMessage());
    }
    redirect('../login/home.php');
}

