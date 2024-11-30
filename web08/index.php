<?php

session_start();
require('conexion.php');

if (!isset($_SESSION['usuario'])) 
{
	echo "<script>location.replace('login.php');</script>";
}

$filtro = "";

if ($_GET) 
{
	$filtro = $_GET['filtro'];
} 

echo "
<h1>Bienvenido <b>$_SESSION[usuario]</b></h1>
<a href = 'cerrar.php'>Cerrar Sesion</a>

<form method='get' action='$_SERVER[PHP_SELF]'>
Buscar por nombre: <input type='text' name='filtro' value='$filtro'>
<input type='submit' value='Buscar'>
<br>

<table style ='width:800px;border: solid 1px black;'>
<tr style='background-color:black;color:white'>
<td>No.</td>
<td>Nombre de Usuario</td>
<td>Estado</td>
</tr>
";

//Informacion de la bd
$objeto = new conexionBD();
$objeto->conectar();
$consulta = "SELECT * FROM usuario WHERE usuario LIKE '%$filtro%'";
$query = mysqli_query($objeto->idConexion,$consulta);
$nfilas = mysqli_num_rows($query);
if ($nfilas!=0)
{
	$i=0;
	while ($aFila = mysqli_fetch_array($query,MYSQLI_ASSOC)) 
	{
		$i++;
		echo "
		<tr>
		  <td>$i</td>
		  <td>$aFila[usuario]</td>
		  <td>$aFila[estado]</td>
		</tr>  
		";
	}

	mysqli_free_result($query);
} 
else 
{
	echo "<tr>
   <td colspan='3'>No existen registros</td>
	</tr>";
}

$objeto->desconectar();

echo "</table>";

 ?>