<?php

//    define("BASEPATH", dirname(dirname(dirname(__FILE__))));
//
//    require_once (BASEPATH."/funcoes.php");
    require_once (BASEPATH.MODELO."banco.php");
    //require_once (BASEPATH.MODELO."frete/freteSql.php");
    require_once ("rastreamento.php");

//    require_once ("/../banco.php");
//    require_once ("rastreamento.php");

    class RastreamentoSql
    {

        public static function carregarLista(/* Rastreamento $rastreamento */)
        {
            //Conexão com o banco
            $conexao = Conexao::getInstance()->getConexao();

            //$codRasteamento = mysql_real_escape_string($rastreamento->getId(), $conexao);

            $sql = 'select * from rastreamentos';

            $rs = mysql_query($sql, $conexao);

            if($rs)
            {
                $resultado = array();
                while($row = mysql_fetch_array($rs))
                {

                    $objRastremento = new Rastreamento();

                    $objRastremento->setId($row["codRastreamento"]);
                    $objRastremento->setCodRota($row["codRota"]);
                    $objRastremento->setLongitude($row["longitude"]);
                    $objRastremento->setLatitude($row["latitude"]);
                    $objRastremento->setLocalizacao($row["localizacao"]);
                    $objRastremento->setData($row["data"]);

                    $resultado[] = $objRastremento;
                }
                return $resultado;
            }
            else
            {
                return null;
            }
//        echo '<pre>';
//        var_dump($resultado);
//        echo '</pre>';
        }
    }

?>