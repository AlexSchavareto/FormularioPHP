<?php
//exit;
    $conexao = new mysqli("localhost", "root", "123456", "terminalroot");

    if ( ! $conexao->connect_error ){

        $sql = "SELECT * FROM dados";
        $resultado = $conexao->query($sql);
        while ($linha = $resultado->fetch_assoc()){

            echo "ID: " . $linha['id'] . "<br>";
            echo "Nome: " . $linha['nome'] . "<br>";
            echo "E-mail: " . $linha['email'] . "<br>";
            echo "Mensagem: " . $linha['mensagem'] . "<br>";
            echo "Data/Hora: " . $linha['data'] . "<br>";

            echo "<hr>";

            
                };
    }else{
        echo "ERRO! Falha ao conectar";
    }

?>