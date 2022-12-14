<?php
session_set_cookie_params(60*60*10);
session_start();

require_once "../vendor/autoload.php";
require_once "../framework/autoload.php";
require_once "../middlewares/LoginRequiredMiddeware.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/MainController.php";
require_once "../public/RestController.php";
require_once "../controllers/SearchController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/HeroCreateController.php";
require_once "../controllers/HeroDeleteController.php";
require_once "../controllers/HeroUpdateController.php";
require_once "../controllers/SetWelcomeController.php";
//$controller = new HeroRestController();
//$controller->process();
$pdo = new PDO("mysql:host=localhost;dbname=dota_2;charset=utf8", "root", "");
$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader, [
   "debug" => true 
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
$pdo = new PDO("mysql:host=localhost;dbname=dota_2;charset=utf8", "root", "");


$router = new Router($twig, $pdo);

$router->add("/hero/delete", HeroDeleteController::class)
->middleware(new LoginRequiredMiddeware());
$router->add("/set-welcome/", SetWelcomeController::class);
$router->add("/hero/(?P<id>\d+)/edit", HeroUpdateController::class)
->middleware(new LoginRequiredMiddeware());
$router->add("/search", SearchController::class)
->middleware(new LoginRequiredMiddeware());
$router->add("/create", HeroCreateController::class)
->middleware(new LoginRequiredMiddeware());
$router->add("/", MainController::class)
->middleware(new LoginRequiredMiddeware());
$router->add("/hero/(?P<id>\d+)", ObjectController::class)
->middleware(new LoginRequiredMiddeware()); 

$router->get_or_default(Controller404::class);




