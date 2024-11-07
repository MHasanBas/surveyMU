<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../classes/Auth.php';

Auth::logout();
header("Location: login.php");
exit();
