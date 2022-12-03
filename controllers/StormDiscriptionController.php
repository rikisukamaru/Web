<?php
require_once "StormController.php";

class StormDiscriptionController extends StormController {
    public $template = "storm_info.twig";

    public function getContext() : array
    {
        $context = parent::getContext();

        $context['is_info'] = true;
        $context['info'] = '/views/storm_info.twig';
        return $context;
    }
}