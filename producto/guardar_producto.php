<?php
$nombre = $_POST['nombre'];
$peso = $_POST['peso'];
$umedida = $_POST['umedida'];
$tipo = $_POST['tipo'];
$stock = $_POST['stock'];
$precio = $_POST['precio'];
$cod_barra = $_POST['cod_barra'];
$descripcion = trim($_POST['descripcion']);
$img = "../img/generico.jpg";


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

if($descripcion==""){
    $descripcion='Sin descripción';
}

include("../conexion/conexion.php");

$sql= "insert into producto(nombre,peso,u_medida,cod_tipo,stock,precio,cod_barra,descripcion,imagen) VALUES ('$nombre',$peso,$umedida[0],$tipo[0],$stock,$precio,$cod_barra,'$descripcion','$img')";


$res = mysqli_query($con,$sql);

if($res){
    $last_code='select max(cod_producto) as cod_generado from producto';
    $eje = mysqli_query($con,$last_code);
    $dato = mysqli_fetch_array($eje);
    $ruta="../img/".$dato['cod_generado'].".png";
    $sql = "update producto set imagen='$ruta' where cod_producto=".$dato['cod_generado'];
    $eje=mysqli_query($con,$sql);
    echo'<script>window.location="producto.php";</script>';
}else{
    echo'<script>alert("ERROR al intentar guardar los datos. Verifique los mismos."); history.go(-1);</script>';
}
mysqli_close($con);

?>