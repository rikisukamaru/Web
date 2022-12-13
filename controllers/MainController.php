<?php

require_once "../controllers/BaseHeroController.php";

class MainController extends BaseHeroController {
    public $template = "main.twig";
    public $title = "Главная";
    public function getContext(): array
    {
        $context = parent::getContext();
        if (isset($_GET['attributes']))
        {
            $query = $this->pdo->prepare("SELECT * FROM dota_hero WHERE atr_id = :attributes");
            $query->bindValue("attributes", $_GET['attributes']);
            $query->execute();
        }
        else
        {
            $query = $this->pdo->query("SELECT * FROM dota_hero");
        }
        
        $context['dota_hero'] = $query->fetchAll();
        return $context;
    }
}
