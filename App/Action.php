<?php

namespace App;

class Action
{
    public $title;

    public function run(): void
    {

    }

    public function redirect($to): void
    {
        header('Location: ' . $to);
    }

    public function render($view, $variables = [])
    {
        $viewFile = $this->findView($view);
        ob_start();
        ob_implicit_flush(false);

        $content = $this->getViewContent($viewFile, $variables);
        require __DIR__ . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'layout.php';

        echo ob_get_clean();
        return;
    }

    public function renderPartial($view, $variables)
    {
        $viewFile = $this->findView($view);

        echo $this->getViewContent($viewFile, $variables);
        return;
    }

    private function findView($view)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $view . '.php';
        if (file_exists($path))
            return $path;
        else throw new \Exception('View file ' . $view . ' not found');
    }

    private function getViewContent($viewFile, $variables)
    {
        extract($variables, EXTR_OVERWRITE);
        ob_start();
        require($viewFile);
        return ob_get_clean();
    }

    public static function navActiveClass($action)
    {
        if ($action == App::$app->route()->currentAction) {
            echo 'class="active"';
        }
    }

    public function renderFlashes()
    {
        $flashes = App::$app->route()->getFlashes();
        if (!empty($flashes)) $this->renderPartial('flash', ['flashes' => $flashes]);
    }
}