<?php
/**
 * @var $meta
 */
if (!empty($meta))
    foreach ($meta as $key => $item) {
        switch ($key) {
            case 'parsed_author':
                echo 'Автор: ' . $item[0] . '<br>';
                break;
            case 'parsed_category':
                echo 'Категория: ' . $item[0] . '<br>';
                break;
            case 'parsed_url':
                echo 'URL: <a href="' . $item[0] . '">' . $item[0] . '</a><br>';
                break;
            case 'parsed_md5':
                echo 'MD5: ' . $item[0] . '<br>';
                break;
            case 'parsed_parser':
                echo 'Парсер: ' . $item[0] . '<br>';
                break;
        }
    }