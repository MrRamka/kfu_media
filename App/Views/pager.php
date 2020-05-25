<?php
/**
 * @var $pager
 */


$query = $_GET;
$action = $query['path'];
unset($query['path']);
unset($query['page']);
?>
<div class="pager">
    <?php if ($pager['page'] > 1): ?>
        <a href="/<?= $action ?>?<?= http_build_query(array_merge($query, ['page' => 1])) ?>">&laquo;&laquo; Первая</a>
        <a href="/<?= $action ?>?<?= http_build_query(array_merge($query, ['page' => $pager['page'] - 1])) ?>">&laquo; Предыдущая</a>
    <?php endif; ?>
    <input type="text" name="page" class="pager-input" data-action="/<?= $action ?>?<?= http_build_query($query) ?>"
           value="<?= $pager['page'] ?>"> из <?= $pager['maxPage'] ?>
    <?php if ($pager['page'] < $pager['maxPage']): ?>
        <a href="/<?= $action ?>?<?= http_build_query(array_merge($query, ['page' => $pager['page'] + 1])) ?>">Следующая &raquo;</a>
        <a href="/<?= $action ?>?<?= http_build_query(array_merge($query, ['page' => $pager['maxPage']])) ?>">Последняя &raquo;&raquo;</a>
    <?php endif; ?>
</div>