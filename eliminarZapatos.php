<?php
$id= $_GET['id'];

require 'db.php';
$mysql = new mysqli(SERVER,USUARIO,PASWD,BD);
if ($mysql->connect_error){
    die("No me pude conectar; error: ".$mysql->connect_errno. "interpretacion: ".$mysql->connect_error);
}
$mysql->set_charset("utf8");

$eliminar = "DELETE FROM altazapatos WHERE Id_Zapatos = '$id'";
$resultado = $mysql->query($eliminar);

if($resultado){
    echo "<script> alert('Se borro correctamente el elemento'); location.href='BajasZapatos.php';</script>";
}
else{
    echo "<script> alert('No se borro correctamente el elemento'); location.href='BajasZapatos.php'; </script>";

}
?>