<?php namespace App\Demo\Assets\Controllers;

use Maduser\Minimal\Config\ConfigInterface;
use Maduser\Minimal\Apps\FactoryInterface;
use Maduser\Minimal\Facades\App;
use Maduser\Minimal\Http\RequestInterface;
use Maduser\Minimal\Routers\RouterInterface;
use Maduser\Minimal\Views\ViewInterface;
use Maduser\Minimal\Assets\AssetsInterface;
use Maduser\Minimal\Http\ResponseInterface;

/**
 * Class AssetsController
 *
 * @package Acme\Assets\Controllers
 */
class AssetsController
{
    /**
     * @var ConfigInterface
     */
    protected $config;
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
     * @var ViewInterface
     */
    protected $view;
    /**
     * @var AssetsInterface
     */
    protected $assets;

    /**
     * @var null
     */
    protected $basePath = null;

    /**
     * PageController constructor.
     *
     * @param ConfigInterface   $config
     * @param RequestInterface  $request
     * @param RouterInterface   $router
     * @param ResponseInterface $response
     * @param ViewInterface     $view
     * @param AssetsInterface   $assets
     * @param FactoryInterface $modules
     */
    public function __construct(
        ConfigInterface $config,
        RequestInterface $request,
        RouterInterface $router,
        ResponseInterface $response,
        ViewInterface $view,
        AssetsInterface $assets,
        FactoryInterface $modules
    ) {
        /** @var \Maduser\Minimal\Config\Config $config */
        /** @var \Maduser\Minimal\Http\Request $request */
        /** @var \Maduser\Minimal\Routers\Router $router */
        /** @var \Maduser\Minimal\Http\Response $response */
        /** @var \Maduser\Minimal\Views\View $view */
        /** @var \Maduser\Minimal\Assets\Assets $assets */
        $this->config = $config;
        $this->request = $request;
        $this->router = $router;
        $this->response = $response;
        $this->view = $view;
        $this->assets = $assets;
        $this->modules = $modules;
    }

    /**
     * @return string
     */
    protected function getBasePath()
    {
        if ($this->basePath) {
            return rtrim($this->basePath, '/') . '/';
        }

        /* Default if not defined */
        return $_SERVER['DOCUMENT_ROOT'] . '/assets/';
    }

    /**
     * @param $filePath
     *
     * @return string
     */
    protected function getPath($filePath)
    {
        return $this->getBasePath() .$filePath;
    }

    /**
     * @param $filePath
     *
     * @return mixed
     */
    public function getAsset($filePath)
    {
        return $this->serve($filePath);
    }

    /**
     * @param $fileSegmentPath
     *
     * @return null|string
     */
    protected function searchModules($fileSegmentPath)
    {
        $modules = $this->modules->getModules();

        foreach ($modules->getArray() as $moduleName => $values) {

            if ($this->request->segment(1) == strtolower($moduleName) ||
                $this->request->segment(1) . '/' . $this->request->segment(2) == strtolower($moduleName)) {

                $modulesPath = $this->config->item('paths.modules');

                $str = strtolower($moduleName);

                if (substr($str, 0, strlen($str)) == $str) {
                    $uri = substr($fileSegmentPath, strlen($str));
                }

                $filePath = rtrim($this->config->item('paths.system'), '/') . '/' . $modulesPath . '/' . $moduleName . '/' . $uri;

                if (file_exists($filePath)) {
                    return $filePath;
                };
            }
        }

        return null;
    }

    /**
     * @param $fileSegmentPath
     *
     * @return string
     */
    protected function serve($fileSegmentPath)
    {
        $filePath = $this->getPath($fileSegmentPath);

        if (!file_exists($filePath)) {
            $filePath = $this->searchModules($fileSegmentPath);
        }

        if (is_null($filePath)) {
            $this->response->status404();
        }

        ob_start();

        $fileName = basename($filePath);
        $fileSize = filesize($filePath);
        $fileTime = filemtime($filePath);
        $fileType = $this->mimeContentType($filePath);
        $maxAge = (60*60*24*30);
        $expires = date('r', $fileTime + $maxAge);
        $lastModified = date('r', $fileTime);

        $this->response->header('Pragma: public'); // required
        $this->response->header('Cache-Control: public, must-revalidate, proxy-revalidate, max-age="' . $maxAge . '", s-maxage="' . $maxAge . '"');
        $this->response->header('Last-Modified: ' . $lastModified);
        $this->response->header('Expires: ' . $expires);
        $this->response->header('Content-Type: ' . $fileType);
        $this->response->header('Content-Disposition: inline; filename="' . $fileName . '";');
        $this->response->header('Content-Transfer-Encoding: binary');
        $this->response->header('Content-Length: ' . $fileSize);

        readfile($filePath);

        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    /**
     * @param $filename
     *
     * @return mixed|string
     */
    protected function mimeContentType($filename)
    {
        $mimeTypes = [
            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        ];

        $ext = strtolower(pathinfo($filename)['extension']);

        if (array_key_exists($ext, $mimeTypes)) {
            return $mimeTypes[$ext];
        }

        return 'application/octet-stream';
    }
}
