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
        $route = preg_replace('/\//','\\/',$route);
        $route = preg_replace('/\{([a-z]+)\}/','(?P<\1>[a-z-]+)',$route);
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)',$route);

        $route = "/^{$route}$/i";
        $this ->routes[$route] = $params;

//        d($this->routes);
//        d($route, $params);
    }

    public function dispatch(string $url)
    {
        d($url); //http://127.0.0.1/parks/61/update?category=2
        $url=trim($url, '/');
        $url=$this->removeQueryVariable($url);
//        d($url);
        d($url, $_GET); //отфільтрує, но в $_GET буде після '?' ...
    }

    protected function removeQueryVariable(string $url)
    {
        // ?
        // parks/4?category=2
        // (parks/4)?(category=2)
        // ($1)?($2) повернути до знаку ?
//        return preg_replace('/([\w\/]+)\?([\w\/=\d]+)/i', '$1', $url);
        return preg_replace('/([\w\/]+)\?([\w\/=\d]+)/i', '$1', $url);
    }
}