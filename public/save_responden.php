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
    $mSurvey->survey_jenis = $_POST['survey_jenis'];
    $mSurvey->survey_id = $_POST['survey_id'];

    if ($_POST['survey_jenis'] == 'Mahasiswa') {
        $mSurvey->nim = $_POST['nim'];
        $mSurvey->nama = $_POST['nama'];
        $mSurvey->prodi = $_POST['prodi'];
        $mSurvey->email = $_POST['email'];
        $mSurvey->no_hp = $_POST['no_hp'];
        $mSurvey->tahun_masuk = $_POST['tahun_masuk'];
        $mSurvey->user_id = $_SESSION['user_id'];
    } else if ($_POST['survey_jenis'] == 'Alumni') {
        $mSurvey->responden_nim = $_POST['responden_nim'];
        $mSurvey->responden_tanggal = $_POST['responden_tanggal'];
        $mSurvey->responden_nama = $_POST['responden_nama'];
        $mSurvey->responden_prodi = $_POST['responden_prodi'];
        $mSurvey->responden_email = $_POST['responden_email'];
        $mSurvey->responden_hp = $_POST['responden_hp'];
        $mSurvey->tahun_lulus = $_POST['tahun_lulus'];
    } else if ($_POST['survey_jenis'] == 'Ortu') {
        $mSurvey->responden_tanggal = $_POST['responden_tanggal'];
        $mSurvey->responden_nama = $_POST['responden_nama'];
        $mSurvey->responden_jk = $_POST['responden_jk'];
        $mSurvey->responden_umur = $_POST['responden_umur'];
        $mSurvey->responden_hp = $_POST['responden_hp'];
        $mSurvey->responden_pendidikan = $_POST['responden_pendidikan'];
        $mSurvey->responden_pekerjaan = $_POST['responden_pekerjaan'];
        $mSurvey->responden_penghasilan = $_POST['responden_penghasilan'];
        $mSurvey->mahasiswa_nim = $_POST['mahasiswa_nim'];
        $mSurvey->mahasiswa_nama = $_POST['mahasiswa_nama'];
        $mSurvey->mahasiswa_prodi = $_POST['mahasiswa_prodi'];
    } else if ($_POST['survey_jenis'] == 'Dosen') {
        $mSurvey->responden_tanggal = $_POST['responden_tanggal'];
        $mSurvey->responden_nip = $_POST['responden_nip'];
        $mSurvey->responden_nama = $_POST['responden_nama'];
        $mSurvey->responden_unit = $_POST['responden_unit'];
    } else if ($_POST['survey_jenis'] == 'Tendik') {
        $mSurvey->responden_tanggal = $_POST['responden_tanggal'];
        $mSurvey->responden_nopeg = $_POST['responden_nopeg'];
        $mSurvey->responden_nama = $_POST['responden_nama'];
        $mSurvey->responden_unit = $_POST['responden_unit'];
    } else if ($_POST['survey_jenis'] == 'Industri') {
        $mSurvey->responden_tanggal = $_POST['responden_tanggal'];
        $mSurvey->responden_nama = $_POST['responden_nama'];
        $mSurvey->responden_jabatan = $_POST['responden_jabatan'];
        $mSurvey->responden_perusahaan = $_POST['responden_perusahaan'];
        $mSurvey->responden_email = $_POST['responden_email'];
        $mSurvey->responden_hp = $_POST['responden_hp'];
        $mSurvey->responden_kota = $_POST['responden_kota'];
    }

    $mSurvey->storeResponden();
    
    if ($_POST['survey_jenis'] == 'Mahasiswa') {
        header("Location: informasidiri_mahasiswa.php");
    } else if ($_POST['survey_jenis'] == 'Alumni') {
        header("Location: informasidiri_alumni.php");
    } else if ($_POST['survey_jenis'] == 'Ortu') {
        header("Location: informasidiri_ortu.php");
    } else if ($_POST['survey_jenis'] == 'Dosen') {
        header("Location: informasidiri_dosen.php");
    } else if ($_POST['survey_jenis'] == 'Tendik') {
        header("Location: informasidiri_tendik.php");
    } else if ($_POST['survey_jenis'] == 'Industri') {
        header("Location: informasidiri_industri.php");
    }
}