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
    $mSurvey->user_id = $_SESSION['user_id'];
    $mSurvey->survey_jenis = $_POST['survey_jenis'];
    
    $mSurvey->storeMSurvey();

    if ($_POST['survey_jenis'] == 'Mahasiswa') {
        header("Location: informasidiri_mahasiswa.php");
    }else if ($_POST['survey_jenis'] == 'Alumni') {
        header("Location: informasidiri_alumni.php");
    }else if ($_POST['survey_jenis'] == 'Ortu') {
        header("Location: informasidiri_ortu.php");
    }else if ($_POST['survey_jenis'] == 'Dosen') {
        header("Location: informasidiri_dosen.php");
    }else if ($_POST['survey_jenis'] == 'Tendik') {
        header("Location: informasidiri_tendik.php");
    }else if ($_POST['survey_jenis'] == 'Industri') {
        header("Location: informasidiri_industri.php");
    }

}