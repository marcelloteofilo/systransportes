
$(function ()
{
    $('#dg').edatagrid(
        {
            url: '../../webServices/rastreamentoWebService.php?editSave=carregarRastreamento',
            saveUrl: '../../webServices/rastreamentoWebService.php?editSave=incluirRastreamento',
            updateUrl: '../../webServices/rastreamentoWebService.php?editSave=alterarRastreamento',
            destroyUrl: '../../webServices/rastreamentoWebService.php?editSave=deletarRastreamento',
            title: "Rastreamentos de Cargas",
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