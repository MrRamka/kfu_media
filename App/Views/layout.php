<?php

use App\Action;

/**
 * @var $this Action
 * @var $content
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<header class="main-header">
    <div class="logo">
        <a href="/">MediaParsers</a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a <?= Action::navActiveClass('parser') ?> href="/parser">Парсеры</a></li>
            <li><a <?= Action::navActiveClass('stats') ?> href="/stats">Статистика</a></li>
            <li><a <?= Action::navActiveClass('log') ?> href="/log">Логи</a></li>
            <li><a <?= Action::navActiveClass('settings') ?> href="/settings">Настройки</a></li>
            <li><a href="/process">Выгрузить</a></li>
        </ul>
    </nav>
</header>
<div class="content">
    <?= $content ?>
</div>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/main.js"></script>
</body>
</html>