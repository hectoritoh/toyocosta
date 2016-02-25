/*!
 * Start Bootstrap - Agency Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

var menu_botton_mostrado = false ;

function mostrarSubmenu () {
	
	if( !menu_botton_mostrado ){

      //$("#footer-banners").stop(true, true).animate({ marginBottom: '0px'}, 600);
      
      $("#submenu").fadeIn("slow");
      
      $("#mas3").hide();
      $("#menos").show();

      menu_botton_mostrado = true ;
    }
    else{
      //$("#footer-banners").stop(true, true).animate({ marginBottom: margenlink + 'px'}, 600);

      $("#submenu").fadeOut("slow");
      $("#mas3").show();
      $("#menos").hide();

      menu_botton_mostrado = false ;
    }

}
  
  function reservaSelected(elemento){

      if ( $(elemento).val() == 1 ) { 
        //Reserva de mantenimiento
        //alert("lalala");
        $("#sm-modelo-km").show();
        $("#sm-comentario").hide();
      }else{
        $("#sm-modelo-km").hide();
        $("#sm-comentario").show();
      }

      var parametros = {
          reserva: $(elemento).val()
      }

      $.ajax({
          url: Routing.generate('get_taller'),
          type: 'POST',
          async: true,
          data: parametros,
          dataType: "json",
          success: function (respuesta) {
            
            if(respuesta.codigo == 1){
              var option = '<option value="" selected>Selecciona un taller</option>';            
              for (var i = 0; i < respuesta.talleres.length; i++) {
                option += '<option value="'+ respuesta.talleres[i].id + '">' + respuesta.talleres[i].nombre + '</option>';
              };

              $("#mtaller").html(option);
            }
            //console.log(respuesta.precio);
          }

      });
  }

    function tallerSelected(elemento){
      
      var url = $("#dir").text();
      

      var parametros = {
          taller: $(elemento).val()
      }

      $.ajax({
          url: Routing.generate('consultar_obsequios'),
          type: 'POST',
          async: true,
          data: parametros,
          dataType: "json",
          success: function (respuesta) {
            
            if(respuesta.codigo == 1){
              var option = '<option selected disabled="disabled"></option>';            
              for (var i = 0; i < respuesta.obsequios.length; i++) {

                var valor = respuesta.obsequios[i]['stock'] - respuesta.obsequios[i]['registro'];

                if ( valor == 0 ) {

                    option += '<option value="'+ respuesta.obsequios[i]['id'] + '" disabled="disabled" data-img-src="'+url+''+respuesta.obsequios[i]['imagen']+'" >AGOTADO</option>';

                }else{

                    option += '<option value="'+ respuesta.obsequios[i]['id'] + '" data-img-src="'+url+''+respuesta.obsequios[i]['imagen']+'" ></option>';
                }


              };

              $("#regalo").html(option);

            }
             


            $("#regalo").imagepicker({

                show_label  : true    

            });

            $("option[disabled=disabled]").each(function(){

                var ruta = $(this).attr("data-img-src");
                $("img[src='"+  ruta +"']").css({opacity: 0.5});


            });



            $(".thumbnail").click(function(){

                $("#selectedRegalo").val("si");

                seleccionado = true; 

            });


              // taller 1 mantenimiento 

             if ( respuesta.obsequios.length == 0 ) {

                $("#bloque-obsequio").hide();   

             }else if( $("#mreserva").val() != 1 ){

                $("#bloque-obsequio").hide();  

             }else{
              
                $("#bloque-obsequio").show();
             };


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
            $("#vpreciosi").text( respuesta.precio + " USD");
            $("#vprecioci").text( respuesta.precioNeto + " USD");
            $("#ventradam").text( respuesta.entradaMinima + " USD");
            $("#vdescripcion").text( respuesta.descripcion);
            var option = '<option value="" selected>Selecciona un plazo</option>';            
            for (var i = 0; i < respuesta.plazos.length; i++) {
              option += '<option value="'+ respuesta.plazos[i]["id"] + '">' + respuesta.plazos[i]["valor"] + '</option>';
            };

            $("#vselectplazo").html(option);
            //$("#imgModelo").attr("src", respuesta.imagenModelo); //FZZIO cambiar por las imagenes de modelo
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
            $("#vpreciofinanciar").text(respuesta.precioFinanciar + " USD");
            $("#vcuotas").text(respuesta.valorCuotas + " USD");
            $("#vpreciofinal").text(respuesta.precioFinal + " USD");
          }
          //console.log(respuesta.precio);
        }, 
        error: function (error) {
          console.log("ERROR: " + error);
        }
    });
  }

  function mostrarSeminuevos(){

    $(".bloque-seminuevos:hidden").eq(0).show('slow',function(){
      $('.contenedor-centrar').each(function () {
                 centrarHorizontal($(this));
               });
    });
    
  }


  function plazoSelectedSM(plazo, idseminuevo){
    var parametros = {
        plazoid: $(plazo).val(),
        valorentrada: $("#vinputEntrada").val(),
        seminuevoid: idseminuevo
    }

    $.ajax({
        url: Routing.generate('consultar_plazo_sm'),
        type: 'POST',
        async: true,
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
          //alert("ok");
          if(respuesta.codigo == 1){
            $("#vpreciofinanciar").text( respuesta.precioFinanciar + "USD " );
            $("#vcuotas").text( respuesta.valorCuotas + "USD " );
            $("#vpreciofinal").text( respuesta.precioFinal + "USD " );
          }
          //console.log(respuesta.precio);
        }, 
        error: function (error) {
          console.log("ERROR: " + error);
        }
    });
  }

 $(window).load(function() {

    $( '.cbp-ntaccordion' ).cbpNTAccordion();

  });

$(document).ready(function(){



    $('a[id^="categoria"]').click(function ( e ) {

      e.preventDefault();
      var id= $(this).attr('id');

      
      $(".fondo-menu-vehiculo:not(#submenu"+id+")").slideUp("slow");
      

        if ($("#submenu"+id).is(":hidden") ) {

          
          $("#submenu"+id).stop(true, true).slideDown("slow");
          
          

        }
        else{
          
          $("#submenu"+id).stop(true, true).slideUp("slow");

        }


    });


    $("#face, #tweet, #blog").hover(function() {
      $(this).find('.img-normal').stop(true , true).hide();
      $(this).find('.img-hover').stop(true , true).fadeIn();
      
    }, function() {
      $(this).find('.img-normal').stop(true , true).show();
      $(this).find('.img-hover').stop(true , true).hide();
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('#gallery').finalTilesGallery({
        gridSize: 20,
        minTileWidth: 100
    });

     //Hover de productos
    $(".contenedorProducto").hover(
      function(){ 
        $(this).find(".ficha").css("margin-bottom","0px");
                
        $(this).find(".btn-toggle").show();
      }, 
      function(){ 
        $(this).find(".btn-toggle").hide();
        
        $(this).find(".ficha").css("margin-bottom","33px");
      });

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
              requerimiento: $("#crequerimiento").val(),
              observacion: $("#cobs").val()
          }

          $.ajax({
              url: Routing.generate('envio_contacto'),
              type: 'POST',
              async: true,
              data: parametros,
              dataType: 'json',
              success: function (respuesta) {
                console.log(respuesta);
                // console.log(JSON.stringify(respuesta.codigo));
                  if (respuesta.codigo == 1 ) {
                      $('#contenedorEspereContacto').hide();
                      //$('#contenedorFormContacto').show();
                      
                      $("#btn-contacto").removeAttr("disabled");
                       alert('Su pedido de informaci\u00F3n fu\u00E9 enviado con \u00E9xito');
                       document.getElementById("form-contacto").reset();
                       //window.location = Routing.generate('contactenos');
                  }else if (respuesta.codigo == 0 ) {
                        alert(respuesta.mensaje);
                  }else{
                    alert("error");
                  }


              },beforeSend: function () {
                  //$('#contenedorFormContacto').hide();
                  $("#btn-contacto").attr('disabled','disabled');
                  $('#contenedorEspereContacto').show();
                  
              },
              error: function (respuesta) {
                console.log("ERROR: " + respuesta);
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
          crequerimiento: {
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
                  url: Routing.generate('test_drive'),
                  type: 'POST',
                  async: true,
                  data: parametros,
                  dataType: "json",
                  success: function (respuesta) {

                    if (respuesta.codigo == 1 ) {
                        $('#contenedorEspereTest').hide();
                        //$('#contenedorFormTest').show();
                          $("#btn-test").removeAttr("disabled");
                         alert('Su pedido de informaci\u00F3n fu\u00E9 enviado con \u00E9xito');
                         document.getElementById("form-test").reset();
                         //window.location = Routing.generate('contactenos');
                    } else if (respuesta.codigo == 0 ) {
                          alert(respuesta.mensaje);
                    } 

                  }, 
                  error: function (error) {
                    console.log("ERROR: " + error);
                  },
                  beforeSend: function () {
                      //$('#contenedorFormTest').hide();
                      $("#btn-test").attr('disabled','disabled');
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

    $("#form-mantenimiento").validate({
        debug: true,
        submitHandler: function (form) {
            var parametros = {
                nombre: $("#mnombre").val(),
                apellido: $("#mapellido").val(),
                telefono: $("#mtelefono").val(),
                email: $("#memail").val(),
                celular: $("#mcelular").val(),
                fecha: $("#mfecha").val(),
                reserva: $("#mreserva").val(),
                observaciones: $("#mobservaciones").val(),
                taller: $("#mtaller").val(),
                comentario: $("#mcomentario").val(),
                modelo: $("#mmodelo").val(),
                kilometraje: $("#mkilometraje").val(),
                regalo: $("#regalo").val(),
                selectedRegalo: $("#selectedRegalo").val(),
                formulario: $("#formulario").val()

            }
            
            $.ajax({
                url: Routing.generate('envio_mantenimiento'),
                type: 'POST',
                async: true,
                data: parametros,
                dataType: "json",
                success: function (respuesta) {

                  if (respuesta.codigo == 1 ) {
                      $('#contenedorEspereMantenimiento').hide();
                      
                      $("#btn-cita").removeAttr("disabled");
                       alert('Su pedido de informaci\u00F3n fu\u00E9 enviado con \u00E9xito');
                       document.getElementById("form-mantenimiento").reset();
                       
                  }else if (respuesta.codigo == 0 ) {
                        alert(respuesta.mensaje);
                  }else{
                    alert("error");
                  }

                }, 
                beforeSend: function () {
                    //$('#contenedorFormMantenimiento').hide();
                    $("#btn-cita").attr('disabled','disabled');
                    $('#contenedorEspereMantenimiento').show();
                },
                error: function (error) {
                  console.log("ERROR: " + error);
                }
                
            });
        },
        rules: {
            mnombre: {
                required: true
            },
            mapellido: {
                required: true
            },
            mtelefono: {
                required: true,
                minlength:7,
                maxlength:15,
                number:true
            },
            memail: {
              required:true,
              email: true
            },
            mcelular: {
                required: true,
                minlength:7,
                maxlength:15,
                number:true
            },
            mfecha: {
              required: true
            },
            mreserva: { 
              required: true
            },
            mobservaciones: {
              required: true
            },
            mtaller: {
              required: true
            },
            mcomentario: {
              required: true
            },
            mmodelo: {
              required: true
            },
            mkilometraje: {
              required: true
            },
            regalo: {
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

    var $validatorvehiculo = $("#cotizarForm").validate({
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
          minlength: 3,
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
        var $valid = $("#cotizarForm").valid();
        if(!$valid) {
          $validatorvehiculo.focusInvalid();
          return false;
        }else{

          var parametros = {
              plazoid: $("#vselectplazo").val(),
              valorentrada: $("#vinputEntrada").val(),
              modeloid: $("#vselectmodelo").val(),
              nombre: $("#vnombreInput").val(),
              apellido: $("#vapellidoInput").val(),
              cedula: $("#vcedulaInput").val(),
              telefono: $("#vtelefonoInput").val(),
              email: $("#vemailInput").val(),
              ciudad: $("#vciudadInput").val(),
              mensaje: $("#vmensajeInput").val()
          }

          $.ajax({
              url: Routing.generate('envio_cotizacion'),
              type: 'POST',
              async: true,
              data: parametros,
              dataType: "json",
              success: function (respuesta) {

                if (respuesta.codigo == 1 ) {
                    $('#contenedorEspereCotizar').hide();
                    
                    $("#enviar").removeAttr("disabled");
                    alert('Su cotizaci\u00F3n fu\u00E9 enviada con \u00E9xito');
                    document.getElementById("cotizarForm").reset();
                    
                    $('#rootwizard').find("a[href*='tab1']").trigger('click');


                } else if (respuesta.codigo == 0 ){
                      // error
                }
              }, 
              error: function (error) {
                console.log("ERROR: " + error);
              },
              beforeSend: function () {
                  
                  $("#enviar").attr('disabled', 'disabled');
                  $('#contenedorEspereCotizar').show();
              }
          });
          
        }
    });

 
    $('#rootwizard').bootstrapWizard({
      'tabClass': 'nav nav-pills',
      'onNext': function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        var $valid = $("#cotizarForm").valid();
        if(!$valid) {
          $validatorvehiculo.focusInvalid();
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
  

        //////////////////////////////////////////////////////////////////////

    var $validator = $("#cotizarFormSN").validate({
      debug: true,
      submitHandler: function (form) {
        //alert("ok");
      },
      rules: {
        vinputEntrada: {
          required: true,
          number: true,
          minlength: 3,
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

    $('#rootwizard2 .finish').click(function() {
        var $valid = $("#cotizarFormSN").valid();
        if(!$valid) {
          $validator.focusInvalid();
          return false;
        }else{

          var parametros = {
              plazoid: $("#vselectplazo").val(),
              valorentrada: $("#vinputEntrada").val(),
              seminuevoid: $("#vseminuevo").val(),
              nombre: $("#vnombreInput").val(),
              apellido: $("#vapellidoInput").val(),
              cedula: $("#vcedulaInput").val(),
              telefono: $("#vtelefonoInput").val(),
              email: $("#vemailInput").val(),
              ciudad: $("#vciudadInput").val(),
              mensaje: $("#vmensajeInput").val()
          }

          $.ajax({
              url: Routing.generate('envio_cotizacion_sm'),
              type: 'POST',
              async: true,
              data: parametros,
              dataType: "json",
              success: function (respuesta) {

                if (respuesta.codigo == 1 ) {
                    $('#contenedorEspereCotizar').hide();
                    $('#cotizarFormSN').show();
                    alert('Su cotizaci\u00F3n fu\u00E9 enviada con \u00E9xito');
                    document.getElementById("cotizarFormSN").reset();
                    //window.location = Routing.generate('contactenos');
                    $('#rootwizard2').find("a[href*='tab1']").trigger('click');
                } else if (respuesta.codigo == 0 ){
                      // error
                }
              }, 
              error: function (error) {
                console.log("ERROR: " + error);
              },
              beforeSend: function () {
                  $('#cotizarFormSN').hide();
                  $('#contenedorEspereCotizar').show();
              }
          });
          
        }
    });

 
    $('#rootwizard2').bootstrapWizard({
      'tabClass': 'nav nav-pills',
      'onNext': function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        var $valid = $("#cotizarFormSN").valid();
        if(!$valid) {
          $validator.focusInvalid();
          return false;
        }
      }, onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
          $('#rootwizard2').find('.pager .next').hide();
          $('#rootwizard2').find('.pager .finish').show();
          $('#rootwizard2').find('.pager .finish').removeClass('disabled');
        } else {
          $('#rootwizard2').find('.pager .next').show();
          $('#rootwizard2').find('.pager .finish').hide();
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