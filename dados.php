<?php
$browser = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];

// Seleciona o navegador e armazena na variável $nav
if (strchr($browser, 'Firefox')){
    $nav = 'Firefox';
} elseif (strchr($browser, 'Chromium')) {
    $nav = 'Chromium';
}elseif (strchr($browser, 'Chrome')){
    $nav = 'Chrome';
}elseif (strchr($browser, 'Opera')){
    $nav = 'Opera';
}elseif (strchr($browser, 'MSIE')){
    $nav = 'Internet Explorer';
}elseif (strchr($browser, 'Safari')){
    $nav = 'Safari';
}else{
    $nav = 'Outro Navegador';
}

// Seleciona o sistema e armazena na variável $os
if (strchr($browser, 'Ubuntu')){
    $os = 'Ubuntu';
}elseif (strchr($browser, 'Linux')){
    $os = 'Linux';
}elseif (strchr($browser, 'Windows')){
    $os = 'Windows';
}elseif(strchr($browser, 'Mac OS X')){
    $os = 'MAC OSX';
}else{
    $os = 'Outro Sistema';
}

//Exibe os dados:
$linha = "Seu Sistema Operacional é: " . $os ;
$linha .= "\nE seu navegador é: " . $nav;
$linha .= "\nSeu IP é: " . $ip ;
$linha .= "\n-----------------\n";

$salvar = `echo "$browser" >> erros.log`;

?>