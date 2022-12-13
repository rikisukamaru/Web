<?php

require_once "BaseController.php";

class TwigBaseController extends BaseController{
    public $title = "";
    public $template = "";
    protected $twig;
    public function setTwig($twig) {
        $this->twig = $twig;
    }
    public function getContext() : array
    {
        $context = parent::getContext(); 
        $context['title'] = $this->title; 


        return $context;
    }
    public function get(array $context) { 
        echo $this->twig->render($this->template, $context); 
    }
}
