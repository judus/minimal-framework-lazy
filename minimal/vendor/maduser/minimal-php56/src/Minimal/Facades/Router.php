<?php

namespace Maduser\Minimal\Facades;

use Maduser\Minimal\Collections\CollectionInterface;
use Maduser\Minimal\Routers\RouteInterface;
use Maduser\Minimal\Routers\RouterInterface;

/**
 * Class Router
 *
 * @package Maduser\Minimal\Facades
 */
class Router extends Facade
{
    protected static $instance;

    /**
     * @return RouterInterface
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * @param          $uriPattern
     * @param \Closure $callback
     *
     * @return mixed
     */
    public static function group($uriPattern, \Closure $callback)
    {
        return self::call();
    }

    /**
     * @param $uriPattern
     * @param $action
     *
     * @return mixed
     */
    public static function get($uriPattern, $action)
    {
        return self::call();
    }
    
    /**
     * @param $uriPattern
     * @param $action
     *
     * @return mixed
     */
    public static function post($uriPattern, $action)
    {
        return self::call();
    }
    
    /**
     * @param $uriPattern
     * @param $action
     *
     * @return mixed
     */
    public static function put($uriPattern, $action)
    {
        return self::call();
    }

    /**
     * @param $uriPattern
     * @param $action
     *
     * @return mixed
     */
    public static function patch($uriPattern, $action)
    {
        return self::call();
    }

    /**
     * @param $uriPattern
     * @param $action
     *
     * @return mixed
     */
    public static function delete($uriPattern, $action)
    {
        return self::call();
    }

    /**
     * @param $requestMethod
     *
     * @return CollectionInterface
     */
    public static function all($requestMethod = 'ALL')
    {
        return self::call();
    }

    /**
     * @param null $uriString
     *
     * @return RouteInterface
     */
    public static function getRoute($uriString = null)
    {
        return self::call();
    }

    /**
     * @return CollectionInterface
     */
    public static function getRoutes()
    {
        return self::call();
    }

    /**
     * @param bool|null $bool
     *
     * @return bool
     */
    public static function isClosure($bool = null)
    {
        return self::call();
    }
}