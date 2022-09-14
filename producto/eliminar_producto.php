<?php

$cod_producto = $_GET['cod'];


if($cod_producto<=0){
    echo'<script>alert("Código No Válido! No puede ser menor o igual a cero"); history.go(-1);</script>';
    exit;
}

if(trim($cod_producto)==""){
    echo'<script>alert("Código No Válido! NO puede ser vacía."); history.go(-1);</script>';
    exit;
}

include("../conexion/conexion.php");


$sql = "DELETE FROM producto where cod_producto=$cod_producto";

$resultado=mysqli_query($con,$sql);


if($resultado){
    echo'<script>window.location="producto_listar.php";</script>';
}else{
    echo'<script>alert("ERROR al intentar Eliminar los datos. Verifique los mismos."); history.go(-1);</script>';
}

mysqli_close($con);



?>