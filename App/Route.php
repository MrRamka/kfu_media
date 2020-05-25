<?php


namespace App;


class Route
{
    public $currentAction;

    public function __construct()
    {
        if (!isset($_SESSION['flashes']))
            $_SESSION['flashes'] = [];
    }

    public function run(): Action
    {
        //if (!isset($_GET['path']))
        //    header('Location: /parser');

        $path = strtolower(substr($_SERVER['REQUEST_URI'], 1));
        if (!$path) $path = 'parser';
        $path = explode('/', $path);
        if (!isset($path[1])) $path[1] = 'main';
        $path[1] = ucfirst($path[1]) . 'Action';
        if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'Actions' . DIRECTORY_SEPARATOR . $path[0] . DIRECTORY_SEPARATOR . $path[1] . '.php')) {
            $this->currentAction = $path[0];
            $class = '\\App\\Actions\\' . $path[0] . '\\' . $path[1];
            $action = new $class;
            if (!($action instanceof Action)) throw new \Exception('Action must extend App\Action');
        } else {
            http_response_code(404);
            throw new \Exception('Not found');
        }

        return $action;
    }

    public function setFlash($id, $message): void
    {
        $_SESSION['flashes'][$id] = $message;
    }

    public function getFlash($id): string
    {
        $flash = '';
        if (isset($_SESSION['flashes'][$id])) {
            $flash = $_SESSION['flashes'][$id];
            unset($_SESSION['flashes'][$id]);
        }
        return $flash;
    }

    public function getFlashes(): array
    {
        $flashes = $_SESSION['flashes'];
        $_SESSION['flashes'] = [];
        return $flashes;
    }

    public function hasFlash($id): bool
    {
        return isset($_SESSION['flashes'][$id]);
    }
}