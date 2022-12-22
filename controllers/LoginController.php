<?php
require_once "../framework/TwigBaseController.php";

class LoginController extends TwigBaseController {
    public $template = "login.twig";

    public function get(array $context) {
        parent::get($context);
    }

    public function post(array $context) {
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $query = $this->pdo->prepare("SELECT login, password FROM users WHERE login = :login");
        $query->bindValue("login", $login);
        $query->execute();

        $user_auth_data = $query->fetch();

        $valid_user = $user_auth_data['login'] ?? '';
        $valid_password = $user_auth_data['password'] ?? '';
        
        if (!$user_auth_data || ($valid_user != $login || $valid_password != $password)) {
            $context['message'] = 'Неверный логин или пароль';
        } else {
            $_SESSION['is_logged'] = true;
            header('Location:/');
            exit();
        }

        $this->get($context);
    }
}