<?php
	if (file_exists( "dados.txt")){
	$texto = "{$_POST['nome']}" . ";" . "{$_POST['email']}" . ";" . "{$_POST['mensagem']}\n";
	$fb = fopen ("dados.txt", "a+");
	fwrite ($fb , $texto, strlen($texto) );
	fclose ($fb);
	}else{

	echo "Arquivo não existe";

}
?>
