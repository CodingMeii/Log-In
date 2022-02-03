
<?php

    include("Validacion.php");
    include("Correo.php");

    class Captcha{

        function opcionIngreso(){
            if (isset($_POST['ingresar'])){
                $this->realizarIngreso();
            }
        }

        function realizarIngreso(){
            session_start();
            $usuario = $_POST['usser'];
            $clave = $_POST['clave'];
            $respuesta = $_POST['respuesta'];
            $respuesta1 = $_POST['respuesta1'];

            $validar = new Validacion();
            
            date_default_timezone_set('America/Bogota');
            $fecha = date("y-m-d");

            //echo $validar->validarUsuario($usuario);
            //echo $validar->validarNIngreso($usuario, $fecha);

            if($validar->validarUsuario($usuario)){

                if ($this->operacionCaptcha($respuesta, $respuesta1)){

                    if($validar->validarNIngreso($usuario, $fecha) >= 4){
                        date_default_timezone_set('America/Bogota');
                        $fecha = date("y-m-d");
                        $validar->validarTransaccion($usuario, $fecha);

                        //session_start();
                        $_SESSION['usser'] = $usuario;

                        $validar = new Validacion();
                        $correo1 = $validar -> determinarCorreo($usuario);

                        $correo = new Correo();
                        $correo -> enviarCorreo($usuario, $correo1);

                        echo "<h3 class=\"advertencia\">Tu cuenta ha sido bloqueada temporalmente, revisa tu correo electronico.</h3>";

                    }else if($validar->validarNIngreso($usuario, $fecha) < 4 && $validar->validarNIngreso($usuario, $fecha) >= 1){

                        date_default_timezone_set('America/Bogota');
                        $fecha = date("y-m-d");
                        $validar->validarTransaccion($usuario, $fecha);
                        echo "<h3 class=\"advertencia\">Clave incorrecta</h3>";

                    }else if ($validar->validarNIngreso($usuario, $fecha) < 1){
            
                        $encriptado = hash('sha512', $clave);

                        if($validar->verificarInformacion($usuario, $encriptado)){

                            $validar->verificarIngreso($usuario, $encriptado);

                        }else{

                            date_default_timezone_set('America/Bogota');
                            $fecha = date("y-m-d");
                            $validar->validarTransaccion($usuario, $fecha);
                            echo "<h3 class=\"advertencia\">Clave incorrecta</h3>";

                        }
                    }

                }else{
                    if($validar->validarNIngreso($usuario, $fecha) >= 4){

                        date_default_timezone_set('America/Bogota');
                        $fecha = date("y-m-d");
                        $validar->validarTransaccion($usuario, $fecha);

                        //session_start();
                        $_SESSION['usser'] = $usuario;

                        $validar = new Validacion();
                        $correo1 = $validar -> determinarCorreo($usuario);

                        $correo = new Correo();
                        $correo -> enviarCorreo($usuario, $correo1);

                        echo "<h3 class=\"advertencia\">Tu cuenta ha sido bloqueada temporalmente, revisa tu correo electronico</h3>";

                    }else{

                        date_default_timezone_set('America/Bogota');
                        $fecha = date("y-m-d");
                        $validar->validarTransaccion($usuario, $fecha);
                        echo "<h3 class=\"advertencia\">El valor ingresado en el captcha no es el correcto.</h3>";

                    }
                }

            }else{
                
                echo "<h3 class=\"advertencia\">El usuario no esta registrado</h3>";
                
            }
        }

        function operacionCaptcha($respuesta, $respuesta1){

            if ($respuesta != 29 || $respuesta1 != 14){
                return false;
            }else{
                return true;
            }
        }
    }

    $obj = new Captcha();
    $obj -> opcionIngreso();
?>