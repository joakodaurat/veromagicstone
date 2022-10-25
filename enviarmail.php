
<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$nombre = $_POST['nombre'];
$email = $_POST['email'];

$ip = $_SERVER['REMOTE_ADDR'];
$captcha = $_POST['g-recaptcha-response'];
$secre = "6Ld8KLAiAAAAAOmMxyxKCwIfQ9PgvnSl2-xogOSG";

$respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secre&response=$captcha&remoteip=$ip");

$atributos = json_decode($respuesta,TRUE);


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

if ($_POST['stopspam'] != ""){
 // Es un SPAMbot
 exit();

} else {
  // verifico que el captcha este bien
    if(!$atributos['success']){
      echo '<script language="javascript">alert("ingrese bien el captcha");</script>';

    }else{ 
        // Es un usuario real, proceder a enviar el formulario.
        if(mail($to,$subject,$message, $headers)) {
          header("Location: index.html#contact");
          } else {
              echo "Message was not sent.";
           }


    }
  

}




?>

