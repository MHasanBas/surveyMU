<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Auth.php';
require_once '../classes/User.php';
require_once '../classes/Jawaban.php';

if (!Auth::isLoggedIn()) {
    http_response_code(401);
    echo json_encode(['message' => 'Unauthorized']);
    exit();
}

header('Content-Type: application/json');

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_GET['kategori_id'] === "") {
        $jawaban = new Jawaban($db);
        $alljawaban = $jawaban->getAllJawaban();
        $alljawaban = $alljawaban->fetchAll(PDO::FETCH_ASSOC);
        $jawaban = [];

        echo json_encode($alljawaban);
    }else {
        $jawaban = new Jawaban($db);
        $jawaban->kategori_id = $_GET['kategori_id'];
        $jawaban = $jawaban->getJawabanByKategori();
        $jawaban = $jawaban->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($jawaban);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method Not Allowed']);
}

