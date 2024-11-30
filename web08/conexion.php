<?php

class conexionBD
{
	private $server = "localhost";
	private $user = "root";
	private $pass = "";
	private $bd = "trabajo_final";
	public $idConexion = null;
	public $estado = "";
	public $msjError = "";
	public $usuarios = "";
	public $contraseña = "";
	public $existeusuario = 0;

	//funcion
	public function conectar()
	{
		$this->idConexion = mysqli_connect(
			$this->server,
			$this->user,
			$this->pass,
			$this->bd
		);

		if (mysqli_connect_errno()) 
		{
			$this->msjError = "Error: ". mysqli_connect_error();
			$this->estado = "0";
		}
		else
		{
			$this->msjError = "";
			$this->estado = "1";
		}
	}

	//funcion
	public function desconectar()
	{
		mysqli_close($this->idConexion);
		$this->estado = "0";
		$this->msjError = "";
	}

	//funcion login
	public function login()
	{
		$this->conectar();
		$idC = $this->idConexion;
		$consulta = "SELECT * FROM usuario WHERE usuario = '". $this->usuarios ."' AND password='". md5($this->contraseña) ."' AND estado='1'";

		$query = mysqli_query($idC,$consulta);
		$nfilas = mysqli_num_rows($query);
		$this->existeusuario = $nfilas;
		$this->desconectar();
	}
}

 ?>