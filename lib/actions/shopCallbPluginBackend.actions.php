<?php

/*
 * Class shopCallbPluginBackendActions
 * @author Max Severin <makc.severin@gmail.com>
 */

class shopCallbPluginBackendActions extends waViewActions {

	protected $callb_request_limit = 10;

    public function defaultAction() {

    	$app_settings_model = new waAppSettingsModel();
        $settings = $app_settings_model->get(array('shop', 'callb'));

    	$limit = $this->callb_request_limit;
    	$page = waRequest::get('page', 1, 'int');
    	if ($page < 1) {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;

        $model = new shopCallbPluginRequestModel();
        $callb_requests = $model->getCallbRequests($offset, $limit, $settings['show_deleted']);
        $count = $model->countAll($settings['show_deleted']);

        $pages_count = ceil((float)$count / $limit);
        $this->view->assign('pages_count', $pages_count);

        $this->view->assign('callb_settings', $settings);
        $this->view->assign('callb_requests', $callb_requests);
        $this->view->assign('callb_requests_count', $count);
        
        $this->getResponse()->setTitle('Обратный звонок');

        $this->setLayout(new shopCallbPluginBackendLayout());

    }

}