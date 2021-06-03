<?php
$id = $_GET ['id'];
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

$actualizar = "UPDATE altaropa SET PRECIO='$precioRopa',MODELO='$modeloRopa', COLOR='$colorRopa',TALLAS='$tallasRopa'
                  , IMAGEN='$ruta' WHERE Id_Ropa ='$id'";

$resultado = $mysql->query($actualizar);

if($resultado){
    echo "<script> alert('Se actualizo correctamente'); location.href='ModificarRopa.php';</script>";
}
else{
    echo "<script> alert('No se actualizo correctamente'); location.href='ModificarRopa.php'; </script>";

}