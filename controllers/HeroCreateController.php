<?php
require_once "BaseHeroController.php";

class HeroCreateController extends BaseHeroController {
    public $template = "hero_create.twig";

    public function post(array $context) { // добавили параметр
        
            // получаем значения полей с формы
            $hero_name = $_POST['hero_name'];
            $description = $_POST['description'];
            $attributes = $_POST['attributes'];
            $characters = $_POST['characters'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $name =  $_FILES['image']['name'];
            move_uploaded_file($tmp_name, "../public/media/$name");
            $image_url = "/media/$name";
        
        
            // создаем текст запрос
            $sql = <<<EOL
INSERT INTO dota_hero(hero_name, description, atr_id, characters, image_hero,talants)
VALUES(:hero_name, :description, :attributes, :characters, :image_url,'')
EOL;
    
            // подготавливаем запрос к БД
            $query = $this->pdo->prepare($sql);
            // привязываем параметры
            $query->bindValue("hero_name", $hero_name);
            $query->bindValue("description", $description);
            $query->bindValue("attributes", $attributes);
             $query->bindValue("image_url", $image_url);
            $query->bindValue("characters", $characters);
            
            // выполняем запрос
            $query->execute();
            
            $context['message'] = 'Вы успешно создали объект';
            $context['id'] = $this->pdo->lastInsertId(); // получаем id нового добавленного объекта
    
            $this->get($context);
        

        $context['message'] = 'Вы успешно создали объект'; // добавили сообщение

    }
}
