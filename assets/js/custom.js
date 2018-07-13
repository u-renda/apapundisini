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

}).apply(this, [jQuery]);

$(function () {
	// Cart create
    if (document.getElementById('produk_detail_page') != null) {
		$("#the_form").validate({
			rules: {
				quantity: "required"
			},
			submitHandler: function(form) {
				$.ajax(
				{
					type: "POST",
					url: form.action,
					data: $(form).serialize(), 
					cache: false,
					beforeSend : function (){
						$('#btnCart').html('<i class="fa fa-spinner fa-spin"></i>');
					},
					success: function(data)
					{
						$('#btnCart').html('<i class="fa fa-shopping-cart"></i>Beli');
						var response = $.parseJSON(data);
						
						new PNotify({
							title: response.title,
							text: response.text,
							type: response.type
						});
					}
				});
				return false;
			}
		});
		
		$("#submitComment").validate({
			rules: {
				message: "required"
			},
			submitHandler: function(form) {
				$.ajax(
				{
					type: "POST",
					url: form.action,
					data: $(form).serialize(), 
					cache: false,
					beforeSend : function (){
						$('#btnComment').html('Loading...');
					},
					success: function(data)
					{
						$('#btnComment').html('Kasih Komentar');
						var response = $.parseJSON(data);
						
						new PNotify({
							title: response.title,
							text: response.text,
							type: response.type
						});
						
						setTimeout(function(){
							window.location.reload();
						}, 2000);
					}
				});
				return false;
			}
		});
    }
	
	// Cart shipment
    if (document.getElementById('cart_page') != null) {
		var subtotal = parseInt($('#subtotal').attr('value'));
		var shipping = parseInt($('#shipping').attr('value'));
		var grandTotal = addCommas(subtotal + shipping);
		var amount = $('#amount').html('Rp ' + grandTotal);
		
		$("#frmCalculateShipping").validate({
			rules: {
				address: "required",
				id_provinsi: "required"
			},
			submitHandler: function(form) {
				$.ajax(
				{
					type: "POST",
					url: form.action,
					data: $(form).serialize(), 
					cache: false,
					beforeSend : function (){
						$('#btnCartShipment').html('Loading...');
					},
					success: function(data)
					{
						var response = $.parseJSON(data);
						$('#shipping').html(response.shipping);
						$('#amount').html(response.total_order);
						$('#shipment_cost').val(response.shipping2);
						$('#total').val(response.total_order2);
						$('#btnOrder').removeAttr('disabled');
						
						new PNotify({
							title: response.title,
							text: response.text,
							type: response.type
						});
					}
				});
				return false;
			}
		});
		
		$('body').delegate(".remove", "click", function() {
            var id = $(this).attr("id");
            var action = "cart/cart_delete";
            var dataString = 'id='+ id +'&action='+ action;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                success: function(data)
                {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
});

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

// Notifications - Config
(function($) {

	'use strict';

	// use font awesome icons if available
	if ( typeof PNotify != 'undefined' ) {
		PNotify.prototype.options.styling = "fontawesome";

		$.extend(true, PNotify.prototype.options, {
			shadow: false,
			stack: {
				spacing1: 15,
	        	spacing2: 15
        	}
		});

		$.extend(PNotify.styling.fontawesome, {
			// classes
			container: "notification",
			notice: "notification-warning",
			info: "notification-info",
			success: "notification-success",
			error: "notification-danger",

			// icons
			notice_icon: "fa fa-exclamation",
			info_icon: "fa fa-info",
			success_icon: "fa fa-check",
			error_icon: "fa fa-times"
		});
	}

}).apply(this, [jQuery]);