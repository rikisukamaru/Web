<?php
require_once "../controllers/BaseHeroController.php";
class ObjectController extends BaseHeroController {
    public $template = "__object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->prepare("SELECT description, id,hero_name,image_hero FROM dota_hero WHERE id= :my_id");
        
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); 
        
        $data = $query->fetch();
      
        $context['description'] = $data['description'];
        $context['hero_name'] = $data['hero_name'];
        $context['id'] = $data['id'];
        $context['image_hero'] = $data['image_hero'];
    
    
    
    return $context;
    }

public function get(array $context)
{
    if(isset($_GET['show']))
    {
        if ($_GET['show'] == 'image')
        {
            $this->template = "base_image.twig";
            $context['is_image'] = true;
        }
        elseif ($_GET['show'] == 'description')
        {
            $this->template = "base_desc.twig";
            $context['is_description'] = true;
        }
    }
    parent::get($context);
}
}