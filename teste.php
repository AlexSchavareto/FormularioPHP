<?php

//Testando classes com public - private e protected

class Teste{
    private $nome = "Alex";
    private $sobrenome = "Schavareto";

    static function mostrar_nome(){ //static não precisa do $this
        echo $nome = "Novo nome " . $sobrenome = "Novo sobrenome";
    }

    function nome_verdadeiro(){
        echo $this->nome . $this->sobrenome;
    }
}

class Outra extends Teste{
    function sobrenome(){
        Outra::mostrar_nome();   
    }
}

$a = new Outra;
$a -> nome_verdadeiro();

echo "<hr>";

Outra::sobrenome();

?>