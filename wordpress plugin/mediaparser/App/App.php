<?php

namespace mediaparser;


class App
{
    public static function activate()
    {
        //todo db migration
    }

    public static function init()
    {
        $action = (new Route())->run();
        if ($action)
            $action->run();
    }

    public static function metaBox()
    {
        add_meta_box('mediaparser_new_version', 'Новые версии с источника', ['mediaparser\MetaBox', 'metaBoxNew'], 'post');
        add_meta_box('mediaparser_meta', 'Мета данные с источника', ['mediaparser\MetaBox', 'metaBoxMetas'], 'post');
    }


}