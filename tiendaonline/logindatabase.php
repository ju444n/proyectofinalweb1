<?php 

$con = new mysqli("localhost", "root", "", "logueo");

if($con->connect_errno){
    echo "Error en la conexión: (".$con->connect_errno.")".$con->connect_error;
}

?>