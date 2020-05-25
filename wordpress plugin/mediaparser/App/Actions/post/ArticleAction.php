<?php


namespace mediaparser\Actions\post;


class ArticleAction
{
    public function run()
    {
        $link = $_GET['link'] ?? '';
        if ($link)
            die(file_get_contents($link));
        else die('Ошибка');
    }

}