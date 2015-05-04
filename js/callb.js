$(document).ready(function(){

	$("{$callb_settings.id_in_html}").click(function(){
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

		return false;
	});

	$('.call-b-bg, #call-b-close').live('click', function(){
		$('.call-b-bg, .call-b-form').remove();
	});

	$('#call-b-submit').live('click', function(){
		var n = $('.call-b-input').find('input[name="name"]').val();
		var p = $('.call-b-input').find('input[name="phone"]').val();
		var err = $('<div/>');

		$('.call-b-error').remove();
		$('.call-b-input').find('input[name="name"], input[name="phone"]').removeClass('call-b-inp-err');

		if ( n.length > 0 && p.length > 0 ) {
			$.ajax({
				type: "POST",
				url: "{$callback_url}",
				data: "name="+n+"&phone="+p,
				success: function(result){
					var msg = $.parseJSON(result);
					if (msg.data === true) {
						$('.call-b-input').remove();
						$('.call-b-form').append(
							'<p class="call-b-ok">Спасибо ' + n + ',</p>' +
							'<p class="call-b-ok">Ваше сообщение отправлено!</p>' +
							'<div class="call-b-input"><input id="call-b-close" type="button" value="Закрыть" style="height: {$callb_settings.style_submit_height}px; width: {$callb_settings.style_submit_width}px;" /></div>'
							);
					}
				}
			}, 'json');
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
	});

});

/**
 * callb.js
 * Module callb
 */ 
var callb = (function () {
	//---------------- BEGIN MODULE SCOPE VARIABLES ---------------
	var
		farbtastic_url = "{$wa_url}wa-content/js/farbtastic/farbtastic.js?{$wa->version(true)}",
		addCallbFormBackend, initColorPicker, setColorPickerElement, setColorPicker, onFormSubmit, 
		textBlockHtmlChange, textPlaceholderChange, textInputValueChange, styleChange, changeHandlers,
		initModuleBackend, initModuleFrontend;
	//----------------- END MODULE SCOPE VARIABLES ----------------

	//--------------------- BEGIN DOM METHODS ---------------------
	addCallbFormBackend = function ( $content ) {

        var form = $('<div/>');

        form.addClass('call-b-form').css({
            'background': '#{$callb_settings.style_form_background}',
            'height': '{$callb_settings.style_form_height}px',
            'width': '{$callb_settings.style_form_width}px'
        }).prepend(
            '<div class="call-b-header" style="background: #{$callb_settings.style_header_background}; color: #{$callb_settings.style_header_text_color};">{$callb_settings.text_header_title}</div>' +
            '<div class="call-b-input"><input type="text" name="name" placeholder="{$callb_settings.text_name_placeholder}" value="" /></div>' +
            '<div class="call-b-input"><input type="text" name="phone" placeholder="{$callb_settings.text_phone_placeholder}" value="" /></div>' +
            '<div class="call-b-input"><input id="call-b-submit" type="submit" value="{$callb_settings.text_submit_button}" disabled="disabled" style="background: #{$callb_settings.style_submit_background}; color: #{$callb_settings.style_submit_text_color}; height: {$callb_settings.style_submit_height}px; width: {$callb_settings.style_submit_width}px;" /></div>'
        );

        $content.prepend(form);

    };
    initColorPicker = function(elements, init) {
    	if ($.fn.farbtastic) {
            init(elements);
        } else {
            $.ajax({
                dataType: "script",
                url: farbtastic_url,
                cache: true
            }).done(function() {
                init(elements);
            });
        }
    };
    setColorPickerElement = function(el) {    	

        var color_wrapper = el.closest('.value');
        var color_picker = color_wrapper.find('.s-colorpicker');
        var color_replacer = color_wrapper.find('.s-color-replacer');
        var color_input = color_wrapper.find('.s-color');

        var farbtastic = $.farbtastic(color_picker, function(color) {
            color_replacer.find('i').css('background', color);
            color_input.val(color.substr(1));
            color_input.css('color', color);
            color_input.trigger('change');
        });

        farbtastic.setColor('#'+color_input.val());

        color_replacer.click(function() {
            color_picker.slideToggle(200);
            return false;
        });

    };
    setColorPicker = function (color_elements) {

        for (var i = 0; i < color_elements.length; i++) {
            setColorPickerElement( $(color_elements[i]) );
        }

    };
	//--------------------- END DOM METHODS -----------------------

   	//------------------- BEGIN EVENT HANDLERS --------------------
	onFormSubmit = function (event) {
		event.stopImmediatePropagation();

		var f = $(this);

        $.post( f.attr('action'), f.serialize(), function(response) {
            if ( response.status == 'ok' ) {
                $('#wa-design-button').removeClass('red').addClass('green');
                $("#wa-editor-status-fail").hide()
                $("#wa-editor-status-ok span").html(response.data.message);
                $("#wa-editor-status-ok").fadeIn('slow', function() {
                    $(this).fadeOut(1000);
                });
                $("#wa-app #mainmenu .tabs").find('li a[href="?plugin=callb"]').closest('li').remove();
                if ( $("#plugins-settings-form select[name='shop_callb[status]']").val() === 'on' ) {
                    $("#wa-app #mainmenu .tabs li:last").before('<li class="no-tab"><a href="?plugin=callb">Обратный звонок</a></li>');
                }
            } else {
                $('#wa-design-button').removeClass('green').addClass('red');
                $("#wa-editor-status-ok").hide();
                $("#wa-editor-status-fail span").html(response.errors.join(', '));
                $("#wa-editor-status-fail").fadeIn('slow');
            }
        }, "json");
    };
    textBlockHtmlChange = function(el_changed, el_changing) {
        el_changed.on('change', function(){
            el_changing.html(el_changed.val());
        });
    };
    textPlaceholderChange = function(el_changed, el_changing) {
        el_changed.on('change', function(){
            el_changing.attr('placeholder', el_changed.val());
        });
    };
    textInputValueChange = function(el_changed, el_changing) {
        el_changed.on('change', function(){
            el_changing.val(el_changed.val());
        });
    };
    styleChange = function(el_changed, el_changing, css_style_name, stype_postfix, stype_prefix) {
        el_changed.on('change', function(){
            el_changing.css(css_style_name, stype_prefix + el_changed.val() + stype_postfix);
        });
    };
    changeHandlers = function () {

        textBlockHtmlChange( $('#callb_shop_callb_text_header_title'), $('.call-b-header') );
        textPlaceholderChange( $('#callb_shop_callb_text_name_placeholder'), $('.call-b-input input[name="name"]') );
        textPlaceholderChange( $('#callb_shop_callb_text_phone_placeholder'), $('.call-b-input input[name="phone"]') );
        textInputValueChange( $('#callb_shop_callb_text_submit_button'), $('#call-b-submit') );

        styleChange($('#callb_shop_callb_style_form_width'), $('.call-b-form'), 'width', 'px', '');
        styleChange($('#callb_shop_callb_style_form_height'), $('.call-b-form'), 'height', 'px', '');

        styleChange($('#callb_shop_callb_style_form_background'), $('.call-b-form'), 'background', '', '#');
        styleChange($('#callb_shop_callb_style_header_background'), $('.call-b-header'), 'background', '', '#');
        styleChange($('#callb_shop_callb_style_header_text_color'), $('.call-b-header'), 'color', '', '#');

        styleChange($('#callb_shop_callb_style_submit_width'), $('#call-b-submit'), 'width', 'px', '');
        styleChange($('#callb_shop_callb_style_submit_height'), $('#call-b-submit'), 'height', 'px', '');

        styleChange($('#callb_shop_callb_style_submit_background'), $('#call-b-submit'), 'background', '', '#');
        styleChange($('#callb_shop_callb_style_submit_text_color'), $('#call-b-submit'), 'color', '', '#');

    }; 
   	//------------------- END EVENT HANDLERS ----------------------

	//------------------- BEGIN PUBLIC METHODS --------------------
	var initModuleBackend = function () {

		$('#plugins-settings-form').on('submit', onFormSubmit);

		addCallbFormBackend( $('#s-plugins-content') );

		var color_elements = [
            '#callb_shop_callb_style_form_background',
            '#callb_shop_callb_style_header_background',
            '#callb_shop_callb_style_header_text_color',
            '#callb_shop_callb_style_submit_background',
            '#callb_shop_callb_style_submit_text_color'
        ];
        initColorPicker( color_elements, setColorPicker );

        changeHandlers();

	};

	var initModuleFrontend = function () {
		


	};

	return { 
		initModuleBackend: initModuleBackend,
		initModuleFrontend: initModuleFrontend
	};
	//------------------- END PUBLIC METHODS ----------------------
}());