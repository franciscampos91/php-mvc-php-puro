<?php

class Core
{
    public function run($routes)
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        ($url != '/') ? $url = rtrim($url, '/'): $url;

        $routerFound = false;

        foreach ($routes as $path => $controller) {
            $pattern = '#^' . preg_replace('/{id}/', '(\d+)', $path) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                $routerFound = true;

                [$currentController, $action] = explode('@', $controller);

                require_once __DIR__ . "/../controllers/$currentController.php";

                $newController = new $currentController();
                $newController->$action($matches); // Passa os parâmetros capturados para o método
                return; // Para evitar que continue verificando outras rotas
            }
        }

        //Tratamento para rota não encontrada
        if(!$routerFound) {
            require_once __DIR__ . "/../controllers/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index();
        }


    }
}
