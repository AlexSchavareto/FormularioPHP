<?php
    require_once("class/db.php");

    class Objects extends DB {

        function title(){
            return "Formulário de Contato";
        }

        function login( $email , $senha ){

            if( empty( $email ) || empty( $senha ) ){
                return FALSE;
                exit;
            }


            $sql = "SELECT `id` FROM `dados` WHERE `email`=? AND `senha`=?";
            $query = self::conn()->prepare( $sql );
            $query->execute( array( $email , $senha ) );
            if ( $query->rowCount() == 1 ){
                self::start( $email );
                return TRUE;
            }else{
                return FALSE;
            }
        }

       static protected function start( $email ){
            if( ! isset( $_SESSION) ){
                session_start();
            }

            if( ! isset( $_SESSION['minha-sessao']) ){
                if( empty( $_SESSION ) ){
                    $_SESSION['minha-sessao'] = $email;
                }
            }
        }


        function select(){
            $sql = "SELECT * FROM `dados`";
            $query = self::conn()->prepare( $sql );
            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetchAll();
        }

        function insert( Array $post ){
            unset( $post['enviar'] );

            if( in_array( FALSE , $post ) ){
                return FALSE;
                exit;
            }

            extract( $post );
            $mensagem = strip_tags( $mensagem );
            $sql = "INSERT INTO `dados` SET `nome`=? , `email`=? , `senha`=? , `mensagem`=? , `data`=NOW()";
            $query = self::conn()->prepare( $sql );
            $query->execute( array( $nome , $email , $senha , $mensagem ) );
            return ( $query->rowCount() == 1 ) ? TRUE :  FALSE;
        }

        function update( Array $post ){

            unset( $post['atualizar'] );

            if( in_array( FALSE , $post ) ){
                return FALSE;
            }else{
                extract( $post );
                $sql = "UPDATE `dados` SET `nome`=? , `email`=? , `senha`=? , `mensagem`=? , `data`=NOW() WHERE `id`=?";
                $query = self::conn()->prepare( $sql );
                $query->execute( array( $nome , $email , $senha , $mensagem, $id ) );
                return ( $query->rowCount() == 1 ) ? TRUE :  FALSE;
            }

        }

        function read( $id ){
            $sql = "SELECT * FROM `dados` WHERE id=?";
            $query = self::conn()->prepare( $sql );
            $query->execute( array( $id ) );
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetch();
        }

        function getemail( $email ){
            $sql = "SELECT * FROM `dados` WHERE email=?";
            $query = self::conn()->prepare( $sql );
            $query->execute( array( $email ) );
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetch();
        }

        function delete( $id ){
            $sql = "DELETE FROM `dados` WHERE id=? LIMIT 1";
            $query = self::conn()->prepare( $sql );
            $query->execute( array( $id ) );
            return ( $query->rowCount() == 1 ) ? TRUE :  FALSE;
        }

        function deslogar(){
            $_SESSION['minha-sessao'] = "";
            unset( $_SESSION );
            session_destroy();
        }
    }

?>
