<?php

/*
 * Class shopCallbPluginSettingsAction
 * @author Max Severin <makc.severin@gmail.com>
 */
class shopCallbPluginSettingsAction extends shopPluginsSettingsAction {

    public function execute() {
    	$_GET['id'] = 'callb';

    	$app_settings_model = new waAppSettingsModel();
        $settings = $app_settings_model->get(array('shop', 'callb'));

        foreach ($settings as $id => $setting) {
        	$settings[$id] = addslashes(htmlspecialchars($setting));
        }

        $view = wa()->getView(); 
        $view->assign('callb_settings', $settings);
    	$view->assign('callback_url', wa()->getRouteUrl('shop/frontend/callback/'));

        parent::execute();
    }

}