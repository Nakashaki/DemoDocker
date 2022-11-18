<?php
//use App\Factory\PDOFactory;
//use App\Manager\UserManager;
session_start();
$pdo = new PDO("mysql:host=database;dbname=blog", "root", "password");

require_once 'vendor/autoload.php';






$url = "/" . trim(explode("?", $_SERVER['REQUEST_URI'])[0], "/");

switch ($url) {
    case "/":
        $controller = new \App\controller\PostController();
        $controller->home();
        break;


    default:
        throw new Exception("RIEN TROUVE !");
}
