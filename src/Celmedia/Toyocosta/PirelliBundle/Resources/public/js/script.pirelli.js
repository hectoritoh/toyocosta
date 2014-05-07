
$(document).ready(function(){

    	$('.contenedor-centrar').each(function () {
                   centrarHorizontal($(this));
                 });

      // MODAL PARA LAS LLANTAS PIRELLI 
      $('a[id^="llanta"]').click(function(){

        var id = $(this).attr('id');
        $('#Modal_llanta'+id).modal({show:true})
      });

      //Select Box 
      $('#selectmodelo, #selectmedida, #selectrin, #selectprecio').selectbox();


});