<?php
require_once "RikiController.php";

class RikiImageController extends RikiController
{
    public $template = "base_image.twig";
    public function getContext():array{
        $context = parent::getContext();

        $context['is_image'] = true;
        $context['image'] = "/images/riki1.jpg";
        return $context;
    }



}

