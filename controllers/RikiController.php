<?php
//require_once "TwigBaseController.php";

class RikiController extends TwigBaseController {
    public $title = "Rikimaru";
    public $template = "__object.twig";
  
    public function getContext():array
    {
        $context = parent::getContext();
        $context ["url_title"] = "riki";
        $context ['image_url'] = "/images/riki1.jpg";
        
    return $context;
}
}