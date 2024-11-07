<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Auth.php';
require_once '../classes/Kategori.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $database = new Database();
    $db = $database->getConnection();

    $kategori = new Kategori($db);
    $kategori->kategori_id = $_POST['kategori_id'];
    $kategori->kategori_nama = $_POST['kategori_nama'];
    
    $kategori->updateKategori();

    header("Location: editsurvey.php");

}