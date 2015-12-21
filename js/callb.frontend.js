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
		$("body").css({ "overflow": "auto" });
	};
	//--------------------- END DOM METHODS -----------------------

	//------------------- BEGIN EVENT HANDLERS --------------------
	onIdinhtmlClick = function (event) {
		event.preventDefault();

		removeCallbForm();

		var bg = $('<div/>');
		var form = $('<form />');
		var formTop = $(document).scrollTop() + $(window).height()/2 - '{$callb_settings.style_form_height}'/2;
		var callbCommentStatus = "{if isset($callb_settings.comment_status)}{$callb_settings.comment_status}{/if}";

		$("body").css({ "overflow": "hidden" });

		bg.addClass('call-b-bg').css('height', ($(document).height())+'px');
		form.addClass('call-b-form').css({
			'background': '#{$callb_settings.style_form_background}',
			'height': '{$callb_settings.style_form_height}px',
			'width': '{$callb_settings.style_form_width}px',
			'top' : formTop+'px'
		}).prepend(
			'<div class="call-b-header" style="background: #{$callb_settings.style_header_background}; color: #{$callb_settings.style_header_text_color};">{$callb_settings.text_header_title}<span id="call-b-close-x">x</span></div>' +
			'<div class="call-b-input"><input type="text" name="callb-name" placeholder="{$callb_settings.text_name_placeholder}" value="" /></div>' +
			'<div class="call-b-input"><input type="text" name="callb-phone" placeholder="{$callb_settings.text_phone_placeholder}" value="" /></div>' +
            '<div class="call-b-input"><textarea name="comment" placeholder="{$callb_settings.text_comment_placeholder}"></textarea></div>' +
			'<div class="call-b-input"><input id="call-b-submit" type="submit" value="{$callb_settings.text_submit_button}" style="background: #{$callb_settings.style_submit_background}; color: #{$callb_settings.style_submit_text_color}; height: {$callb_settings.style_submit_height}px; width: {$callb_settings.style_submit_width}px" /></div>'
		);

		$('body').prepend(form).prepend(bg);

		$('.call-b-form input[name="callb-name"]').focus();

		{if isset($callb_settings.phone_masked_input) && strlen($callb_settings.phone_masked_input) > 0}
		$('.call-b-form input[name="callb-phone"]').mask('{$callb_settings.phone_masked_input}');
		{/if}

        if (callbCommentStatus !== 'on') {
            $('textarea[name="comment"]').parent('.call-b-input').hide();
        }
	};

	onFormSubmit = function (event) {
		event.preventDefault();

		var n = $('.call-b-input').find('input[name="callb-name"]').val();
		var p = $('.call-b-input').find('input[name="callb-phone"]').val();
		var c = $('.call-b-input').find('textarea[name="comment"]').val();
		var err = $('<div/>');
		var currentUrl = window.location.href;

		$('.call-b-error').remove();
		$('.call-b-input').find('input[name="callb-name"], input[name="callb-phone"]').removeClass('call-b-inp-err');

		if ( n.length > 0 && p.length > 0 ) {
			$.post("{$callback_url}", { "name": n, "phone": p, "comment": c, "url": currentUrl }, function (response) {
				if (response.data.status === true) {
					$('.call-b-input').remove();
					$('.call-b-form').append(
						'<p class="call-b-ok" style="color: #{$callb_settings.style_thanks_text_color};">{$callb_settings.text_thanks_message} ' + response.data.name + ',</p>' +
						'<p class="call-b-ok" style="color: #{$callb_settings.style_thanks_text_color};">{$callb_settings.text_more_thanks_message}</p>' +
						'<div class="call-b-input"><input id="call-b-close" type="button" value=\"{_wp("Close")}\" style="background: #{$callb_settings.style_close_ok_background}; height: {$callb_settings.style_submit_height}px; width: {$callb_settings.style_submit_width}px;" /></div>'
					);
				} else {
					$('.call-b-input').remove();
					$('.call-b-form').append(
						'<p class="call-b-ok margins">{_wp("Error occurred when sending message")}</p>' +
						'<div class="call-b-input"><input class="call-b-close-error" id="call-b-close" type="button" value=\"{_wp("Close")}\" style="background: #{$callb_settings.style_close_error_background}; height: {$callb_settings.style_submit_height}px; width: {$callb_settings.style_submit_width}px;" /></div>'
					);
				}
			}, "json");
		} else {
			if ( !(n.length > 0) ) {
				$('.call-b-input').find('input[name="callb-name"]').focus();
			} else if ( !(p.length > 0) ) {
				$('.call-b-input').find('input[name="callb-phone"]').focus();
			}
			if ( !(n.length > 0) ) {
				$('.call-b-input').find('input[name="callb-name"]').addClass('call-b-inp-err');
			}
			if ( !(p.length > 0) ) {
				$('.call-b-input').find('input[name="callb-phone"]').addClass('call-b-inp-err');
			}
			err.addClass('call-b-error').text("{_wp('Complete «Name» and «Phone»')}");
			$('.call-b-form').append( err );
		}
	};
	//------------------- END EVENT HANDLERS ----------------------

	//------------------- BEGIN PUBLIC METHODS --------------------
	initModule = function () {		
		$(document).on('click', '{$callb_settings.id_in_html}', onIdinhtmlClick);

		$(document).on('click', '.call-b-bg, #call-b-close-x, #call-b-close', removeCallbForm);

		$(document).keyup(function(event) {
			if (event.keyCode == 27) { // close callb form when esc key is pressed
				removeCallbForm();
			}
		});

		$(document).on('submit', '.call-b-form', onFormSubmit);
	};

	return {
		initModule: initModule
	};
	//------------------- END PUBLIC METHODS ----------------------
}());