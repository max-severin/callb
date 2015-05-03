<?php

/*
 * @author Max Severin <makc.severin@gmail.com>
 */

class shopCallbPluginSettingsAction extends shopPluginsSettingsAction {

    public function execute() {

    	$_GET['id'] = 'callb';
        parent::execute();

    }

}