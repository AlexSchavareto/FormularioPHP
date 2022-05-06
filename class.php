<?php require_once('head.php') ?>

<?php

    require_once("Quadrado.php");

    $var = new Soma;

    $r = $var->resultado( 8 );
    echo $r;
    echo "<hr>";

    $p = $var->mostrar_nomes("Alex", "Schavareto");
    echo $p;
    echo "<hr>";


    $t = $var->somar( 10, 15 );
    echo $t;

?>
</div>
</body>
</html>