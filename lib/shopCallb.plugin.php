<?php

/*
 * Class shopCallbPlugin
 * Plugin allows users in the frontend to make requests for a call back,
 * backend users can customize the callback form and view the requests
 * @author Max Severin <makc.severin@gmail.com>
 */
class shopCallbPlugin extends shopPlugin {
    
    /**
     * Handler for backend_menu event: add callback button in backend menu tabs
     * @return array
     */
    public function backendMenu() {
        $html = '';

        if ($this->getSettings('status') === 'on') {
            $html = '<li ' . (waRequest::get('plugin') == $this->id ? 'class="selected"' : 'class="no-tab"') . '>
                        <a href="?plugin=callb">Обратный звонок</a>
                    </li>';
        }

        return array('core_li' => $html);
    }
    
    /**
     * Handler for frontend_head event: add callbFrontend module in frontend head section
     * @return string
     */
    public function frontendHeader() {
        $view = wa()->getView();
        $view->assign('callb_settings', $this->getSettings());
    	$view->assign('callback_url', wa()->getRouteUrl('shop/frontend/callback/'));
        $html = $view->fetch($this->path.'/templates/Frontend.html');

        return $html;
    }

    /**
     * Generates the HTML code for the user control with ID settingNumberControl for number parametrs
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
     * Generates the HTML code for the user control with ID settingColorControl for color parametrs
     * @param string $name
     * @param array $params
     * @return string
     */
    static public function settingColorControl($name, $params = array()) {
        $control = '';

        $control_name = htmlentities($name, ENT_QUOTES, 'utf-8');
        
        $control .= "<input id=\"{$params['id']}\" type=\"text\" name=\"{$control_name}\" ";
        $control .= self::addCustomParams(array('class', 'placeholder', 'value',), $params);
        $control .= ">";
        if (isset($params['value']) && !empty($params['value'])) {
            $control .= "<span class=\"s-color-replacer\">";
            $control .= "<i class=\"icon16 color\" style=\"background: #{$params['value']};\"></i>";
            $control .= "</span>";
        }
        $control .= "<div class=\"s-colorpicker\"></div>";

        return $control;
    }

    /**
     * Generates the HTML parts of code for the params in user controls added by plugin
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