<?php
require_once "BaseHeroController.php";

class SearchController extends BaseHeroController{
    public $template = "Search.twig";

    public function getContext(): array{
        $context = parent::getContext();
        $attributes = isset($_GET['attributes']) ? $_GET['attributes'] : '';
        $hero_name = isset($_GET['hero_name']) ? $_GET['hero_name'] : '';
        $sql = <<<EOL
SELECT id,hero_name
FROM dota_hero
WHERE (:hero_name = '' OR hero_name like CONCAT('%', :hero_name,'%'))
        AND (atr_id = :attributes)
EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue("hero_name",$hero_name);
        $query->bindValue("attributes",$attributes);
        $query->execute();

        $context['objects'] = $query->fetchAll();
        
        return $context;
    }

}