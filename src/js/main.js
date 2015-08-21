$(function(){

	/* Submenu show on focus
	---------------------------------------------------------------------------*/

	// variables elements
	var $menuLink = $('.menu').find('.menu-item-store a');
	var $submenu = $('.sub-menu');

	// show sub-menu on focus
	$menuLink.focus(function(){
		$submenu.addClass('active');
	});

	// hidden sub-menu when focusout
	$menuLink.focusout(function(){
		$submenu.removeClass('active');
	});



	/* Carousel
	---------------------------------------------------------------------------*/

	$('.home .owl-carousel').owlCarousel({
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
		navigation: true,
		navigationText: false,

		// pagination
		pagination: true,
		paginationNumbers: false,

		responsive: true
	});

	$('.owl-page a').click(function(e){
		e.preventDefault();
	});

	$('.owl-wrapper-outer a').hover(function(){
		$('.owl-wrapper-outer').css('background-image', 'none');
	});



	/* Ajax Pagination
	---------------------------------------------------------------------------*/

	$(document).on('click', '.pagination a, .store-categories a', function(e) {

		// remove mouse behaivor
		e.preventDefault();

		$('html, body').animate({ scrollTop: 0 });

		// atributes
		var url = $(this).attr('href');
		var content = $('#stores .store-link');
		url = url + ' #ajax-container';

		// ajax loading
		$('.ajax-loading-icon').removeClass('fade-out').addClass('fade-in');
		$('#ajax-container').addClass('fade-out');

		// ajax loaded
		$('#stores').load( url, function(){
			$('.ajax-loading-icon').removeClass('fade-in').addClass('fade-out');
			$('#ajax-container').addClass('fade-in');
		});
	}); // click

	// store category active
	$('.store-categories a').click( function(){
		$('.store-categories li').removeClass('active current-cat');
		$(this).parent().addClass('current-cat');
	});



	/* Lightbox
	---------------------------------------------------------------------------*/

	// add class lightbox for links to image
	$('a[href$=".jpg"], a[href$=".png"], a[href$=".gif"]').attr('class', 'lightbox');

	// add class thumbnail
	$('.gallery a').attr('class', 'thumbnail');

	// add rel group
	$('.gallery .thumbnail').attr('rel' , 'group');

	// fancybox start
	$('.lightbox, .gallery .thumbnail').fancybox({
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
	$('.lightbox-contact').fancybox({
		'type': 'iframe',
		maxWidth: 600
		//'scrolling': 'no',
		//'iframe': {'scrolling': 'no'}
	});



	/* Tab
	---------------------------------------------------------------------------*/

	$('.store-pages .tab a').click( function(e){
		// remove mouse effect
		e.preventDefault();

		// add active this and remove all li if have active
		$(this).parent('li').addClass('active').siblings().removeClass('active');;

		// add active section == href and hide others
 		$('.tab-content ' + $(this).attr('href')).show().siblings().hide();
	});

});
