<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
$session_user = $_SESSION["user_id"];
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/MSurvey.php';
require_once '../classes/Jawaban.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $length_soal_pilihan = $_POST["length_soal_pilihan"];
    $length_soal_text = $_POST["length_soal_text"];

    $database = new Database();
    $db = $database->getConnection();

    $mSurvey = new MSurvey($db);
    $mSurvey->user_id = $session_user;
    
    $survey_id = $mSurvey->getMSurvey();
    $survey_id = $survey_id->fetchAll();
    $mSurvey->survey_id = $survey_id[0]["survey_id"];
    $mSurvey->survey_jenis = $survey_id[0]["survey_jenis"];

    $responden_id = $mSurvey->getTResponden();

    $jawaban = new Jawaban($db);
    $jawaban->responden_id = $responden_id;
    $jawaban->survey_id = $survey_id[0]["survey_id"];
    
    $jawaban->responden = $survey_id[0]["survey_jenis"];

    if ($length_soal_pilihan > 0) {
        for ($i = 0; $i < $length_soal_pilihan; $i++) {
            $jawaban->soal_id = $_POST["qid" . $i];
            $jawaban->jawaban = $_POST["q" . $i];
            $jawaban->storeJawaban();
        }
    }

    if ($length_soal_text > 0) {
        for ($i = 0; $i < $length_soal_text; $i++) {
            $jawaban->soal_id = $_POST["isianid" . $i];
            $jawaban->jawaban = $_POST["isian" . $i];
            $jawaban->storeJawaban();
        }
    }
    
    header("Location: berhasilkirim.php");
} else {
    echo "Form not submitted.";
}
