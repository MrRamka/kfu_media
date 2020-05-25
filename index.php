<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');

function autoload(string $className)
{
    $className = (string) str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
}

spl_autoload_register('autoload');
require 'vendor/autoload.php';

$config = require "config/web.php";

(new App\App($config))->run();