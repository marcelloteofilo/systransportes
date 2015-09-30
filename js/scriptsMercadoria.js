
var webServiceCotacao = '../../webServices/mercadoriaWebService.php';
var cotacaoSql = '../../cotacao/cotacaoSql.php';

// Muda a cor da caixa de texto e coloca tudo em maiúsculo
$(function focus_Blur(me, cor)
{
    me.style.background = cor;
    me.style.color = "black";
    var minusculo = new String(me.value);
    var maiusculo = minusculo.toUpperCase();
    me.value = maiusculo;
});



$(function ()
{
    $('#dg').edatagrid(
            {
                url: '../../webServices/mercadoriasWebService.php?editSave=carregarMercadoria',
                saveUrl: '../../webServices/mercadoriasWebService.php?editSave=incluirMercadoria',
                updateUrl: '../../webServices/mercadoriasWebService.php?editSave=alterarMercadoria',
                destroyUrl: '../../webServices/mercadoriasWebService.php?editSave=deletarMercadoria',
                title: "Cadastro de Mercadorias",
                //style: "width:1220px, height:450px, border:1px solid #ccc",
                toolbar: "#toolbar",
                pagination: "true",
                rownumbers: "true",
                fitColumns: "true",
                resizable: "true",
            });
    var dg = $('#dg');
    dg.edatagrid();
    dg.edatagrid('enableFilter');
});


//VALIDA DIGITAÇÃO DO CAMPO DE CONSULTAS DA COTAÇÃO
function crudMercadoria(acao)
{
    //VALIDAR ANTES DE INCLUIR
    if (document.getElementById('descricao').value.length === 0) {
        alert('Por Favor, informe a descricao!');
        document.getElementById('descricao').focus();
        return;
    }
    if (document.getElementById('peso').value.length === 0) {
        alert('Por Favor, informe o peso da mercadoria!');
        document.getElementById('peso').focus();
        return;
    }

    var descricao = document.getElementById('descricao');
    var peso = document.getElementById('peso');

    if (acao === 'incluir')
    {
        jsonParametros = {incluirMercadoria: 'sim',
            idCotacao: idCotacao,
            descricao: descricao.value,
            peso: peso
        };
    }
    if (acao === 'alterar')
    {
        jsonParametros = {alterarMercadoria: 'sim',
            id: id.value,
            idCotacao: idCotacao,
            descricao: descricao.value,
            peso: peso
        };
    }
    //acessoWebService(jsonParametros, webServiceCotacao);

}

//Consulta ajax
function consultaAJAXMercadoria( )
{
    var servicoHttp = "../webServices/mercadoriasWebService.php";

    var idCotacao = document.getElementById('idCotacao').value;
    var descricaoMercadoria = document.getElementById('descricao').value;
    var peso = document.getElementById('peso').value;


    jsonParametros = {incluirMercadoria: 'sim',  idCotacoes, descricao, peso};

    var $xhr = $.getJSON(servicoHttp, jsonParametros);


    $xhr.done(function (resultadoXml) {
        alert('Mercadoria inserida com sucesso!');
    });

    $xhr.fail(function (data) {
        alert(data.responseText);
    });
}