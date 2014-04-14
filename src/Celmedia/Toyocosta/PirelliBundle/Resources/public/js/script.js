var menu_botton_mostrado = false ;


function centrarHorizontal(elemento){
	ancho1=elemento.parent().width();
	ancho2=elemento.width();
/*	alert("Padre: "+ancho1);
	alert("Hijo: "+ancho2);*/
	/*if (ancho1>=ancho2) {*/
		elemento.css("margin-left",(ancho1/2)-(ancho2/2)+"px");

	/*}*/
}
function mostrarBanners(){
  // $("#banners").toggle("slow");
  if( !menu_botton_mostrado ){
    $(".banners-foot").css("margin-bottom", "0px");
    $("#cerrar").show();
    $("#mas").hide();
    menu_botton_mostrado = true ;
  }
  else{    
    $(".banners-foot").css("margin-bottom", "-170px");
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


});
$(window).load(function(){
       $('.contenedor-centrar').each(function () {
              centrarHorizontal($(this));
            });
      

});
$(window).resize(function(){
       $('.contenedor-centrar').each(function () {
              centrarHorizontal($(this));
            });
});