<?php

// Introduzinho try e catch

mysqli_report( MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);

$host = "localhost";
$user = "root";
$pass = "1ss23456";

try { 
    $conexao = new mysqli("$host", "$user", "$pass");
    echo "Conectado com sucesso!";

}catch( mysqli_sql_exception $erros){
    $fb = fopen("log_erros.txt", "a+");
    fwrite ( $fb, "$erros" );
	fclose ( $fb );
    die( "Não conectado!");

}










//Testando classes com public, private e protected
/* ############################################################################

class Teste{
    public $nome;

    static function get_nome(){
        echo "isso é um método estatico";
    }
}

class Outra extends Teste{
    public function set_nome(){
        Teste::get_nome();
    }
}

Outra::set_nome();
*/


?>