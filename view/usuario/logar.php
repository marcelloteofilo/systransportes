<?php

//require_once('/opt/lampp/htdocs/systransportes/modelo/usuario/usuario.php');
    require_once('../../modelo/usuario/usuario.php');

    $login = $_POST['login'];
    $senha = $_POST['senha'];


    $con = mysql_connect('localhost', 'root', '') or die('Sem conexão com o servidor');
    $select = mysql_select_db('systransportes') or die('Sem acesso ao DB, Entre em contato com o Administrador');

    $result = mysql_query("SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha' ");


    if($result)
    {

        $linha = mysql_fetch_array($result);
        $objusuario = new Usuario();

        $objusuario->setId($linha["id"]);
        $objusuario->setPerfil($linha["perfil"]);
        $objusuario->setStatus($linha["status"]);
        $objusuario->setNomeCompleto($linha["nomeCompleto"]);
        $objusuario->setRazaoSocial($linha["razaoSocial"]);
        $objusuario->setnomeFantasia($linha["nomeFantasia"]);
        $objusuario->setTipoEmpresa($linha["tipoEmpresa"]);
        $objusuario->setRg($linha["rg"]);
        $objusuario->setOrgaoExpedidor($linha["orgaoExpedidor"]);
        $objusuario->setCpf($linha["cpf"]);
        $objusuario->setCnpj($linha["cnpj"]);
        $objusuario->setEmail($linha["email"]);
        $objusuario->setTelefone1($linha["telefone1"]);
        $objusuario->setTelefone2($linha["telefone2"]);
        $objusuario->setLogradouro($linha["logradouro"]);
        $objusuario->setBairro($linha["bairro"]);
        $objusuario->setComplemento($linha["complemento"]);
        $objusuario->setNumero($linha["numero"]);
        $objusuario->setCep($linha["cep"]);
        $objusuario->setEstado($linha["estado"]);
        $objusuario->setCidade($linha["cidade"]);
        $objusuario->setLogin($linha["login"]);
    }
    else
    {
        return null;
    }

    //$resultPerfilFisica = mysql_query("SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha' AND `perfil`= 'Pessoa Fisica'");
    //$resultPerfilJuridica = mysql_query("SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha' AND `perfil`= 'Pessoa Juridica'");
    //echo $objusuario->getPerfil();
    //exit();

    if($objusuario->getPerfil() == "Atendente" && $objusuario->getStatus() == "Habilitado")
    {
        session_start();
        $_SESSION['objusuario'] = $objusuario;
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('location: ../telaAdminSystem.php');
    }
    else if($objusuario->getPerfil() == "Pessoa Juridica" or $objusuario->getPerfil() == "Pessoa Fisica" && $objusuario->getStatus() == "Habilitado")
    {
        session_start();
        $_SESSION['objusuario'] = $objusuario;
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('location: ../../view/carga/cargaConsulta.php');
    }
    else
    {
        session_destroy();
        unset($_SESSION['objusuario']);
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: login.php');
    }
?>