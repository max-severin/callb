<?php

/*
 * @author Max Severin <makc.severin@gmail.com>
 */

class shopCallbPlugin extends shopPlugin {	

    public function frontendHeader() {           

        $app_settings_model = new waAppSettingsModel();
        $settings = $app_settings_model->get(array('shop', 'callb'));

        $view = wa()->getView(); 
        $view->assign('call_b_settings', $settings);
    	$view->assign('callback_url', wa()->getRouteUrl('shop/frontend/callback/'));
        $html = $view->fetch($this->path.'/templates/Frontend.html');

        return $html;        

    }

    // public function settingCustomControl() {           

    //     //       

    // }

}