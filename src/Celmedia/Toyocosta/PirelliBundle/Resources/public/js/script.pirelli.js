
$(document).ready(function(){

      validarDatos();

      // MODAL PARA LAS LLANTAS PIRELLI 
      $('a[id^="llanta"]').click(function(){

        var id = $(this).attr('id');
        $('#Modal_llanta'+id).modal({show:true})
      });

      //Select Box 
      $('#selectmodelo, #selectmedida, #selectrin, #selectprecio').selectbox();

      $('.selectcmb').selectbox();
});

function validarDatos() {

  $("#form-pirelli").validate({
        debug: true,
        submitHandler: function (form) {
            var parametros = {
                nombre: $("#inputNombre").val(),
                apellido: $("#inputApellido").val(),
                telefono: $("#inputTelefono").val(),
                celular: $("#inputCelular").val(),
                email: $("#inputEmail").val(),
                cedula: $("#inputCedula").val(),
                comentario: $("#inputComentario").val(),
                llanta: $("#llanta_id").val()
            }

            $.ajax({
                url: Routing.generate('pirelli_envio_info'),
                type: 'POST',
                async: true,
                data: parametros,
                success: function (respuesta) {
                    // alert(respuesta);
                    if (respuesta == "ok") {
                        // alert("Su pedido de informacion fue enviado exitosamente");
                        // document.getElementById("form-pirelli").reset();
                        window.location = Routing.generate('pirelli_mensaje');
                    } else {
                        // error
                    }

                }, 
                error: function (error) {
                  console.log("ERROR: " + error);
                }
            });

        },
        rules: {
            inputNombre: {
                required: true
            },
            inputEmail: {
                required: true,
                email: true
            },
            inputApellido: {
                required: true
            },
            inputTelefono: {
                required:true,
                minlength:7,
                maxlength:15,
                number:true
            },
            inputCelular: {
                required:true,
                minlength:10,
                maxlength:10,
                number:true
            },
            inputCedula: {
                required:true,
                minlength:10,
                maxlength:10,
                number:true
            },
            inputComentario: {
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



}
