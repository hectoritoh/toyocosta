var seleccionado = false; 


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
            $("#imgModelo").attr("src", respuesta.imagenModelo); //FZZIO cambiar por las imagenes de modelo
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


     
  $('a.submenu-vehiculo-item').on('click', function(event) {
      $(this).closest('.submenu-vehiculo').find('div').removeClass("active");
      $(this).parent().addClass("active");
  });


  $(window).bind('scroll', function() {
    if ($(window).scrollTop() > 50) {
      $('.header-toyocosta').addClass('bajar');
    }
    else {
      $('.header-toyocosta').removeClass('bajar');
    }
  });

$(document).ready(function(){

  $("body").queryLoader2({
    barColor: "#df192b",
    backgroundColor: "#fff",
        // percentage: true,
        barHeight: 1,
        completeAnimation: "grow",
        minimumTime: 100,
        onLoadComplete:function(){
          

        }
  });

  $('#modalRegistrar').modal({
        backdrop: 'static',
        keyboard: false
  });
  $('#modalRegistrar').on('shown.bs.modal', function () {
      $("a[href='#seccion-trivia']").click();
  })





  $('.navbar-nav-vehiculos').find('li').removeClass("active");

 	$('.contenedor-centrar').each(function () {
       centrarVert($(this));
     });

	$('.centrado-horizontal').each(function () {
       centrarHorizontal($(this));
     });

      // MODAL PARA LAS LLANTAS PIRELLI 
  $('a[id^="llanta"]').click(function(){

        var id = $(this).attr('id');
        $('#Modal_llanta'+id).modal({show:true})
  });


  $(".tab-especificaciones").find("table").addClass("table table-hover table-responsive table-striped");


  $("a.item-submenu-v").click(function (e) {
    e.preventDefault();
    $(".contenedor-submenu-items").hide();
    $( "#" + $(this).attr("data-target") ).show();
    $('#fondo-submenu').stop(true, true).slideToggle( "slow" );
  });
  

  //  $('.page-scroller a.menuprincipal').bind('click', function(event) {
  //   event.preventDefault();

  //   var $anchor = $(this);
  //   $('html, body').stop().animate({
  //     scrollTop: $($anchor.attr('href')).offset().top
  //   }, 1500, 'easeInOutExpo');
  // });



    //////////ENVIO DE FORMULARIOS/////////////////

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


    $('#rcv').fileupload({
        dataType: 'json',
        url: Routing.generate('envio_rrhh_adjunto'),
        done: function (e, data) {
          //console.log(data.result.rutaarchivo);
          
          $("#rutacv").val(data.result.rutaarchivo);
        }
    });

    $('.input-foto-seminuevo').fileupload({
        dataType: 'json',
        url: Routing.generate('seminuevo_foto_adjunta'),
        done: function (e, data) {
          //alert(data.result.rutaarchivo);
          $(this).parent().find("input[type=hidden]").val(data.result.rutaarchivo);
        }
    });  

    $("#form-rrhh").validate({
      debug: true,
      submitHandler: function (form) {
          var parametros = {
              nombre: $("#rnombre").val(),
              apellido: $("#rapellido").val(),
              telefono: $("#rtelefono").val(),
              email: $("#remail").val(),
              cargo: $("#rcargo").val(),
              rutacv: $("#rutacv").val()              
          }

          $.ajax({
              url: Routing.generate('envio_rrhh'),
              type: 'POST',
              async: true,
              data: parametros,
              dataType: "json",
              success: function (respuesta) {
                console.log(respuesta);
                if (respuesta.codigo == 1 ) {
                    alert('Su pedido de informaci\u00F3n fu\u00E9 enviado con \u00E9xito');
                    $('#contenedorEspereRRHH').hide();
                    $('#contenedorFormRRHH').show();
                    document.getElementById("form-rrhh").reset();
                    //window.location = Routing.generate('contactenos');
                } else if (respuesta.codigo == 0 ) {
                    // error
                    alert('error');
                }
              },
              error: function (error) {
                console.log("ERROR: " + error);
              },beforeSend: function () {
                  $('#contenedorFormRRHH').hide();
                  $('#contenedorEspereRRHH').show();
                  
              }
          });
      },
      rules: {
          rnombre: {
            required: true
          },
          rapellido: {
            required: true
          },
          rtelefono: {
              required: true,
              minlength: 7,
              maxlength: 15,
              number: true
          },
          rcv: {
            required:true,
          },
          remail: {
            required:true,
            email: true
          },
          rcargo: {
            required:true
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
              dataType: 'json',
              success: function (respuesta) {
                console.log(respuesta);
                // console.log(JSON.stringify(respuesta.codigo));
                  if (respuesta.codigo == 1 ) {
                      $('#contenedorEspereContacto').hide();
                      $('#contenedorFormContacto').show();
                       alert('Su pedido de informaci\u00F3n fu\u00E9 enviado con \u00E9xito');
                       document.getElementById("form-contacto").reset();
                       //window.location = Routing.generate('contactenos');
                  }else if (respuesta.codigo == 0 ) {
                        alert(respuesta.mensaje);
                  }else{
                    alert("error");
                  }


              },beforeSend: function () {
                  $('#contenedorFormContacto').hide();
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
                  foto8: $("#sm_input_file_8").val(),
                  nombre: $("#nombre").val(),
                  telefono: $("#telefono").val(),
                  cedula: $("#cedula").val(),
                  email: $("#email").val()
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
              autorizo:{
              	required: true
              },
              /*sm_input_file_1:{ 
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
              }*/
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
                        $('#contenedorFormTest').show();
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
                selectedRegalo: $("#selectedRegalo").val()

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
                      $('#contenedorFormMantenimiento').show();
                       alert('Su pedido de informaci\u00F3n fu\u00E9 enviado con \u00E9xito');
                       document.getElementById("form-mantenimiento").reset();
                       //window.location = Routing.generate('contactenos');
                  }else if (respuesta.codigo == 0 ) {
                        alert(respuesta.mensaje);
                  }else{
                    alert("error");
                  }

                }, 
                beforeSend: function () {
                    $('#contenedorFormMantenimiento').hide();
                    $('#contenedorEspereMantenimiento').show();
                }
                // ,
                // error: function (error) {
                //   console.log("ERROR: " + error);
                // }
                
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
                    $('#cotizarForm').show();
                    alert('Su cotizaci\u00F3n fu\u00E9 enviada con \u00E9xito');
                     //document.getElementById("cotizarForm").reset();
                     //window.location = Routing.generate('contactenos');
                    $('#rootwizard').find("a[href*='tab1']").trigger('click');
                } else if (respuesta.codigo == 0 ){
                      // error
                }
              }, 
              error: function (error) {
                console.log("ERROR: " + error);
              },
              beforeSend: function () {
                  $('#cotizarForm').hide();
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


