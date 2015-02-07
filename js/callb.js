$(document).ready(function(){

	$("{$call_b_settings.id_html}").click(function(){
		var bg = $('<div/>');
		var form = $('<div/>');

		bg.addClass('call-b-bg').css('height', ($(document).height())+'px');
		form.addClass('call-b-form').prepend(
			'<div class="call-b-header">Обратный звонок</div>' +
			'<div class="call-b-input"><input type="text" name="name" placeholder="Ваше Имя" value="" /></div>' +
			'<div class="call-b-input"><input type="text" name="phone" placeholder="Ваш Телефон" value="" /></div>' +
			'<div class="call-b-input"><input id="call-b-submit" type="submit" value="Отправить" /></div>'
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
							'<div class="call-b-input"><input id="call-b-close" type="button" value="Закрыть" /></div>'
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