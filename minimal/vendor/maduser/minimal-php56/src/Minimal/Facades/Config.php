<?php namespace Maduser\Minimal\Facades;

use Maduser\Minimal\Config\KeyDoesNotExistException;
use Maduser\Minimal\Config\ConfigInterface;

class Config extends Facade
{
    /**
     * @var
     */
    protected static $instance;

    /**
     * @return array
     */
    public static function getItems()
    {
        return self::call();
    }

    /**
     * @param array $items
     *
     * @return ConfigInterface
     */
    public static function setItems(array $items)
    {
        return self::call();
    }

    /**
     * @param array $items
     *
     * @return mixed
     */
    public static function items(array $items = [])
    {
        if (count($items) > 0) {
            return self::setItems($items);
        }

        return self::getItems();
    }

    /**
     * @return bool
     */
    public static function isLiteral()
    {
        return self::call();
    }

    /**
     * @param $literal
     *
     * @return ConfigInterface
     */
    public static function setLiteral($literal)
    {
        return self::call();
    }

    /**
     * @param           $name
     * @param null      $value
     * @param null|bool $literal
     *
     * @return mixed
     * @throws KeyDoesNotExistException
     */
    public static function item($name, $value = null, $literal = null)
    {
        return self::call();
    }

    /**
     * @param      $name
     * @param      $array
     * @param null $parent
     *
     * @return mixed
     */
    public static function find($name, $array, $parent = null)
    {
        return self::call();
    }

    /**
     * @param $name
     *
     * @return mixed
     * @throws KeyDoesNotExistException
     */
    public static function throwKeyDoesNotExist($name)
    {
        return self::call();
    }
}