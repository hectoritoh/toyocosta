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

function reservaSelected(elemento){


    var parametros = {

        reserva: $( "#" + $(elemento).attr("id") ).val()
    }

    $.ajax({
        url: Routing.generate('get_taller'),
        type: 'POST',
        async: true,
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
          
          if(respuesta.codigo == 1){

            
            var option = '<option value="" selected>Selecciona un plazo</option>';            
            for (var i = 0; i < respuesta.reserva_taller.length; i++) {
              option += '<option value="'+ respuesta.reserva_taller.talleres + '">' + respuesta.reserva_taller.talleres + '</option>';
            };

            $("#taller").html(option);
          }
          //console.log(respuesta.precio);
        }, 
        error: function (error) {
          console.log("ERROR: " + error);
        }
    });



}


  function modeloSelected(modelo){

    var parametros = {
        modeloid: $(modelo).val()
    }

    $.ajax({
        url: Routing.generate('consultar_precio'),
        type: 'POST',
        async: true,
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
          //alert("ok");
          if(respuesta.codigo == 1){
            $("#vpreciosi").text("$ " + respuesta.precio);
            $("#vprecioci").text("$ " + respuesta.precioNeto);
            $("#ventradam").text("$ " + respuesta.entradaMinima);

            var option = '<option value="" selected>Selecciona un plazo</option>';            
            for (var i = 0; i < respuesta.plazos.length; i++) {
              option += '<option value="'+ respuesta.plazos[i]["id"] + '">' + respuesta.plazos[i]["valor"] + '</option>';
            };

            $("#vselectplazo").html(option);
          }
          //console.log(respuesta.precio);
        }, 
        error: function (error) {
          console.log("ERROR: " + error);
        }
    });
  }

  function plazoSelected(plazo){
    var parametros = {
        plazoid: $(plazo).val(),
        valorentrada: $("#vinputEntrada").val(),
        modeloid: $("#vselectmodelo").val()
    }

    $.ajax({
        url: Routing.generate('consultar_plazo'),
        type: 'POST',
        async: true,
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
          //alert("ok");
          if(respuesta.codigo == 1){
            $("#vpreciofinanciar").text("$ " + respuesta.precioFinanciar);
            $("#vcuotas").text("$ " + respuesta.valorCuotas);
            $("#vpreciofinal").text("$ " + respuesta.precioFinal);
          }
          //console.log(respuesta.precio);
        }, 
        error: function (error) {
          console.log("ERROR: " + error);
        }
    });
  }

$(document).ready(function(){

 	$('.contenedor-centrar').each(function () {
       centrarVert($(this));
     });

	$('.centrado-horizontal').each(function () {
       centrarHorizontal($(this));
     });

	$('.selectcmb').selectbox();

	/*$('[data-spy="scroll"]').each(function () {
		var $spy = $(this).scrollspy('refresh')
	})*/

	/*$('.page-scroll a.navegacion').bind('click', function(event) {
		event.preventDefault();

		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1500, 'easeInOutExpo');
	});*/


	$("a.item-submenu-v").click(function (e) {
        e.preventDefault();
        $(".contenedor-submenu-items").hide();
        $( "#" + $(this).attr("data-target") ).show();
    	$('#fondo-submenu').stop(true, true).slideToggle( "slow" );
    });

	/*$('ul.navbar-nav-vehiculos > li').click(function (e) {
        e.preventDefault();
        $('ul.navbar-nav-vehiculos > li').removeClass('active');
        $(this).addClass('active');
    });*/

	/*$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		//console.log (e.target); // activated tab
		//console.log (e.relatedTarget); // previous tab
		//console.log (this);
		$(this).parent('li').removeClass("active");
		$(e.target).parent('li').addClass("active");
	})*/

    
    $("#form-contacto").validate({
      debug: true,
      submitHandler: function (form) {
          var parametros = {
              nombre: $("#cnombre").val(),
              apellido: $("#capellido").val(),
              telefono: $("#cinputTelefono").val(),
              email: $("#cemail").val(),
              ciudad: $("#cciudad").val(),
              area: $("#carea").val(),
              observacion: $("#cobs").val()
          }

          $.ajax({
              url: Routing.generate('envio_contacto'),
              type: 'POST',
              async: true,
              data: parametros,
              dataType: "json",
              success: function (respuesta) {
                console.log(respuesta);
                if (respuesta.codigo == 1 ) {
                    //alert('Su pedido de informaci\u00F3n fu\u00E9 enviado con \u00E9xito');
                    $('#contenedorEspereContacto').hide();
                    $('#contenedorFormContacto').show();
                    document.getElementById("form-contacto").reset();
                    //window.location = Routing.generate('contactenos');
                } else if (respuesta.codigo == 0 ) {
                    // error
                    alert('error');
                }
              },
              error: function (error) {
                console.log("ERROR: " + error);
              },beforeSend: function () {
                  $('#contenedorFormContacto').hide();
                  $('#contenedorEspereContacto').show();
                  
              }
          });
      },
      rules: {
          cnombre: {
              required: true
          },
          capellido: {
              required: true
          },
          cinputTelefono: {
              required: true,
              minlength: 7,
              maxlength: 15,
              number: true
          },
          cemail: {
            required:true,
            email: true
          },
          carea: {
            required:true
          },
          cciudad: {
            required: true
          },
          carea: {
            required: true
          },
          cobs:{ 
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

    $("#form-vehiculo").validate({
          debug: true,
          submitHandler: function (form) {
              var parametros = {
              	  usuario: $("#usuario").val(),
              	  email: $("#email").val(),
                  modelo: $("#sm_input_modelo").val(),
                  kilometraje: $("#sm_input_kilometraje").val(),
                  marca: $("#selectmarca").val(),
                  tipo: $("#selecttipo").val(),
                  precio: $("#sm_input_precio").val(),
                  anio: $("#sm_input_anio").val(),
                  color: $("#selectcolor").val(),
                  ciudad: $("#sm_input_ciudad").val(),
                  placa: $("#sm_input_placa").val(),
                  foto1: $("#sm_input_file_1").val(),
                  foto2: $("#sm_input_file_2").val(),
                  foto3: $("#sm_input_file_3").val(),
                  foto4: $("#sm_input_file_4").val(),
                  foto5: $("#sm_input_file_5").val(),
                  foto6: $("#sm_input_file_6").val(),
                  foto7: $("#sm_input_file_7").val(),
                  foto8: $("#sm_input_file_8").val()

              }

              $.ajax({
                  url: Routing.generate('envio_usado'),
                  type: 'POST',
                  async: true,
                  data: parametros,
                  success: function (response) {

                      if (response.code == 1 ) {
                          
                          alert("Su pedido de informacion fue enviado exitosamente");
                          
                          // window.location = Routing.generate('pirelli_mensaje');
                      } else {
                          // error
                      }

                  }, 
                  error: function (error) {
                    console.log("ERROR: " + error);
                  }
              });

            window.location.href = "#mensaje-venta";
          },
          rules: {
              sm_input_modelo: {
                  required: true
              },
              sm_input_kilometraje: {
                  required: true
              },
              selectmarca: {
                  required: true
              },
              selecttipo: {
                  required:true
              },
              sm_input_precio: {
                  required: true,
                  minlength:5,
                  maxlength:15,
                  number:true
              },
              sm_input_anio: {
              	  required: true,
                  minlength:4,
                  maxlength:5,
                  number:true
              },
              selectcolor: {
              	required:true
              },
              sm_input_ciudad: {
              	required: true
              },
              sm_input_placa: {
              	required: true,
              	minlength:6,
              	maxlength: 7
              },
              sm_input_file_1:{ 
              	required: true
              },
              sm_input_file_2: {
              	required: true
              },
              sm_input_file_3: {
              	required: true
              },
              sm_input_file_4:{
              	required:true
              },
              autorizo:{
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

    $("#form-test").validate({
          debug: true,
          submitHandler: function (form) {
              var parametros = {
                  nombre: $("#nombre_test").val(),
                  apellido: $("#apellido_test").val(),
                  telefono: $("#telefono_test").val(),
                  email: $("#email_test").val(),
                  cedula: $("#cedula_test").val(),
                  nacimiento: $("#nacimiento_test").val(),
                  agencia: $("#agencia_test").val(),
                  ciudad: $("#ciudad_test").val(),
                  vehiculo: $("#vehiculo_test").val(),
                  fecha_test: $("#fecha_test").val(),
                  hora_test: $("#hora_test").val(),
                  observacion: $("#obs_test").val()

              }

              $.ajax({
                  url: Routing.generate('envio_test'),
                  type: 'POST',
                  async: true,
                  data: parametros,
                  dataType: "json",
                  success: function (respuesta) {

                    if (respuesta.codigo == 1 ) {
                        $('#contenedorEspereTest').hide();
                        $('#contenedorFormTest').show();
                         alert('Su pedido de informaci\u00F3n fu\u00E9 enviado con \u00E9xito');
                         document.getElementById("form-test").reset();
                         //window.location = Routing.generate('contactenos');
                    } else {
                          // error
                    }

                  }, 
                  error: function (error) {
                    console.log("ERROR: " + error);
                  },
                  beforeSend: function () {
                      $('#contenedorFormTest').hide();
                      $('#contenedorEspereTest').show();
                  }
              });

          },
          rules: {
              nombre_test: {
                  required: true
              },
              apellido_test: {
                  required: true
              },
              telefono_test: {
                  required: true,
                  minlength:7,
                  maxlength:15,
                  number:true
              },
              email_test: {
                required:true,
                email: true
              },
              ciudad_test: {
                required: true
              },
              cedula_test: {
                required: true,
                minlength:10,
                maxlength:10,
                number:true
              },
              nacimiento_test: {
                required: true
              },
              agencia_test: {
                required: true
              },
              obs_test: { 
                required: true
              },
              vehiculo_test: {
                required: true
              },
              fecha_test: {
                required: true
              },
              hora_test: {
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


    var $validator = $("#commentForm").validate({
      debug: true,
      submitHandler: function (form) {
        //alert("ok");
      },
      rules: {
        vselectmodelo: {
          required: true
        },
        vinputEntrada: {
          required: true,
          number: true,
          minlength: 3
        },
        vselectplazo: {
          required: true
        },
        vnombreInput:{
          required: true
        },
        vapellidoInput:{
          required: true
        },
        vcedulaInput:{
          required: true
        },
        vtelefonoInput:{
          required: true
        },
        vemailInput:{
          required: true
        },
        vciudadInput:{
          required: true
        },
        vmensajeInput:{
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

    $('#rootwizard .finish').click(function() {
        var $valid = $("#commentForm").valid();
        if(!$valid) {
          $validator.focusInvalid();
          return false;
        }else{
          alert('Finalizado!, Enviar!');
          $('#rootwizard').find("a[href*='tab1']").trigger('click');
        }
    });

 
    $('#rootwizard').bootstrapWizard({
      'tabClass': 'nav nav-pills',
      'onNext': function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        var $valid = $("#commentForm").valid();
        if(!$valid) {
          $validator.focusInvalid();
          return false;
        }
      }, onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
          $('#rootwizard').find('.pager .next').hide();
          $('#rootwizard').find('.pager .finish').show();
          $('#rootwizard').find('.pager .finish').removeClass('disabled');
        } else {
          $('#rootwizard').find('.pager .next').show();
          $('#rootwizard').find('.pager .finish').hide();
        }
      }, onTabClick: function(tab, navigation, index) {
          //alert('on tab click disabled');
          //return false;
      }, onTabChange: function(tab, navigation, index) {
        
        if(index >= 1) {
          //alert('on tab show disabled');
          //return false;
        }
      }
    }); 


});