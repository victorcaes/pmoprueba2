<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Prueba de cnx remota github</h1>
    </header>
    <main>
        <form method="post">
            cargar documetnos <br>
            <input type="text" placeholder="nombre" name="txtNombre"> <br>
            <input type="gmail" placeholder="correo" name="txtCorreo"> <br>
            <input type="text" placeholder="telefono" name="txtTelefono"> <br>
            <input type="text" placeholder="DNI/RUC" name="txtDNI"> <br>
            <textarea name="" id="" cols="30" rows="10" placeholder="escribanos su consulta" name="txtConsulta"></textarea> <br>
            <input type="submit" name="btnEnviar">
        </form>
        <?php
            include("correo.php");
        ?>

    </main>
    <footer>

    </footer>
</body>
</html>