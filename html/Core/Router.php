<?php

namespace Core;

class Router
{
    protected array $routes = [], $params = [];
    protected array $convertTypes = [
        'd' => 'int',
        'w' => 'string',
    ];

    /**
     * @param string $route - '', 'parks', 'parks/4'
     * @param array $params - ['controller' => '', 'action' => '', 'method' => '']
     * @return void
     */
    public function add(string $route, array $params = [])
    {
//        d($route);
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z_]+)\}/', '(?P<\1>[a-z-]+)', $route);
//        d($route);
        $route = preg_replace('/\{([a-z_]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
//        d($route);

        $route = "/^{$route}$/i";
//        d($route);
        $this->routes[$route] = $params;

    }

    public function dispatch(string $url)
    {
        $url = trim($url, '/');
        $url = $this->removeQueryVariable($url);


        if ($this->match($url)) {
            $this->checkRequestMethod();
            $controller = $this->getController();
            $action = $this->getAction($controller);

            if ($controller->before($action)) {
                call_user_func_array([$controller, $action], $this->params);
                $controller->after($action);
            }
        }
    }

    protected function getController(): Controller
    {
        $controller = $this->params['controller'] ?? null;
        if (!class_exists($controller)) {
            throw new \RouterException("Controller '{$controller}' doesn't exists");
        }
        unset($this->params['controller']);

        return new $controller;
    }

    protected function getAction(Controller $controller): string
    {
        $action = $this->params['action'] ?? null;
        if (!method_exists($controller, $action)) {
            throw new \RouterException("Action '{$action}' in '" . $controller::class . "' doesn't exists");
        }
        unset($this->params['action']);

        return $action;
    }

    protected function checkRequestMethod()
    {
        if (array_key_exists('method', $this->params)) {
            $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);

            if ($requestMethod !== strtolower($this->params['method'])) {
                throw new \RouterException("Method '" . $_SERVER['REQUEST_METHOD'] . "' not allowed for this route");
//                throw new \Exception("Method '" . $_SERVER['REQUEST_METHOD'] ."' not allowed for this route");
            }

            unset($this->params['method']);
        }
    }

    protected function match(string $url)
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $this->setParams($route, $matches, $params);
                return true;
            }
        }
        return false;
    }

    protected function setParams(string $route, array $matches, array $params): array
    {
        preg_match_all('/\(\?P<[\w]+>\\\\(\w[\+])\)/', $route, $types);
//        d($matches, $route, $types);
        $matches = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

        if (!empty($types)) {
            $step = 0;
            $lastKey = array_key_last($types);

            foreach ($matches as $key => $match) {
                $types[$lastKey] = str_replace('+', '', $types[$lastKey]);
                settype($match, $this->convertTypes[$types[$lastKey][$step]]);
                $params[$key] = $match;
                $step++; //parks/4/show  parks/4/car/1
            }
        }
        return $params;
    }

    protected function removeQueryVariable(string $url)
    {
        // ?
        // parks/4?category=2
        // (parks/4)?(category=2)
        // ($1)?($2) ?????????????????? ???? ?????????? ?
        // ($1)
        return preg_replace('/([\w\/]+)\?([\w\/=\d]+)/i', '$1', $url);
    }
}
