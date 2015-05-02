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

    /**
     * 
     * @param string $name
     * @param array $params
     * @return string
     */
    static public function settingNumberControl($name, $params = array()) {

        $control = '';

        $control_name = htmlentities($name, ENT_QUOTES, 'utf-8');
        
        $control .= "<input id=\"{$params['id']}\" type=\"number\" name=\"{$control_name}\" ";
        $control .= self::addCustomParams(array('class', 'placeholder', 'value',), $params);
        $control .= self::addCustomParams(array('min', 'max', 'step',), $params['options']);
        $control .= ">";

        return $control;

    }

    /**
     *
     * @param array $list
     * @param array $params
     * @return string
     */
    private static function addCustomParams($list, $params = array()) {

        $params_string = '';

        foreach ($list as $param => $target) {
            if (is_int($param)) {
                $param = $target;
            }
            if (isset($params[$param])) {
                $param_value = $params[$param];
                if (is_array($param_value)) {
                    if (isset($param_value['title'])) {
                        $param_value = $param_value['title'];
                    } else {
                        $param_value = implode(' ', $param_value);
                    }
                }
                if ($param_value !== false) {
                    $param_value = htmlentities((string)$param_value, ENT_QUOTES, 'utf-8');
                    if (in_array($param, array('autofocus'))) {                    	
                        $params_string .= " {$target}";
                    } else {                    	
                        $params_string .= " {$target}=\"{$param_value}\"";
                    }
                }
            }
        }

        return $params_string;

    }

}