<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpMailer/Exception.php';
    require 'phpMailer/PHPMailer.php';
    require 'phpMailer/SMTP.php';

    class Correo{
        function enviarCorreo($nombre, $correo1){
            //echo "Correo: ".$nombre;
            //echo "Correo: ".$correo1;

            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0; 
                $mail->isSMTP();                                        
                $mail->Host       = 'smtp.gmail.com';                   
                $mail->SMTPAuth   = true;                              
                $mail->Username   = 'correo@gmail.com'; 
                $mail->Password   = '1234';                          
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
                $mail->Port       = 587;                   
            
                //Recipients
                $mail->setFrom('correo@gmail.com', 'Cambio de clave');
                $mail->addAddress($correo1); 
            
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Cambio de clave';
                $mail->Body    = $nombre.', haz solicitado un cambio de clave, para hacerlo, ingresa al siguiente link:
                                    <br>
                                    <b><a href="http://localhost/ingreso/recuperarClave.php">Cambiar mi clave...</a></b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                //session_start();
                $_SESSION['usser'] = $nombre;

                $mail->send();
                //echo 'Message has been sent';
            } catch (Exception $e) {
                //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }

?>