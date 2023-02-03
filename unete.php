<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css" />
  <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
  <script defer src="index.js"></script>
</head>

<body>
<header class="header">
    <nav class="nav">
      <a href="index.html" class="logo nav-link"><img src="images/LogoPmo.png" alt="" height="80px"></a>
      <button class="nav-toggle" aria-label="Abrir menú">
        <i class="fas fa-bars" style='color: #7433B6'></i>
      </button>
      <ul class="nav-menu">
        <li class="nav-menu-item container-submenu">
          <a href="nosotros.html" class="nav-menu-link submenu-btn">Nosotros &nbsp;<i class="fas fa-chevron-down"></i></a>
          <ul class="submenu">
            <li class="nav-menu-item"><a href="proceso-de-traduccion.html" class="nav-menu-link">Proceso de traduccion</a></li>

          </ul>
        </li>
        <li class="nav-menu-item container-submenu">
          <a href="traducciones-en-lima.html" class="nav-menu-link submenu-btn">Traducciones en Lima &nbsp; <i class="fas fa-chevron-down"></i></a>
          <ul class="submenu">
            <li class="nav-menu-item"><a href="traduccion-certificada.html" class="nav-menu-link">Traduccion Certificada</a></li>
            <li class="nav-menu-item"><a href="traduccion-certificada-digital.html" class="nav-menu-link">Traduccion Certificada Digital</a></li>
            <li class="nav-menu-item"><a href="traduccion-simple.html" class="nav-menu-link">Traduccion Simple</a></li>
            <li class="nav-menu-item"><a href="traduccion-express.html" class="nav-menu-link">Traduccion Express</a></li>
            <li class="nav-menu-item"><a href="traduccion-especializada.html" class="nav-menu-link">Traduccion Especializada</a></li>
            <li class="nav-menu-item"><a href="traduccion-de-audio-y-video.html" class="nav-menu-link">Traduccion de Audio y Video</a></li>
            <li class="nav-menu-item"><a href="revision-de-documentos.html" class="nav-menu-link">Revision de documentos</a></li>

          </ul>
        </li>
        <li class="nav-menu-item container-submenu">
          <a href="interpretaciones.html" class="nav-menu-link submenu-btn">Interpretaciones &nbsp;<i class="fas fa-chevron-down"></i></a>
          <ul class="submenu">
            <li class="nav-menu-item"><a href="simultanea.html" class="nav-menu-link">Simultanea</a></li>
            <li class="nav-menu-item"><a href="consecutiva.html" class="nav-menu-link">Consecutiva</a></li>
            <li class="nav-menu-item"><a href="enlace.html" class="nav-menu-link">Enlace</a></li>
            
          </ul>
        </li>
        <li class="nav-menu-item container-submenu">
          <a href="ensenanza.html" class="nav-menu-link submenu-btn">Enseñanza &nbsp;<i class="fas fa-chevron-down"></i></a>
          <ul class="submenu">
            <li class="nav-menu-item"><a href="clases-de-espanol-a-estranjeros.html" class="nav-menu-link">Clases de español a extranjeros</a></li>
            <li class="nav-menu-item"><a href="clases-de-ingles-especializada.html" class="nav-menu-link">Clases de ingles especializada</a></li>
          </ul>
        </li>
        <li class="nav-menu-item">
          <a href="unete.php" class="nav-menu-link nav-link">unete</a>
        </li>
        <li class="nav-menu-item">
          <a href="contacto.html" class="nav-menu-link nav-link ">Contacto</a>
        </li>
      </ul>
    </nav>
  </header>
  <?php
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

   $para    = $_REQUEST['emailCliente']; //correo al cual le llegara el msjs con archivos adjuntos.
   $subject = "Archivos adjuntos Unete";

   //Obtengo el nombre y email del cliente que se regisytra
   $from = stripslashes($_POST['nombrecompleto'])."<".stripslashes($_POST['emailCliente']).">";

   //generando una cadena aleatoria que se utilizará como marcador de límites 
   $mime_boundary="==Multipart_Boundary_x".md5(mt_Rand())."x";

   //construiremos los encabezados de los mensajes 
   $headers = "From: $from\r\n" .
   "MIME-Version: 1.0\r\n" .
      "Content-Type: multipart/mixed;\r\n" .
      " boundary=\"{$mime_boundary}\"";

   //comenzaremos el cuerpo del mensaje.
   $message="Hola ha recibido un correo de: ";
   $message .= "Nombre: ".$_POST["nombrecompleto"]. "Apellido: ".$_POST["apellidocompleto"]."Celular: ".$_POST["celular"]." Mensaje :".$_POST["mensaje"];

   //crearemos la parte invisible del cuerpo del mensaje,
   //tenga en cuenta que insertamos dos guiones delante del límite MIME
   $message = "Este es un mensaje de varias partes en formato MIME .\n\n" .
      "--{$mime_boundary}\n" .
      "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
      "Content-Transfer-Encoding: 7bit\n\n" .
   $message . "\n\n";



//procesando los archivo que hemos adjuntado
foreach($_FILES['archivo']['tmp_name'] as $key => $tmp_name){
      //almacenar la información del archivo en variables para facilitar el acceso 
      $tmp_name   = $_FILES['archivo']['tmp_name'][$key];
      $type       = $_FILES['archivo']['type'][$key];
      $name       = $_FILES['archivo']['name'][$key];
      $size       = $_FILES['archivo']['size'][$key];

      //verifico si la carga se realizó correctamente
      if (file_exists($tmp_name)){
         if(is_uploaded_file($tmp_name)){
            
            $file = fopen($tmp_name,'rb'); //abro el archivo para una lectura binaria 
            $data = fread($file,filesize($tmp_name)); //leer el contenido del archivo en una variable 
            fclose($file); //cierro el archivo

            //Ahora la codificamos y la dividimos en líneas de longitud aceptables
            $data = chunk_split(base64_encode($data));
         }

         
         $message .= "--{$mime_boundary}\n" .
            "Content-Type: {$type};\n" .
            " name=\"{$name}\"\n" .
            "Content-Disposition: attachment;\n" .
            " filename=\"{$fileatt_name}\"\n" .
            "Content-Transfer-Encoding: base64\n\n" .
         $data . "\n\n";
      }
   }

   $message.="--{$mime_boundary}--\n";
   
   //enviamos el correo
   if (mail($para, $subject, $message, $headers)){
      echo "<br><center>El Correo electronico fue enviado correctamente.</center>";
   }else{
      echo "No se pudo enviar el correo.";
   }
}
?>


  <div class="container mt-5">
    <h3 class="text-center mb-5" style="color:#555 ; font-weight: 800;">
        Sigue Nuestras redes sociales 
      <hr>
    </h3>


    <form name="formEmail" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="form-group">
                    <label for="nombrecompleto">Nombre Completo</label>
                    <input type="text" name="nombrecompleto"  placeholder="Escriba su Nombre"  class="form-control" required="true">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="apellidocompleto">Apellidos Completo</label>
                    <input type="text" name="apellidocompleto"  placeholder="Escriba su Nombre"  class="form-control" required="true">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="celular">celular</label>
                    <input type="text" name="celular"  placeholder="Escriba su Nombre"  class="form-control" required="true">
                </div>
            </div>
             <div class="col-6">
                <div class="form-group">
                    <label for="emailCliente">Email</label>
                    <input type="email" name="emailCliente" placeholder="Su email"  class="form-control">
                </div>
            </div>
         </div>
         <div class="row justify-content-center">
            <div class="col-6">
                <div class="form-group">
                    <label for="mensaje">Escriba su Mensaje</label>
                    <textarea name="mensaje"  placeholder="Mensaje"  class="form-control" required="true" rows="3"></textarea>
                </div>
            </div>
            <div class="col-6">
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Archivo</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" id="archivo[]" name="archivo[]" class="custom-file-input" multiple="true">
                    <label class="custom-file-label" for="inputGroupFile01">Hacer click aqui..!</label>
                  </div>
               </div>
            </div>
        </div>


      <div class="col-12 text-center mt-5 mb-5">
         <button type="submit" name="submit" class="btn btn-primary">Enviar Mensaje</button>
      </div>


</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

</body>

</html>