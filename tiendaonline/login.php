<?php

include('logindatabase.php');

$user = $_POST['txtusuario'];
$pass = $_POST['txtpassword'];
$rol = $_POST['rol'];

$queryUser = mysqli_query($con, "SELECT * FROM login WHERE usuario='$user' and pass='$pass' and rol='$rol'");

$comparar = mysqli_num_rows($queryUser);

if($comparar==1){
    if($rol=="Admin"){
        header("Location: admin.php");
    } 

} else {
    echo "<script> alert('Usuario, Contrasela o Rol incorrecto.'); window.Location='logueo.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error al Iniciar Sesion</title>
    <link rel="stylesheet" href="css/stylelogin2.scss">
</head>
<body>
    <div class="texto">
        ERROR AL INICIAR SESION
        <br><br>
        <a href="logueo.php"><button>VOLVER A INICIO DE SESION</button></a>
       <a href="index.php"><button>VOLVER A PAGINA PRINCIPAL</button></a>
    </div>
    
</body>
</html>