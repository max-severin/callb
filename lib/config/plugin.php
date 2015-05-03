<?php

/*
 * @author Max Severin <makc.severin@gmail.com>
 */

return array(
    'name' => 'Обратный звонок',
    'version' => '1.0.0',
    'img' => 'img/callb.png',
    // 'vendor' => MYID,
    'shop_settings' => true,
    'frontend' => true,
    'handlers' => array(
        'backend_menu'  => 'backendMenu',
        'frontend_head' => 'frontendHeader',
    ),
);