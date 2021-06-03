<?php
$id = $_GET ['id'];
$precioDama = $_POST['precioDama'];
$modeloDama = $_POST['modeloDama'];
$colorDama = $_POST['colorDama'];
$tallasDama = $_POST['tallasDama'];

$imagenDamaNombre = $_FILES['imagenDama']['name'];
$imagenDama = $_FILES['imagenDama']['tmp_name'];

$ruta="img/mujer";

$ruta = $ruta."/".$imagenDamaNombre;

move_uploaded_file($imagenDama,$ruta);

require 'db.php';
$mysql = new mysqli(SERVER,USUARIO,PASWD,BD);
if ($mysql->connect_error){
    die("No me pude conectar; error: ".$mysql->connect_errno. "interpretacion: ".$mysql->connect_error);
}
$mysql->set_charset("utf8");

$actualizar = "UPDATE altadama SET PRECIO='$precioDama',MODELO='$modeloDama', COLOR='$colorDama',TALLAS='$tallasDama'
                  , IMAGEN='$ruta' WHERE Id_Dama ='$id'";

$resultado = $mysql->query($actualizar);

if($resultado){
    echo "<script> alert('Se actualizo correctamente'); location.href='ModificarDama.php';</script>";
}
else{
    echo "<script> alert('No se actualizo correctamente'); location.href='ModificarDama.php'; </script>";

}