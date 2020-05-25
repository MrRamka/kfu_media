<?php
/**
 * @var $value
 */

?>
<input
        type="text"
        name="<?= $value['option'] ?>"
        id="<?= $value['option'] ?>"
        value="<?= esc_attr(get_option($value['option'])) ?>">