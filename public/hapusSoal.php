<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Auth.php';
require_once '../classes/Soal.php';

$database = new Database();
$db = $database->getConnection();

$soal = new Soal($db);
$soal->soal_id = $_GET['id'];
$kategori_id = $_GET['kategori_id'];

$soal->deleteSoal();

header("Location: editsoal.php?id=" . $kategori_id);
