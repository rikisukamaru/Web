<?php
require_once "RikiController.php";

class StormImageController extends StormController
{
    public $template = "base_image.twig";
    public function getContext():array{
        $context = parent::getContext();

        $context['is_image'] = true;
        $context['image'] = "/images/storm1.jpg";
        return $context;
    }



}

