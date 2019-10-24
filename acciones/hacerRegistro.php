<?php
	$miObjeto = new stdClass();
	$miObjeto->usuario = $_GET['inputUsuario'];
	$miObjeto->password = $_GET['inputPassword'];
	$miObjeto->perfil = $_GET['perfilRegistro'];
	$archivo = fopen('../archivos/usuarios.txt', 'a');
	fwrite($archivo, json_encode($miObjeto)."\n");
	fclose($archivo);
	header("Location: ../paginas/registro.php?exito=exito");
?> 