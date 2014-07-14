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

/*function readURL() {
  //  rehide the image and remove its current "src",
  //  this way if the new image doesn't load,
  //  then the image element is "gone" for now
  $('#blah').attr('src', '').hide();
  if (this.files && this.files[0]) {
    var reader = new FileReader();
    $(reader).load(function(e) {
      $('#blah')
        //  first we set the attribute of "src" thus changing the image link
        .attr('src', e.target.result) //  this will now call the load event on the image
    });
    reader.readAsDataURL(this.files[0]);
  }
}*/

function readURL(input) {

  if (input.files && input.files[0] ) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $(input).closest('.custom-input-file').find('.sm-img-foto')
      .attr('src', e.target.result)
      .width(104)
      .height(90);

    };
    reader.readAsDataURL(input.files[0]);     
  }
}


//  below makes use of jQuery chaining. This means the same element is returned after each method, so we don't need to call it again
$('.sm-img-foto')
  //  here we first set a "load" event for the image that will cause it change it's height to a set variable
  //    and make it "show" when finished loading
  .load(function(e) {
    //  $(this) is the jQuery OBJECT of this which is the element we've called on this load method
    $(this)
      //  note how easy adding css is, just create an object of the css you want to change or a key/value pair of STRINGS
      .css('height', '90px') //  or .css({ height: '200px' })
      //  now for the next "method" in the chain, we show the image when loaded
      .show();  //  just that simple
  })
  //  with the load event set, we now hide the image as it has nothing in it to start with
  .hide();  //  done


$(document).ready(function(){

    	/*$('.contenedor-centrar').each(function () {
                   centrarHorizontal($(this));
                 });
  */
      $('.centrado-vertical').each(function () {
         centrarVert($(this));
       });

      //$("#footer-banners").css("margin-bottom", 0 ); //fzzio

      $(".select-custom").each(function(){
          $(this).wrap("<span class='select-wrapper'></span>");
          $(this).after("<span class='holder'></span>");
      });
      $(".select-custom").change(function(){
          var selectedOption = $(this).find(":selected").text();
          $(this).next(".holder").text(selectedOption);
      }).trigger('change');



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