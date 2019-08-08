$(document).ready(function(){

  let botonRegistrar = $('#botonRegistrar');
  
  let input_nombre_alumno = $('#nombre_alumno');
  let input_ApellidoPaterno_alumno = $('#apellidoPaterno_alumno');
  let input_ApellidoMaterno_alumno = $('#apellidoMaterno_alumno');
  let input_radioSexo_alumno_M = $('#radioSexo_alumno_M');
  let input_radioSexo_alumno_F = $('#radioSexo_alumno_F');
  let input_curp_alumno = $('#curp_alumno');
  let input_DOB_alumno = $('#DOB_alumno');
  let input_nombre_familiarUno = $('#nombre_familiarUno');
  let input_apellidoPaterno_familiarUno = $('#apellidoPaterno_familiarUno');
  let input_apellidoMaterno_familiarUno = $('#apellidoMaterno_familiarUno');
  let input_radioSexo_familiarUno_M = $('#radioSexo_familiarUno_M');
  let input_radioSexo_familiarUno_F = $('#radioSexo_familiarUno_F');
  let input_NSS_familiarUno = $('#NSS_familiarUno');
  let input_telefono1_familiarUno= $('#telefono1_familiarUno');
  let input_email_familiarUno = $('#email_familiarUno');
  let input_nombre_familiarDos = $('#nombre_familiarDos');
  let input_apellidoPaterno_familiarDos = $('#apellidoPaterno_familiarDos');
  let input_apellidoMaterno_familiarDos = $('#apellidoMaterno_familiarDos');
  let input_radioSexo_familiarDos_M = $('#radioSexo_familiarDos_M');
  let input_radioSexo_familiarDos_F = $('#radioSexo_familiarDos_F');
  let input_NSS_familiarDos = $('#NSS_familiarDos');
  let input_telefono1_familiarDos = $('#telefono1_familiarDos');
  let input_email_familiarDos = $('#email_familiarDos');
  let radioSexo_alumno_valor;
  let radioSexo_f1_valor;
  let radioSexo_f2_valor;
  

  $('input[type="text"]').keyup(function(){

    this.value = this.value.toUpperCase();

  });
    
  // navbar click function START
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
  }); // navbar click function END

  
  botonRegistrar.click(function(){

    let bandera = false;

    $("input[type='text']").each(function(){
        
      if($(this).val()==""){
         bandera = true;
      }

    }); // each END

    if(!Date.parse($('#DOB_alumno').val())){
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

    else{

      input_nombre_alumno = $('#nombre_alumno').val();
      input_ApellidoPaterno_alumno = $('#apellidoPaterno_alumno').val();
      input_ApellidoMaterno_alumno = $('#apellidoMaterno_alumno').val();
      input_curp_alumno = $('#curp_alumno').val();
      input_DOB_alumno = $('#DOB_alumno').val();
      input_nombre_familiarUno = $('#nombre_familiarUno').val();
      input_apellidoPaterno_familiarUno = $('#apellidoPaterno_familiarUno').val();
      input_apellidoMaterno_familiarUno = $('#apellidoMaterno_familiarUno').val();
      input_NSS_familiarUno = $('#NSS_familiarUno').val();
      input_telefono1_familiarUno= $('#telefono1_familiarUno').val();
      input_email_familiarUno = $('#email_familiarUno').val();
      input_nombre_familiarDos = $('#nombre_familiarDos').val();
      input_apellidoPaterno_familiarDos = $('#apellidoPaterno_familiarDos').val();
      input_apellidoMaterno_familiarDos = $('#apellidoMaterno_familiarDos').val();
      input_NSS_familiarDos = $('#NSS_familiarDos').val();
      input_telefono1_familiarDos = $('#telefono1_familiarDos').val();
      input_email_familiarDos = $('#email_familiarDos').val();
    if(input_radioSexo_alumno_M.is(':checked')){
      radioSexo_alumno_valor = "M";
    }
    else if(input_radioSexo_alumno_F.is(':checked')){
      radioSexo_alumno_valor = "F";
    }

    if(input_radioSexo_familiarUno_M.is(':checked')){
      radioSexo_f1_valor = "M";
    }
    else if(input_radioSexo_familiarUno_F.is(':checked')){
      radioSexo_f1_valor = "F";
    }
    if(input_radioSexo_familiarDos_M.is(':checked')){
      radioSexo_f2_valor = "M";
    }
    else if(input_radioSexo_familiarDos_F.is(':checked')){
      radioSexo_f2_valor = "F";
    }
      
      $.ajax({
        
        url:"../formularios/registro_alumno_padre.php",
        method: "POST",
        data:{
          nombre_alumno               : input_nombre_alumno,
          ApellidoPaterno_alumno      : input_ApellidoPaterno_alumno,
          ApellidoMaterno_alumno      : input_ApellidoMaterno_alumno,
          radioSexo_alumno            : radioSexo_alumno_valor,
          curp_alumno                 : input_curp_alumno,
          DOB_alumno                  : input_DOB_alumno,
          nombre_familiarUno          : input_nombre_familiarUno,
          apellidoPaterno_familiarUno : input_apellidoPaterno_familiarUno,
          apellidoMaterno_familiarUno : input_apellidoMaterno_familiarUno,
          radioSexo_familiarUno       : radioSexo_f1_valor,
          NSS_familiarUno             : input_NSS_familiarUno,
          telefono1_familiarUno       : input_telefono1_familiarUno,
          email_familiarUno           : input_email_familiarUno,
          nombre_familiarDos          : input_nombre_familiarDos,
          apellidoPaterno_familiarDos : input_apellidoPaterno_familiarDos,
          apellidoMaterno_familiarDos : input_apellidoMaterno_familiarDos,
          radioSexo_familiarDos       : radioSexo_f2_valor,
          NSS_familiarDos             : input_NSS_familiarDos,
          telefono1_familiarDos       : input_telefono1_familiarDos,
          email_familiarDos           : input_email_familiarDos
        },
        cache: false,
        beforeSend:function(){
          
          botonRegistrar.val("REGISTRANDO...");

        },
        success:function(data){
          
          if(data==1){
            Swal.fire({
              type: 'success',
              title: 'CORRECTO.',
              text: 'ALUMNO INSCRITO Y FAMILIARES REGISTRADOS. EL REGISTRO SE HA COMPLETADO CON EXITO.',
              footer: 'PRESIONE "OK" PARA CONTINUAR'
            });
          }
          else{
            Swal.fire({
              type: 'error',
              title: 'ERROR.',
              text: 'HUBO UN ERROR EN EL REGISTRO DEL ALUMNO Y FAMILIARES. INTENTE NUEVAMENTE. SI EL PROBLEMA PERSISTE COMUNIQUESE CON EL DPTO. DE SISTEMAS.',
              footer: 'PRESIONE "OK" PARA CONTINUAR'
            });
          }
        }

      
      }); // ajax end

      botonRegistrar.val("REGISTRAR");

    } // else input no vacios END

  }); // boton click function END

}); // document ready function END

// ---------------------------------------------------------

// Swal.fire({
//   type: 'success',
//   title: 'CORRECTO.',
//   text: 'ALUMNO INSCRITO Y FAMILIARES REGISTRADOS. EL REGISTRO SE HA COMPLETADO CON EXITO.',
//   footer: 'PRESIONE "OK" PARA CONTINUAR'
// }); // swal fire end


// ---------------------------------------------------------

// $.ajax({

//   url:"../validacion.php",
//   method: "POST",
//   data:{username:user, contrasena:pass},
//   cache: false,
//   beforeSend:function(){

//     botonRegistrar.val("REGISTRANDO...");
  
//   }, // ajax beforeSend end
  
//   success:function(data){

//       btnLogin.val("INGRESAR");
//       if(data==1){
//         Swal.fire({
//           type: 'success',
//           title: 'CORRECTO.',
//           text: 'ALUMNO INSCRITO Y FAMILIARES REGISTRADOS. EL REGISTRO SE HA COMPLETADO CON EXITO.',
//           footer: 'PRESIONE "OK" PARA CONTINUAR'
//         }); // swal fire end    
//       }
//       else{

//       }

//   } // ajax sucess end>

// }); // ajax end


// ---------------------------------------------------------