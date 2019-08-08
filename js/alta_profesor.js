$(document).ready(function(){

  let boton_registrar = $('#botonRegistrar');

  let input_apellido_paterno = $('#apellido_paterno');
  let input_apellido_materno = $('#apellido_materno');
  let input_nombre = $('#nombre');
  let input_CURP = $('#CURP');
  let input_RFC = $('#RFC');
  let input_NSS = $('#NSS');
  let input_email = $('#email');
  let input_f_nac = $('#f_nac');
  let input_sexo_M = $('#masculino');
  let input_sexo_F = $('#femenino');
  let input_telefono_1 = $('#telefono_1');
  let input_telefono_2 = $('#telefono_2');
  let input_sexo_valor;

//INICIO DE VALIDACIONES
  let bandera = false;

//INPUT's VALIDACION
  $("input[type = 'text']").each(function(){

    if($(this).val()==""){
         bandera = true;
    }

  });

//FECHA VALIDACION
  if(!Date.parse($('#f_nac').val())){

    bandera = true;
  
  }

  if(bandera){
    Swal.fire({
      type: 'error',
      title: 'ERROR.',
      text: 'HAY UN CAMPO O CAMPOS VACIO(S). VERIFIQUE E INTENTE NUEVAMENTE.',
      footer: 'PRESIONE "OK" PARA CONTINUAR'
    });
  }
  //  Si no hay errores, llenar las variables con los valores
  else 
 
  input_apellido_paterno = $('#apellido_paterno').val();
  input_apellido_materno = $('#apellido_materno').val();
  input_nombre = $('#nombre').val();
  input_CURP = $('#CURP').val();
  input_RFC = $('#RFC').val();
  input_NSS = $('#NSS').val();
  input_email = $('#email').val();
  input_telefono_2 = $('#telefono_2').val();
  input_f_nac = $('#f_nac').val();
  input_sexo_M = $('#masculino').val();
  input_sexo_F = $('#femenino').val();
  input_telefono_1 = $('#telefono_1').val();

  if ((input_sexo_M).is(':checked'))
  {
    input_sexo_valor = "M";
  }

  else if ((input_sexo_F).is(':checked'))
  {
    input_sexo_valor = "F";
  }

  botonRegistrar.click(function(){
    // alert("ESO CHINGON");
    $.ajax({
      type:"POST",
      url:"../formularios/registro_empleado.php",
      data: {
      //   input_apellido_paterno
      //   input_apellido_materno
      //   input_nombre
      //   input_CURP
      //   input_RFC
      //   input_NSS
      //   input_email
      //   input_telefono_2 
      //   input_f_nac 
      //   input_sexo_M 
      //   input_sexo_F 
      //   input_telefono_1 
      }
      })
  });


    // inputsTexto.keyup(function(){

    //     this.value = this.value.toUpperCase();

    // });

  //Begin of NavBar code
  $('.NavBar-Elements li:has(ul)').click(function(){
    
 
    if ($(this).hasClass('activado')){

      $(this).removeClass('activado');
      $(this).children('ul').slideUp();
    }

    else {
      $('.NavBar-Elements li ul').slideUp();
      $('.NavBar-Elements li').removeClass('activado');
      $(this).addClass('activado');
      $(this).children('ul').slideDown();
    }

  });


    // Funcion para deshabilitar Teléfono 2
   $('#chkbxTelefono2').change(function(){
    
    if($('#chkbxTelefono2').is(':checked') == true){ 
       
      document.getElementById("telefono_2").disabled = true;

     }

     else if ($('#chkbxTelefono2').is(':checked') == false){

      document.getElementById("telefono_2").disabled = false;

     }

    });
    
});