<?php
/**
 * Created by PhpStorm.
 * User: Dozie
 * Date: 9/10/2019
 * Time: 10:55 AM
 */

namespace Paylot\Helpers;


class Router
{
    private static $routes = [
        'transaction'
    ];

    /**
     * Get route.
     * @param $name
     * @param $secretKey
     * @return mixed
     */
    public static function getRoute($name, $secretKey)
    {
        if (!in_array(strtolower($name), self::$routes))
            throw new \InvalidArgumentException('Route name invalid');

        $route_name = ucfirst(strtolower($name));
        $route_class = "Paylot\\Routes\\$route_name";

        return new $route_class($secretKey);
    }
}