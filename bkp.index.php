<?php
    if ( $_SERVER['HTTP_HOST'] == "thepinguim.com.br" ){
        header("location: wordpress");
    }else{
        require_once("index.bkp.php");
    }
?>