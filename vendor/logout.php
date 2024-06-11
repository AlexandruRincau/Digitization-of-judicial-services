<?php

require_once __DIR__ . '/../config/helper.php';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    logout();
}

redirect('../login/home.php');
