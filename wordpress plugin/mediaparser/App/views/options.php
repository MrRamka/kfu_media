<div class="wrap">
    <h2><?= get_admin_page_title() ?></h2>

    <form action="options.php" method="POST">
        <?php
        settings_fields('mediaparser_group');
        do_settings_sections('mediaparser_page');
        submit_button();
        ?>
    </form>
</div>