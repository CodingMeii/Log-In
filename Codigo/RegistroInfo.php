<html lang="es">
    <head>
        <title>Registro</title>
        <meta charset="utf-8"> 
        <link rel="icon" href="Imagenes/Icono.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link href="https://fonts.googleapis.com/css?family=Anton|Dosis:400,800" rel="stylesheet"> 
        <link href="css/Estilos.css" type="text/css" rel="stylesheet" media="">
    </head>

    <body>
        <div class="contenedorRegistro"> 
            <article class="col-12"> 
                <section>
                    <br>
                    <a href="Index.html" class="volver">ir Inicio</a>
                    <h2 class="lecture-title">Registrar</h2> 

                    <br><br>

                    <form class="contact_form" method="post">
                        <label for="id">Identificación:</label>
                        <input type="text" name="id" required/>

                        <br><br>
                        <label for="name">Nombre:</label>
                        <input type="text" name="nombre" required/>

                        <br><br>
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" required/>

                        <br><br>
                        <label for="correo">Correo:</label>
                        <input type="email" name="correo" required/>

                        <br><br>
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" required/>

                        <br><br>
                        <label for="clave">Contraseña:</label>
                        <input type="password" name="clave" required/>
                        
                        <br><br>
                        <label for="claveR">Confirmación contraseña:</label>
                        <input type="password" name="claveR" required/>

                        <br><br>
                        <a class="hipervinculo" href="Ingresar.php">Ya tengo una cuenta</a>
                        <br><br>
                        <button class="submit" type="submit" name="registrar">Registrar</button>
                        <br><br>
                    </form>

                    <?php
                        include("Clases/Usuario.php");
                    ?>

                    <br><br>

                </section>
            </article> 
        </div> 

        <footer class="site-footer">
            <h2 class="footer-title">&copy; Todos los derechos reservados - Colombia 2021</h2>
        </footer>
    </body>
</html>