$(window).bind('scroll', function() {
	if ($(window).scrollTop() > 50) {
		$('.sombra-toyocosta').addClass('bajar');
	}
	else {
		$('.sombra-toyocosta').removeClass('bajar');
	}
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



function centrarHorizontal(elemento){
	ancho1=elemento.parent().width();
	ancho2=elemento.width();

	elemento.css("margin-left",(ancho1/2)-(ancho2/2)+"px");

}

function siguienteTab(elemento){

	//var tabID = $(elemento).closest(".tab-content").attr("id");
	//$( '#' + tabID + ' a').tab('show') // Select tab by name
	//alert(tabID);
	//$(elemento).tab('show');
}


$(document).ready(function(){


 	$('.contenedor-centrar').each(function () {
       centrarVert($(this));
     });

	$('.centrado-horizontal').each(function () {
       centrarHorizontal($(this));
     });


	$('.page-scroll a').bind('click', function(event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1500, 'easeInOutExpo');
		event.preventDefault();
	});

	$(".item-submenu").click(function (e) {
        e.preventDefault();
       $('#fondo-submenu').stop(true, true).slideToggle( "slow" );
    });

	$('ul.navbar-nav-vehiculos > li').click(function (e) {
        e.preventDefault();
        $('ul.navbar-nav-vehiculos > li').removeClass('active');
        $(this).addClass('active');
    });

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		//console.log (e.target); // activated tab
		//console.log (e.relatedTarget); // previous tab
		//console.log (this);
		$(this).parent('li').removeClass("active");
		$(e.target).parent('li').addClass("active");
	})

});
