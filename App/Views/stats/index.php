<?php

/**
 * @var $this \App\Actions\stats\MainAction
 * @var $stats array
 * @var $pager array
 * @var $parserCount array
 * @var $parserNames array
 */

?>
<h1><?= $this->title ?></h1>
<?php if (!empty($parserCount)) ?>
<table>
    <thead>
    <tr>
        <th>Парсер</th>
        <th>Новых статей</th>
        <th>Обновленных статей</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($parserCount as $alias => $item) : ?>
        <tr>
            <td><?= $parserNames[$alias] ?></td>
            <td><?= $item['new'] ?? 0 ?> (+<?= $item['new_today'] ?? 0 ?> за сегодня)</td>
            <td><?= $item['update'] ?? 0 ?> (+<?= $item['update_today'] ?? 0 ?> за сегодня)</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<h1>Выгрузки</h1>
<?php if (!empty($stats['data'])) : ?>

    <div>Показано <?= $stats['pager']['limit'] <= $stats['count'] ? $stats['pager']['limit'] : $stats['count'] ?> из <?= $stats['count'] ?></div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Парсер</th>
            <th>Дата</th>
            <th>Тип загрузки</th>
            <th>Ссылка</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($stats['data'] as $stat) : ?>
            <tr>
                <td><?= $stat['id'] ?></td>
                <td><?= $parserNames[$stat['parser_alias']] ?></td>
                <td><?= $stat['datetime'] ?></td>
                <td><?= $stat['status'] ? 'Новая статья' : 'Обновление статьи' ?></td>
                <td><a href="<?= $stat['link'] ?>"><?= $stat['link'] ?></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php $this->renderPartial('pager', ['pager' => $stats['pager']]); ?>
<?php endif; ?>
