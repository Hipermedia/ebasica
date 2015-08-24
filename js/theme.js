jQuery(document).ready(function($) {

	// Versión responsive del menú; oculta la navegación y en su defecto aparece un botón para mostrar u ocultarl la navegación
	$('.toggle-nav').click(function(e) {
	    $(this).toggleClass('activo');
	    $('#header-main-nav ul').toggleClass('activo'); 
	    e.preventDefault();
	});

	// Pone la clase .active a cualquier link que haya en el documento que corresponda con el url actual
	var url = window.location.href;
	$('a[href="'+url+'"]').addClass('active');


	//Agrega una animación al hacer scroll al llegar a un elemento gracias a waypoints

	$('.titulo').waypoint(function(direction) {
	  $('.titulo').addClass( 'fadeInUp animated' );
	},{
	  offset:'20%'
	});

	/* Slider principal
	--------------------------------------------*/
	$('#coverSlider').flexslider({
		animation: "slide",
		controlNav: true,
		animationLoop: true,
		directionNav: false,
		slideshow: true,
		slideshowSpeed: 7000,
	});
	/* Slider secundario
	--------------------------------------------*/
	$('#coverSecondarySlider').flexslider({
		animation: "slide",
		controlNav: true,
		animationLoop: true,
		directionNav: false,
		slideshow: true,
		slideshowSpeed: 12000,
	});
	// Pestañas en portada efecto de colapsado 
	$('.CoverTabs-btnTitle').click(function() {
	    $('.CoverSecondarySlider').removeClass('is-collapsed');
	});

	// Login en sidebar
	$('.Login-image').click(function() {
	    $('#loginform-home').toggleClass('is-showing');
	    $('#loginform-home').toggleClass('animated bounceIn');
	});

	$('.Documentos-image').click(function() {
	    $('#documentos-panel').toggleClass('is-showing');
	    $('#documentos-panel').toggleClass('animated bounceIn');
	});

	$('.Noticias-image').click(function() {
	    $('#noticias-panel').toggleClass('is-showing');
	    $('#noticias-panel').toggleClass('animated bounceIn');
	});

	$('#trigger-expand').click(function() {
	    $('#expand').toggleClass('appear');
	    $('#expand').toggleClass('animated fadeIn');
	});


});