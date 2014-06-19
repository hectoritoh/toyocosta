var menu_botton_mostrado = false ;
var margenlink = 0;

function centrarHorizontal(elemento){
	ancho1=elemento.parent().width();
	ancho2=elemento.width();

	elemento.css("margin-left",(ancho1/2)-(ancho2/2)+"px");

}


function centrarVert(elemento){
  altura1=elemento.parent().height();
  altura2=elemento.height();
  if (altura1>=altura2) {
    elemento.css("margin-top",(altura1/2)-(altura2/2)+"px");

  }else{
    elemento.css("margin-top","20px");
  };
}




function mostrarBanners(){
  
  if( !menu_botton_mostrado ){
    //$(".banners-foot").css("margin-bottom", "0px");
    $("#footer-banners").stop(true, true).animate({ marginBottom: '0px'}, 600);
    
    $("#cerrar").show();
    $("#mas").hide();
    menu_botton_mostrado = true ;
  }
  else{
    $("#footer-banners").stop(true, true).animate({ marginBottom: margenlink + 'px'}, 600);
    $("#cerrar").hide();
    $("#mas").show();
    menu_botton_mostrado = false ;
  }
  
}



function mostrarLlantas(){

  $(".bloque-llantas:hidden").eq(0).show('slow',function(){
    $('.contenedor-centrar').each(function () {
               centrarHorizontal($(this));
             });
  });
  
}




$(document).ready(function(){

    	$('.contenedor-centrar').each(function () {
                   centrarHorizontal($(this));
                 });

      $('.centrado-vertical').each(function () {
         centrarVert($(this));
       });

      //$("#footer-banners").css("margin-bottom", 0 ); //fzzio
});

$(window).load(function(){
       $('.contenedor-centrar').each(function () {
              centrarHorizontal($(this));
            });
      
       $('.centrado-vertical').each(function () {
         centrarVert($(this));
       });
       margenlink = (-1) * ( $("#footer-banners").height() - $("#footer-boton").height() - $("#footer-logos").height() ) ;
       $("#footer-banners").css("margin-bottom", margenlink );
});

$(window).resize(function(){
       $('.contenedor-centrar').each(function () {
              centrarHorizontal($(this));
            });
       $('.centrado-vertical').each(function () {
         centrarVert($(this));
       });

      margenlink = (-1) * ( $("#footer-banners").height() - $("#footer-boton").height() - $("#footer-logos").height() ) ;
      $("#footer-banners").css("margin-bottom", margenlink );
});