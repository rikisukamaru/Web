<?php

//require_once "TwigBaseController.php";

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";
    public function getContext(): array
    {
        $context = parent::getContext();
        
        // подготавливаем запрос SELECT * FROM space_objects
        // вообще звездочку не рекомендуется использовать, но на первый раз пойдет
        $query = $this->pdo->query("SELECT * FROM dota_hero");
        
        // стягиваем данные через fetchAll() и сохраняем результат в контекст
        $context['dota_hero'] = $query->fetchAll();

        return $context;
    }
}
