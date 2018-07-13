$(function () {
    // Slider Lists
    if (document.getElementById('slider_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "slider_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Keunggulan Lists
    if (document.getElementById('keunggulan_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "keunggulan_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Galeri Lists
    if (document.getElementById('galeri_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "galeri_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Testimonial Lists
    if (document.getElementById('testimonial_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "testimonial_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Produk Lists
    if (document.getElementById('produk_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "produk_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Produk Kategori Lists
    if (document.getElementById('produk_tipe_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "produk_kategori_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Pengaturan Lists
    if (document.getElementById('pengaturan_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "pengaturan_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Admin Lists
    if (document.getElementById('admin_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "admin_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Admin Role Lists
    if (document.getElementById('admin_role_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "admin_role_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Seller Lists
    if (document.getElementById('seller_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "seller_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Member Lists
    if (document.getElementById('member_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "member_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Order Lists
    if (document.getElementById('order_lists_page') != null) {
        // Delete
		$('body').delegate(".detail", "click", function() {
            var id = $(this).attr("id");
            var action = "order_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
		
		// Detail Order
		$('body').delegate(".detail", "click", function() {
            var id = $(this).attr("id");
            var action = "order_detail";
            var dataString = 'id='+ id
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-view').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-view').html('#'+id);
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-title').text('Detail Order');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Comment Lists
    if (document.getElementById('comment_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "comment_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
	
    // Ongkir Lists
    if (document.getElementById('ongkir_lists_page') != null) {
        // Delete
		$('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "ongkir_delete";
            var grid = "multipleTable";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: adminPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times h4 text-danger"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Delete?');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
});