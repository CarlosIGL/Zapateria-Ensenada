<?php
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

    $insertar = "INSERT INTO altadama VALUES(Id_Dama,'$precioDama','$modeloDama','$colorDama','$tallasDama','$ruta')";
    $resultado = $mysql->query($insertar);

    if($resultado){
        echo "<script> alert('Se guardo correctamente'); location.href='AltaDama.php';</script>";
    }
    else{
        echo "<script> alert('No se guardo correctamente'); location.href='AltaDama.php'; </script>";

    }