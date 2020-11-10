<?php

/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 15:00 PM by ahmad montazeri
 * Modified At:.
 *
 * this class for routing
 */
namespace App\Providers;

use AltoRouter;

class Route extends Provider
{
    protected $uri;
    protected $controller;
    protected $method;

    public function __construct(AltoRouter $router)
    {
        $this->uri = $router->match();

        if($this->uri)
        {
            list($controller, $method) = explode('@', $this->uri['target']);
            $this->controller = $controller;
            $this->method = $method;

            if(is_callable([new $this->controller, $this->method]))
            {
                call_user_func_array([new $this->controller, $this->method], [$this->uri['params']]);
            }
            else
            {
                echo "The Method {$this->method} is not defined in {$this->controller}";
            }
        }
        else
        {
            header($_SERVER['SERVER_PROTOCOL'] . '404 not found');
            dd($this->uri);
            view('errors/404');
        }
    }
}
