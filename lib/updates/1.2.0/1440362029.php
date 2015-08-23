<?php

/**
 * @author Max Severin <makc.severin@gmail.com>
 */
$model = new waModel();

$model->query("UPDATE `shop_callb_request` SET `status` = 'done' WHERE `status` = 'del'");