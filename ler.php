<table border="1">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Mensagem</th>
    </tr>
<?php 
    if( file_exists( "dados.txt" ) ) {
        
        $fp = fopen( "dados.txt", "r"); // o "r" significa leitura.

        while( !feof( $fp ) ) { //Enquanto não chegar ao final do arquivo declarado na variavel $fp
            $linha_atual = fgets( $fp );
            if( !empty( $linha_atual )){ //Esse if serve para não imprimir a linha vazia
                $ex = explode(";",$linha_atual); //função explode cria um array de cada linha com o separador ";"
                

?>

    <tr>
        <td><?php echo $ex[0];?></td>
        <td><?php echo $ex[1];?></td>
        <td><?php echo $ex[2];?></td>
    </tr>

<?php
            }
        }

        fclose( $fp );

    }else{
        echo "Arquivo não existe";
    }
?>

</table>