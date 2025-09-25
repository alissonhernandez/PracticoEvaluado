<?php
namespace lib;

class Route {
    private static $routes = [];

    private static function getBaseUrl() {
        return rtrim(dirname($_SERVER['SCRIPT_NAME']), "/");
    }

    public static function get($uri, $callback) {
        $base = self::getBaseUrl();
        self::$routes["GET"][$base . $uri] = $callback;
    }

    public static function post($uri, $callback) {
        $base = self::getBaseUrl();
        self::$routes["POST"][$base . $uri] = $callback;
    }

    public static function dispatch() {
        $uri = $_SERVER["REQUEST_URI"];
        $method = $_SERVER["REQUEST_METHOD"];

        foreach(self::$routes[$method] as $url => $funcion) {
            if(strpos($url, ":") !== false){
                $url = preg_replace("#:[a-zA-Z]+#", "([a-zA-Z0-9-_]+)", $url);
            }

            if(preg_match("#^$url$#", $uri, $matches)){
                $params = array_slice($matches,1);

                if(is_callable($funcion)){
                    $response = $funcion(...$params);
                } elseif(is_array($funcion)){
                    $controller = new $funcion[0];
                    $response = $controller->{$funcion[1]}(...$params);
                }

                if(is_array($response) || is_object($response)){
                    header("Content-Type: application/json");
                    echo json_encode($response);
                } else {
                    echo $response;
                }
                return;
            }
        }

        echo "404 - Página no encontrada";
    }
}
?>