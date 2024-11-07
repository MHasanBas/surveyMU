<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Auth.php';
require_once '../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->user_id = $_POST['user_id'];
    $user->role = $_POST['role'];
    $user->nama = $_POST['nama'];
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    
    $user->updateUser();

    header("Location: edituser.php");
}