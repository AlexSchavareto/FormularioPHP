<?php
//exit;
    $conexao = new mysqli("localhost", "root", "123456", "terminalroot");

    if ( ! $conexao->connect_error ){
        $sql = "SELECT * FROM dados";
        if( $conexao-> query($sql) === TRUE){
            echo "Dados inseridos";
        }else{
            echo "Falha ao inserir dados";
        }



    }else{
        echo "ERRO! Falha ao conectar";
    }

?>