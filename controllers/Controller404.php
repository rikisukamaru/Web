<?php
//require_once "TwigBaseController.php";
require_once "../controllers/BaseHeroController.php";
class Controller404 extends BaseHeroController {
    public $template = "404.twig"; 
    public $title = "Страница не найдена";
    public function get(array $context)
{
    http_response_code(404);
    parent::get($context);
}
}
