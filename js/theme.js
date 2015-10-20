jQuery(document).ready(function($) {

	$(function(){
		var perPage = 6;
		var opened = 1;
		var onClass = 'on';
		var paginationSelector = '#number-pagination';
		$('#pagination').simplePagination(perPage, opened, onClass, paginationSelector);
	});

	$(function(){
		var perPage = 6;
		var opened = 1;
		var onClass = 'on';
		var paginationSelector = '#number-pagination-second';
		$('#pagination-second').simplePagination(perPage, opened, onClass, paginationSelector);
	});

	$(function(){
		var perPage = 6;
		var opened = 1;
		var onClass = 'on';
		var paginationSelector = '#number-pagination-third';
		$('#pagination-third').simplePagination(perPage, opened, onClass, paginationSelector);
	});

	$('.hideByJQ').html("");
	$('.no-number-pagination').html("");



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

	/* Slider de noticias en portada
	--------------------------------------------*/
	$('#coverSliderNoticas').flexslider({
		animation: "slide",
		directionNav: false,
		slideshow: false
	});

	$('#coverSliderNoti').flexslider({
		animation: "slide",
		directionNav: false,
		slideshow: false
	});

	// Pestañas en portada efecto de colapsado 
	$('.CoverTabs-btnTitle').click(function(e) {
	    var tab = $(this);
	    $('.CoverSecondarySlider').removeClass('is-collapsed');
	    if( tab.parent('li').hasClass('active')){
	    	$('.CoverSecondarySlider').addClass('is-collapsed');
	        window.setTimeout(function(){
	            $(".tab-pane").removeClass('active');
	            tab.parent('li').removeClass('active');
	        },1);
	    }
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

	// Login en sidebar
	$('.ContactoBtnSidebar-image').click(function() {
	    $('#contacto-panel').toggleClass('is-showing');
	    $('#contacto-panel').toggleClass('animated bounceIn');
	    $('.ContactoBtnSidebar').toggleClass('is-showing');
	});

	// Quito numeritos del numbered nav
	$('.page-numbers').html("");

});