<?php

namespace App;

use App\Logger\Logger;
use App\MediaService\MediaService;
use App\Model\Parser;
use App\ProviderService\ProviderService;
use GuzzleHttp\Client;

class App
{
    private static $_config;

    /**
     * App constructor.
     * @param $config array
     */

    public static $app;

    public function __construct($config)
    {
        self::$_config = $config;
        if (self::$app === null) self::$app = $this;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return self::$_config;
    }

    /**
     * @return array
     */
    public function getParsers(): array
    {
        $data = [];
        $parsers = Parser::all(['enabled' => 1]);
        foreach ($parsers as $parser)
            $data[$parser['alias']] = $parser;

        return $data;
    }

    /**
     * Runs App
     */
    public function run(): void
    {
        $action =$this->route()->run();

        $action->run();
    }

    private $_logger;

    /**
     * App logger
     * @return Logger
     */
    public function logger()
    {
        if ($this->_logger === null) $this->_logger = new Logger();
        return $this->_logger;
    }


    private $_route;

    /**
     * App router
     * @return Route
     */
    public function route()
    {
        if ($this->_route === null) $this->_route = new Route();
        return $this->_route;
    }

    private $_db;

    /**
     * DB access
     * @return DB
     * @throws \Exception
     */
    public function db()
    {
        if ($this->_db === null) $this->_db = new DB();
        return $this->_db;
    }

    private $_media;

    /**
     * Media service
     * @return MediaService
     */
    public function mediaService()
    {
        if ($this->_media === null) $this->_media = new MediaService();
        return $this->_media;
    }

    private $_provider;

    /**
     * Provider service
     * @return ProviderService
     */
    public function providerService()
    {
        if ($this->_provider === null) $this->_provider = new ProviderService();
        return $this->_provider;
    }

    private $_guzzle;

    /**
     * GuzzleHTTP Client
     * @return Client
     */
    public function guzzle()
    {
        if ($this->_guzzle === null) $this->_guzzle = new Client();
        return $this->_guzzle;
    }
}