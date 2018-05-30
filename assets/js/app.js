(function($) {

	'use strict';
    
    // TinyMCE
    tinymce.init({
        mode: "specific_textareas",
        editor_selector: "mceEditor",
        forced_root_block: false,
        content_style: ".mce-content-body  {font-size: 14px; font-family: 'Open Sans', sans-serif;}",
        height: 250,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks",
            "insertdatetime table contextmenu paste",
            "emoticons media code"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | emoticons | media | code",
        media_live_embeds: true
    });

}).apply(this, [jQuery]);

$(function () {
    // Slider Lists
    if (document.getElementById('slider_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "slider_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Foto",
                sortable: false,
                width: 150,
                template: "#= data.Foto #"
            },
            {
                field: "URL",
                sortable: false,
                width: 300
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
	
    // Seller Lists
    if (document.getElementById('seller_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "seller_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Nama",
                sortable: false,
                width: 150
            },
            {
                field: "Username",
                sortable: false,
                width: 150
            },
            {
                field: "Logo",
                sortable: false,
                width: 70,
                template: "#= data.Logo #"
            },
            {
                field: "Aksi",
                sortable: false,
                width: 70,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Keunggulan Lists
    if (document.getElementById('keunggulan_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "keunggulan_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Logo",
                sortable: false,
                width: 50,
                template: "#= data.Logo #"
            },
            {
                field: "Judul",
                sortable: false,
                width: 150
            },
            {
                field: "Deskripsi",
                sortable: false,
                width: 300
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Galeri Lists
    if (document.getElementById('galeri_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "galeri_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Nama",
                sortable: false,
                width: 50
            },
            {
                field: "Foto",
                sortable: false,
                width: 150,
                template: "#= data.Foto #"
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Testimonial Lists
    if (document.getElementById('testimonial_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "testimonial_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Nama",
                sortable: false,
                width: 70
            },
            {
                field: "Jabatan",
				title: "Jabatan & Perusahaan",
                sortable: false,
                width: 150
            },
            {
                field: "Testimonial",
                sortable: false,
                width: 300
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Produk Lists
    if (document.getElementById('produk_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "produk_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Nama",
                sortable: false,
                width: 70
            },
            {
                field: "Kategori",
                sortable: false,
                width: 100
            },
            {
                field: "Harga",
				title: "Harga (Rp)",
                sortable: false,
                width: 100
            },
            {
                field: "Stok",
                sortable: false,
                width: 50
            },
            {
                field: "Keterangan",
                sortable: false,
                width: 200
            },
            {
                field: "Foto",
                sortable: false,
                width: 100,
                template: "#= data.Foto #"
            },
            {
                field: "Aksi",
                sortable: false,
                width: 80,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Produk Kategori Lists
    if (document.getElementById('produk_tipe_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "produk_kategori_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Nama",
                sortable: false,
                width: 70,
                template: "#= data.Nama #"
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Komentar Lists
    if (document.getElementById('comment_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "comment_get",
                        dataType: "json",
                        type: "POST",
                        data: {
							id_product : $('#id_product').val()
						}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "NamaMember",
				title: "Nama Member",
                sortable: false,
                width: 100
            },
            {
                field: "Komentar",
                sortable: false,
                width: 300
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Pengaturan Lists
    if (document.getElementById('pengaturan_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "pengaturan_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Nama",
                sortable: false,
                width: 50
            },
            {
                field: "Kode",
                sortable: false,
                width: 50
            },
            {
                field: "Isi",
                sortable: false,
                width: 200
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Admin Lists
    if (document.getElementById('admin_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "admin_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Nama",
                sortable: false,
                width: 50
            },
            {
                field: "Email",
                sortable: false,
                width: 100
            },
            {
                field: "Username",
                sortable: false,
                width: 70
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Admin Role Lists
    if (document.getElementById('admin_role_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "admin_role_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Nama",
                sortable: false,
                width: 50
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
	
    // Akun Saya
    if (document.getElementById('admin_akun_saya_page') != null) {
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd-m-yyyy",
            autoclose: true,
            todayHighlight: true
        });
    }
	
    // Galeri Update
    if (document.getElementById('galeri_update_page') != null) {
        $('.image_option').hide();
        $('#checkboxMedia').click(function(){
            if($(this).is(":checked")) {
				$('.image_option').show();
            } else {
                $('.image_option').hide();
            }
        });
    }
	
    // Produk Update
    if (document.getElementById('produk_update_page') != null) {
        $('.image_option').hide();
        $('#checkboxMedia').click(function(){
            if($(this).is(":checked")) {
				$('.image_option').show();
            } else {
                $('.image_option').hide();
            }
        });
    }
	
    // Produk Create
    if (document.getElementById('produk_create_page') != null) {
		$("#id_product_type").change(function() {
			var id_product_type = $(this).find("option:selected").attr("id");
			var dataString = 'id_product_type='+ id_product_type
			$.ajax({
				url: 'home/check_product_type_lists',
				type: "POST",
				data: dataString,
				beforeSend : function (){
					$('#id_product_type_detail').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data) {
					$('#id_product_type_detail').html(data);
				},
				error: function(data){
				}
			});
		});
    }
    
    // Order Lists
    if (document.getElementById('order_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "order_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Pemesan",
                sortable: false,
                width: 70
            },
            {
                field: "KodePemesanan",
                title: "Kode Pemesanan",
                sortable: false,
                width: 100,
                template: "#= data.KodePemesanan #"
            },
            {
                field: "TotalPembelian",
				title: "Total Pembelian",
                sortable: false,
                width: 100
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
    
    // Ongkir Lists
    if (document.getElementById('ongkir_lists_page') != null) {
        $("#multipleTable").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "ongkir_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                width: 30
            },
            {
                field: "Provinsi",
                sortable: false,
                width: 100
            },
            {
                field: "Harga",
                title: "Harga (Rp)",
                sortable: false,
                width: 100
            },
            {
                field: "Aksi",
                sortable: false,
                width: 50,
                template: "#= data.Aksi #"
            }]
        });
    }
});