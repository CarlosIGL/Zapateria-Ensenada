<?php
$id = $_GET ['id'];
$precioZapatos = $_POST['precioZapatos'];
$modeloZapatos = $_POST['modeloZapatos'];
$colorZapatos = $_POST['colorZapatos'];
$tallasZapatos = $_POST['tallasZapatos'];

$imagenZapatosNombre = $_FILES['imagenZapatos']['name'];
$imagenZapatos = $_FILES['imagenZapatos']['tmp_name'];

$ruta="img/hombre";

$ruta = $ruta."/".$imagenZapatosNombre;

move_uploaded_file($imagenZapatos,$ruta);

require 'db.php';
$mysql = new mysqli(SERVER,USUARIO,PASWD,BD);
if ($mysql->connect_error){
    die("No me pude conectar; error: ".$mysql->connect_errno. "interpretacion: ".$mysql->connect_error);
}
$mysql->set_charset("utf8");

$actualizar = "UPDATE altazapatos SET PRECIO='$precioZapatos',MODELO='$modeloZapatos', COLOR='$colorZapatos',TALLAS='$tallasZapatos'
                  , IMAGEN='$ruta' WHERE Id_Zapatos ='$id'";

$resultado = $mysql->query($actualizar);

if($resultado){
    echo "<script> alert('Se actualizo correctamente'); location.href='ModificarZapatos.php';</script>";
}
else{
    echo "<script> alert('No se actualizo correctamente'); location.href='ModificarZapatos.php'; </script>";

}