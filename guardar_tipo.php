<?php
$txt_tipo = $_POST['txt_tipo'];

if($txt_tipo==""){
    echo'<script>alert("El tipo NO puede ser vacío!"); window.location="tipo_producto.php";</script>';
    exit;
}

include ('conexion/conexion.php');

$sql = "SELECT * FROM tipo WHERE desc_tipo='$txt_tipo'";
$res = mysqli_query($con, $sql);
$nro_filas_dev=mysqli_num_rows($res);
if($nro_filas_dev !=0){
    echo'<script>alert("Ya existe un tipo con el nombre ingresado"); window.location="tipo_producto.php";</script>';
    mysqli_close($con);
    exit;
}

$sql = "INSERT INTO tipo (desc_tipo) VALUES ('$txt_tipo')";
$resultado = mysqli_query($con, $sql);

if($resultado){
    echo'<script>alert("El tipo se guardo correctamente"); window.location="tipo_producto.php";</script>';
}else{
    echo'<script>alert("Error al guardar el tipo de producto"); window.location="tipo_producto.php";</script>';
}

mysqli_close($con);
?>