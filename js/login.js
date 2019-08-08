// Basic example
$(document).ready(function(){

    let btnLogin = $('#botonLogin');
    let advertencia = $('#result');

    // input username
    let user = $('#username');

    // input password
    let pass = $('#contrasena');

    user.focus();

    user.keyup(function() {
        // console.log( "Handler for .keypress() called." );

        this.value = this.value.toUpperCase();

    });

    btnLogin.click(function(){

        user = $('#username').val();
        pass = $('#contrasena').val();

        if($.trim(user).length>0 && $.trim(pass).length >0){

            $.ajax({

                url:"../validacion.php",
                method: "POST",
                data:{username:user, contrasena:pass},
                cache: false,
                beforeSend:function(){

                    btnLogin.val("CONECTANDO...");
                
                }, // ajax beforeSend end
                success:function(data){

                    btnLogin.val("INGRESAR");
                    if(data==1){
                        result.remove();
                        btnLogin.removeClass("bg-dark");
                        btnLogin.addClass("bg-success");
                        btnLogin.prop('disabled',true);
                        btnLogin.val("ACCESO");
                        $(location).attr('href','index.php');
                    }
                    else if(data==2){
                        advertencia.html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡ERROR! </strong>SU CUENTA ESTA DESACTIVADA, COMUNIQUESE AL DPTO. DE ADMINISTRACION DEL COLEGIO.</div>");
                    }
                    else{
                        advertencia.html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡ERROR! </strong>VERIFIQUE SUS CREDENCIALES E INTENTE NUEVAMENTE.</div>");
                    }

                } // ajax sucess end

            }); // ajax end
        
        } // if trim END
        else{
            alert("POR FAVOR INGRESE SUS CREDENCIALES, NO DEJE CAMPOS LOS CAMPOS VACIOS.");
        }

    }); // click function END

});

//"