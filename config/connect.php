<?php
require_once __DIR__ . '/helper.php';
global $connect;
$connect=new SQLite3('C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\database\tinymceContent.db');
$db="CREATE TABLE IF NOT EXISTS `Content`(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, Content TEXT, numeFisier TEXT)";

$connect->exec($db);

const DB_HOST = 'localhost';

const DB_PORT = '3306';
const DB_NAME = 'teza';
const DB_USER = 'root';
const DB_PASS = '';


