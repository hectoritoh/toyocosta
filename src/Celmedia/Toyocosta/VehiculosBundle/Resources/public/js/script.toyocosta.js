$(function() {
	$('.page-scroll a').bind('click', function(event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1500, 'easeInOutExpo');
		event.preventDefault();
	});
});

$(window).bind('scroll', function() {
	if ($(window).scrollTop() > 50) {
		$('.sombra-toyocosta').addClass('bajar');
	}
	else {
		$('.sombra-toyocosta').removeClass('bajar');
	}
});

$(document).ready(function(){

	$('ul.nav > li').click(function (e) {
        e.preventDefault();
        $('ul.nav > li').removeClass('active');
        $(this).addClass('active');
    });


	// $('.miniaturas.active').find(".img-indicator").show();
	// $(".miniaturas.active").find(".fondo-bullet").hide();


	// $('#carousel-vehiculos').on('slide.bs.carousel', function () {

		 // $(this).find('.active').next().find('.slab').addClass('testing');

		/*$(".img-indicator").hide(function () {
			$('.miniaturas.active').find(".img-indicator").show();
		});
		$(".fondo-bullet").show(function () {
			$(".miniaturas.active").find(".fondo-bullet").hide();
		});*/


		// $('.miniaturas.active').find(".img-indicator").show('fast', function(){
		// 	$(".miniaturas.active").find(".fondo-bullet").hide();
		// });


	// 	$(".img-indicator").hide();
	// 	$('.miniaturas.active').find(".img-indicator").show();
	// 	$(".fondo-bullet").show();
	// 	$(".miniaturas.active").find(".fondo-bullet").hide();

	// });


});

function centrarVert(elemento){
	altura1=elemento.parent().height();
	altura2=elemento.height();
	if (altura1>=altura2) {
		elemento.css("margin-top",(altura1/2)-(altura2/2)+"px");

	}else{
		elemento.css("margin-top","20px");
	};
}

 $(document).ready(function(){

 	$('.contenedor-centrar').each(function () {
           centrarVert($(this));
         });

});