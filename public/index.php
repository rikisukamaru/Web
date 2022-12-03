<?php
require_once "../vendor/autoload.php";
require_once "../framework/autoload.php";
require_once "../framework/ObjectController.php";
require_once "../controllers/MainController.php";
require_once "../controllers/RikiController.php";

require_once "../controllers/RikiImageController.php";
require_once "../controllers/RikiDiscriptionController.php";
require_once "../controllers/StormController.php";
require_once "../controllers/StormImageController.php";
require_once "../controllers/StormDiscriptionController.php";
require_once "../controllers/Controller404.php";

$pdo = new PDO("mysql:host=localhost;dbname=dota_2;charset=utf8", "root", "");
$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader, [
   "debug" => true // добавляем тут debug режим
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());



$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/riki", RikiController::class);

$router->add("/hero/(?P<id>\d+)", ObjectController::class); 


$router->get_or_default(Controller404::class);




