<?php

//Testando classes com public - private e protected

//private = Somente irá funcionar caso esteja na mesma classe.

//protected = Funcionará caso a classe tiver estendida 

class Teste{
    protected $nome = "Alex";
    public $sobrenome = "Schavareto";
    function mostrar_nome(){
        echo $this->nome;

    }
}

class Outra extends Teste{
    function sobrenome(){
        echo $this->sobrenome;
        echo $this->nome;
    }
}

$a = new Outra;
$a -> mostrar_nome();
$a -> sobrenome();


?>