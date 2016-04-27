$(document).ready(function(){

    $("#form-etiqueta").validate({
      debug: true,
      submitHandler: function (form) {
          var parametros = {
              nombre: $("#nombre").val(),
              apellido: $("#apellido").val(),
              telefono: $("#telefono").val(),
              email: $("#email").val(),
              celular: $("#celular").val(),
              cedula: $("#cedula").val(),
              comentario: $("#comentario").val(),
              campana: $("#campana").val(),
              taller: $("#taller").val(),
              fecha:$("#fecha_test").val(),
              modelo: $("#modelo").val(),
              anio: $("#anio").val(),
              ciudad: $("#ciudad").val(),
              precio: $("#precio").val(),
              exoneracion: $("#exoneracion").val(),
              direccion: $("#direccion").val(),
              modeloexonerados: $("#modeloexonerados").val(),
              tipoexonerados: $("#tipoexonerados").val(),
              montacargas: $("#montacargas").val()
          }

          $.ajax({
              url: Routing.generate('envio_landing'),
              type: 'POST',
              async: true,
              data: parametros,
              dataType: "json",
              success: function (respuesta) {
                console.log(respuesta);
                if (respuesta.codigo == 1 ) {
                    $('#contenedorEspere').hide();
                    $('#form-etiqueta').show();
                    alert('Su pedido de informaci\u00F3n fu\u00E9 enviado con \u00E9xito');
                    document.getElementById("form-etiqueta").reset();
                    
                } else if (respuesta.codigo == 0 ) {
                    // error
                    alert('error');
                }
              },
              error: function (error) {
                console.log("ERROR: " + error);
              },beforeSend: function () {
                  $('#form-etiqueta').hide();
                  $('#contenedorEspere').show();
                  
              }
          });
      },
      rules: {
          nombre: {
              required: true
          },
          apellido: {
              required: true
          },
          telefono: {
              required: true,
              minlength: 7,
              maxlength: 15,
              number: true
          },
          email: {
            required:true,
            email: true
          },
          cedula: {
              required: true,
              minlength: 10,
              maxlength: 10,
              number: true
          },
          celular: {
              required: true,
              minlength: 10,
              maxlength: 20,
              number: true
          },
          comentario: {
            required: true
          }
      },
      showErrors: function (errorMap, errorList) {
           // Clean up any tooltips for valid elements
          $.each(this.validElements(), function (index, element) {
              var $element = $(element);
              $element.data("title", "") // Clear the title - there is no error associated anymore
                  .removeClass("error")
                  .tooltip("destroy");
          });

          // Create new tooltips for invalid elements
          $.each(errorList, function (index, error) {
              var $element = $(error.element);
              $element.tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
                  .data("title", error.message)
                  .addClass("error")
                  .tooltip(); // Create a new tooltip based on the error messsage we just set in the title
          });
      }
    });

});