<?php require 'header_login.php'; ?>

<div class="contenedor">
        <div class="post formRegistro">
            <article>
                <h2 class="titulo">Registrarse </h2>
                <div style="color: green" id="resultado"></div>
                <form id="resultado" class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                    <input type="text" id="nombre" name="nombre" placeholder="nombre" required>
                    <input type="text" id="apellido" name="apellido" placeholder="apellido" required>
                    <input type="password" id="pass" name="contrasenia" placeholder=" contraseña" required>


                    <input type="password" id="passRe" name="contraseniaRe" placeholder="Repita contraseña" required>

                    <input type="text" id="telefono" name="telefono" placeholder="telefono" required>
                    <input type="text" id="email" name="email" placeholder="email" required>
                    <input type="text" name="direccion" placeholder="dirección" required>

                     <input type="submit" id="registrarse" value="Registrarse">

                </form>
            </article>
        </div>
    </div>
<script>


    var btnLogin;
    var xht;
  //  var btnEv;
    var btnResul;
    function starF(){

        btnEv= document.getElementById('enviar');
  //      btnEv.addEventListener('click', sendXMLH);
        console.log('this');
        btnLogin= document.getElementById('usuario');
        btnResul= document.getElementById('resultado');
        btnLogin.addEventListener('keyup', sendXMLH);


        console.log(this);
    }

    function sendXMLH(){
        console.log('dentroxmlh');
        xht= new XMLHttpRequest();
        xht.addEventListener('readystatechange', gestionarXht);
        xht.open('GET','compruebaDisponibilidad.php?login='+btnLogin.value, true);
        xht.send();
    }

    function gestionarXht(evento){
        if(evento.target.readyState==4&& xht.status==200 ){
            console.log('here');
            btnResul.innerHTML=xht.responseText;
        }
    }

    window.onload= starF;

    var btnPass;
    var btnPassRe;
    window.onload=function(){
        console.log('dentroLogica');
        var btnEnv= document.getElementById('registrarse');




        btnUsuario=document.getElementById('usuario');
        btnName=document.getElementById('nombre');
        btnApellido=document.getElementById('apellido');
        btnEmail= document.getElementById('email');
        btnPass= document.getElementById('pass');
        btnPassRe= document.getElementById('passRe');
        btnTelefono= document.getElementById('telefono');

        btnName.addEventListener('change',ValidaCampos);
        btnApellido.addEventListener('change',ValidaCampos);
        btnPassRe.addEventListener('change',ValidaCampos);
        btnEmail.addEventListener('change',ValidaCampos);
        btnTelefono.addEventListener('change',validaTlf);

    }
    function validaEmail() {
        var er_email = /^(.+\@.+\..+)$/;
        if(er_email.test(btnEmail.value)==false) {
            alert('Campo Email no válido.');
            btnEmail.focus();
            return false; // sale de la función y NO envía el formulario
        }

    }

    function validaApellido() {
        var er_nombre = /^[A-Za-z]{1,99}$/;
        if(er_nombre.test(btnApellido.value)==false) {
            alert('Campo apellido no válido.');
            btnApellido.focus();
            return false; // sale de la función y NO envía el formulario
        }


    }
function validaTlf() {
        var er_telefono = /^([0-9]{9})$/;
        if(er_telefono.test(btnTelefono.value)==false) {
            alert('Campo telefono no válido.');
            er_telefono.focus();
            return false; // sale de la función y NO envía el formulario
        }


    }

    function ValidaCampos() {
        console.log('dentro validaCampos');

        var er_nombre = /^[A-Za-z]{1,99}$/;
        var er_email = /^(.+\@.+\..+)$/;
        if(er_nombre.test(btnName.value)==false) {
            alert('Campo Nombre no válido.');
            btnName.focus();
            return false; // sale de la función y NO envía el formulario
        }


        if (btnPass.value != btnPassRe.value) {
            console.log('Campo Email no válido.');
            alert('contraseña diferente');
            btnPassRe.focus();
            return false; // sale de la función y NO envía el formulario
        }



    }
    /*  var btnUsuario;
     var btnName;
     var btnApellido;
     var btnPass;
     var btnPassRe;
     var btnTelefono;

     var btnEmail;

     window.onload=function(){
         console.log('dentroLogica');
         var btnEnv= document.getElementById('registrarse');


         btnEnv.addEventListener('click',ValidaCampos);


         btnUsuario=document.getElementById('usuario');
         btnName=document.getElementById('nombre');
         btnApellido=document.getElementById('apellido');
         btnEmail= document.getElementById('email');
         btnPass= document.getElementById('pass');
         btnPassRe= document.getElementById('passRe');
         btnTelefono= document.getElementById('telefono');
     }

     function ValidaCampos() {
         console.log('dentro validaCampos');

         var er_nombre=/^[A-Za-z0-9]{1,99}$/;
         var er_email = /^(.+\@.+\..+)$/;

         if(er_email.test(btnEmail.value)==false) {
             console.log('Campo Email no válido.');
             alert('Campo Email no válido.');
             btnEmail.focus();
             return false; // sale de la función y NO envía el formulario
         }

        if(er_nombre.test(btnName.value)==false) {
             alert('Campo Nombre no válido.');
             btnName.focus();
             return false; // sale de la función y NO envía el formulario
         }
         if(er_email.test(btnEmail.value)==false) {
             alert('Campo Email no válido.');
             btnEmail.focus();
             return false; // sale de la función y NO envía el formulario
         }
         if(btnEmail.value!=btnEmailRe.value){
             alert("Email comprobación incorrecto");
             btnEmailRe.focus();
             return false;
         }
         setSusciptor();
         btnName.value="";
         btnEmail.value="";
         btnEmailRe.value="";




         alert('Gracias por rellenar nuestro formulario correctamente.');
         return true; // sale de la función y SÍ envía el formulario
         */

</script>

