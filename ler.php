<?php 
    if( file_exists( "dados.txt" ) ) {
        
        $fp = fopen( "dados.txt", "r"); // o "r" significa leitura.

        while( !feof( $fp ) ) {
            $linha_atual = fgets( $fp );
            if( !empty( $linha_atual )){
                echo "$linha_atual<br>";
            }
        }

        fclose( $fp );

    }else{
        echo "Arquivo não existe";
    }
?>