<?php
$nombre = $_POST['nombre'];
$nota1=$_POST['nota1'];
$nota2=$_POST['nota2'];
$parcial=$_POST['parcial'];

echo "Nombre: ".$nombre.'<br>'; 
echo "Nota1: ".$nota1.'<br>'; 
echo "Nota2: ".$nota2.'<br>'; 
echo "Parcial: ".$parcial.'<br>'; 

$promedio = ($nota1 + $nota2 + $parcial)/3;

echo "Promedio: ".number_format($promedio,2).'<br>'; 

$conect = mysqli_connect("localhost", "root", "catolica", "registro_nestor");

if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}
$res = mysqli_query($conect,"SELECT max(idAlu)+1 maxid FROM alumno_nestor");
$row = mysqli_fetch_assoc($res);
$id = $row['maxid'];
$query = "INSERT INTO alumno_nestor VALUES ($id,'$nombre', $nota1, $nota2,$parcial)";
mysqli_query($conect, $query);

printf ("Nuevo registro con el id %d.\n", $conect->insert_id);
mysqli_close($conect);
?>