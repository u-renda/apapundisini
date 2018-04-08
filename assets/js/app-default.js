var winOrigin = window.location.origin;
var winPath = window.location.pathname.split('/');
var newPathname = winOrigin + "/" + winPath[1] + "/";
var adminPathname = winOrigin + "/" + winPath[1] + "/" + winPath[2] + "/";

(function($) {

	'use strict';
	
	/*
	Admin Sidebar
	*/
    var list_main = $('li.list-main');
    var list_child = $('li.list-child');
	var winPathName = window.location.pathname;
	var newPath = winOrigin + winPathName;
	
	// khusus admin create & edit
    if (winPath[3] === 'admin_create' || winPath[3] === 'admin_update') {
        $('#admin').addClass('nav-active');
        $('#lainnya').addClass('nav-active nav-expanded');
    }
	
	// khusus admin role create & edit
    if (winPath[3] === 'admin_role_create' || winPath[3] === 'admin_role_update') {
        $('#admin_role').addClass('nav-active');
        $('#lainnya').addClass('nav-active nav-expanded');
    }
    
	// khusus produk tipe detail
    if (winPath[3] === 'produk_tipe_detail' || winPath[3] === 'produk_tipe_detail_create') {
        $('#tipe_produk').addClass('nav-active');
        $('#produk').addClass('nav-active nav-expanded');
    }
    
	list_main.each(function() {
        var mainHref = $(this).find('a').attr('href');
        var createHref = mainHref + '_create';
        var updateHref = mainHref + '_update';
		
        if (mainHref === newPath || createHref === newPath || updateHref === newPath) {
            $(this).addClass('nav-active');
        }
    });
	
    list_child.each(function() {
        var href = $(this).find('a').attr('href');
        var createHref2 = href + '_create';
        var updateHref2 = href + '_update';
        var list_parent = $(this).closest("li.list-parent");
        
        if (href === newPath || createHref2 === newPath || updateHref2 === newPath) {
            $(this).addClass('nav-active');
            list_parent.addClass('nav-active nav-expanded');
        }
    });

}).apply(this, [jQuery]);