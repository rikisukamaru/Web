<?php
require_once "BaseHeroController.php";

class HeroUpdateController extends BaseHeroController {
    public $template = "hero_create.twig";
    public function get(array $context)
    {
        $id = $this->params['id']; // взяли id

        $sql =<<<EOL
SELECT * FROM dota_hero WHERE id = :id
EOL; 
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();

        $data = $query->fetchAll();
        $context['dota_hero'] = $data;
        
        parent::get($context);       
    }
    public function post(array $context) {
            $id = $_GET['id'];
            $hero_name = $_POST['hero_name'];
            $description = $_POST['description'];
            $attributes = $_POST['attributes'];
            $characters = $_POST['characters'];
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
        
            // создаем текст запрос
            $sql = <<<EOL
UPDATE dota_hero
SET hero_name = :hero_name, description = :description, atr_id = :attributes, characters = :characters
WHERE id = :id;
EOL;

            $query = $this->pdo->prepare($sql);
            $query->bindValue("hero_name", $hero_name);
            $query->bindValue("description", $description);
            $query->bindValue("attributes", $attributes);
            $query->bindValue("characters", $characters);
            $query->bindValue("id", $id);
            // выполняем запрос
            $query->execute();
            
           
        
            $context['message'] = 'Вы успешно создали объект';

            $this->get($context); 
    }
}
