<?php

    class Registro{
        function registroPersona($id, $nom, $ape, $correo, $usuario){
            $link = mysqli_connect("localhost", "root", "", "ingreso");
            $grabar_persona = "INSERT INTO persona (Id_Persona, Nombre_Persona, Apellido_Persona, Correo_Persona, Nombre_Usuario_FK) 
                                VALUES ('$id', '$nom', '$ape', '$correo', '$usuario')";
            $guardar_persona = mysqli_query($link, $grabar_persona);
            mysqli_close($link);
        }

        function registroUsuario($usuario, $clave){
            $link = mysqli_connect("localhost", "root", "", "ingreso");

            /*if($link){
                echo "Conexion hecha";
            }*/

            $grabar_usuario = "INSERT INTO usuario (Nombre_Usuario, contrasena) 
                                VALUES ('$usuario', '$clave')";
            $guardar_usuario = mysqli_query($link, $grabar_usuario);
            mysqli_close($link);
        }

        function cambiarClave($usuario, $clave){
            $link = mysqli_connect("localhost", "root", "", "ingreso");
            $modificar_clave = "UPDATE usuario SET contrasena = '$clave' WHERE Nombre_Usuario = '$usuario'";
            $guardar_persona = mysqli_query($link, $modificar_clave);
            mysqli_close($link);
        }

        function eliminarTransaccion($usuario, $fecha){
            $link = mysqli_connect("localhost", "root", "", "ingreso");
            $modificar_clave = "DELETE FROM transaccion WHERE Nombre_Usuario_FK = '$usuario' AND fecha = '$fecha'";
            $guardar_persona = mysqli_query($link, $modificar_clave);
            mysqli_close($link);
        }
    }
?>