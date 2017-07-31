<?php
/**
 * AppInterface.php
 * 7/15/17 - 8:25 PM
 *
 * PHP version 5.6
 *
 * @package    @package_name@
 * @author     Julien Duseyau <julien.duseyau@gmail.com>
 * @copyright  2017 Julien Duseyau
 * @license    https://opensource.org/licenses/MIT
 * @version    Release: @package_version@
 *
 * The MIT License (MIT)
 *
 * Copyright (c) Julien Duseyau <julien.duseyau@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Maduser\Minimal\Apps;


use Maduser\Minimal\Config\ConfigInterface;
use Maduser\Minimal\Http\RequestInterface;
use Maduser\Minimal\Http\ResponseInterface;
use Maduser\Minimal\Routers\RouterInterface;


/**
 * Class Modules
 *
 * @package Maduser\Minimal\Apps
 */
interface AppInterface
{
    /**
     * @return string
     */
    public function getBasePath();

    /**
     * @param $path
     *
     * @return AppInterface
     */
    public function setBasePath($path);

    /**
     * @return string
     */
    public function getConfigFile();

    /**
     * @param $path
     *
     * @return AppInterface
     */
    public function setConfigFile($path);

    /**
     * @return string
     */
    public function getBindingsFile();

    /**
     * @param $path
     *
     * @return AppInterface
     */
    public function setBindingsFile($path);

    /**
     * @return string
     */
    public function getProvidersFile();

    /**
     * @param $path
     *
     * @return AppInterface
     */
    public function setProvidersFile($path);

    /**
     * @return string
     */
    public function getRoutesFile();

    /**
     * @param $path
     *
     * @return AppInterface
     */
    public function setRoutesFile($path);

    /**
     * @return ConfigInterface
     */
    public function getConfig();

    /**
     * @param ConfigInterface $config
     */
    public function setConfig(ConfigInterface $config);

    /**
     * @return RequestInterface
     */
    public function getRequest();

    /**
     * @param RequestInterface $request
     */
    public function setRequest(RequestInterface $request);

    /**
     * @return ResponseInterface
     */
    public function getResponse();

    /**
     * @param ResponseInterface $response
     */
    public function setResponse(ResponseInterface $response);

    /**
     * @return RouterInterface
     */
    public function getRouter();

    /**
     * @param RouterInterface $router
     */
    public function setRouter(RouterInterface $router);

    /**
     * @return FactoryInterface
     */
    public function getFactory();

    /**
     * @param FactoryInterface $factory
     */
    public function setFactory(FactoryInterface $factory);

    /**
     * @return AppInterface
     */
    public function getApp();

    /**
     * @param AppInterface $app
     *
     * @return AppInterface
     */
    public function setApp(AppInterface $app);

    /**
     * @return FactoryInterface
     */
    public function getModules();

    /**
     * @param FactoryInterface $modules
     */
    public function setModules(FactoryInterface $modules);
}