<?php

require_once __DIR__ . '/../config/helper.php';

$user = currentUser();

$datoria = $_POST['datoria'];
$datoria_curat = $_POST['datoria_curat'];
$zile_pen = $_POST['zile_pen'];
$penalitate = $_POST['penalitate'];
$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$numele2 = $_POST['numele2'];
$prenumele2 = $_POST['prenumele2'];
$patronimic = $_POST['patronimic'];
$IDNP = $_POST['IDNP'];
$den_comp2 = $_POST['den_comp2'];
$localitatea2 = $_POST['localitatea2'];
$codul_fisc2 = $_POST['codul_fisc2'];
$userId = $user['id_pers'];

var_dump($userId);

if (empty($datoria)){
    addValidationError('datoria', 'Suma datoriei nu a fost introdus');
} elseif (!preg_match('/^\d{1,7}(\.\d+)?$/',$datoria)){
    addValidationError('datoria', 'Suma datoriei poate conține doar cifre');
}

if (empty($datoria_curat)){
    addValidationError('datoria_curat', 'Suma datoriei nu a fost introdus');
} elseif (!preg_match('/^\d{1,7}(\.\d+)?$/',$datoria_curat)){
    addValidationError('datoria_curat', 'Suma datoriei poate conține doar cifre');
}

if (empty($zile_pen)){
    addValidationError('zile_pen', 'Zilele penale nu a fost introduse');
} elseif (!preg_match('/^\d{1,4}$/',$zile_pen)){
    addValidationError('zile_pen', 'Zilele penale pot conține doar cifre');
}

if (empty($penalitate)){
    addValidationError('penalitate', 'Penalitățile nu a fost introduse');
} elseif (!preg_match('/^\d{1,7}(\.\d+)?$/',$penalitate)){
    addValidationError('penalitate', 'Penalitățile pot conține doar cifre');
}

if (empty($data1)){
    addValidationError('data1', 'Începutul penalității nu a fost introdus');
}

if (empty($data2)){
    addValidationError('data2', 'Sfârșitul penalității nu a fost introdus');
}

if (empty($numele2)){
    addValidationError('numele2', 'Numele nu a fost introdus');
}
if (empty($prenumele2)){
    addValidationError('prenumele2', 'Prenumele nu a fost introdus');
}
if (empty($patronimic)){
    addValidationError('patronimic', 'Patronimicul nu a fost introdus');
}

if (empty($localitatea2)){
    addValidationError('localitatea2', 'Localitatea nu a fost introdusă');
}

if (empty($codul_fisc2)){
    addValidationError('codul_fisc2', 'Codul fiscal nu a fost introdus');
} elseif (!preg_match('/^\d{13}$/',$codul_fisc2)){
    addValidationError('codul_fisc2', 'Cod fiscal invalid');
}

if (empty($IDNP)){
    addValidationError('IDNP', 'IDNP nu a fost introdus');
} elseif (!preg_match('/^\d{13}$/',$IDNP)){
    addValidationError('IDNP', 'IDNP invalid');
}

if (empty($den_comp2)){
    addValidationError('den_comp2', 'Denumirea companiei nu a fost introdusă');
}

if ($_SESSION['validation'] != null){
    addOldValue('datoria', $datoria);
    addOldValue('datoria_curat', $datoria_curat);
    addOldValue('zile_pen', $zile_pen);
    addOldValue('penalitate', $penalitate);
    addOldValue('data1', $data1);
    addOldValue('data2', $data2);
    addOldValue('numele2', $numele2);
    addOldValue('prenumele2', $prenumele2);
    addOldValue('patronimic', $patronimic);
    addOldValue('IDNP', $IDNP);
    addOldValue('den_comp2', $den_comp2);
    addOldValue('localitatea2', $localitatea2);
    addOldValue('codul_fisc2', $codul_fisc2);
    redirect("../cerere.php");
} else {
    $pdo = getPDO();

    $query = "INSERT INTO `parat` (`numele2`,`prenumele2`,`patronimic`,`IDNP`,`localitatea2`,`codul_fisc2`,`den_comp2`,`datoria`,`datoria_curat`,`zile_pen`,`penalitate`,`data1`,`data2`, `id_pers`) VALUES (:numele2, :prenumele2, :patronimic, :IDNP, :localitatea2, :codul_fisc2, :den_comp2, :datoria, :datoria_curat, :zile_pen, :penalitate, :data1, :data2, :id)";

    $params = [

        'numele2' => $numele2,
        'prenumele2' => $prenumele2,
        'patronimic' => $patronimic,
        'IDNP' => $IDNP,
        'localitatea2' => $localitatea2,
        'codul_fisc2' => $codul_fisc2,
        'den_comp2' => $den_comp2,
        'datoria' => $datoria,
        'datoria_curat' => $datoria_curat,
        'zile_pen' => $zile_pen,
        'penalitate' => $penalitate,
        'data1' => $data1,
        'data2' => $data2,
        'id' => $userId

    ];

    $stmt = $pdo->prepare($query);
    try {
        $stmt->execute($params);
    } catch (\Exception $e) {
        die($e->getMessage());
    }
    redirect('../sablon/form.php');
}