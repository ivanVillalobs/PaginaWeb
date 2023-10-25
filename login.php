<?php
session_start();

include "Connection.php";

if(!$con){
    die("No hay conexion".mysqli_connect_error());
}

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$resultado = mysqli_query ($con,"SELECT *FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena';");


if(mysqli_num_rows($resultado)==1){    

    if($correo=='ivanovicas@hotmail.com' && $contrasena=='ivanoe123' or $correo=='administrador@gmail.com' && $contrasena=='adminroot'){

        $usuario = mysqli_fetch_array($resultado);
        $_SESSION['id_usuario'] = $usuario['ID']; // Guardar el ID de usuario en una variable de sesión
        echo "Bienvenido ".$correo;
        header("location: pro/mostrarProductosADMIN.php");

    }else{
        $usuario = mysqli_fetch_array($resultado);
        $_SESSION['id_usuario'] = $usuario['ID']; // Guardar el ID de usuario en una variable de sesión
        $Nombre = $usuario['Nombre'];
        $_SESSION['Nombre'] = $Nombre;

        // $NumeroTelefonico = $NumeroTelefonico['NumeroTelefonico'];    
        $NumeroTelefonico = $usuario['telefono'];
        $_SESSION['telefono'] = $NumeroTelefonico;

        //$CorreoEletronico = $CorreoEletronico['CorreoEletronico'];
        $_SESSION['correo'] = $correo;
        

        echo "Bienvenido ".$correo;
        header("location: Indexprod.php");

    }

}else{
    echo "adios";
}

/*
if($nr == 1){
    $usuario = mysqli_fetch_array($resultado); // El usuario se autenticó correctamente
    $_SESSION['id_usuario'] = $usuario['ID']; // Guardar el ID de usuario en una variable de sesión
    header("location: indexprod.php");
    echo "Bienvenido ".$CorreoEletronico;
}
else if($nr == 0){
    // El usuario no se autenticó correctamente
    echo "No ingreso usuario, vuelvalo a intentar";
}
*/
?>
