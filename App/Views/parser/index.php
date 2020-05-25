<?php
/**
 * @var $parsers array
 */
?>
<h1><?= $this->title ?></h1>
<div class="parsers">
    <div class="parser">
        <a href="#" class="btn parser-add-button">Добавить</a>
        <div class="parser-expanded">
            <form action="/parser/save" method="post">
                <div class="parser-message"></div>
                <div class="input-checkbox">
                    <input class="checkbox" id="parser_enabled"
                           type="checkbox" name="parser[enabled]">
                    <label for="parser_enabled">Включен</label>
                </div>
                <div class="input-checkbox">
                    <input class="checkbox" id="parser_update"
                           type="checkbox" name="parser[auto_update]">
                    <label for="parser_update">Автообновление</label>
                </div>
                <div class="input">
                    <label for="parser_name">Название</label>
                    <input type="text" id="parser_name" name="parser[name]">
                </div>
                <div class="input">
                    <label for="parser_alias">Псевдоним</label>
                    <input type="text" id="parser_alias" name="parser[alias]">
                </div>
                <div class="input">
                    <label for="parser_namespace">Класс</label>
                    <input type="text" id="parser_namespace" name="parser[namespace]">
                </div>
                <div class="input">
                    <label for="parser_namespace_article">Класс для статьи</label>
                    <input type="text" id="parser_namespace_article" name="parser[namespace_article]">
                </div>
                <div class="input-button">
                    <input type="submit" class="btn" value="Сохранить">
                </div>
            </form>
        </div>
    </div>
    <?php if (!empty($parsers)): ?>
        <?php foreach ($parsers as $parser): ?>
            <div class="parser">
                <div class="parser-info">
                    <span class="parser-name"><?= $parser['name'] ?></span>
                    <span class="parser-alias"><?= $parser['alias'] ?></span>
                    <span class="parser-enabled <?= $parser['enabled'] ? 'enabled' : 'disabled' ?>"><?= $parser['enabled'] ? 'Включен' : 'Отключен' ?></span>
                </div>
                <div class="parser-expand">
                    <a href="#"></a>
                </div>
                <div class="parser-expanded">
                    <form action="/parser/save" method="post">
                        <div class="parser-message"></div>
                        <input type="hidden" name="parser[id]" value="<?= $parser['id'] ?>">
                        <div class="input-checkbox">
                            <input class="checkbox" id="parser_enabled_<?= $parser['id'] ?>"
                                   type="checkbox" <?= $parser['enabled'] ? 'checked' : '' ?> name="parser[enabled]">
                            <label for="parser_enabled_<?= $parser['id'] ?>">Включен</label>
                        </div>
                        <div class="input-checkbox">
                            <input class="checkbox" id="parser_update_<?= $parser['id'] ?>"
                                   type="checkbox" <?= $parser['auto_update'] ? 'checked' : '' ?>
                                   name="parser[auto_update]">
                            <label for="parser_update_<?= $parser['id'] ?>">Автообновление</label>
                        </div>
                        <div class="input">
                            <label for="parser_name_<?= $parser['id'] ?>">Название</label>
                            <input type="text" id="parser_name_<?= $parser['id'] ?>" name="parser[name]"
                                   value="<?= $parser['name'] ?>">
                        </div>
                        <div class="input">
                            <label for="parser_alias_<?= $parser['id'] ?>">Псевдоним</label>
                            <input type="text" id="parser_alias_<?= $parser['id'] ?>" name="parser[alias]"
                                   value="<?= $parser['alias'] ?>">
                        </div>
                        <div class="input">
                            <label for="parser_namespace_<?= $parser['id'] ?>">Класс</label>
                            <input type="text" id="parser_namespace_<?= $parser['id'] ?>" name="parser[namespace]"
                                   value="<?= $parser['namespace'] ?>">
                        </div>
                        <div class="input">
                            <label for="parser_namespace_article_<?= $parser['id'] ?>">Класс для статьи</label>
                            <input type="text" id="parser_namespace_article_<?= $parser['id'] ?>" name="parser[namespace_article]"
                                   value="<?= $parser['namespace_article'] ?>">
                        </div>
                        <div class="input-button clear">
                            <input type="submit" class="btn float-left" value="Сохранить">
                            <div class="float-right">
                                <a href="/parser/delete?id=<?= $parser['id'] ?>"
                                   class="btn btn-danger parser-delete">Удалить</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>