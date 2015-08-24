<?php

/**
 * @author Max Severin <makc.severin@gmail.com>
 */
$model = new waModel();

$model->query("UPDATE `shop_callb_request` SET `status` = 'done' WHERE `status` = 'del'");

try {
    $model->query("SELECT `url` FROM `shop_callb_request` WHERE 0");
} catch (waDbException $e) {
    $model->exec("ALTER TABLE `shop_callb_request` ADD `url` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL");
}

