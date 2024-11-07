<?php
class Auth {
    public static function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public static function login($user_id, $role, $name) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role'] = $role;
        $_SESSION['name'] = $name;
    }

    public static function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
        unset($_SESSION['name']);
    }
}
