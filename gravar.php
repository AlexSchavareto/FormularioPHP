<?php
    $conexao = new mysqli("localhost", "root", "123456", "terminalroot");

    if ( ! $conexao->connect_error ){
        $sql = "INSERT INTO dados (id, nome, email, mensagem, data) VALUES (NULL, '{$_POST['nome']}', '{$_POST['email']}', '{$_POST['mensagem']}', NOW())";
        if( $conexao-> query($sql) === TRUE){
            //echo "Dados inseridos";
            header("location: ./");
        }else{
            echo "Falha ao inserir dados";
        }



    }else{
        echo "ERRO! Falha ao conectar";
    }

 /*
 // Gravar antigo (em txt)

 
	if (file_exists( "dados.txt")){
		$texto = "{$_POST['nome']}" . ";" . "{$_POST['email']}" . ";" . "{$_POST['mensagem']}\n";
		$fb = fopen ("dados.txt", "a+");
		fwrite ($fb , $texto, strlen($texto) );
		fclose ($fb);
	}else{

	echo "Arquivo não existe";

}

*/
?>
