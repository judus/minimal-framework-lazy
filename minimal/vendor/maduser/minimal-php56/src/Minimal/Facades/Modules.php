<?php

namespace Maduser\Minimal\Facades;

use Maduser\Minimal\Apps\Factory as CoreModules;
use Maduser\Minimal\Exceptions\TypeErrorException;
use Maduser\Minimal\Collections\CollectionInterface;
use Maduser\Minimal\Config\ConfigInterface;
use Maduser\Minimal\Factories\MinimalFactoryInterface;
use Maduser\Minimal\Apps\ModuleInterface;
use Maduser\Minimal\Http\RequestInterface;
use Maduser\Minimal\Http\ResponseInterface;
use Maduser\Minimal\Routers\RouterInterface;

class Modules extends Facade
{
    public static $instance;

    /**
     * @return string
     */
    public static function getPath()
    {
        return self::call();
    }

    /**
     * @param $path
     *
     * @return CoreModules
     */
    public static function setPath($path)
    {
        return self::call();
    }

    /**
     * @return string
     */
    public static function getConfigs()
    {
        return self::call();
    }

    /**
     * @param $configs
     *
     * @return CoreModules
     */
    public static function setConfigs($configs)
    {
        return self::call();
    }

    /**
     * @return string
     */
    public static function getBindings()
    {
        return self::call();
    }

    /**
     * @param $bindings
     *
     * @return CoreModules
     */
    public static function setBindings($bindings)
    {
        return self::call();
    }

    /**
     * @return string
     */
    public static function getProviders()
    {
        return self::call();
    }

    /**
     * @param $providers
     *
     * @return CoreModules
     */
    public static function setProviders($providers
    ) {
        return self::call();
    }

    /**
     * @return string
     */
    public static function getRoutes()
    {
        return self::call();
    }

    /**
     * @param $routes
     *
     * @return CoreModules
     */
    public static function setRoutes($routes)
    {
        return self::call();
    }

    /**
     * @return mixed
     */
    public static function getApp()
    {
        return self::call();
    }

    /**
     * @param mixed $app
     *
     * @return mixed
     */
    public static function setApp($app)
    {
        return self::call();
    }

    /**
     * @return CollectionInterface
     */
    public static function getModules()
    {
        return self::call();
    }

    /**
     * @param CollectionInterface $modules
     *
     * @return mixed
     */
    public static function setModules(CollectionInterface $modules)
    {
        return self::call();
    }

    /**
     * @return MinimalFactoryInterface
     */
    public static function getModuleFactory()
    {
        return self::call();
    }

    /**
     * @param MinimalFactoryInterface $moduleFactory
     *
     * @return mixed
     */
    public static function setModuleFactory(MinimalFactoryInterface $moduleFactory)
    {
        return self::call();
    }

    /**
     * @return CollectionInterface
     */
    public static function getCollection()
    {
        return self::call();
    }
    
    /**
     * @param CollectionInterface $collection
     *
     * @return mixed
     */
    public static function setCollection(CollectionInterface $collection)
    {
        return self::call();
    }

    /**
     * @return ModuleInterface
     */
    public static function getModule()
    {
        return self::call();
    }
    
    /**
     * @param ModuleInterface $module
     *
     * @return mixed
     */
    public static function setModule(ModuleInterface $module)
    {
        return self::call();
    }

    /**
     * @return MinimalFactoryInterface
     */
    public static function getCollectionFactory()
    {
        return self::call();
    }
    
    /**
     * @param MinimalFactoryInterface $collectionFactory
     *
     * @return mixed
     */
    public static function setCollectionFactory(
        MinimalFactoryInterface $collectionFactory
    ) {
        return self::call();
    }

    /**
     * @return ConfigInterface
     */
    public static function getConfig()
    {
        return self::call();
    }
    
    /**
     * @param ConfigInterface $config
     *
     * @return mixed
     */
    public static function setConfig(ConfigInterface $config)
    {
        return self::call();
    }

    /**
     * @return RequestInterface
     */
    public static function getRequest()
    {
        return self::call();
    }
    
    /**
     * @param RequestInterface $request
     *
     * @return mixed
     */
    public static function setRequest(RequestInterface $request)
    {
        return self::call();
    }

    /**
     * @return RouterInterface
     */
    public static function getRouter()
    {
        return self::call();
    }
    
    /**
     * @param RouterInterface $router
     *
     * @return mixed
     */
    public static function setRouter(RouterInterface $router)
    {
        return self::call();
    }

    /**
     * @return ResponseInterface
     */
    public static function getResponse()
    {
        return self::call();
    }
    
    /**
     * @param ResponseInterface $response
     *
     * @return mixed
     */
    public static function setResponse(ResponseInterface $response)
    {
        return self::call();
    }

    /**
     * @param            $name
     * @param array|null $params
     *
     * @return array
     * @throws TypeErrorException
     */
    public static function register($name, array $params = null)
    {
        return self::call();
    }

    /**
     * @param ModuleInterface $module
     *
     * @return mixed
     */
    public static function registerModule(ModuleInterface $module)
    {
        return self::call();
    }
    
    /**
     * @param $name
     *
     * @return ModuleInterface
     */
    public static function get($name)
    {
        return self::call();
    }
}