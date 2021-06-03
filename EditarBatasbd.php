<?php
$id = $_GET ['id'];
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

$actualizar = "UPDATE altabatas SET PRECIO='$precioBatas',MODELO='$modeloBatas', COLOR='$colorBatas',TALLAS='$tallasBatas'
                  , IMAGEN='$ruta' WHERE Id_Batas ='$id'";

$resultado = $mysql->query($actualizar);

if($resultado){
    echo "<script> alert('Se actualizo correctamente'); location.href='ModificarBatas.php';</script>";
}
else{
    echo "<script> alert('No se actualizo correctamente'); location.href='ModificarBatas.php'; </script>";

}