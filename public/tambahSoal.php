<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Auth.php';
require_once '../classes/MSurvey.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $database = new Database();
    $db = $database->getConnection();

    $mSurvey = new MSurvey($db);
    $mSurvey->no_urut = $_POST['no_urut'];
    $mSurvey->soal_jenis = $_POST['soal_jenis'];
    $mSurvey->kategori_id = $_POST['kategori_id'];
    $mSurvey->soal_nama = $_POST['soal_nama'];

    $mSurvey->storeSoal();

    header("Location: editsurvey.php");
}