<?php
return array(
    'status' => array(
        'title'        => 'Статус плагина',
        // 'description'  => '',
        'value'        => 'off',
        'control_type' => waHtmlControl::SELECT,
        'options'      => array(
            'off'   => 'Выключен',
            'on' => 'Включен',
        ),
        // 'options'      => array(
        //     array (
        //         'title'       => 'Выключен',
        //         'description' => 'Отключите плагин',
        //         'value'       => '0',
        //     ),
        //     array (
        //         'title'       => 'Включен',
        //         'description' => 'Включите плагин',
        //         'value'       => '1',
        //     ),
        // ),
    ),
    'email_of_sender' => array(
        'title'        => 'E-mail отправителя',
        'description'  => 'С этого адреса будут отправляться сообщения',
        'value'        => '',
        'control_type' => waHtmlControl::INPUT,
    ),
    'email_of_recipient' => array(
        'title'        => 'E-mail получателя',
        'description'  => 'На этот адрес придут сообщения',
        'value'        => '',
        'control_type' => waHtmlControl::INPUT,
    ),
    'id_in_html' => array(
        'title'        => 'Идентификатор или класс кнопки на странице',
        'description'  => 'При клике на данный элемент будет открываться окно обратного звонка<br />Должно быть вида <b>#callB</b> или <b>.callB</b>',
        'value'        => '',
        'control_type' => waHtmlControl::INPUT,
    ),

    'text_header_title' => array(
        'title'        => 'Текст заголовка',
        // 'description'  => '',
        'value'        => 'Обратный звонок',
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_name_placeholder' => array(
        'title'        => 'Текст подсказки для поля «Имя»',
        // 'description'  => '',
        'value'        => 'Ваше Имя',
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_phone_placeholder' => array(
        'title'        => 'Текст подсказки для поля «Телефон»',
        // 'description'  => '',
        'value'        => 'Ваш Телефон',
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_submit_button' => array(
        'title'        => 'Текст кнопки «Отправить»',
        // 'description'  => '',
        'value'        => 'Отправить',
        'control_type' => waHtmlControl::INPUT,
    ),

    'style_form_width' => array(
        'title'        => 'Ширина окна формы (px)<br />Интервал значений 320-600',
        // 'description'  => '',
        'value'        => '400',
        'control_type' => waHtmlControl::INTERVAL,
        'options'      => array(
            'from'   => '320',
            'to' => '600',
        ),
    ),
    'style_form_height' => array(
        'title'        => 'Высота окна формы (px)<br />Интервал значений 240-400',
        // 'description'  => '',
        'value'        => '300',
        'control_type' => waHtmlControl::INTERVAL,
        'options'      => array(
            'from'   => '240',
            'to' => '400',
        ),
    ),
    'style_form_background' => array(
        'title'        => 'Цвет фона формы (HEX)',
        // 'description'  => '',
        'value'        => 'ffffff',
        'control_type' => waHtmlControl::INPUT,
    ),

    'style_header_background' => array(
        'title'        => 'Цвет фона заголовка (HEX)',
        // 'description'  => '',
        'value'        => '21a6de',
        'control_type' => waHtmlControl::INPUT,
    ),
    'style_header_text_color' => array(
        'title'        => 'Цвет текста заголовка (HEX)',
        // 'description'  => '',
        'value'        => 'ffffff',
        'control_type' => waHtmlControl::INPUT,
    ),

    'style_submit_width' => array(
        'title'        => 'Ширина кнопки «Отправить» (px)<br />Интервал значений 100-600',
        // 'description'  => '',
        'value'        => '300',
        'control_type' => waHtmlControl::INTERVAL,
        'options'      => array(
            'from'   => '100',
            'to' => '600',
        ),
    ),
    'style_submit_height' => array(
        'title'        => 'Высота кнопки «Отправить» (px)<br />Интервал значений 24-160',
        // 'description'  => '',
        'value'        => '34',
        'control_type' => waHtmlControl::INTERVAL,
        'options'      => array(
            'from'   => '24',
            'to' => '160',
        ),
    ),
    'style_submit_background' => array(
        'title'        => 'Цвет фона кнопки «Отправить» (HEX)',
        // 'description'  => '',
        'value'        => '21a6de',
        'control_type' => waHtmlControl::INPUT,
    ),
    'style_submit_hover_background' => array(
        'title'        => 'Цвет фона кнопки «Отправить» при наведении курсора (HEX)',
        // 'description'  => '',
        'value'        => '1690f4',
        'control_type' => waHtmlControl::INPUT,
    ),
    'style_submit_text_color' => array(
        'title'        => 'Цвет текста кнопки «Отправить» (HEX)',
        // 'description'  => '',
        'value'        => 'ffffff',
        'control_type' => waHtmlControl::INPUT,
    ),

);