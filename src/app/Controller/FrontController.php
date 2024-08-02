<?php

declare(strict_types=1);

namespace App\Controller;

class FrontController
{
    private const CONTROLLER_NAMESPACE = 'App\Controller\\';
    private const CONTROLLER_FACTORY_NAMESPACE = 'App\Factory\\';
    private string $controller = self::CONTROLLER_NAMESPACE . 'HomeController';
    private array $actions = ['controller' => 'index'];
    private array $params = [];

    public function __construct()
    {
        $request = $this->parseUri();
        if ($_SERVER['REQUEST_URI'] !== '/') {
            $file = self::CONTROLLER_NAMESPACE . ucwords($request['controller'] . 'Controller');
            $factoryFile = self::CONTROLLER_FACTORY_NAMESPACE. ucwords($request['controller'] . 'Factory');
            if (class_exists($factoryFile)) {
                $this->controller = $factoryFile;
                $this->actions['factory'] = 'create';
                $this->actions['controller'] = $request['action'] === '' ? 'index' : $request['action'];
            } else {
                $this->controller = $file;
            }

            if (isset($request['action']) && $request['action'] !== '') {
                $this->actions['controller'] = $request['action'];
            }
        }
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if (isset($this->actions['factory'])) {
            $class = call_user_func_array([new $this->controller, $this->actions['factory']], $this->params);
            $action = $this->actions['controller'];
            call_user_func_array([$class, $action], $this->params);
        } else {
            call_user_func_array([new $this->controller, $this->actions['controller']], $this->params);
        }
    }

    /**
     * @return array
     */
    private function parseUri(): array
    {
        $uri = $_SERVER['REQUEST_URI'];
        if ($uri === '/') {
            return [];
        }

        $uri = parse_url(ltrim($uri, '/'));
        $uriElements = explode('/', $uri['path']);
        if (isset($uri['query'])) {
            $params = explode('&', $uri['query']);
            $this->prepareParams($params);
        }

        return [
            'controller' => $uriElements[0],
            'action' => $uriElements[1] ?? 'index',
        ];
    }

    /**
     * @param array $params
     *
     * @return void
     */
    private function prepareParams(array $params): void
    {
        foreach ($params as $param) {
            $parts = explode('=', $param);
            $this->params[$parts[0]] = $parts[1];
        }
    }
}
