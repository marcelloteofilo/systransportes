<?php

//    //error_reporting(0);
//    //require_once("/opt/lampp/htdocs/systransportes/modelo/banco.php");
//    //require_once ("/opt/lampp/htdocs/systransportes/modelo/usuario/usuario.php");
//    require_once("/../banco.php");
//    require_once("carga.php");
//    //require_once ("../../modelo/usuario/usuario.php");

//    define("BASEPATH", dirname(dirname(dirname(__FILE__))));
//
//    require_once (BASEPATH."/funcoes.php");
    require_once (BASEPATH.MODELO."banco.php");
    require_once ("carga.php");

    //require_once (BASEPATH.MODELO."usuario/usuario.php");

    class CargaSql
    {

        public static function adicionar(Carga $objCarga)
        {

            //Criando a conexão com o banco de dados
            $conexao = Conexao::getInstance()->getConexao();


            $idUsuario = $objCarga->getObjUsuario();
            $idCidadeOrigem = substr($objCarga->getObjCidadeOrigem(), 0, 7);
            $idCidadeDestino = substr($objCarga->getObjCidadeDestino(), 0, 7);
            $altura = number_format($objCarga->getAltura(), 2, '.', '');
            $largura = number_format($objCarga->getLargura(), 2, '.', '');
            $peso = number_format($objCarga->getPeso(), 2, '.', '');
            $comprimento = number_format($objCarga->getComprimento(), 2, '.', '');
            $quantidade = number_format($objCarga->getQuantidade(), 2, '.', '');
            $valor = number_format($objCarga->getValor(), 2, '.', '');
            $telefone = mysql_real_escape_string($objCarga->getTelefone(), $conexao);
            $logradouro = mysql_real_escape_string($objCarga->getLogradouro(), $conexao);
            $bairro = mysql_real_escape_string($objCarga->getBairro(), $conexao);
            $uf = mysql_real_escape_string($objCarga->getUf(), $conexao);
            $cidade = mysql_real_escape_string($objCarga->getCidade(), $conexao);
            $numero = $objCarga->getNumero();
            $observacao = mysql_real_escape_string($objCarga->getObservacao(), $conexao);
            $naturezaCarga = mysql_real_escape_string($objCarga->getNaturezaCarga(), $conexao);
            $dataPedido = mysql_real_escape_string($objCarga->getDataPedido(), $conexao);
            $distancia = $objCarga->getDistancia();
            $prazo = $objCarga->getPrazo();
            $frete = number_format($objCarga->getFrete(), 2, '.', '');



            //Inserção na tabela de veiculo relacionada ao banco de dados systransporte
            $sql = "insert into cargas (codUsuario, origem, destino, altura, largura, peso,
            comprimento,quantidade,valor,telefone,logradouro,bairro,uf,cidade,numero,
            observacao,naturezaCarga,dataPedido,frete,distancia,prazo)
            values ('$idUsuario','$idCidadeOrigem','$idCidadeDestino','$altura' ,'$largura','$peso',
            '$comprimento' ,'$quantidade','$valor','$telefone','$logradouro','$bairro','$uf',
            '$cidade','$numero','$observacao','$naturezaCarga','$dataPedido','$frete','$distancia','$prazo')";


            $resultado = @mysql_query($sql, $conexao);

            if($resultado === true)
            {
                $ultimoId = mysql_insert_id();
                return $ultimoId;
            }
        }

        public static function alterarCargaCliente(Carga $carga)
        {
            //Conexão com o banco
            $conexao = Conexao::getInstance()->getConexao();

            //Atributo da tabela usuário
            $codCarga = mysql_real_escape_string($carga->getCodCarga(), $conexao);
            $statusCarga = mysql_real_escape_string($carga->getStatusCarga(), $conexao);
            $coletada = mysql_real_escape_string($carga->getColetada(), $conexao);


            if($statusCarga === "Aprovado")
            {
                //Update para a tabela de Usuários do banco de dados
                $sql = "update cargas set statusCarga='$statusCarga',coletada='$coletada' where codCarga=$codCarga";

                $sqlDois = "insert into coleta (codCarga,codMotorista,codVeiculo) values($codCarga,2,1)";

                //Cria o registro de Coleta Automatica
                mysql_query($sqlDois, $conexao);

                $resultado = @mysql_query($sql, $conexao);
                return ($resultado === true);
            }
            else
            {
                $sql = "update cargas set statusCarga='$statusCarga' where codCarga=$codCarga";
                $resultado = @mysql_query($sql, $conexao);
                return ($resultado === true);
            }
        }

        public static function alterarCargaAtendente(Carga $carga)
        {
            //Conexão com o banco
            $conexao = Conexao::getInstance()->getConexao();

            //Atributo da tabela usuário
            $codCarga = mysql_real_escape_string($carga->getCodCarga(), $conexao);
            $cotado = mysql_real_escape_string($carga->getCotado(), $conexao);
            $frete = mysql_real_escape_string($carga->getFrete(), $conexao);
            $distancia = mysql_real_escape_string($carga->getDistancia(), $conexao);
            $prazo = mysql_real_escape_string($carga->getPrazo(), $conexao);

            //Update para a tabela de Usuários do banco de dados
            $sql = "update cargas set cotado='$cotado',prazo='$prazo',distancia=$distancia,frete=$frete where codCarga=$codCarga";
            //echo($sql);
            $resultado = @mysql_query($sql, $conexao);

            return ($resultado === true);
        }

////////////////////////// QUERYS DE BUSCAS //////////////////////////
        public static function carregarLista(Carga $carga)
        {
            //Conexão com o banco
            $conexao = Conexao::getInstance()->getConexao();

            $userAtual = $_SESSION['login'];
            $con = mysql_connect('localhost', 'root', '') or die('Sem conexão com o servidor');
            $sql = "select * from usuarios where login = '$userAtual'";
            $res = mysql_query($sql, $con);
            $user = mysql_fetch_assoc($res);
            $stringIdUser = (int) implode($user);

            $sql = 'select cg.*,
                    cidOrigem.descricao as origem,cidDestino.descricao as destino,
                    clientePF.nomeCompleto as pessoaFisicaNome,clientePJ.razaoSocial as pessoaJuridicaNome
                    from cargas as cg
                    INNER JOIN usuarios as clientePF ON cg.codUsuario = clientePF.id
                    INNER JOIN usuarios as clientePJ ON cg.codUsuario = clientePJ.id
                    INNER JOIN cidades as cidOrigem ON cg.origem = cidOrigem.codigo
                    INNER JOIN cidades as cidDestino ON cg.destino = cidDestino.codigo
                    where codUsuario = '.$stringIdUser;

            $resultado = mysql_query($sql, $conexao);

            if($resultado)
            {
                $retorno = array();
                while($row = mysql_fetch_array($resultado))
                {
                    $carga = new Carga();
                    $carga->setCodCarga($row["codCarga"]);

                    $carga->setObjCidadeOrigem($row["origem"]);
                    $carga->setObjCidadeDestino($row["destino"]);

                    $carga->setPessoaFisicaNome($row["pessoaFisicaNome"]);
                    $carga->setPessoaJuridicaNome($row["pessoaJuridicaNome"]);

                    $carga->setAltura($row["altura"]);
                    $carga->setLargura($row["largura"]);
                    $carga->setPeso($row["peso"]);
                    $carga->setComprimento($row["comprimento"]);
                    $carga->setQuantidade($row["quantidade"]);
                    $carga->setValor($row["valor"]);

                    $carga->setTelefone($row["telefone"]);
                    $carga->setLogradouro($row["logradouro"]);
                    $carga->setBairro($row["bairro"]);
                    $carga->setUf($row["uf"]);
                    $carga->setCidade($row["cidade"]);
                    $carga->setNumero($row["numero"]);
                    $carga->setObservacao($row["observacao"]);

                    $carga->setNaturezaCarga($row["naturezaCarga"]);
                    $carga->setDataPedido($row["dataPedido"]);
                    $carga->setDistancia($row["distancia"]);
                    $carga->setPrazo($row["prazo"]);
                    $carga->setFrete($row["frete"]);

                    $carga->setColetada($row["coletada"]);
                    $carga->setStatusCarga($row["statusCarga"]);
                    $carga->setCotado($row["cotado"]);

                    $retorno[] = $carga;
                }
                //var_dump($userAtual);
                //die;

                return ($retorno);
            }
            else
                return null;
        }

        public static function carregarListaAtendimento(Carga $carga)
        {
            //Conexão com o banco
            $conexao = Conexao::getInstance()->getConexao();

            $userAtual = $_SESSION['login'];
            $con = mysql_connect('localhost', 'root', '') or die('Sem conexão com o servidor');
            $sql = "select * from usuarios where login = '$userAtual'";
            $res = mysql_query($sql, $con);
            $user = mysql_fetch_assoc($res);
            $stringIdUser = (int) implode($user);

            $sql = 'select cg.*,
                    cidOrigem.descricao as origem,cidDestino.descricao as destino,
                    clientePF.nomeCompleto as pessoaFisicaNome,clientePJ.razaoSocial as pessoaJuridicaNome
                    from cargas as cg
                    INNER JOIN usuarios as clientePF ON cg.codUsuario = clientePF.id
                    INNER JOIN usuarios as clientePJ ON cg.codUsuario = clientePJ.id
                    INNER JOIN cidades as cidOrigem ON cg.origem = cidOrigem.codigo
                    INNER JOIN cidades as cidDestino ON cg.destino = cidDestino.codigo
                    where cotado = "Nao Cotado" and codUsuario = '.$stringIdUser;

            $resultado = @mysql_query($sql, $conexao);

            if($resultado)
            {
                $retorno = array();
                while($row = mysql_fetch_array($resultado))
                {
                    $carga = new Carga();
                    $carga->setCodCarga($row["codCarga"]);

                    $carga->setObjCidadeOrigem($row["origem"]);
                    $carga->setObjCidadeDestino($row["destino"]);

                    $carga->setPessoaFisicaNome($row["pessoaFisicaNome"]);
                    $carga->setPessoaJuridicaNome($row["pessoaJuridicaNome"]);

                    $carga->setAltura($row["altura"]);
                    $carga->setLargura($row["largura"]);
                    $carga->setPeso($row["peso"]);
                    $carga->setComprimento($row["comprimento"]);
                    $carga->setQuantidade($row["quantidade"]);
                    $carga->setValor($row["valor"]);

                    $carga->setTelefone($row["telefone"]);
                    $carga->setLogradouro($row["logradouro"]);
                    $carga->setBairro($row["bairro"]);
                    $carga->setUf($row["uf"]);
                    $carga->setCidade($row["cidade"]);
                    $carga->setNumero($row["numero"]);
                    $carga->setObservacao($row["observacao"]);

                    $carga->setNaturezaCarga($row["naturezaCarga"]);
                    $carga->setDataPedido($row["dataPedido"]);
                    $carga->setDistancia($row["distancia"]);
                    $carga->setPrazo($row["prazo"]);
                    $carga->setFrete($row["frete"]);

                    $carga->setColetada($row["coletada"]);
                    $carga->setStatusCarga($row["statusCarga"]);
                    $carga->setCotado($row["cotado"]);

                    $retorno[] = $carga;
                }
                return ($retorno);
            }
            else
                return null;
        }

        public static function carregarListaAprovados(Carga $carga)
        {
            //Conexão com o banco
            $conexao = Conexao::getInstance()->getConexao();

            $userAtual = $_SESSION['login'];
            $con = mysql_connect('localhost', 'root', '') or die('Sem conexão com o servidor');
            $sql = "select * from usuarios where login = '$userAtual'";
            $res = mysql_query($sql, $con);
            $user = mysql_fetch_assoc($res);
            $stringIdUser = (int) implode($user);

            $sql = 'select cg.*,
                    cidOrigem.descricao as origem,cidDestino.descricao as destino,
                    clientePF.nomeCompleto as pessoaFisicaNome,clientePJ.razaoSocial as pessoaJuridicaNome
                    from cargas as cg
                    INNER JOIN usuarios as clientePF ON cg.codUsuario = clientePF.id
                    INNER JOIN usuarios as clientePJ ON cg.codUsuario = clientePJ.id
                    INNER JOIN cidades as cidOrigem ON cg.origem = cidOrigem.codigo
                    INNER JOIN cidades as cidDestino ON cg.destino = cidDestino.codigo
                    where cotado = "Cotado" and statusCarga = "" and codUsuario = '.$stringIdUser;

            $resultado = @mysql_query($sql, $conexao);

            if($resultado)
            {
                $retorno = array();
                while($row = mysql_fetch_array($resultado))
                {
                    $carga = new Carga();
                    $carga->setCodCarga($row["codCarga"]);

                    $carga->setObjCidadeOrigem($row["origem"]);
                    $carga->setObjCidadeDestino($row["destino"]);

                    $carga->setPessoaFisicaNome($row["pessoaFisicaNome"]);
                    $carga->setPessoaJuridicaNome($row["pessoaJuridicaNome"]);

                    $carga->setAltura($row["altura"]);
                    $carga->setLargura($row["largura"]);
                    $carga->setPeso($row["peso"]);
                    $carga->setComprimento($row["comprimento"]);
                    $carga->setQuantidade($row["quantidade"]);
                    $carga->setValor($row["valor"]);

                    $carga->setTelefone($row["telefone"]);
                    $carga->setLogradouro($row["logradouro"]);
                    $carga->setBairro($row["bairro"]);
                    $carga->setUf($row["uf"]);
                    $carga->setCidade($row["cidade"]);
                    $carga->setNumero($row["numero"]);
                    $carga->setObservacao($row["observacao"]);

                    $carga->setNaturezaCarga($row["naturezaCarga"]);
                    $carga->setDataPedido($row["dataPedido"]);
                    $carga->setDistancia($row["distancia"]);
                    $carga->setPrazo($row["prazo"]);
                    $carga->setFrete($row["frete"]);

                    $carga->setColetada($row["coletada"]);
                    $carga->setStatusCarga($row["statusCarga"]);
                    $carga->setCotado($row["cotado"]);

                    $retorno[] = $carga;
                }
                return ($retorno);
            }
            else
                return null;
        }

        public static function carregarListaConcluidos(Carga $carga)
        {
            //Conexão com o banco
            $conexao = Conexao::getInstance()->getConexao();

            $userAtual = $_SESSION['login'];
            $con = mysql_connect('localhost', 'root', '') or die('Sem conexão com o servidor');
            $sql = "select * from usuarios where login = '$userAtual'";
            $res = mysql_query($sql, $con);
            $user = mysql_fetch_assoc($res);
            $stringIdUser = (int) implode($user);

            $sql = 'select cg.*,
                    cidOrigem.descricao as origem,cidDestino.descricao as destino,
                    clientePF.nomeCompleto as pessoaFisicaNome,clientePJ.razaoSocial as pessoaJuridicaNome
                    from cargas as cg
                    INNER JOIN usuarios as clientePF ON cg.codUsuario = clientePF.id
                    INNER JOIN usuarios as clientePJ ON cg.codUsuario = clientePJ.id
                    INNER JOIN cidades as cidOrigem ON cg.origem = cidOrigem.codigo
                    INNER JOIN cidades as cidDestino ON cg.destino = cidDestino.codigo
                    where cotado = "Cotado" and statusCarga != "" and codUsuario = '.$stringIdUser;

            $resultado = @mysql_query($sql, $conexao);

            if($resultado)
            {
                $retorno = array();
                while($row = mysql_fetch_array($resultado))
                {
                    $carga = new Carga();
                    $carga->setCodCarga($row["codCarga"]);

                    $carga->setObjCidadeOrigem($row["origem"]);
                    $carga->setObjCidadeDestino($row["destino"]);

                    $carga->setPessoaFisicaNome($row["pessoaFisicaNome"]);
                    $carga->setPessoaJuridicaNome($row["pessoaJuridicaNome"]);

                    $carga->setAltura($row["altura"]);
                    $carga->setLargura($row["largura"]);
                    $carga->setPeso($row["peso"]);
                    $carga->setComprimento($row["comprimento"]);
                    $carga->setQuantidade($row["quantidade"]);
                    $carga->setValor($row["valor"]);

                    $carga->setTelefone($row["telefone"]);
                    $carga->setLogradouro($row["logradouro"]);
                    $carga->setBairro($row["bairro"]);
                    $carga->setUf($row["uf"]);
                    $carga->setCidade($row["cidade"]);
                    $carga->setNumero($row["numero"]);
                    $carga->setObservacao($row["observacao"]);

                    $carga->setNaturezaCarga($row["naturezaCarga"]);
                    $carga->setDataPedido($row["dataPedido"]);
                    $carga->setDistancia($row["distancia"]);
                    $carga->setPrazo($row["prazo"]);
                    $carga->setFrete($row["frete"]);

                    $carga->setColetada($row["coletada"]);
                    $carga->setStatusCarga($row["statusCarga"]);
                    $carga->setCotado($row["cotado"]);

                    $retorno[] = $carga;
                }
                return ($retorno);
            }
            else
                return null;
        }

        public static function carregarListaAdmin(Carga $carga)
        {
            $conexao = Conexao::getInstance()->getConexao();

            $sql = 'select cg.*, cidOrigem.descricao as origem,cidDestino.descricao as destino,
                clientePF.nomeCompleto as pessoaFisicaNome,clientePJ.razaoSocial as pessoaJuridicaNome
            from cargas as cg INNER JOIN usuarios as clientePF ON cg.codUsuario = clientePF.id
            INNER JOIN usuarios as clientePJ ON cg.codUsuario = clientePJ.id
            INNER JOIN cidades as cidOrigem ON cg.origem = cidOrigem.codigo
            INNER JOIN cidades as cidDestino ON cg.destino = cidDestino.codigo'; // where cg.codUsuario = '.$stringIdUser;

            $resultado = mysql_query($sql, $conexao);

            if($resultado)
            {
                $retorno = array();
                while($row = mysql_fetch_array($resultado))
                {
                    $carga = new Carga();

                    $carga->setCodCarga($row["codCarga"]);
                    $carga->setObjCidadeOrigem($row["origem"]);
                    $carga->setObjCidadeDestino($row["destino"]);
                    $carga->setPessoaFisicaNome($row["pessoaFisicaNome"]);
                    $carga->setPessoaJuridicaNome($row["pessoaJuridicaNome"]);
                    $carga->getObjUsuario()->setId($row["codUsuario"]);
                    $carga->setAltura($row["altura"]);
                    $carga->setLargura($row["largura"]);
                    $carga->setPeso($row["peso"]);
                    $carga->setComprimento($row["comprimento"]);
                    $carga->setQuantidade($row["quantidade"]);
                    $carga->setValor($row["valor"]);
                    $carga->setTelefone($row["telefone"]);
                    $carga->setLogradouro($row["logradouro"]);
                    $carga->setBairro($row["bairro"]);
                    $carga->setUf($row["uf"]);
                    $carga->setCidade($row["cidade"]);
                    $carga->setNumero($row["numero"]);
                    $carga->setObservacao($row["observacao"]);
                    $carga->setNaturezaCarga($row["naturezaCarga"]);
                    $carga->setDataPedido($row["dataPedido"]);
                    $carga->setDistancia($row["distancia"]);
                    $carga->setPrazo($row["prazo"]);
                    $carga->setFrete($row["frete"]);
                    $carga->setColetada($row["coletada"]);
                    $carga->setStatusCarga($row["statusCarga"]);

                    $retorno[] = $carga;
                }
                return ($retorno);
            }
            else
            {
                return null;
            }
        }
    }

?>
