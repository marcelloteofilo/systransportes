<?php

//require_once ("/../banco.php");
//require_once ("rastreamento.php");

class RastreamentoSql {

    //Método responsável em adicionar um determinado rastreamento
    public static function adicionar(Rastreamento $rastreamento) {

        //Criando a conexão com o banco de dados
        $conexao = Conexao::getInstance()->getConexao();

        //Atributos da classe Rastreamento sendo definidas em uma variável, obtidas em um método para realização da
        //obtenção do valor e logo em seguida, realizando a chamada do banco

        $rota = mysql_real_escape_string($rastreamento->getDescricaoRastreamento(), $conexao);

        //Inserção na tabela de Rastreamento relacionada ao banco de dados systransporte
        $sql = "insert into rastreamento (rota) values ('$rota')";
        $resultado = mysql_query($sql, $conexao);
        return ($resultado === true);
    }

    //Método responsável em alterar um determinado rastreamento
    public static function alterar(Rastreamento $rastreamento) {
        //Criando a conexão com o banco de dados
        $conexao = Conexao::getInstance()->getConexao();

        //Atributos da classe Rastreamento sendo definidas em uma variável, obtidas em um método para realização da
        //obtenção do valor e logo em seguida, realizando a chamada do banco
        $id = mysql_real_escape_string($rastreamento->getId(), $conexao);
        $rota = mysql_real_escape_string($rastreamento->getRotaRastreamento(), $conexao);


        ///Alteração na tabela de Rastreamento relacionada ao banco de dados systransporte
        $sql = "update rastreamento set rota='$rotaRastreamento' where id = $id ";
        $resultado = @mysql_query($sql, $conexao);

        return ($resultado === true);
    }

    //Método responsável em remover um determinado rastreamento
    public static function remover(Rastreamento $rastreamento) {
        //Criando a conexão com o banco de dados
        $conexao = Conexao::getInstance()->getConexao();

        //Atributo da classe Rastreamento sendo definida em uma variável, obtida em um método para realização da
        //obtenção do valor e logo em seguida, realizando a chamada do banco de dados
        $id = mysql_real_escape_string($rastreamento->getId(), $conexao);

        //Remoção na tabela de Rastreamento relacionada ao banco de dados systransporte
        $sql = "delete from rastreamento where id = '$id' ";
        $resultado = @mysql_query($sql, $conexao);

        return ($resultado === true);
    }

    public static function carregarLista() {
        //Conexão com o banco
        $conexao = Conexao::getInstance()->getConexao();

        $rs = mysql_query('select * from rastreamento');
        $resultado = array();
        while ($row = mysql_fetch_object($rs)) {
            array_push($resultado, $row);
        }
        echo json_encode($resultado);
    }

}

?>