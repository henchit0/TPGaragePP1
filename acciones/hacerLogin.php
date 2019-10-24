<?php
	session_start();

	$checkUsuario = $_GET['inputUsuario'];
	$checkPassword = $_GET['inputPassword'];
	$booUsuario = 0;
	$booPassword = 0;

	if (empty($checkUsuario) || empty($checkPassword)) 
	{
		header("Location: ../login.php?error=camposvacios");
		exit();
	}
	else
	{
		$archivo = fopen("usuarios.txt", "r") or die("Imposible arbrir el archivo");	
		while(!feof($archivo)) 
		{
			$objeto = json_decode(fgets($archivo));
			if ($objeto->usuario == $checkUsuario) 
			{	
				$booUsuario = 1;
				if ($objeto->password == $checkPassword)
				{
					$_SESSION['idDeUsuario'] = $checkUsuario;
					$_SESSION['horaIngreso'] = mktime();
					header("Location: ../login.php");
					fclose($archivo);
					exit();
				}			
			}
		 	
		}	
		if ($booUsuario == 0) {
			header("Location: ../paginas/login.php?error=usuarioincorrecto");
			fclose($archivo);
			exit();
		}
		else 
	    {
			header("Location: ../paginas/login.php?error=contraseñaincorrecta");
			fclose($archivo);
			exit();
		}

		fclose($archivo);
	}	
	header("Location: ../paginas/login.php");
	exit();
?>