//var webServiceCotacao = '../../webServices/rastreamentoWebService.php';
//var cotacaoSql = '../../cotacao/cotacaoSql.php';

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
                url: '../../webServices/rastreamentoWebService.php?editSave=carregarRastreamento',
                saveUrl: '../../webServices/rastreamentoWebService.php?editSave=incluirRastreamento',
                updateUrl: '../../webServices/rastreamentoWebService.php?editSave=alterarRastreamento',
                destroyUrl: '../../webServices/rastreamentoWebService.php?editSave=deletarRastreamento',
                title: "Cadastro de Rastreamentos",
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


//VALIDA DIGITAÇÃO DO CAMPO DE CONSULTAS DA Rastreamento
function crudRastreamento(acao)
{
    //VALIDAR ANTES DE INCLUIR
    if (document.getElementById('rota').value.length === 0) {
        alert('Por Favor, informe a rota!');
        document.getElementById('rota').focus();
        return;
    }
    if (document.getElementById('peso').value.length === 0) {
        alert('Por Favor, informe o peso da rastreamento!');
        return;
    }

    var rota = document.getElementById('rota');

    if (acao === 'incluir')
    {
        jsonParametros = {incluirRastreamento: 'sim',
            rota: rota.value,
        };
    }
    if (acao === 'alterar')
    {
        jsonParametros = {alterarRastreamento: 'sim',
            id: id.value,
            rota: rota.value,
        };
    }
}

//Consulta ajax
function consultaAJAXRastreamento( )
{
    var servicoHttp = "../webServices/rastreamentoWebService.php";

    var rotaRastreamento = document.getElementById('rota').value;

    jsonParametros = {incluirRastreamento: 'sim', rota};

    var $xhr = $.getJSON(servicoHttp, jsonParametros);


    $xhr.done(function (resultadoXml) {
        alert('Rastreamento inserido com sucesso!');
    });

    $xhr.fail(function (data) {
        alert(data.responseText);
    });
}