<?php

class SetWelcomeController extends BaseController{
    public function get(array $context)
    {
    if(!isset($_SESSION['last_path'])){
        $_SESSION['last_path'] = [];
    }
    array_push($_SESSION['last_path'], $_SERVER['REQUEST_URI']);
    $url = $_SERVER['HTTP_REFERER'];
    header("Location: $url");
    exit;
    }
}