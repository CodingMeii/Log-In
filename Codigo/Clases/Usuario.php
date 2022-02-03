<?php

    include("Registro.php");
    include("Validacion.php");

    class Usuario{

        function opcionRegistro(){
            if (isset($_POST['registrar'])){
                $this->realizarRegistro();
            }
        }

        function realizarRegistro(){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $claveR = $_POST['claveR'];

            $validar = new Validacion();

            if(strlen($id) == 0 || strlen($nombre) == 0 || strlen($apellido) == 0 || strlen($correo) == 0 
                || strlen($usuario) == 0 || strlen($clave) == 0 || strlen($claveR) == 0){
                
                echo "<h3 class=\"advertencia\">Los campos no estan completos</h3>";

            }else{
                if($validar->validarUsuario($usuario)){

                    echo "<h3 class=\"advertencia\">El usuario seleccionado ya se encuentra registrado</h3>";

                }else{
                    //echo "Eres una perra palmer";
                    if(strlen($clave) < 3){

                        echo "<h3 class=\"advertencia\">La clave que estas utilizando es muy corta</h3>";

                    }else{
                        if ($clave == $claveR){
                            $encriptado = hash('sha512', $clave);
            
                            $unRegistro = new Registro();
                            $unRegistro->registroUsuario($usuario, $encriptado);
                            $unRegistro->registroPersona($id, $nombre, $apellido, $correo, $usuario);
            
                            echo "<h3 class=\"advertencia\">Te has registrado exitosamente</h3>";
                            //echo "<br><a href=\"Ingresar.php\">Ingresar</a>";

                        }else{

                            echo "<h3 class=\"advertencia\">Advertencia: Las claves no coinciden</h3>";

                        }
                    }
                }
            }

            /*echo "id: ".$id;
            echo "nombre: ".$nombre;
            echo "apellido: ".$apellido;
            echo "correo: ".$correo;
            echo "usuario: ".$usuario;
            echo "clave: ".$clave;*/
        }
    }

    $obj = new Usuario();
    $obj -> opcionRegistro();
?>