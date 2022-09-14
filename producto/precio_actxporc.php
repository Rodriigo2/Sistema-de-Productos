<?php
$operacion = $_POST['operacion'];
$porcentaje = $_POST['porcentaje'];


if($operacion[0]<0){
    echo'<script>alert("Hubo un ERROR! Debe seleccionar una operación."); history.go(-1);</script>';
    exit;
}

include "../conexion/conexion.php";
$sql = "update producto set ";

if($operacion[0]==0){

    $act= "precio = precio - (precio*$porcentaje)";
}else{
    $act= "precio = precio + (precio*$porcentaje)";
}
$sql = $sql.$act;

$res = mysqli_query($con,$sql);

if($res){
    echo'<script>alert("Precios Actualizados con Éxito");window.location="actualizar_precios.php";</script>';
}else{
    echo'<script>alert("ERROR al intentar actualizar los precios. Verifique los mismos."); history.go(-1);</script>';
}



mysqli_close($con);
?>