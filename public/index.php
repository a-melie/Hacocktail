<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 14:01
 */

session_start();

$allowedUrl = ['/', '/home/login'];
if (empty($_SESSION['login']) && !in_array($_SERVER['REQUEST_URI'], $allowedUrl)) {
    header('Location: /');
    exit;
}

if (stristr($_SERVER['REQUEST_URI'], '/home/login') && isset($_SESSION['login'])) {
    header('Location: /');
    exit;
}

require_once __DIR__ . '/../vendor/autoload.php';

if (getenv('ENV') === false) {
    require_once __DIR__ . '/../config/debug.php';
    require_once __DIR__ . '/../config/db.php';
    require_once __DIR__ . '/../config/api.php';
}
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/routing.php';
