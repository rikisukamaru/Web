<?php
require_once "RikiController.php";

class RikiDiscriptionController extends RikiController {
    public $template = "riki_info.twig";

    public function getContext() : array
    {
        $context = parent::getContext();

        $context['is_info'] = true;
        $context['info'] = '/views/riki_info.twig';
        return $context;
    }
}