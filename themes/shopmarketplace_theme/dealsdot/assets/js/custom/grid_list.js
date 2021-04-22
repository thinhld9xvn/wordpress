jQuery(document).ready(function($) {
	"use strict";


	
    $('a.button-list').on('click', function(){
        var data = {
            action: 'list_view',
			beforeSend: function () {
				$('body .category-product').append('<div class="loader-overlay"></div><div class="loader-image"></div>');
			},
			security : MyAjax.security,
			'id': MyAjax.post_idm,
			'is_tax': MyAjax.is_tax,
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {
			$('.category-product').html(response);
			$('ul#filter-tabs li:first-child').removeClass('active');
			$('ul#filter-tabs li:last-child').addClass('active');

        });
    });
	
    $('a.button-grid').on('click', function(){
        var data = {
            action: 'grid_view',
			beforeSend: function () {
				$('body .category-product').append('<div class="loader-overlay"></div><div class="loader-image"></div>');
			},
			security : MyAjax.security,
			'id': MyAjax.post_idm,
			'is_tax': MyAjax.is_tax,
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {
			$('.category-product').html(response);
			$('ul#filter-tabs li:first-child').addClass('active');
			$('ul#filter-tabs li:last-child').removeClass('active');

        });
    });
	


	
});