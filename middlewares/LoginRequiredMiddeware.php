><?php
class LoginRequiredMiddeware extends BaseMiddleware
{
    public function apply(BaseController $controller, array $context)
    {
        $login = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
        $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
        $valid_password = '';
        $sql = <<<EOL
SELECT password FROM Users
WHERE login = :login
EOL;
        $query = $controller->pdo->prepare($sql);
        $query->bindValue('login',$login);
        $query->execute();
        $data = $query->fetch();
        $valid_password = $data['password'];
        // сверяем с корректными
        if ($valid_password != $password || $valid_password == '') {
           
            header('WWW-Authenticate: Basic realm="dota_2"');
            http_response_code(401);
            exit; 
        }
    }


}
