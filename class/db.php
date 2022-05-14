<?php
    class DB {
        function conn(){
            try {

                if( ! isset( $pdo ) ){
                  $pdo = new PDO("mysql:host=localhost;dbname=terminalroot", "root" , "123456");
                  $pdo->setAttribute ( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
                  $pdo->exec("SET CHARACTER SET utf8");
                  return $pdo;
                }

            }catch( PDOException $e ){
                die("<h1>Erro de conexão, consulte o administrador do sistema</h1>");
            }
        }
    }
?>