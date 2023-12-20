<?php
include("conexion.php");
$con = conectar();

session_start();
$query="select * from informacion join proyectos on informacion.id=proyectos.id 
        join publicaciones on proyectos.id=publicaciones.id
        join tesis on publicaciones.id=tesis.id where id =1 "
?>