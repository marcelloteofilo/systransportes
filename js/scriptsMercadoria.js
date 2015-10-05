//$(function()
//{
//	$('#dg').edatagrid(
//	{
//		url : '../../webServices/mercadoriasWebService.php?editSave=carregarMercadoria',
//		saveUrl : '../../webServices/mercadoriasWebService.php?editSave=incluirMercadoria',
//		updateUrl : '../../webServices/mercadoriasWebService.php?editSave=alterarMercadoria',
//		destroyUrl : '../../webServices/mercadoriasWebService.php?editSave=deletarMercadoria',
//		
//		title: "Cadastro de Mercadorias",
//		//style: "width:1220px, height:450px, border:1px solid #ccc",
//		toolbar: "#toolbar",
//		pagination: "true",
//		rownumbers: "true", 
//		fitColumns: "true",
//		resizable: "true",
//	});
//	var dg = $('#dg');
//	dg.edatagrid();
//	dg.edatagrid('enableFilter');
//});

var url;
function newMercadoria()
{
    $('#dlg').dialog('open').dialog('setTitle', 'Nova Mercadoria');
    $('#fm').form('clear');
    url = '../../webServices/mercadoriasWebService.php?editSave=incluirMercadoria';
}

function editMercadoria()
{
    var row = $('#dg').datagrid('getSelected');
    if (row) {
        $('#dlg').dialog('open').dialog('setTitle', 'Editar Mercadoria');
        $('#fm').form('load', row);
        url = '../../webServices/mercadoriasWebService.php?editSave=alterarMercadoria&id=' + row.id;
    }
    else
    {
        $.messager.show(
                {
                    title: 'Erro!',
                    msg: 'Selecione item da tabela!!!'//result.msg
                });
    }
}

function saveMercadoria()
{
    $('#fm').form('submit',
            {
                url: url,
                onSubmit: function ()
                {
                    if ('')
                    {
                        $.messager.confirm('', 'Cadastro efetuado com sucesso!', function (r) {
                            if (r)
                            {
                                $.post('../../webServices/mercadoriasWebService.php?editSave=incluirMercadoria', {id: row.id},
                                function (result)
                                {
//                                            if (!result.success)
//                                            {
//                                                $.messager.show(
//                                                        {// show error message
//                                                            title: 'Error',
//                                                            msg: result.msg
//                                                        });
//                                            }
                                }
                                , 'json');
                            }
                        });
                    }
                    return $(this).form('validate');
                },
                success: function (result) {
                    var result = eval('(' + result + ')');
                    if (result.success) {
//                                    $('#dlg').dialog('close');		// close the dialog
//                                    $('#dg').datagrid('load');	// reload the user data
                    } else {
                        $('#dlg').dialog('close');
                        $('#dg').datagrid('load');	// reload the user data
                    }
                }
            });
}

function removeMercadoria()
{
    var row = $('#dg').datagrid('getSelected');
    if (row) {
        $.messager.confirm('Confirmar', 'Tem certeza que deseja remover?', function (r) {
            if (r) {
                $.post('../../webServices/mercadoriasWebService.php?editSave=deletarMercadoria', {id: row.id}, function (result) {
                    if (result.success)
                    {
                        $('#dlg').dialog('close');

                    } else {
                        $('#dg').datagrid('reload');	// reload the user data
                    }
                }, 'json');
            }
        });
    }
    else
    {
        $.messager.show(
                {
                    title: 'Erro!',
                    msg: 'Selecione item da tabela!!!'//result.msg
                });
    }
}

function consultaMercadoria()
{
//                var row = $('#dg').datagrid('getSelected');
//                if (row) 
//                {
//
//                }
}

//Consulta ajax
function consultaAJAXMercadoria( )
{
    var servicoHttp = "../webServices/mercadoriasWebService.php";

    var idCotacao = document.getElementById('idCotacao').value;
    var descricaoMercadoria = document.getElementById('descricao').value;
    var pesoMercadoria = document.getElementById('peso').value;


    jsonParametros = {incluirMercadoria: 'sim', idCotacao: 'idCotacao', descricaoMercadoria: 'descricao', pesoMercadoria: 'peso'};

    var $xhr = $.getJSON(servicoHttp, jsonParametros);


    $xhr.done(function (resultadoXml) {
        alert('Mercadoria inserida com sucesso!');
    });

    $xhr.fail(function (data) {
        alert(data.responseText);
    });
}