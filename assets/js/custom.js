var winOrigin = window.location.origin;
var winPath = window.location.pathname.split('/');
var newPathname = winOrigin + "/" + winPath[1] + "/";

(function($) {

	'use strict';
	
	/*
	Navigation
	*/
    var list_main = $('li.list-main');
    var list_grandchild = $('li.list-grandchild');
	var winPathName = window.location.pathname;
	var newPath = winOrigin + winPathName;
	
	list_main.each(function() {
        var mainHref = $(this).find('a').attr('href');
		
        if (mainHref === newPath) {
            $(this).addClass('active');
        }
    });
	
    list_grandchild.each(function() {
        var href = $(this).find('a').attr('href');
        var list_parent = $(this).closest("li.list-parent");
        
        if (href === newPath) {
            list_parent.addClass('active');
        }
    });
	
	/*
	Contact Form: Basic
	*/
	$('#contactForm').validate({
		submitHandler: function(form) {

			var $form = $(form),
				$messageSuccess = $('#contactSuccess'),
				$messageError = $('#contactError'),
				$submitButton = $(this.submitButton);

			$submitButton.button('loading');

			// Ajax Submit
			$.ajax({
				type: 'POST',
				url: $form.attr('action'),
				data: {
					name: $form.find('#name').val(),
					email: $form.find('#email').val(),
					subject: $form.find('#subject').val(),
					message: $form.find('#message').val(),
					submit: $form.find('#submit').val()
				},
				dataType: 'json',
				complete: function(data) {
				
					if (typeof data.responseJSON === 'object') {
						if (data.responseJSON.response == 'success') {

							$messageSuccess.removeClass('hidden');
							$messageError.addClass('hidden');

							// Reset Form
							$form.find('.form-control')
								.val('')
								.blur()
								.parent()
								.removeClass('has-success')
								.removeClass('has-error')
								.find('label.error')
								.remove();

							if (($messageSuccess.offset().top - 80) < $(window).scrollTop()) {
								$('html, body').animate({
									scrollTop: $messageSuccess.offset().top - 80
								}, 300);
							}

							$submitButton.button('reset');
							
							return;

						}
					}

					$messageError.removeClass('hidden');
					$messageSuccess.addClass('hidden');

					if (($messageError.offset().top - 80) < $(window).scrollTop()) {
						$('html, body').animate({
							scrollTop: $messageError.offset().top - 80
						}, 300);
					}

					$form.find('.has-success')
						.removeClass('has-success');
						
					$submitButton.button('reset');

				}
			});
		}
	});

}).apply(this, [jQuery]);