<?php

    class Validacion{
        
        function verificarIngreso($usuario, $clave){
            $link = mysqli_connect("localhost", "root", "", "ingreso");
            $consulta = "SELECT * FROM usuario where Nombre_Usuario='$usuario' and contrasena='$clave'";
            $resultado = mysqli_query($link, $consulta);

            $filas=mysqli_num_rows($resultado);

            if($filas){
                session_start();
                $_SESSION['usser'] = $usuario;
                
                header("location:/Ingreso/Perfil.php");
            }else{
                ?>
                <?php
                    include("Registro.php");
                ?>
                <h3>Error en la autenticacion</h3>
                <?php
            }

            mysqli_close($link);
        }

        function validarUsuario($usuario){
            $link = mysqli_connect("localhost", "root", "", "ingreso");
            $consulta = "SELECT * FROM usuario where Nombre_Usuario='$usuario'";
            $resultado = mysqli_query($link, $consulta);

            $filas=mysqli_num_rows($resultado);

            if($filas){
                return true;
            }else{
                return false;
            }
        }

        function verificarInformacion($usuario, $clave) {
            $link = mysqli_connect("localhost", "root", "", "ingreso");
            $consulta = "SELECT * FROM usuario where Nombre_Usuario='$usuario'";
            $resultado = mysqli_query($link, $consulta);

            $row = mysqli_fetch_array($resultado);

            $usuario1 = $row['Nombre_Usuario'];
            $clave1 = $row['contrasena'];

            if($usuario1 != $usuario || $clave1 != $clave){
                return false;
            }else{
                return true;
            }
        }

        function validarTransaccion($usuario, $fecha) {
            $link = mysqli_connect("localhost", "root", "", "ingreso");
            $grabar_transaccion = "INSERT INTO transaccion (Nombre_Usuario_FK, fecha) 
                                VALUES ('$usuario', '$fecha')";
            $guardar_usuario = mysqli_query($link, $grabar_transaccion);
            mysqli_close($link);
        }

        function validarNIngreso($usuario, $fecha){
            $link = mysqli_connect("localhost", "root", "", "ingreso");
            $consulta = "SELECT * FROM transaccion where Nombre_Usuario_FK='$usuario' AND fecha='$fecha'";
            $resultado = mysqli_query($link, $consulta);

            $filas=mysqli_num_rows($resultado);

            return $filas;
        }

        function determinarCorreo($usuario){
            $link = mysqli_connect("localhost", "root", "", "ingreso");
            $consulta = "SELECT * FROM persona where Nombre_Usuario_FK='$usuario'";
            $resultado = mysqli_query($link, $consulta);

            $row = mysqli_fetch_array($resultado);
            $correo = $row['Correo_Persona'];

            return $correo;
        }
    }

?>