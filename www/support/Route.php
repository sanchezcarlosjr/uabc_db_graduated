<?php

function views(string $path)
{
    return Route::getInstance()->redirect_to_views($path);
}

class Route
{
    private static Route $route;
    private string $dirname;


    protected function __construct()
    {
        $this->dirname = dirname(__DIR__);
    }

    public static function getInstance(): Route
    {
        if (!isset(self::$route)) {
            self::$route = new static();
        }
        return self::$route;
    }

    public static function get(string $path, $callback)
    {
        $actual_path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        if ($actual_path == $path || $path == "*") {
            $callback();
        }
    }

    public function redirect_to_views(string $url)
    {
        $views = $this->dirname . "/views/";
        $view_url = $views . $url . ".php";
        return $this->redirect($view_url);
    }

    public function redirect(string $url)
    {
        return require_once $url;
    }
}