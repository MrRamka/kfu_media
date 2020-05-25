<?php
/**
 * @var $settings array
 */
?>
<h1><?= $this->title ?></h1>
<div class="settings">
    <?php if (!empty($settings)): ?>
        <div>
            <a href="/settings/generate" class="btn generate-token">Сгенерировать новый токен</a>
        </div>
        <form action="/settings/save" method="post">
            <?php $this->renderFlashes(); ?>
            <?php foreach ($settings as $setting): ?>
                <div class="input">
                    <label for="<?= $setting['alias'] ?>"><?= $setting['name'] ?></label>
                    <input required type="text" name="setting[<?= $setting['alias'] ?>]"
                           value="<?= $setting['value'] ?>">
                </div>
            <?php endforeach; ?>
            <div class="input-button">
                <input type="submit" class="btn" value="Сохранить">
            </div>
        </form>
    <?php endif; ?>
</div>