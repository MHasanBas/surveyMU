<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Auth.php';
require_once '../classes/Soal.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $database = new Database();
    $db = $database->getConnection();

    $soal = new Soal($db);
    $soal->soal_id = $_POST['soal_id'];
    $soal->soal_nama = $_POST['soal_nama'];
    $soal->soal_jenis = $_POST['soal_jenis'];
    $soal->no_urut = $_POST['no_urut'];
    $soal->updatekategori_id = $_POST['updatekategori_id'];
    
    $kategori_id = $_POST['kategori_id'];
    print_r($_POST);
    $soal->updateSoal();

    header("Location: editsoal.php?id=" . $kategori_id);
}