<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include $routesPath;

    }

    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }

    }
    public function run()
    {
        $uri = $this->getUri();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                // echo '<pre>';
                // var_dump($uriPattern);
                // echo '</pre>';
                // echo '<pre>';
                // var_dump($path);
                // echo '</pre>';
                // echo '<pre>';
                // var_dump($uri);
                // echo '</pre>';
                //Шукаємо в запиті контролер екшн і параметри
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));
                // Все що залишилось в масиві - параметри
                $parametrs = $segments;
                //print_r($parametrs);
                //Підключаємо контроллер
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once $controllerFile;
                }
                //Створюємо об'єкт контроллера і викликаємо екшн
                $controllerObject = new $controllerName;
                // теж саме, що $controllerObject->$actionName($parametrs), тілки в функції яможу приймати кожен елемент як
                //окрему змінну
                $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);
                if ($result != null) {
                    break;
                }
            }

        }

    }
}
