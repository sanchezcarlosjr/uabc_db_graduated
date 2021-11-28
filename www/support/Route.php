<?php

namespace support;


class Route
{
    private static Route $route;
    private string $dirname;


    protected function __construct()
    {
        $this->dirname = dirname(__DIR__);
    }

    public static function get(string $path, $callback)
    {
        if (self::getInstance()->checkIfIs('GET', $path)) {
            $callback();
            die;
        }
    }

    public function checkIfIs(string $method, string $path): bool
    {
        $actual_path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        return $_SERVER['REQUEST_METHOD'] === $method && $actual_path == $path;
    }

    public static function getInstance(): Route
    {
        if (!isset(self::$route)) {
            self::$route = new static();
        }
        return self::$route;
    }

    public static function delete(string $path, $callback)
    {
        if (array_key_exists('DELETE', $_POST)) {
            self::post($path, $callback);
        }
    }

    public static function create(string $path, $callback)
    {
        if (array_key_exists('CREATE', $_POST)) {
            self::post($path, $callback);
        }
    }

    public static function post(string $path, $callback)
    {
        if (self::getInstance()->checkIfIs('POST', $path)) {
            $callback(...$_GET);
        }
    }

    public function redirect_to_views(string $url)
    {
        $views = $this->dirname . "/views/";
        $view_url = $views . $url . ".php";
        $this->redirect($view_url);
    }

    public function redirect(string $url)
    {
        require_once $url;
    }
}