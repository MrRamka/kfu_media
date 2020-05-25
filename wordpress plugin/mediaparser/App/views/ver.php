<?php
/**
 * @var $versions
 * @var $meta
 * @var $post
 */
if (isset($meta['parsed_parser']) && isset($meta['parsed_url'])) : $token = get_option('mediaparser_token'); ?>
    <div>
        <a class="mediaparser-get-version"
           href="#getVer"
           data-token="<?= $token ?>"
           data-link="<?= get_option('mediaparser_domain') ?>/process/article?link=<?= $meta['parsed_url'][0] ?>&parser=<?= $meta['parsed_parser'][0] ?>&token=<?= $token ?>">
            Запросить новую версию
        </a>
    </div>
    <div id="getVer" class="modal">

    </div>
<?php
endif;
if (!empty($versions)) : $i = 0;
    foreach ($versions as $version) :
        $version = sanitize_post($version, 'db');
        ?>
        <div>
            <a href="#ver<?= $i ?>" rel="modal:open"
               class="mediaparser-new-link">Версия от <?= date('d.m.Y H:i:s', $version['datetime']) ?></a>
        </div>
        <div class="modal" id="ver<?= $i ?>">
            <a class="mediaparser-publish-link components-button is-primary"
               href="/?mediaparser_path=post/publish&id=<?= $version['id'] ?>&token=<?= $token ?>"">Опубликовать</a>
            <?= wp_text_diff($post->post_content, $version['post_content']) ?>
        </div>
        <?php $i++; endforeach;
else :
    echo 'Новых версий нет';
endif;