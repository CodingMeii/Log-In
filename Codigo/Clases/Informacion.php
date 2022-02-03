<?php

    //include("Clases/Ingreso.php");
    //session_start();

    class informacionPerfil{
        function imprimirDatos($id, $nom, $ape, $correo, $usuario){

            echo "<h3 class=\"informacion\">
                    <br>
                    Identificacion: $id
                    <br><br>
                    Nombre: $nom
                    <br><br>
                    Apellido: $ape
                    <br><br>
                    Correo: $correo
                    <br>
                </h3>";
        }

        function buscarUsuario(){
            $usuario = $_SESSION['usser'];

            echo "<h2 class=\"bienvenida\">Bienvenidx $usuario</h2>";

            $link = mysqli_connect("localhost", "root", "", "ingreso");
            $consulta = "SELECT * FROM persona where Nombre_Usuario_FK='$usuario'";
            $resultado = mysqli_query($link, $consulta);

            $row = mysqli_fetch_array($resultado);

            $id = $row['Id_Persona'];
            $nom = $row['Nombre_Persona'];
            $ape = $row['Apellido_Persona'];
            $correo = $row['Correo_Persona'];
            $usuario = $row['Nombre_Usuario_FK'];

            $this->imprimirDatos($id, $nom, $ape, $correo, $usuario);
        }
    }

    $obj = new informacionPerfil();
    $obj -> buscarUsuario();
    
?>