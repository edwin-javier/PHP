<?php

session_start();
require("conexion.php");

$usuarios = "";
$contraseña = "";
$msj = "";

if($_POST)
{
	$usuarios = $_POST['usuario'];
	$contraseña = $_POST['password'];

	$objeto = new conexionBD();
	$objeto->usuarios = $usuarios;
	$objeto->contraseña = $contraseña;
	$objeto->login();

	if ($objeto->existeusuario==0) 
	{
		$msj = "Error: El usuario o contraseña es incorrecta o su usuario esta inactivo";
	}
	else
	{
		$_SESSION['usuario'] = $usuarios;
		header('location: index.php');
	}
}

echo "<form method ='post' action ='$_SERVER[PHP_SELF]'>
Usuario: <br>
<input type='text' name='usuario' value='$usuarios'>
<br>
Password: <br>
<input type='password' name='password' value='$contraseña'>
<br>
<input type='submit' value='Iniciar Sesion'>
</form>
$msj
";

 ?>