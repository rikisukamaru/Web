<?php
//require_once "TwigBaseController.php";

class StormController extends TwigBaseController {
    public $title = "Storm Spirit";
    public $template = "__object.twig";
  
    public function getContext():array
    {
        $context = parent::getContext();
        $context ["url_title"] = "storm";
        $context ['image_url'] = "/images/storm1.jpg";
        
    return $context;
}
}