<?php

namespace lib;

class Route {
    private static $routes = [
        "GET" => [],
        "POST" => []
    ];
    
    private static $URL_BASE = "/mvc_clase/public";

    public static function get($uri, $callback) {
        self::$routes["GET"][self::$URL_BASE . $uri] = $callback;
    }

    public static function post($uri, $callback) {
        self::$routes["POST"][self::$URL_BASE . $uri] = $callback;
    }

    public static function dispatch() {
        $uri = $_SERVER["REQUEST_URI"];
        $method = $_SERVER["REQUEST_METHOD"];

        if (!isset(self::$routes[$method]) || !is_array(self::$routes[$method])) {
            echo "404";
            return;
        }

        foreach (self::$routes[$method] as $url => $funcion) {
            // Manejo de rutas con parámetros como /user/:id
            if (strpos($url, ":") !== false) {
                $url = preg_replace("#:[a-zA-Z]+#", "([a-zA-Z0-9_-]+)", $url);
            }

            if (preg_match("#^$url$#", $uri, $matches)) {
                $params = array_slice($matches, 1);

                if (is_callable($funcion)) {
                    $response = $funcion(...$params);
                } elseif (is_array($funcion)) {
                    $controller = new $funcion[0];
                    $response = $controller->{$funcion[1]}(...$params);
                } else {
                    $response = null;
                }

                if (is_array($response) || is_object($response)) {
                    header("Content-Type: application/json");
                    echo json_encode($response);
                } else {
                    echo $response;
                }
                return;
            }
        }

        echo "404";
    }
}
?>
