/**
 * callb.frontend.js
 * Module callbFrontend
 */

/*global $, callbFrontend */

var callbFrontend = (function () { "use strict";
	//---------------- BEGIN MODULE SCOPE VARIABLES ---------------
	var
		onIdinhtmlClick, removeCallbForm, onFormSubmit, initModule;
	//----------------- END MODULE SCOPE VARIABLES ----------------

	//--------------------- BEGIN DOM METHODS ---------------------
	removeCallbForm = function () {
		$('.call-b-bg, .call-b-form').remove();
	};
	//--------------------- END DOM METHODS -----------------------

	//------------------- BEGIN EVENT HANDLERS --------------------
	onIdinhtmlClick = function (event) {
		event.preventDefault();

		removeCallbForm();

		var bg = $('<div/>');
		var form = $('<div/>');

		bg.addClass('call-b-bg').css('height', ($(document).height())+'px');
		form.addClass('call-b-form').css({
			'background': '#{$callb_settings.style_form_background}',
			'height': '{$callb_settings.style_form_height}px',
			'width': '{$callb_settings.style_form_width}px'
		}).prepend(
			'<div class="call-b-header" style="background: #{$callb_settings.style_header_background}; color: #{$callb_settings.style_header_text_color};">{$callb_settings.text_header_title}</div>' +
			'<div class="call-b-input"><input type="text" name="name" placeholder="{$callb_settings.text_name_placeholder}" value="" /></div>' +
			'<div class="call-b-input"><input type="text" name="phone" placeholder="{$callb_settings.text_phone_placeholder}" value="" /></div>' +
			'<div class="call-b-input"><input id="call-b-submit" type="submit" value="{$callb_settings.text_submit_button}" style="background: #{$callb_settings.style_submit_background}; color: #{$callb_settings.style_submit_text_color}; height: {$callb_settings.style_submit_height}px; width: {$callb_settings.style_submit_width}px" /></div>'
		);

		$('body').prepend(form).prepend(bg);
	};

	onFormSubmit = function (event) {
		var n = $('.call-b-input').find('input[name="name"]').val();
		var p = $('.call-b-input').find('input[name="phone"]').val();
		var err = $('<div/>');

		$('.call-b-error').remove();
		$('.call-b-input').find('input[name="name"], input[name="phone"]').removeClass('call-b-inp-err');

		if ( n.length > 0 && p.length > 0 ) {
			$.post("{$callback_url}", { "name": n, "phone": p }, function (response) {
				if (response.data === true) {
					$('.call-b-input').remove();
					$('.call-b-form').append(
						'<p class="call-b-ok">Спасибо ' + n + ',</p>' +
						'<p class="call-b-ok">Ваше сообщение отправлено!</p>' +
						'<div class="call-b-input"><input id="call-b-close" type="button" value="Закрыть" style="height: {$callb_settings.style_submit_height}px; width: {$callb_settings.style_submit_width}px;" /></div>'
					);
				}
			}, "json");
		} else {
			if ( !(n.length > 0) ) {
				$('.call-b-input').find('input[name="name"]').focus();
			} else if ( !(p.length > 0) ) {
				$('.call-b-input').find('input[name="phone"]').focus();
			}
			if ( !(n.length > 0) ) {
				$('.call-b-input').find('input[name="name"]').addClass('call-b-inp-err');
			}
			if ( !(p.length > 0) ) {
				$('.call-b-input').find('input[name="phone"]').addClass('call-b-inp-err');
			}
			err.addClass('call-b-error').text('Заполните "Имя" и "Телефон"');
			$('.call-b-form').append( err );
		}
	};
	//------------------- END EVENT HANDLERS ----------------------

	//------------------- BEGIN PUBLIC METHODS --------------------
	initModule = function () {		
		$(document).on('click', '{$callb_settings.id_in_html}', onIdinhtmlClick);

		$(document).on('click', '.call-b-bg, #call-b-close', removeCallbForm);

		$(document).on('click', '#call-b-submit', onFormSubmit);
	};

	return {
		initModule: initModule
	};
	//------------------- END PUBLIC METHODS ----------------------
}());