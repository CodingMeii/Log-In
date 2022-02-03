<?php

    class cerrar{
        function cerrar(){
            if(isset($_POST['cerrar'])){
                session_start();
                session_destroy();

                header("location:../Index.html");
            }
        }
    }

    $obj = new cerrar();
    $obj -> cerrar();

?>