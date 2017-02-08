<?php
    /* @var string $type [optional] tipo de panel (default, primary...) */
    /* @var string $title [optional] si esta seteado define el título del panel */
    /* @var string $footer [optional] */
    /* @var string $content contenido del panel */
    /* @var boolean $body */

    /* @var array $types los tipos de paneles posibles */
    $types = ['default', 'primary', 'success', 'info', 'warning', 'danger'];

    $type = (isset($type) && in_array($type, $types)) ? $type : 'default';
    $body = (isset($body) && is_bool($body)) ? $body : true;
?>
<div class="panel panel-<?= $type ?>">
    <?php if(isset($title)) { ?>
        <div class="panel-heading">
            <p class="panel-title"><?= $title ?></p>
        </div>
    <?php } ?>
    <?php if($body === true) { ?>
        <div class="panel-body">
            <?= $content ?>
        </div>
    <?php } else { ?>
        <?= $content ?>
    <?php } ?>
    <?php if(isset($footer)) { ?>
        <div class="panel-footer">
            <?= $footer ?>
        </div>
    <?php } ?>
</div>