<?php

namespace Maduser\Minimal\Paths;

use Maduser\Minimal\Config\ConfigInterface;
use Maduser\Minimal\Http\RequestInterface;

/**
 * Class PathGenerator
 *
 * @package Maduser\Minimal\Paths
 */
class PathGenerator
{
    /**
     * @var ConfigInterface|null
     */
    private $config;

    /**
     * @var RequestInterface|null
     */
    private $request;

    /**
     * @return ConfigInterface
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param ConfigInterface $config
     *
     * @return PathGenerator
     */
    public function setConfig(ConfigInterface $config)
    {
        $this->config = $config;

        return $this;
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
     *
     * @return PathGenerator
     */
    public function setRequest(RequestInterface $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * PathGenerator constructor.
     *
     * @param ConfigInterface|null  $config
     * @param RequestInterface|null $request
     */
    public function __construct(
        ConfigInterface $config = null,
        RequestInterface $request = null
    ) {
        $this->config = $config;
        $this->request = $request;
    }

    /**
     * @param string|null $item
     * @param $fromRoot
     *
     * @return string
     */
    public function path($item = null, $fromRoot = true)
    {
        $system = rtrim($this->config->item('paths.system'), '/') . '/';

        if (is_null($item)) {
            return $system;
        }

        $path = '';

        switch ($item) {
            case 'app':
                $path = rtrim($this->config->item('paths.app'), '/') . '/';
                break;
            case 'modules':
                $path = rtrim($this->config->item('paths.modules'), '/') . '/';
                break;
            case 'resources':
                $path = rtrim($this->config->item('paths.resources'),
                        '/') . '/';
                break;
            case 'views':
                $path = rtrim($this->config->item('paths.views'), '/') . '/';
                break;
            case 'storage':
                $path = rtrim($this->config->item('paths.storage'), '/') . '/';
                break;
            case 'translations':
                $path = $this->config->item('paths.translations');
                break;
        }

        ! $fromRoot || $path = $system . $path;

        return $path;
    }


    /**
     * @param null|string $item
     *
     * @return string
     */
    public function http($item = null)
    {
        $base = $this->request->getBaseUri();
        empty($base) || $base = $base . '/';

        $base = '/' . $base;

        if (is_null($item)) {
            return $base;
        }

        $host = $this->request->getHttp();
        $path = '';

        $_host = $this->config->item('paths.host');

        !empty($_host) || $_host = $this->request->getHost();

        switch ($item) {
            case 'host':
                $host .= rtrim($_host, '/') . '/';
                break;
            case 'base':
                $host .= rtrim($_host, '/') . $base;
                break;
            default:
                $path = path($item, false);
                break;
        }

        return $host . $path;
    }

}