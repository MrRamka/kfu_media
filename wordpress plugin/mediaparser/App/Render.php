<?php
namespace mediaparser;


class Render
{
    public static function render($viewFile, $variables = [])
    {
        extract($variables, EXTR_OVERWRITE);
        ob_start();
        require(__DIR__ . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $viewFile . '.php');
        echo ob_get_clean();
    }
}