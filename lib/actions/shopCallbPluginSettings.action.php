<?php

/*
 * @author Max Severin <makc.severin@gmail.com>
 */

class shopCallbPluginSettingsAction extends waViewAction {

    public function execute() {

        $app_settings_model = new waAppSettingsModel();
        $settings = $app_settings_model->get(array('shop', 'callb'));
        $this->view->assign('settings', $settings);

    }

}