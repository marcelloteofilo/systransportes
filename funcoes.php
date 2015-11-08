<?php
    
    inicializa();

    //require_once 'configuracoes.php';
    function inicializa()
    {
        if(file_exists(dirname(__FILE__).'/configuracoes.php'))
        {
            require_once (dirname(__FILE__).'/configuracoes.php');
        }
        else
        {
            die(utf8_decode('O arquivo de configuraçoes nao esxiste!!'));
        }
    }
    if(!defined("BASEPATH") || !defined("BASEURL"))
    {
        die(utf8_decode('Faltam configuraçoes bsicas do sistema!!'));
    }
?>