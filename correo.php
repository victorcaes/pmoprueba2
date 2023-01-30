<?php
if(isset($_POST['enviar'])){
    if(!empty($_POST['txtNombre']) && !empty($_POST['txtCorreo']) && !empty($_POST['txtTelefono'])){
        $name=$_POST['txtNombre'];
        $gmail=$_POST['txtCorreo'];
        $telefono=$_POST['txtTelefono'];
        $msg= $name + $gmail + $telefono;
        $header="From: noreply@example.com" . "\r\n";
        $header.="Reply-To: noreply@example.com" . "\r\n";
        $header.="X-Mailer: PHP/" . phpversion();
        mail($gmail,"asunto de prueba", $msg, $header );

        if($mail){
            echo "<h4> Mail enviado Exitosamente</h4>"
        }
    }

}
