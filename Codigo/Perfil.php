<html lang="es">
    <head>
        <title>Perfil</title>
        <link rel="icon" href="Imagenes/Icono.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link href="https://fonts.googleapis.com/css?family=Anton|Dosis:400,800" rel="stylesheet"> 
        <link href="css/Estilos.css" type="text/css" rel="stylesheet" media="">
    </head>

    <body>

        <div class="contenedorIngreso"> 
            <article class="col-12"> 
                <h2 class="lecture-title">Informacion personal</h2> 
                <section class="primerosPasos">
                    
                    <img src="Imagenes/user.png" width="100"> 

                    <br><br>

                    <?php
                        session_start();
                        include("Clases/Informacion.php");
                    ?>

                    <br><br>

                    <div class="cerrar">
                        <form action="Clases/cerrarSesion.php" method="post">
                            <button class="btn btn--1" name="cerrar">Cerrar sesion</button>
                        </form>
                    </div>

                </section>
            </article> 
        </div> 

        <footer class="site-footer">
            <h2 class="footer-title">&copy; Todos los derechos reservados - Colombia 2021</h2>
        </footer>

    </body>
</html>