<?php
$tipo = $_POST['tipo'];

$imagenNombre = $_FILES['imagen']['name'];
$imagenArchivo = $_FILES['imagen']['tmp_name'];

$ruta="img/reportes";
$ruta = $ruta."/".$imagenNombre;
move_uploaded_file($imagenArchivo,$ruta);

$marca = $_POST['marca'];
$uni = $_POST['uni'];
$total = $_POST['total'];




require 'db.php';
$mysql = new mysqli(SERVER,USUARIO,PASWD,BD);
if ($mysql->connect_error){
    die("No me pude conectar; error: ".$mysql->connect_errno. "interpretacion: ".$mysql->connect_error);
}
$mysql->set_charset("utf8");

$insertar = "INSERT INTO reportventas VALUES(Id_Reportes,'$tipo','$ruta','$marca','$uni','$total')";
$resultado = $mysql->query($insertar);

if($resultado){
    echo "<script> alert('Se guardo correctamente'); location.href='Reportes.php';</script>";
}
else{
    echo "<script> alert('No se guardo correctamente'); location.href='Reportes.php'; </script>";

}