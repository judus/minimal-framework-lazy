<?php namespace Maduser\Minimal\Apps;

use Maduser\Minimal\Exceptions\TypeErrorException;

use Maduser\Minimal\Collections\CollectionFactoryInterface;
use Maduser\Minimal\Collections\CollectionInterface;
use Maduser\Minimal\Config\ConfigInterface;

use Maduser\Minimal\Factories\MinimalFactoryInterface;


use Maduser\Minimal\Http\RequestInterface;
use Maduser\Minimal\Http\ResponseInterface;
use Maduser\Minimal\Routers\RouterInterface;

/**
 * Class Modules
 *
 * @package Maduser\Minimal\Core
 */
class Factory implements FactoryInterface
{
    /**
     * @var string
     */
    private $basePath = 'app';

    /**
     * @var string
     */
    private $configFile = 'config/config.php';

    /**
     * @var string
     */
    private $bindingsFile = 'config/bindings.php';

    /**
     * @var string
     */
    private $providersFile = 'config/providers.php';

    /**
     * @var string
     */
    private $routesFile = 'config/routes.php';

    /**
     * @var \Maduser\Minimal\Apps\Minimal $app
     */
    protected $app;

    /**
     * @var MinimalFactoryInterface
     */
    protected $moduleFactory;
    /**
     * @var CollectionInterface
     */
    protected $collection = CollectionInterface::class;
    /**
     * @var
     */
    protected $modules = CollectionInterface::class;
    /**
     * @var ModuleInterface
     */
    protected $module = ModuleInterface::class;

    /**
     * @var MinimalFactoryInterface
     */
    protected $collectionFactory = MinimalFactoryInterface::class;

    /**
     * @var ConfigInterface
     */
    protected $config = ConfigInterface::class;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @return string
     */
    public function getBasePath()
    {
        return rtrim($this->basePath, '/') . '/';
    }

    /**
     * @param $path
     */
    public function setBasePath($path)
    {
        $this->basePath = $path;
    }

    /**
     * @return string
     */
    public function getConfigFile()
    {
        return $this->configFile;
    }

    /**
     * @param $path
     *
     * @return Factory
     */
    public function setConfigFile($path)
    {
        $this->configFile = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getBindingsFile()
    {
        return $this->bindingsFile;
    }

    /**
     * @param $path
     *
     * @return Factory
     */
    public function setBindingsFile($path)
    {
        $this->bindingsFile = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvidersFile()
    {
        return $this->providersFile;
    }

    /**
     * @param $path
     *
     * @return Factory
     */
    public function setProvidersFile($path)
    {
        $this->providersFile = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoutesFile()
    {
        return $this->routesFile;
    }

    /**
     * @param $path
     *
     * @return Factory
     */
    public function setRoutesFile($path)
    {
        $this->routesFile = $path;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param mixed $app
     */
    public function setApp($app)
    {
        $this->app = $app;
    }

    /**
     * @return CollectionInterface
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * @param CollectionInterface $modules
     */
    public function setModules(CollectionInterface $modules)
    {
        $this->modules = $modules;
    }

    /**
     * @return MinimalFactoryInterface
     */
    public function getModuleFactory()
    {
        return $this->moduleFactory;
    }

    /**
     * @param MinimalFactoryInterface $moduleFactory
     */
    public function setModuleFactory(MinimalFactoryInterface $moduleFactory)
    {
        $this->moduleFactory = $moduleFactory;
    }

    /**
     * @return CollectionInterface
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param CollectionInterface $collection
     */
    public function setCollection(CollectionInterface $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return ModuleInterface
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param ModuleInterface $module
     */
    public function setModule(ModuleInterface $module)
    {
        $this->module = $module;
    }

    /**
     * @return MinimalFactoryInterface
     */
    public function getCollectionFactory()
    {
        return $this->collectionFactory;
    }

    /**
     * @param MinimalFactoryInterface $collectionFactory
     */
    public function setCollectionFactory(MinimalFactoryInterface $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return ConfigInterface
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param ConfigInterface $config
     */
    public function setConfig(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param RequestInterface $request
     */
    public function setRequest(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return RouterInterface
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param RouterInterface $router
     */
    public function setRouter(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param ResponseInterface $response
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * Modules constructor.
     *
     * @param ConfigInterface            $config
     * @param CollectionFactoryInterface $collectionFactory
     * @param ModuleFactoryInterface     $moduleFactory
     */
    public function __construct(
        ConfigInterface $config,
        CollectionFactoryInterface $collectionFactory,
        ModuleFactoryInterface $moduleFactory
    ) {
        $this->config = $config;
        $this->moduleFactory = $moduleFactory;
        $this->modules = $collectionFactory->create();
    }

    /**
     * @param            $name
     * @param array|null $params
     *
     * @return array
     * @throws TypeErrorException
     */
    public function register($name, array $params = null)
    {
        $modules = [];

        if ($this->endsWith($name, '*')) {

            $name = explode('*', $name);

            isset($path) || $path = $this->config->exists(
                'paths.modules', $this->getBasePath());

            $dirs = array_filter(glob($this->config->item('paths.system'). '/' .$path . '/' . $name[0] . '*'), 'is_dir');

            foreach ($dirs as $dir) {
                $moduleName = $name[0] . basename($dir);

                if (!$this->getModules()->exists($moduleName)) {
                    $modules[] = $this->register_($moduleName, $params);
                }

            }

        } else {

            if (!$this->getModules()->exists($name)) {
                $modules[] = $this->register_($name, $params);
            }

        }

        return $modules;
    }

    public function register_($name, array $params = null)
    {
        !is_array($params) || extract($params);

        isset($path) || $path = $this->config->exists(
            'paths.modules', $this->getBasePath());

        isset($bindings) || $bindings = $this->config->exists(
            'modules.bindingsFile', $this->getBindingsFile());

        isset($providers) || $providers = $this->config->exists(
            'modules.providersFile', $this->getProvidersFile());

        isset($config) || $config = $this->config->exists(
            'modules.configFile', $this->getConfigFile());

        isset($routes) || $routes = $this->config->exists(
            'modules.routesFile', $this->getRoutesFile());

        $module = new Module();
        $module->setName($name);
        $module->setBasePath(rtrim($path, '/') . '/' . $name);
        $module->setBindingsFile($module->getBasePath() . $bindings);
        $module->setProvidersFile($module->getBasePath() . $providers);
        $module->setConfigFile($module->getBasePath() . $config);
        $module->setRoutesFile($module->getBasePath() . $routes);

        $this->app->registerConfig($module->getConfigFile());
        $this->app->registerBindings($module->getBindingsFile());
        $this->app->registerProviders($module->getProvidersFile());
        $this->app->registerRoutes($module->getRoutesFile());

        $this->registerModule($module);

        return $module;
    }

    /**
     * @param ModuleInterface $module
     */
    public function registerModule(ModuleInterface $module)
    {
        $this->modules->add($module, $module->getName());
    }

    /**
     * @param $name
     *
     * @return ModuleInterface
     */
    public function get($name)
    {
        return $this->modules->get($name);
    }

    public function startsWith($haystack, $needle)
    {
         $length = strlen($needle);
         return (substr($haystack, 0, $length) === $needle);
    }

    public function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
}
