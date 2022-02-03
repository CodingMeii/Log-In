<?php

    include("Registro.php");
    include("Correo.php");
    include("Validacion.php");

    class cambioClave{
        function opcionIngreso(){
            if (isset($_POST['cambiar'])){
                $this->cambiarClave();
            }else if (isset($_POST['ingresar'])){
                $this->mostrarMensaje();
            }
        }

        function cambiarClave(){
            //session_start();
            $usuario = $_SESSION['usser'];

            $clave = $_POST['clave'];
            $claveR = $_POST['claveR'];

            //echo "usuario".$usuario;

            if(strlen($clave) < 3){

                echo "<h3 class=\"advertencia\">La clave que estas utilizando es muy corta</h3>";

            }else{

                if ($clave == $claveR){

                    $encriptado = hash('sha512', $clave);
    
                    $unRegistro = new Registro();
                    $unRegistro->cambiarClave($usuario, $encriptado);

                    date_default_timezone_set('America/Bogota');
                    $fecha = date("y-m-d");

                    $unRegistro->eliminarTransaccion($usuario, $fecha);
                    header("location:/Ingreso/Perfil.php");

                }else{

                    echo "<h3 class=\"advertencia\">Advertencia: Las claves no coinciden</h3>";

                }
            }
        }

        function mostrarMensaje(){
            $usuario = $_POST['usser'];

            $validar = new Validacion();
            $correo1 = $validar -> determinarCorreo($usuario);

            $correo = new Correo();
            $correo -> enviarCorreo($usuario, $correo1);

            echo "<h3 class=\"advertencia\">Revisa tu correo electronico</h3>";
        }
    }

    $obj = new cambioClave();
    $obj -> opcionIngreso();

?>