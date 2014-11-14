
  $(document).ready(function(){

    $(".sobre").hover(function() {

      $(this).find('#mail_sobre').stop(true , true).hide();
      $(this).find('#mail_sobre_hover').stop(true , true).fadeIn();
      
    }, function() {
      
      $(this).find('#mail_sobre').stop(true , true).show();
      $(this).find('#mail_sobre_hover').stop(true , true).hide();
      
    });

    $('.collapse').on('hide.bs.collapse', function (e) {

        //alert('Event fired on #' + e.currentTarget.id);
        $("#down"+ e.currentTarget.id).show();
        $("#up"+ e.currentTarget.id).hide();
    })

    $('.collapse').on('show.bs.collapse', function (e) {

        //alert('Event fired on #' + e.currentTarget.id);
        $("#down"+ e.currentTarget.id).hide();
        $("#up"+ e.currentTarget.id).show();

    })

    
    //$('nav#menu').mmenu();
    $("#dl-menu").dlmenu();


    $("#form-contacto").validate({
      debug: true,
      submitHandler: function (form) {
          var parametros = {
              nombre: $("#nombre").val(),
              apellido: $("#apellido").val(),
              telefono: $("#telefono").val(),
              email: $("#email").val(),
              ciudad: $("#ciudad").val(),
              area: $("#area").val(),
              observacion: $("#comentario").val()
          }

          $.ajax({
              url: Routing.generate('m_envio_contactenos'),
              type: 'POST',
              async: true,
              data: parametros,
              dataType: 'json',
              success: function (respuesta) {
                console.log(respuesta);
                // console.log(JSON.stringify(respuesta.codigo));
                  if (respuesta.codigo == 1 ) {
                       $('#contacto-mensaje').hide();
                       $('#form-contacto').show();
                       alert('Su pedido de informaci\u00F3n fu\u00E9 enviado con \u00E9xito');
                       document.getElementById("form-contacto").reset();
                       //window.location = Routing.generate('contactenos');
                  }else if (respuesta.codigo == 0 ) {
                        alert(respuesta.mensaje);
                  }else{
                    alert("error");
                  }


              },beforeSend: function () {
                  $('#form-contacto').hide();
                  $('#contacto-mensaje').show();
                  
              },
              error: function (respuesta) {
                console.log("ERROR: " + respuesta);
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
          area: {
            required:true
          },
          ciudad: {
            required: true
          },
          carea: {
            required: true
          },
          comentario:{ 
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

    // TEST DRIVE ////////////////////



    var $validatortest = $("#form-testdrive").validate({
      debug: true,
      submitHandler: function (form) {
        //alert("ok");
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
              minlength:7,
              maxlength:15,
              number:true
          },
          email: {
            required:true,
            email: true
          },
          ciudad: {
            required: true
          },
          cedula: {
            required: true,
            minlength:10,
            maxlength:10,
            number:true
          },
          fecha_nacimiento: {
            required: true
          },
          agencia: {
            required: true
          },
          observaciones: { 
            required: true
          },
          vehiculo: {
            required: true
          },
          fecha: {
            required: true
          },
          hora: {
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
        var $valid = $("#form-testdrive").valid();
        if(!$valid) {
          $validatortest.focusInvalid();
          return false;
        }else{

              var parametros = {
                  nombre: $("#nombre").val(),
                  apellido: $("#apellido").val(),
                  telefono: $("#telefono").val(),
                  email: $("#email").val(),
                  cedula: $("#cedula").val(),
                  nacimiento: $("#fecha_nacimiento").val(),
                  agencia: $("#agencia").val(),
                  ciudad: $("#ciudad").val(),
                  vehiculo: $("#vehiculo").val(),
                  fecha_test: $("#fecha").val(),
                  hora_test: $("#hora").val(),
                  observacion: $("#observaciones").val()

              }

          $.ajax({
              url: Routing.generate('m_envio_test'),
              type: 'POST',
              async: true,
              data: parametros,
              dataType: "json",
              success: function (respuesta) {

                if (respuesta.codigo == 1 ) {
                    
                    alert('Su informacion fu\u00E9 enviada con \u00E9xito');
                    document.getElementById("form-testdrive").reset();
                    $('#form-testdrive').show();
                    $('#mensaje-enviando').hide();
                    $('#rootwizard').find("a[href*='tab1']").trigger('click');

                } else if (respuesta.codigo == 0 ){
                    alert(respuesta.mensaje);
                    $('#form-testdrive').show();
                    $('#mensaje-enviando').hide();
                    $('#rootwizard').find("a[href*='tab1']").trigger('click');
                }
              }, 
              error: function (error) {
                console.log("ERROR: " + error);
              },
              beforeSend: function () {
                  $('#form-testdrive').hide();
                  $('#mensaje-enviando').show();

              }
          });
          
        }
    });


    $('#rootwizard').bootstrapWizard({
      'tabClass': 'nav nav-pills',
      'onNext': function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        var $valid = $("#form-testdrive").valid();
        if(!$valid) {
          $validatortest.focusInvalid();
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

    // CITA DE MANTENIMIENTO ///////////////////////

    var $validatortest = $("#form-cita").validate({
      debug: true,
      submitHandler: function (form) {
        //alert("ok");
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
              minlength:9,
              maxlength:15,
              number:true
          },
          email: {
            required:true,
            email: true
          },
          celular: {
              required: true,
              minlength:10,
              maxlength:22,
              number:true
          },
          reserva: {
            required: true
          },
          taller: {
            required: true
          },          
          fecha: {
            required: true
          },
          modelo: {
            required: true
          },
          kilometraje: {
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

    $('#citawizard .finish').click(function() {
        var $valid = $("#form-cita").valid();
        if(!$valid) {
          $validatortest.focusInvalid();
          return false;
        }else{

              var parametros = {
                  nombre: $("#nombre").val(),
                  apellido: $("#apellido").val(),
                  telefono: $("#telefono").val(),
                  email: $("#email").val(),
                  celular: $("#celular").val(),
                  fecha: $("#fecha").val(),
                  reserva: $("#reserva").val(),
                  taller: $("#taller").val(),
                  modelo: $("#modelo").val(),
                  kilometraje: $("#kilometraje").val(),
                  observaciones: $("#observaciones").val(),
                  comentario: $("#comentario").val(),
                  regalo: $("#regalo").val(),
                  selectedRegalo: $("#selectedRegalo").val()

              }

          $.ajax({
              url: Routing.generate('m_envio_cita'),
              type: 'POST',
              async: true,
              data: parametros,
              dataType: "json",
              success: function (respuesta) {

                if (respuesta.codigo == 1 ) {
                    
                    alert('Su informacion fu\u00E9 enviada con \u00E9xito');
                    document.getElementById("form-cita").reset();
                    $('#form-cita').show();
                    $('#cita-mensaje').hide();
                    $('#citawizard').find("a[href*='tab1']").trigger('click');

                } else if (respuesta.codigo == 0 ){
                    alert(respuesta.mensaje);
                    $('#form-cita').show();
                    $('#cita-mensaje').hide();
                    $('#citawizard').find("a[href*='tab1']").trigger('click');
                }
              }, 
              error: function (error) {
                console.log("ERROR: " + error);
              },
              beforeSend: function () {
                  $('#form-cita').hide();
                  $('#cita-mensaje').show();

              }
          });
          
        }
    });


    $('#citawizard').bootstrapWizard({
      'tabClass': 'nav nav-pills',
      'onNext': function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        var $valid = $("#form-cita").valid();
        if(!$valid) {
          $validatortest.focusInvalid();
          return false;
        }
      }, onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
          $('#citawizard').find('.pager .next').hide();
          $('#citawizard').find('.pager .finish').show();
          $('#citawizard').find('.pager .finish').removeClass('disabled');
        } else {
          $('#citawizard').find('.pager .next').show();
          $('#citawizard').find('.pager .finish').hide();
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


    // COTIZACION 

    var $validatortest = $("#form-cotizar").validate({
      debug: true,
      submitHandler: function (form) {
        //alert("ok");
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
              minlength:9,
              maxlength:15,
              number:true
          },
          cedula: {
            required: true,
            minlength:10,
            maxlength:10,
            number:true
          },
          email: {
            required:true,
            email: true
          },
          vehiculo: {
            required: true
          },
          ciudad: {
            required: true
          },
          entrada: {
            required: true,
            minlength:4,
            maxlength:7,
            number:true
          },          
          plazo: {
            required: true
          },
          mensaje: {
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

    $('#cotizarwizard .finish').click(function() {
        var $valid = $("#form-cotizar").valid();
        if(!$valid) {
          $validatortest.focusInvalid();
          return false;
        }else{

              var parametros = {
                  nombre: $("#nombre").val(),
                  apellido: $("#apellido").val(),
                  telefono: $("#telefono").val(),
                  email: $("#email").val(),
                  ciudad: $("#ciudad").val(),
                  vehiculo: $("#vehiculo").val(),
                  entrada: $("#entrada").val(),
                  plazo: $("#plazo").val(),
                  cedula: $("#cedula").val(),
                  mensaje: $("#mensaje").val()

              }

          $.ajax({
              url: Routing.generate('m_envio_cotizacion'),
              type: 'POST',
              async: true,
              data: parametros,
              dataType: "json",
              success: function (respuesta) {

                if (respuesta.codigo == 1 ) {
                    
                    alert('Su informacion fu\u00E9 enviada con \u00E9xito');
                    document.getElementById("form-cotizar").reset();
                    $('#form-cotizar').show();
                    $('#cotizar-mensaje').hide();
                    $('#cotizarwizard').find("a[href*='datos']").trigger('click');

                } else if (respuesta.codigo == 0 ){
                    alert(respuesta.mensaje);
                    $('#form-cotizar').show();
                    $('#cotizar-mensaje').hide();
                    $('#cotizarwizard').find("a[href*='datos']").trigger('click');
                }
              }, 
              error: function (error) {
                console.log("ERROR: " + error);
              },
              beforeSend: function () {
                  $('#form-cotizar').hide();
                  $('#cotizar-mensaje').show();

              }
          });
          
        }
    });


    $('#cotizarwizard').bootstrapWizard({
      'tabClass': 'nav nav-pills',
      'onNext': function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        var $valid = $("#form-cotizar").valid();
        if(!$valid) {
          $validatortest.focusInvalid();
          return false;
        }
      }, onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
          $('#cotizarwizard').find('.pager .next').hide();
          $('#cotizarwizard').find('.pager .finish').show();
          $('#cotizarwizard').find('.pager .finish').removeClass('disabled');
        } else {
          $('#cotizarwizard').find('.pager .next').show();
          $('#cotizarwizard').find('.pager .finish').hide();
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
    

    // FUNCIONES PARA CITA DE MANTENIMIENTO ////////////////
    
    function reservaSelected(elemento){


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

              $("#taller").html(option);
            }
            //console.log(respuesta.precio);
          }, 
          error: function (error) {
            console.log("ERROR: " + error);
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

             }else if( $("#reserva").val() != 1 ){

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