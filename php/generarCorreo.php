<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require '../PHPMAILER/Exception.php';
    require '../PHPMAILER/PHPMailer.php';
    require '../PHPMAILER/SMTP.php';

    require './conexionPrincipal.php';
    $nombrePDF = $_SESSION['pdf'];
    echo $nombrePDF;
    $query = mysqli_query($conexion, "SELECT * FROM `detalle_de_compra` WHERE `nombre_PDF` = '$nombrePDF'");
    while($row = mysqli_fetch_assoc($query)){
        $email = $row['email'];
        $nombreUser = $row['nombre_user'];  
    }

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'a22310402@ceti.mx';                     //SMTP username
        $mail->Password   = 'Youarewastingmytime446';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('a22310402@ceti.mx', 'BDTecnology');
        $mail->addAddress($email, $nombreUser);     //Add a recipient
    
        //Attachments
        $rutaPDF ='../PDF/'.$nombrePDF;
        $mail->addAttachment($rutaPDF);         //Add attachments
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Recibo de compra';
        $mail->Body    = 'Se le informa que si compra a sido completada, muchas gracias por elegirnos, se le envia su recibo de pago';
        $mail->AltBody = 'atte: BDTecnology';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>