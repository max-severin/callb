<?php

/*
 * @author Max Severin <makc.severin@gmail.com>
 */
return array(
    'status' => array(
        'title'        => _wp('Status'),
        'value'        => 'off',
        'control_type' => waHtmlControl::SELECT,
        'options'      => array(
            'off' => _wp('Off'),
            'on'  => _wp('On'),
        ),
    ),
    'show_deleted' => array(
        'title'        => _wp('Display deleted requests'),
        'description'  => _wp('When you enable this setting,<br />deleted requests will be displayed in the history of user requests.'),
        'value'        => 'off',
        'control_type' => waHtmlControl::SELECT,
        'options'      => array(
            'off' => _wp('No'),
            'on'  => _wp('Yes'),
        ),
    ),
    'email_of_sender' => array(
        'title'        => _wp('Sender e-mail'),
        'description'  => _wp('This email address will be listed as the return address of the message.<br />If the address is not specified, it will use the general email of the shop.'),
        'placeholder'  => 'noreply@email',
        'value'        => '',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingEmailControl',
    ),
    'email_of_recipient' => array(
        'title'        => _wp('Recipient e-mail'),
        'description'  => _wp('The address to which to send messages.<br />If the address is not specified, it will use the general email of the shop.'),
        'placeholder'  => 'your@email',
        'value'        => '',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingEmailControl',
    ),
    'id_in_html' => array(
        'title'        => _wp('Selector of the button of callback form'),
        'description'  => _wp('Specify the ID or class of the html element,<br />when clicking on which will open a form of callback.<br />Must be like «<b>#call-back-button</b>» or «<b>.call-back-button</b>».'),
        'placeholder'  => '#call-back-button',
        'value'        => '#call-back-button',
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_header_title' => array(
        'title'        => _wp('Header text'),
        'placeholder'  => _wp('Callback'),
        'value'        => _wp('Callback'),
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_name_placeholder' => array(
        'title'        => _wp('«Name» field placeholder'),
        'placeholder'  => _wp('Your Name'),
        'value'        => _wp('Your Name'),
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_phone_placeholder' => array(
        'title'        => _wp('«Phone» field placeholder'),
        'placeholder'  => _wp('Your Phone'),
        'value'        => _wp('Your Phone'),
        'control_type' => waHtmlControl::INPUT,
    ),
    'text_submit_button' => array(
        'title'        => _wp('«Send» button text'),
        'placeholder'  => _wp('Send'),
        'value'        => _wp('Send'),
        'control_type' => waHtmlControl::INPUT,
    ),
    'style_form_width' => array(
        'title'        => _wp('Form width (px)'),
        'description'  => _wp('Value range 320-600'),
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
        'title'        => _wp('Form height (px)'),
        'description'  => _wp('Value range 240-400'),
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
        'title'        => _wp('Form background color (HEX)'),
        'class'        => 's-color',
        'placeholder'  => 'ffffff',
        'value'        => 'ffffff',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingColorControl',
    ),
    'style_header_background' => array(
        'title'        => _wp('Header background color (HEX)'),
        'class'        => 's-color',
        'placeholder'  => '21a6de',
        'value'        => '21a6de',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingColorControl',
    ),
    'style_header_text_color' => array(
        'title'        => _wp('Header text color (HEX)'),
        'class'        => 's-color',
        'placeholder'  => 'ffffff',
        'value'        => 'ffffff',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingColorControl',
    ),
    'style_submit_width' => array(
        'title'        => _wp('«Send» button width (px)'),
        'description'  => _wp('Value range 100-600'),
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
        'title'        => _wp('«Send» button height (px)'),
        'description'  => _wp('Value range 24-160'),
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
        'title'        => _wp('«Send» button background color (HEX)'),
        'class'        => 's-color',
        'placeholder'  => '21a6de',
        'value'        => '21a6de',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingColorControl',
    ),
    'style_submit_text_color' => array(
        'title'        => _wp('«Send» button text color (HEX)'),
        'class'        => 's-color',
        'placeholder'  => 'ffffff',
        'value'        => 'ffffff',
        'control_type' => waHtmlControl::CUSTOM.' '.'shopCallbPlugin::settingColorControl',
    ),
);