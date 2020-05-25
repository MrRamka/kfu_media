<?php


namespace mediaparser;


class Route
{
    public function run()
    {
        $path = $_GET['mediaparser_path'] ?? '';
        if (!$path) return false;


        $token = $_GET['token'] ?? null;

        //todo set token option
        if ($token != get_option('mediaparser_token')) return false;

        $path = explode('/', $path);
        if (!isset($path[1])) $path[1] = 'main';
        $path[1] = ucfirst($path[1]) . 'Action';


        if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'Actions' . DIRECTORY_SEPARATOR . $path[0] . DIRECTORY_SEPARATOR . $path[1] . '.php')) {
            $class = 'mediaparser\\Actions\\' . $path[0] . '\\' . $path[1];
            $action = new $class;
            return $action;
        }


        return false;
    }
}