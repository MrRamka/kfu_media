<?php
/**
 * @var $flashes array
 */

if (!empty($flashes))
    foreach ($flashes as $key => $message) : ?>
        <div class="alert alert-<?= $key ?>"><?= $message ?></div>
    <?php endforeach;