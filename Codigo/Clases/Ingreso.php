<?php

    include("Validacion.php");
    include("Correo.php");

    class Ingreso{

        function opcionIngreso(){
            if (isset($_POST['ingresar'])){
                $this->realizarIngreso();

                /*echo "Te has registrado exitosamente   |  ";
                echo "<a href=\"Ingresar.html\">Ingresar</a>";*/
            }
        }

        function realizarIngreso(){
            session_start();
            $usuario = $_POST['usser'];
            $clave = $_POST['clave'];

            //echo "hola ".$encriptado;

            $validar = new Validacion();
            
            date_default_timezone_set('America/Bogota');
            $fecha = date("y-m-d");

            //echo $validar->validarUsuario($usuario);

            if($validar->validarUsuario($usuario)){

                if($validar->validarNIngreso($usuario, $fecha) >= 3){
                    date_default_timezone_set('America/Bogota');
                    $fecha = date("y-m-d");
                    $validar->validarTransaccion($usuario, $fecha);

                    $_SESSION['usser'] = $usuario;

                    $validar = new Validacion();
                    $correo1 = $validar -> determinarCorreo($usuario);

                    $correo = new Correo();
                    $correo -> enviarCorreo($usuario, $correo1);

                    echo "<h3 class=\"advertencia\">Tu cuenta ha sido bloqueada temporalmente, revisa tu correo electronico.</h3>";

                }else if($validar->validarNIngreso($usuario, $fecha) < 3 && $validar->validarNIngreso($usuario, $fecha) >= 1){

                    date_default_timezone_set('America/Bogota');
                    $fecha = date("y-m-d");
                    $validar->validarTransaccion($usuario, $fecha);
                    
                    header("location:/ingreso/ingresarCaptcha.php");

                }else if ($validar->validarNIngreso($usuario, $fecha) < 1){
        
                    $encriptado = hash('sha512', $clave);
    
                    if($validar->verificarInformacion($usuario, $encriptado)){
                        $validar->verificarIngreso($usuario, $encriptado);
                    }else{
                        date_default_timezone_set('America/Bogota');
                        $fecha = date("y-m-d");
                        $validar->validarTransaccion($usuario, $fecha);
                        echo "<h3 class=\"advertencia\">Los campos no coinciden</h3>";
                    }
                }

            }else{

                echo "<h3 class=\"advertencia\">El usuario no esta registrado</h3>";
                
            }
            
            /*echo "id: ".$id;
            echo "nombre: ".$nombre;
            echo "apellido: ".$apellido;
            echo "correo: ".$correo;
            echo "usuario: ".$usuario;
            echo "clave: ".$clave;*/
        }
    }

    $obj = new Ingreso();
    $obj -> opcionIngreso();

?>