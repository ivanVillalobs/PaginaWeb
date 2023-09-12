<?php
    include "Connection.php";
        $nombre = $_POST['nombre'];
        $apellidoP = $_POST['ApellidoP'];
        $apellidoM =$_POST['ApellidoM'];
        $correo =$_POST['correo'];
        $contrasena =$_POST['contrasena'];
        $telefono =$_POST['telefono'];
        $direccion =$_POST['direccion'];
        

        $sql = mysqli_query($con ,"INSERT INTO usuarios(id, Nombre, Apellido_P, Apellido_M, Correo, Contrasena, telefono, Direccion)
                                                 VALUES (0,'$nombre','$apellidoP','$apellidoM','$correo','$contrasena','$telefono','$direccion')");

header("location: registrologin.html");
?>