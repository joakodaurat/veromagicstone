
<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$nombre = $_POST['nombre'];
$email = $_POST['email'];


$from = "vero@veromagicstone.com";
$to = "joaquin.daurat@gmail.com";
$subject = "Vero! tiene un nuevo mensaje de la pagina :)";
   $message = "
   <html>
   <head>
       <title>Consulta de la pagina veromagicston</title>
   </head>
   <body>
       <p>Nombre:".$nombre."</p>
       <p>Email: " .$email."</p>
       <p>Mensaje:</p>
        <p>".$_POST['mensaje']."</p>
   </body>
   </html>
   ";
  // The content-type header must be set when sending HTML email
   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
   $headers .= "From:" . $from;
if(mail($to,$subject,$message, $headers)) {
    header("Location: index.html#contact");
} else {
    echo "Message was not sent.";
}
?>

