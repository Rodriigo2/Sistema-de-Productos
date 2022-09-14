<?php
$cod_producto=$_POST['cod_producto'];
$nombre = $_POST['nombre'];
$peso = $_POST['peso'];
$umedida = $_POST['umedida'];
$tipo = $_POST['tipo'];
$stock = $_POST['stock'];
$precio = $_POST['precio'];
$cod_barra = $_POST['cod_barra'];
$descripcion = trim($_POST['descripcion']);


if(trim($nombre)==""){
    echo'<script>alert("Nombre del Producto No Válido! NO puede ser vacío."); history.go(-1);</script>';
    exit;
}
if(strlen($nombre)>120){
    echo'<script>alert("Hubo un ERROR! El Nombre del Producto excede el límite de caracteres(120)."); history.go(-1);</script>';
    exit;
}

if(trim($peso)==""){
    echo'<script>alert("Peso No Válido! NO puede ser vacío."); history.go(-1);</script>';
    exit;
}

if($peso<=0){
    echo'<script>alert("Hubo un ERROR! El peso no puede ser un número negativo."); history.go(-1);</script>';
    exit;
}

if($umedida[0]<=0){
    echo'<script>alert("Hubo un ERROR! Debe seleccinar una Unidad de medida."); history.go(-1);</script>';
    exit;
}

if($tipo[0]<=0){
    echo'<script>alert("Hubo un ERROR! Debe seleccinar un Tipo de Producto."); history.go(-1);</script>';
    exit;
}

if(trim($stock)==""){
    echo'<script>alert("Stock No Válido! NO puede ser vacío."); history.go(-1);</script>';
    exit;
}

if($stock<0){
    echo'<script>alert("Hubo un ERROR! El Stock no puede ser un número negativo."); history.go(-1);</script>';
    exit;
}

if(trim($precio)==""){
    echo'<script>alert("Precio No Válido! NO puede ser vacío."); history.go(-1);</script>';
    exit;
}
if($precio<=0){
    echo'<script>alert("Hubo un ERROR! El Precio no puede ser un número negativo."); history.go(-1);</script>';
    exit;
}

if(strlen($cod_barra)>20){
    echo'<script>alert("Hubo un ERROR! El Código de barra del Producto excede el límite de caracteres(20)."); history.go(-1);</script>';
    exit;
}

include("../conexion/conexion.php");

$sql= "update producto set nombre='$nombre', peso=$peso, u_medida=$umedida[0],cod_tipo=$tipo[0],stock=$stock,precio=$precio,cod_barra=$cod_barra,descripcion='$descripcion'  where cod_producto = $cod_producto ";


$res = mysqli_query($con,$sql);

if($res){
    echo'<script>alert("Datos actualizados correctamente");window.location="producto_listar.php";</script>';
}else{
    echo'<script>alert("ERROR al intentar guardar los datos. Verifique los mismos."); history.go(-1);</script>';
}

mysqli_close($con);
?>