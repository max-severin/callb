<?php

/*
 * @author Max Severin <makc.severin@gmail.com>
 */
return array(
    'status' => array(
        'title'        => 'Статус плагина',
        'value'        => 'off',
        'control_type' => waHtmlControl::SELECT,
        'options'      => array(
            'off' => 'Выключен',
            'on'  => 'Включен',
        ),
    ),
    'show_deleted' => array(
        'title'        => 'Отображение удаленных запросов',
        'description'  => 'При включении этого параметра<br> в истории запросов пользователей будут отображаться удаленные запросы.',
        'value'        => 'off',
        'control_type' => waHtmlControl::SELECT,
        'options'      => array(
            'off' => 'Нет',
            'on'  => 'Да',
        ),
    ),
    'email_of_sender' => array(
        'title'        => 'E-mail отправителя',
        'description'  => 'Этот электронный адрес будет указан в качестве обратного адреса у сообщений.<br />Если адрес не задан, будет использован основной email магазина.',
        'placeholder'  => 'noreply@email',
        'value'        => '',
        'control_type' => waHtmlControl::INPUT,
    ),
    'email_of_recipient' => array(
        'title'        => 'E-mail получателя',
        'description'  => 'Адрес, на который будут отправляться сообщения.<br />Если адрес не задан, будет использован основной email магазина.',
        'placeholder'  => 'your@email',
        'value'        => '',
        'control_type' => waHtmlControl::INPUT,
    ),
    'id_in_html' => array(
        'title'        => 'Селектор кнопки вызова формы',
        'description'  => 'Укажите идентификатор или класс html-элемента,<br />при клике на котором будет открываться окно с формой обратного звонка.<br />Должно быть вида «<b>#call-back-button</b>» или «<b>.call-back-button</b>».',
        'placeholder'  => '#call-back-button',
        'value'        => '#call-back-button',
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_header_title' => array(
        'title'        => 'Текст заголовка',
        'placeholder'  => 'Обратный звонок',
        'value'        => 'Обратный звонок',
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_name_placeholder' => array(
        'title'        => 'Текст подсказки для поля «Имя»',
        'placeholder'  => 'Ваше Имя',
        'value'        => 'Ваше Имя',
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_phone_placeholder' => array(
        'title'        => 'Текст подсказки для поля «Телефон»',
        'placeholder'  => 'Ваш Телефон',
        'value'        => 'Ваш Телефон',
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_submit_button' => array(
        'title'        => 'Текст кнопки «Отправить»',
        'placeholder'  => 'Отправить',
        'value'        => 'Отправить',
        'control_type' => waHtmlControl::INPUT,
    ),
    'style_form_width' => array(
        'title'        => 'Ширина окна формы (px)',
        'description'  => 'Диапазон значений 320-600',
        'placeholder'  => '400',
        'value'        => '400',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingNumberControl',
        'options'      => array(
            'min'  => '320',
            'max'  => '600',
            'step' => '1',
        ),
    ),
    'style_form_height' => array(
        'title'        => 'Высота окна формы (px)',
        'description'  => 'Диапазон значений 240-400',
        'placeholder'  => '300',
        'value'        => '300',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingNumberControl',
        'options'      => array(
            'min'  => '240',
            'max'  => '400',
            'step' => '1',
        ),
    ),
    'style_form_background' => array(
        'title'        => 'Цвет фона формы (HEX)',
        'class'        => 's-color',
        'placeholder'  => 'ffffff',
        'value'        => 'ffffff',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingColorControl',
    ),
    'style_header_background' => array(
        'title'        => 'Цвет фона заголовка (HEX)',
        'class'        => 's-color',
        'placeholder'  => '21a6de',
        'value'        => '21a6de',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingColorControl',
    ),
    'style_header_text_color' => array(
        'title'        => 'Цвет текста заголовка (HEX)',
        'class'        => 's-color',
        'placeholder'  => 'ffffff',
        'value'        => 'ffffff',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingColorControl',
    ),
    'style_submit_width' => array(
        'title'        => 'Ширина кнопки «Отправить» (px)',
        'description'  => 'Диапазон значений 100-600',
        'placeholder'  => '300',
        'value'        => '300',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingNumberControl',
        'options'      => array(
            'min'  => '100',
            'max'  => '600',
            'step' => '1',
        ),
    ),
    'style_submit_height' => array(
        'title'        => 'Высота кнопки «Отправить» (px)',
        'description'  => 'Диапазон значений 24-160',
        'placeholder'  => '34',
        'value'        => '34',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingNumberControl',
        'options'      => array(
            'min'  => '24',
            'max'  => '160',
            'step' => '1',
        ),
    ),
    'style_submit_background' => array(
        'title'        => 'Цвет фона кнопки «Отправить» (HEX)',
        'class'        => 's-color',
        'placeholder'  => '21a6de',
        'value'        => '21a6de',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingColorControl',
    ),
    'style_submit_text_color' => array(
        'title'        => 'Цвет текста кнопки «Отправить» (HEX)',
        'class'        => 's-color',
        'placeholder'  => 'ffffff',
        'value'        => 'ffffff',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingColorControl',
    ),
);