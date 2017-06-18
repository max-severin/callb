<?php

/**
 * @author Max Severin <makc.severin@gmail.com>
 */
$plugin_id = array('shop', 'callb');

$app_settings_model = new waAppSettingsModel();

$app_settings_model->set($plugin_id, 'privacy_status', 'off');
$app_settings_model->set($plugin_id, 'privacy_text', '');
$app_settings_model->set($plugin_id, 'privacy_link_text', '');
$app_settings_model->set($plugin_id, 'privacy_link_url', '/site/privacy-policy/');
$app_settings_model->set($plugin_id, 'privacy_checkbox_status', 'on');
$app_settings_model->set($plugin_id, 'privacy_checkbox_checked', 'unchecked');