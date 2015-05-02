<?php

/*
 * @author Max Severin <makc.severin@gmail.com>
 */

class shopCallbPluginFrontendCallbackController extends waJsonController
{
    public function execute() {

        $app_settings_model = new waAppSettingsModel();
        $settings = $app_settings_model->get(array('shop', 'callb'));

        $name = waRequest::post('name', '', 'str');
        $phone = waRequest::post('phone', '', 'str');

        if ( $settings['status'] && $settings['mail'] && $name && $phone ) {

            $subject = 'Обратный звонок';
            $body = "<h1>Добрый день!</h1>";
            $body .= "<p>Пользователь <b>" . $name ."</b> заказал звонок на телефон <b>" . $phone . "</b></p>";

            $mail_message = new waMailMessage($subject, $body);
            $mail_message->setFrom($settings['mail'], 'плагин Обратный звонок');
            $mail_message->setTo($settings['mail'], 'Администратор');

            $mail_message->send();

            $this->response = true;

        }

    }   
}