<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Auth.php';
require_once '../classes/User.php';


$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$user->user_id = $_GET['user_id'];

$user->deleteUser();

header("Location: edituser.php");
