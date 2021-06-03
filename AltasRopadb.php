<?php
$precioRopa = $_POST['precioRopa'];
$modeloRopa = $_POST['modeloRopa'];
$colorRopa = $_POST['colorRopa'];
$tallasRopa = $_POST['tallasRopa'];

$imagenRopaNombre = $_FILES['imagenRopa']['name'];
$imagenRopa = $_FILES['imagenRopa']['tmp_name'];

$ruta="img/ropa";

$ruta = $ruta."/".$imagenRopaNombre;

move_uploaded_file($imagenRopa,$ruta);

require 'db.php';
$mysql = new mysqli(SERVER,USUARIO,PASWD,BD);
if ($mysql->connect_error){
    die("No me pude conectar; error: ".$mysql->connect_errno. "interpretacion: ".$mysql->connect_error);
}
$mysql->set_charset("utf8");

$insertar = "INSERT INTO altaropa VALUES(Id_Ropa,'$precioRopa','$modeloRopa','$colorRopa','$tallasRopa','$ruta')";
$resultado = $mysql->query($insertar);

if($resultado){
    echo "<script> alert('Se guardo correctamente'); location.href='AltaRopa.php';</script>";
}
else{
    echo "<script> alert('No se guardo correctamente'); location.href='AltaRopa.php'; </script>";

}