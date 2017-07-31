<?php

namespace Maduser\Minimal\Facades;

/**
 * Class Request
 *
 * @package Maduser\Minimal\Facades
 */
class Request extends Facade
{
    /**
     * @var
     */
    protected static $instance;

    /**
     * @return string
     */
    public static function getRequestMethod()
    {
        return self::call();
    }
   
    /**
     * Setter $uriString
     *
     * @param $string
     *
     * @return mixed
     */
    public static function setUriString($string)
    {
        return self::call();
    }

    /**
     * Getter $uriString
     *
     * @return string
     */
    public static function getUriString()
    {
        return self::call();
    }
   
    /**
     * Setter $requestMethod
     *
     * @param $str
     *
     * @return mixed
     */
    public static function setRequestMethod($str)
    {
        return self::call();
    }

    /**
     * @return string
     */
    public static function fetchUriString()
    {
        return self::call();
    }

    /**
     * @return string
     */
    public static function fetchRequestMethod()
    {
        return self::call();
    }

    /**
     * @return array
     */
    public static function explodeSegments()
    {
        return self::call();
    }

    /**
     * @return array
     */
    public static function getSegments()
    {
        return self::call();
    }

    /**
     * @param $n
     *
     * @return array
     */
    public static function segment($n)
    {
        return self::call();
    }
}