<?php

/*
 * @author Max Severin <makc.severin@gmail.com>
 */

class shopCallbPluginSettingsAction extends shopPluginsSettingsAction {

    public function execute() {

    	$_GET['id'] = 'callb';

    	$app_settings_model = new waAppSettingsModel();
        $settings = $app_settings_model->get(array('shop', 'callb'));

        $view = wa()->getView(); 
        $view->assign('callb_settings', $settings);
    	$view->assign('callback_url', wa()->getRouteUrl('shop/frontend/callback/'));

        parent::execute();

    }

}