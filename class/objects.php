<?php

    require_once("class/db.php");

    class Objects extends DB {
        function tittle(){
            return "Formulário de Contato";
        }

        function select(){
            $sql = "SELECT * FROM `dados`";
            $query = self::conn()->prepare( $sql ); //self funciona igual o this, quando é static. (por conta do SQL)
            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetchAll();
        }

        function insert( Array $post ){
            extract( $post ); //essa função vai extrair todos os array de $_POST no momento que preencher o formulário.
            $sql = "INSERT INTO `dados` SET `nome`=? , `email`=? , `senha`=? , `mensagem`=? , `data`=NOW()"; //Protegendo com acentuação devido ao PDO.
            $query = self::conn()->prepare( $sql ); 
            $query->execute( array( $nome, $email, $senha, $mensagem) ); // Essas variáveis foram criadas no extract()
            if ( $query->rowCount() == 1) {
                return TRUE;
            }else{ 
                return FALSE;
        }
    }
}