<?php
$precioBatas = $_POST['precioBatas'];
$modeloBatas = $_POST['modeloBatas'];
$colorBatas = $_POST['colorBatas'];
$tallasBatas = $_POST['tallasBatas'];

$imagenBatasNombre = $_FILES['imagenBatas']['name'];
$imagenBatas = $_FILES['imagenBatas']['tmp_name'];

$ruta="img/batas";

$ruta = $ruta."/".$imagenBatasNombre;

move_uploaded_file($imagenBatas,$ruta);

require 'db.php';
$mysql = new mysqli(SERVER,USUARIO,PASWD,BD);
if ($mysql->connect_error){
    die("No me pude conectar; error: ".$mysql->connect_errno. "interpretacion: ".$mysql->connect_error);
}
$mysql->set_charset("utf8");

$insertar = "INSERT INTO altabatas VALUES(Id_Batas,'$precioBatas','$modeloBatas','$colorBatas','$tallasBatas','$ruta')";
$resultado = $mysql->query($insertar);

if($resultado){
    echo "<script> alert('Se guardo correctamente'); location.href='AltaBatas.php';</script>";
}
else{
    echo "<script> alert('No se guardo correctamente'); location.href='AltaBatas.php'; </script>";

}