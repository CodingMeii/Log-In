<html>
    <head>
        <title>Ingreso</title>
        <link href="css/Estilos.css" type="text/css" rel="stylesheet" media="">
        <meta charset="utf-8"> 
        <link rel="icon" href="Imagenes/Icono.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link href="https://fonts.googleapis.com/css?family=Anton|Dosis:400,800" rel="stylesheet"> 
    </head>

    <body>

        <div class="contenedorRegistro"> 
            <article class="col-12"> |
                <section>
                    <br>
                    <a href="Index.html" class="volver">ir Inicio</a>
                    <h2 class="lecture-title">Ingresar</h2> 

                    <br><br><br>

                    <form class="contact_form" method="POST">
                        <label for="usser">Usuario:</label>
                        <input type="text" name="usser" required/>
            
                        <br><br>
                        <label for="clave">Clave:</label>
                        <input type="password" name="clave" required/>
                
                        <br><br>

                        <h2 class="lecture-title"> Captcha</h2> 

                        <br><br>

                        <label for="pregunta">Catorce + 15</label>
                        <input type="text" name="respuesta" required/>

                        <br><br>
                        <label for="pregunta2">7 x dos</label>
                        <input type="text" name="respuesta1" required/>

                        <br><br><br>

                        <a class="hipervinculo" href="ingresarUsuario.php">Aun no tengo usuario</a>
                        <br>
                        <a class="hipervinculo" href="RegistroInfo.php">Olvide mi clave...</a>

                        <br><br>

                        <button class="submit" type="submit" name="ingresar">Ingresar</button>

                        <br><br>
                    </form>

                    <?php
                        include('Clases/Captcha.php');
                    ?>

                </section>
            </article> 
        </div> 

        <footer class="site-footer">
            <h2 class="footer-title">&copy; Todos los derechos reservados - Colombia 2021</h2>
        </footer>
    </body>
</html>