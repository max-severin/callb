<?php

/*
 * Class shopCallbPluginFrontendCallbackController
 * @author Max Severin <makc.severin@gmail.com>
 */
class shopCallbPluginFrontendCallbackController extends waJsonController {

    public function execute() {
        $app_settings_model = new waAppSettingsModel();
        $settings = $app_settings_model->get(array('shop', 'callb'));

        $name = waRequest::post('name', '', 'str');
        $phone = waRequest::post('phone', '', 'str');

        if ( isset($settings['status']) && $settings['status'] === 'on' && !empty($name) && !empty($phone) ) {

            if (!$settings['email_of_sender']) { $settings['email_of_sender'] = wa('shop')->getConfig()->getGeneralSettings("email"); }
            if (!$settings['email_of_recipient']) { $settings['email_of_recipient'] = wa('shop')->getConfig()->getGeneralSettings("email"); }
            
            $subject = _wp('Callback');
            $body = "<h1>" . _wp('Good day!') . "</h1>";
            $body .= "<p>" . _wp('Customer') . " <b>" . htmlspecialchars($name) ."</b> " . _wp('ordered a callback') . " <b>" . htmlspecialchars($phone) . "</b></p>";

            $mail_message = new waMailMessage($subject, $body);
            $mail_message->setFrom($settings['email_of_sender'], _wp('Callback plugin'));
            $mail_message->setTo($settings['email_of_recipient'], _wp('Administrator'));

            if ($mail_message->send()) {

                $model = new shopCallbPluginRequestModel();
                $data = array(
                    'contact_id' => wa()->getUser()->getId(),
                    'create_datetime' => date('Y-m-d H:i:s'),
                    'name' => $name,  
                    'phone' => $phone,          
                    'status' => 'new',
                );

                $model->insert($data);

                $this->response = true;

            } else {

                $this->response = false;
                
            }

        } else {

            $this->response = false;

        }
    }  
     
}