<?php

/*
 * Class shopCallbPluginBackendActions
 * @author Max Severin <makc.severin@gmail.com>
 */

class shopCallbPluginBackendActions extends waViewActions {

    public function defaultAction() {	

        $model = new shopCallbPluginRequestModel();
        $callb_requests = $model->order('id DESC')->fetchAll();
        
        $this->view->assign('callb_requests', $callb_requests);

        $this->setLayout(new shopCallbPluginBackendLayout());

    }

}