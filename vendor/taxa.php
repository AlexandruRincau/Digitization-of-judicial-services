<?php

require_once __DIR__ . '/../config/helper.php';

$name_card = $_POST["name_card"] ?? null;
$card_number = $_POST["prenumele"] ?? null;
$expiry_date = $_POST["expiry_date"] ?? null;
$cvv = $_POST["cvv"] ?? null;

if (empty($name_card)){
    addValidationError('name_card', 'Numele nu a fost introdus');
}

if (!preg_match('/^\d{3}$/',$cvv)){
    addValidationError('cvv', 'CVV greșit');
}

if ($_SESSION['validation'] != null){
    addOldValue('name_card', $name_card);
    addOldValue('card_number', $card_number);
    addOldValue('expiry_date', $expiry_date);
    addOldValue('cvv', $cvv);
    redirect("../login/taxa.php");
} else {

    redirect('../login/file_upload.php');
}

