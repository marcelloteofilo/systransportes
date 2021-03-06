<?php

//    define("BASEPATH", dirname(dirname(dirname(__FILE__))));
//
//    require_once (BASEPATH."/funcoes.php");
    require_once (BASEPATH.MODELO."banco.php");
    require_once (BASEPATH.MODELO."mercadoria/mercadoria.php");

    //require_once (BASEPATH.MODELO."carga/carga.php");
//    require_once ("/../banco.php");
//    require_once ("mercadoria.php");

    class MercadoriaSql
    {

        //Método responsável em adicionar um determinado veículo
        public static function adicionar(Mercadoria $objMercadoria)
        {
            //var_dump($objMercadoria);
            //exit();
            //Criando a conexão com o banco de dadosalt
            $conexao = Conexao::getInstance()->getConexao();

            //Atributos da classe Mercadoria sendo definidas em uma variável, obtidas em um método para realização da
            //obtenção do valor e logo em seguida, realizando a chamada do banco

            $idCarga = mysql_real_escape_string($objMercadoria->getObjCarga(), $conexao);
            $descricaoMercadoria = mysql_real_escape_string($objMercadoria->getDescricaoMercadoria(), $conexao);
            $pesoMercadoria = mysql_real_escape_string($objMercadoria->getPeso(), $conexao);
            $valorMercadoria = mysql_real_escape_string($objMercadoria->getValorMercadoria(), $conexao);
            $quantidade = mysql_real_escape_string($objMercadoria->getQuantidade(), $conexao);

            //Inserção na tabela de Mercadoria relacionada ao banco de dados systransporte
            $sql = "insert into mercadorias (codCarga, descricao, pesoMercadoria, valorMercadoria, quantidade)
                values ('$idCarga', '$descricaoMercadoria', '$pesoMercadoria', '$valorMercadoria', '$quantidade')";
            $resultado = mysql_query($sql, $conexao);
            return ($resultado === true);
        }

        //Método responsável em alterar um determinado veículo
        public static function alterar(Mercadoria $mercadoria)
        {
            //Criando a conexão com o banco de dados
            $conexao = Conexao::getInstance()->getConexao();

            //Atributos da classe Mercadoria sendo definidas em uma variável, obtidas em um método para realização da
            //obtenção do valor e logo em seguida, realizando a chamada do banco
            $id = mysql_real_escape_string($mercadoria->getId(), $conexao);
            $idCarga = mysql_real_escape_string($mercadoria->getObjCarga()->getCodCarga(), $conexao);
            $descricaoMercadoria = mysql_real_escape_string($mercadoria->getDescricaoMercadoria(), $conexao);
            $pesoMercadoria = mysql_real_escape_string($mercadoria->getPeso(), $conexao);
            $valorMercadoria = mysql_real_escape_string($mercadoria->getValorMercadoria(), $conexao);
            $quantidade = mysql_real_escape_string($mercadoria->getQuantidade(), $conexao);


            ///Alteração na tabela de Mercadoria relacionada ao banco de dados systransporte
            $sql = "update mercadorias set codCarga='$idCarga', descricao='$descricaoMercadoria',
               pesoMercadoria = '$pesoMercadoria', valorMercadoria = '$valorMercadoria', quantidade = '$quantidade' where id = $id ";
            $resultado = @mysql_query($sql, $conexao);

            return ($resultado === true);
        }

        //Método responsável em remover um determinado veículo
        public static function remover(Mercadoria $mercadoria)
        {
            //Criando a conexão com o banco de dados
            $conexao = Conexao::getInstance()->getConexao();

            //Atributo da classe Mercadoria sendo definida em uma variável, obtida em um método para realização da
            //obtenção do valor e logo em seguida, realizando a chamada do banco de dados
            $id = mysql_real_escape_string($mercadoria->getId(), $conexao);

            //Remoção na tabela de Mercadoria relacionada ao banco de dados systransporte
            $sql = "delete from mercadorias where id = '$id' ";
            $resultado = @mysql_query($sql, $conexao);

            return ($resultado === true);
        }

        public static function carregarLista()
        {
            //Conexão com o banco
            $conexao = Conexao::getInstance()->getConexao();

            //$id = mysql_real_escape_string($mercadoria->getId(), $conexao);

            $sql = 'select * from mercadorias';

            $rs = mysql_query($sql, $conexao);

            if($rs)
            {
                $resultado = array();
                while($row = mysql_fetch_array($rs))
                {

                    $objMercadoria = new Mercadoria();

                    $objMercadoria->setId($row["id"]);
                    $objMercadoria->getObjCarga()->setCodCarga($row["codCarga"]);
                    $objMercadoria->setDescricaoMercadoria($row["descricao"]);
                    $objMercadoria->setPeso($row["pesoMercadoria"]);
                    $objMercadoria->setValorMercadoria($row["valorMercadoria"]);
                    $objMercadoria->setQuantidade($row["quantidade"]);

                    $resultado[] = $objMercadoria;
                }
                return $resultado;
            }
            else
            {
                return null;
            }
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        public static function alterarColeta(Mercadoria $mercadoria)
        {
            //Criando a conexão com o banco de dados
            $conexao = Conexao::getInstance()->getConexao();

            $id = mysql_real_escape_string($mercadoria->getId(), $conexao);
            //$idCarga = mysql_real_escape_string($mercadoria->getObjCarga()->getCodCarga(), $conexao);

            $numPedido = mysql_real_escape_string($mercadoria->getNumPedido(), $conexao);

            $nomeCompleto = mysql_real_escape_string($mercadoria->getNomeCompleto(), $conexao);
            $telefone = mysql_real_escape_string($mercadoria->getTelefone(), $conexao);
            $email = mysql_real_escape_string($mercadoria->getEmail(), $conexao);

            $logradouro = mysql_real_escape_string($mercadoria->getLogradouro(), $conexao);
            $bairro = mysql_real_escape_string($mercadoria->getBairro(), $conexao);
            $numero = mysql_real_escape_string($mercadoria->getNumero(), $conexao);
            $cep = mysql_real_escape_string($mercadoria->getCep(), $conexao);
            $estado = mysql_real_escape_string($mercadoria->getEstado(), $conexao);
            $cidade = mysql_real_escape_string($mercadoria->getCidade(), $conexao);

            $sql = "update mercadorias set numPedido='$numPedido' where id = $id ";

            $resultado = @mysql_query($sql, $conexao);

            return ($resultado === true);
        }

        public static function carregarListaColeta(Mercadoria $mercadoria)
        {
            //Conexão com o banco
            $conexao = Conexao::getInstance()->getConexao();

            $codCarga = mysql_real_escape_string($mercadoria->getCodCarga(), $conexao);
            //echo($codCarga);

            $sql = "select * from mercadorias where codCarga='$codCarga'";

            $rs = @mysql_query($sql, $conexao);
            //echo($rs);

            if($rs)
            {
                $resultado = array();
                while($row = mysql_fetch_array($rs))
                {

                    $objMercadoria = new Mercadoria();

                    $objMercadoria->setId($row["id"]);
                    $objMercadoria->setCodCarga($row["codCarga"]);
                    $objMercadoria->setDescricaoMercadoria($row["descricao"]);
                    $objMercadoria->setPeso($row["pesoMercadoria"]);
                    $objMercadoria->setValorMercadoria($row["valorMercadoria"]);
                    $objMercadoria->setQuantidade($row["quantidade"]);

                    $resultado[] = $objMercadoria;
                }
                return $resultado;
            }
            else
            {
                return null;
            }
        }
    }

?>