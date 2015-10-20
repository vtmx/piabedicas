$(function(){

	// Submenu show on focus
	// ----------------------------------------------------------------------------

	// // show sub-menu on focus
	// $('header .menu > li > a').focus(function(){
	// 	$('.sub-menu').addClass('active');
	// });
	//
	// // hidden sub-menu when focusout
	// $('header .menu > li > a').focusout(function() {
	// 	$('.sub-menu').removeClass('active');
	// });

	// include icons menu
	$('header .menu > li > a').each(function() {
        if ( $(this).parent('li').children('ul').size() > 0 ) {
            $(this).append(' <i class="fa fa-angle-down"></i>');
        }
    });

	// include icons submenu
	$('header .sub-menu > li > a').each(function() {
        if ( $(this).parent('li').children('ul').size() > 0 ) {
            $(this).append('<i class="fa fa-angle-right"></i>');
        }
    });


	// Carousel Home
	// ----------------------------------------------------------------------------

	// need var to custom controls
	var homeSlider = $('.home .slider .owl-carousel');

	homeSlider.owlCarousel({
		// most important owl features
		singleItem: true,

		// basic Speeds
		slideSpeed: 500,
		paginationSpeed: 800,
		rewindSpeed: 1000,

		// autoplay
		autoPlay: true,
		stopOnHover: true,

		// navigation
		navigation: false,
		navigationText: false,

		// pagination
		pagination: true,
		paginationNumbers: false,

		responsive: true
	});

	$('.owl-page a').click(function(e){
		e.preventDefault();
	});

	// Hidden icon on hover
	$('.owl-wrapper-outer a').hover(function(){
		$('.owl-wrapper-outer').css('background-image', 'none');
	});

	// Custom Navigation Events
	$('.slider-controls .next').click(function(){
		homeSlider.trigger('owl.next');
	});

	$('.slider-controls .prev').click(function(){
		homeSlider.trigger('owl.prev');
	});


	// Carousel Store Related
	// ----------------------------------------------------------------------------

	// need var to custom controls
	var storeSlider = $('.stores-related .owl-carousel');

	storeSlider.owlCarousel({
		items: 3,
		itemsDesktop: [1020, 3],
		itemsDesktopSmall: [850, 2]
		//itemsTablet: [350, 2]
	});

	$('.owl-pagination a').click(function(e){
		e.preventDefault();
	});

	// Custom Navigation Events
	$('.stores-related .next').click(function(){
		storeSlider.trigger('owl.next');
	});

	$('.stores-related .prev').click(function(){
		storeSlider.trigger('owl.prev');
	});


	// Store Ajax Load
	// ----------------------------------------------------------------------------

	$(document).on('click', '.store-categories a, .store-pagination a', function(e) {
		// remove mouse behaivor
		e.preventDefault();

		// go top to page
		$('html, body').animate({ scrollTop: 0 });

		// atributes
		var url = $(this).attr('href');
		url = url + ' #ajax-container';

		// show loading icon
		$('.ajax-loading-icon').fadeIn();
		// hide container
		$('#ajax-container').addClass('fade-out');

		// ajax loaded
		$('#stores').load(url, function(response, status, xhr) {
			if (status == 'success') {
				// remove loading image
				$('.ajax-loading-icon').fadeOut('fast');
				// show container
				$('#ajax-container').addClass('fade-in');
			} else {
				// show error message
				$('.ajax-loading-error').fadeIn();
				console.log('Erro ' + xhr.status + ' - ' + xhr.statusText);
			}
		});
	}); // click

	// store category active
	$('.store-categories a').click( function() {
		$('.store-categories li').removeClass('active current-cat current-menu-item current-cat-parent current-comercio-categoria-ancestor');
		$(this).parent().addClass('current-cat');
	});


	// Search Ajax Load
	// ----------------------------------------------------------------------------

	$(document).on('click', '.search .pagination a', function(e) {
		// remove mouse behaivor
		e.preventDefault();

		// go top to page
		$('html, body').animate({ scrollTop: 0 });

		// atributes
		var url = $(this).attr('href');
		url = url + ' #ajax-container';

		// show loading icon
		$('.ajax-loading-icon').fadeIn();
		// hide container
		$('#ajax-container').addClass('fade-out');

		// ajax loaded
		$('#content').load( url, function(response, status, xhr) {
			if (status == 'success') {
				// remove loading image
				$('.ajax-loading-icon').fadeOut('fast');
				// show container
				$('#ajax-container').addClass('fade-in');
			} else {
				// show error message
				$('.ajax-loading-error').fadeIn();
				console.log('Erro ' + xhr.status + ' - ' + xhr.statusText);
			}
		});
	}); // click


	// Blog Ajax Load
	// ----------------------------------------------------------------------------

	$(document).on('click', '.blog-aside li a, .blog-pagination a, .post-title', function(e) {
		// remove mouse behaivor
		e.preventDefault();

		// go top to page
		$('html, body').animate({ scrollTop: 0 });

		// atributes
		var url = $(this).attr('href');
		url = url + ' #ajax-container';

		// show loading icon
		$('.ajax-loading-icon').fadeIn();
		// hide container
		$('#ajax-container').addClass('fade-out');

		// ajax loaded
		$('#content').load( url, function(response, status, xhr) {
			if (status == 'success') {
				// remove loading image
				$('.ajax-loading-icon').fadeOut('fast');
				// show container
				$('#ajax-container').addClass('fade-in');
			} else {
				// show error message
				$('.ajax-loading-error').fadeIn();
				console.log('Erro ' + xhr.status + ' - ' + xhr.statusText);
			}
		});
	}); // click

	// aside active
	$('.blog-aside a').click(function() {
		$('.blog-aside li').removeClass('active current-cat');
		$(this).parent().addClass('current-cat');
	});

	// remove active from single page
	$('.post-title').click(function() {
		$('.blog-aside li').removeClass('active current-cat');
	});



	// Tab
	// ----------------------------------------------------------------------------

	// Add class active first tab and section
	$('.store-pages .tab li:first-child').addClass('active');
	$('.tab-content section:first-child').addClass('active');

	$('.store-pages .tab a').click( function(e){
		// remove mouse effect
		e.preventDefault();

		// add active this and remove all li if have active
		$(this).parent('li').addClass('active').siblings().removeClass('active');

		// add active section == href and hide others
		$('.tab-content ' + $(this).attr('href')).show().siblings().hide();
	});



	// Lightbox
	// ----------------------------------------------------------------------------

	// add class lightbox for links to image
	$('a[href$=".jpg"], a[href$=".png"], a[href$=".gif"]').attr('class', 'lightbox');

	// add rel group
	$('.gallery a').attr('rel' , 'group');

	// if window > 800px
	if (window.matchMedia('(min-width: 800px)').matches) {
		// fancybox start
		$('.lightbox, .gallery a').fancybox({
			beforeShow : function() {
				var alt = this.element.find('img').attr('alt');
				this.inner.find('img').attr('alt', alt);
				this.title = alt;
			},

			padding: ([15, 15, 15, 15]),

			helpers:{
				overlay: { css: { 'background': 'rgba(0, 0, 0, 0.3)' } },
				title: { type: 'inside' }
			}
		});

		// fancybox map
		$('.lightbox-map').fancybox({
			helpers: {	media : {} }
		});

		// fancybox contact
		$('.menu a').each(function() {
		  if ( $(this).text() === 'Contato' || $(this).text() === 'Cadastro' ) {
		     $(this).addClass('lightbox-iframe');
		  }
		});

		// fancybox contact
		$('.lightbox-iframe').fancybox({
			'type': 'iframe',
			maxWidth: 600
			//'scrolling': 'no',
			//'iframe': {'scrolling': 'no'}
		});

		// add rel group product
		$('.products .product').attr('rel' , 'group');

		// fancybox product
		$('.lightbox-iframe-product').fancybox({
			'type': 'iframe',
			width: 940
		});
	} // matchMedia

});
