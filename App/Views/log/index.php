<?php
/**
 * @var $this \App\Action
 * @var $logs array
 * @var $pager array
 */
?>
    <h1><?= $this->title ?></h1>
    <div>Показано <?= $logs['pager']['limit'] <= $logs['count'] ? $logs['pager']['limit'] : $logs['count'] ?> из <?= $logs['count'] ?></div>
    <table class="logs">
        <thead>
        <tr>
            <th>ID</th>
            <th>Уровень</th>
            <th>Дата</th>
            <th>Текст</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($logs['count'] > 0) : foreach ($logs['data'] as $log): ?>
            <tr>
                <td>
                    <?= $log['id'] ?>
                </td>
                <td>
                    <?= \App\Logger\Logger::levelStyled($log['level']) ?>
                </td>
                <td>
                    <?= $log['datetime'] ?>
                </td>
                <td>
                    <?= $log['message'] ?>
                </td>
            </tr>
        <?php endforeach; else : ?>
            <tr>
                <td colspan="4">Данных нет</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
<?php if ($logs['count'] > 0): ?>
    <?php $this->renderPartial('pager', ['pager' => $logs['pager']]); ?>
<?php endif; ?>