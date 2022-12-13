<?php

class HeroDeleteController extends BaseController {
    public function post(array $context)
    {
        $id = $_POST['id'];

        $sql =<<<EOL
DELETE FROM dota_hero WHERE id = :id
EOL; 
        
        // выполнили
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();
        header("Location: /");
        exit;
    }
}