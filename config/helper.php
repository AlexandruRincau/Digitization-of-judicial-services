<?php
session_start();

require_once 'connect.php';
function redirect(string $path):void
{
    header("Location: $path");

}

function hasError(string $fieldName):void
{
    echo isset($_SESSION['validation']['numele'])? 'aria-invalid="true"' : '';
}

function getError(string $fieldName):void
{
    $message = $_SESSION['validation'][$fieldName] ?? '';
    unset($_SESSION['validation'][$fieldName]);
    echo $message ;
}


function hasValidationError(string $fieldName): bool
{
    return isset($_SESSION['validation'][$fieldName]);
}

function addValidationError(string $fieldName, string $message):void
{
    $_SESSION['validation'][$fieldName] = $message;
}

function addOldValue(string $key, mixed $value): void
{
    $_SESSION['old'][$key] = $value;
}

function old(string $key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]);
    return $value;
}

function uploadFile(array $file, string $prefix = '')
{

    $uploadPath = __DIR__ .'/../img';

    if (!is_dir($uploadPath)){
        mkdir($uploadPath, 0777, true);
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = "$prefix". '_' . time() . ".$ext";

    if (!move_uploaded_file($file['tmp_name'], "$uploadPath/$fileName")){
        die('Eroare la încărcarea imaginii');
    }

    return "img/$fileName";
}

function setMessage(string $key, string $message):void
{
    $_SESSION['message'][$key] = $message;
}

function getMessage(string $key):string
{
    $message = $_SESSION['message'][$key] ?? '';
    unset($_SESSION['message'][$key]);
    return $message;
}

function hasMessage(string $key):bool
{
    return isset($_SESSION['message'][$key]);
}

function getPDO(): PDO
{
    try {
        return new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        die("Connection error: {$e->getMessage()}");
    }
}

function findUser(string $email): array|bool
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM date_pers WHERE `email` = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function currentUser(): array|false
{
    $pdo = getPDO();

    if (!isset($_SESSION['user'])) {
        return false;
    }

    $userId = $_SESSION['user']['id'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM date_pers WHERE id_pers = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function currentData(): array|false
{
    $user = currentUser();
    $pdo = getPDO();

    $id_pers = $user['id_pers'] ?? null;

    $stmt = $pdo->prepare("SELECT `parat`.`numele2`,
                                        `parat`.`prenumele2`,
                                        `parat`.`patronimic`,
                                        `parat`.`IDNP`,
                                        `parat`.`localitatea2`,
                                        `parat`.`codul_fisc2`,
                                        `parat`.`den_comp2`,
                                        `parat`.`datoria`,
                                        `parat`.`datoria_curat`,
                                        `parat`.`zile_pen`,
                                        `parat`.`penalitate`,
                                        `parat`.`data1`,
                                        `parat`.`data2`
                                FROM `parat`
                                WHERE `id_pers` = :id
                                AND `id_parat` = (
                                    SELECT MAX(`id_parat`)
                                    FROM `parat`
                                    WHERE `id_pers` = :id
                                )
");
    $stmt->execute(['id' => $id_pers]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function currentTinyData(string $numeFisier): array|false
{
    $connect = new SQLite3('C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\database\tinymceContent.db');

    $query = "SELECT * FROM Content WHERE numeFisier = :numeFisier";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':numeFisier', $numeFisier);
    $result = $stmt->execute();

    $rows = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $rows[] = $row;
    }

    $connect->close();

    return $rows ? $rows : false;

}



function currentPers_jur(): array|false
{
    $pdo = getPDO();

    if (!isset($_SESSION['user'])) {
        return false;
    }


    $user = currentUser();
    $userId = $user['id_pers'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM `reclamant` WHERE `reclamant`.`id_pers` = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function logout(): void
{
    session_destroy();
    redirect('../index.php');
}

function checkAuth():void
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('../index.php');
    }
}

function checkGuest():void
{
    if (isset($_SESSION['user']['id'])) {
        redirect('../login/home.php');
    }
}

function taxa($datoria):float
{
    if ($datoria <= 5000){
        $taxa = (5 * $datoria)/100;
        if ($taxa < 250){
            return 250;
        } else {
            return $taxa;
        }
    } elseif ($datoria == 5001){
        return 250;
    } elseif ($datoria > 5001 && $datoria <= 50000){
        $taxa = (4 * $datoria)/100;
        return 250 + $taxa;
    } elseif ($datoria == 50001){
        return 2050;
    }elseif ($datoria > 50001 && $datoria <= 1500000){
        $taxa = (3 * $datoria)/100;
        return 2050 + $taxa;
    } elseif ($datoria == 1500001){
        return 45550;
    }elseif ($datoria > 1500001 && $datoria <= 5000000){
        $taxa = (2 * $datoria)/100;
        return 45550 + $taxa;
    } elseif ($datoria == 5000001){
        return 115550;
    }elseif ($datoria > 5000001 && $datoria <= 10000000){
        $taxa = (1 * $datoria)/100;
        return 115550 + $taxa;
    } elseif ($datoria == 10000001){
        return 165550;
    }else {
        $taxa = (0.5 * $datoria)/100;
        return 165550 + $taxa;
    }

}



