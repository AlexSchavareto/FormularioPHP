<?php

    class Quadrado{
        function resultado( $a ){
            return $a * $a;
        }
    }

    class Names extends Quadrado{
        function mostrar_nomes( $nome, $sobrenome ){
            return $nome . " " . $sobrenome;
        }
    }

    class Soma extends Names{
        function somar( $x, $y){
            return $x + $y;
        }
    }

?>