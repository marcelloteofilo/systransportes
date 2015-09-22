// Muda a cor da caixa de texto e coloca tudo em maiúsculo
$(function focus_Blur(me, cor)
{
	me.style.background = cor;
	me.style.color = "black";
	var minusculo = new String(me.value);
	var maiusculo = minusculo.toUpperCase();
	me.value = maiusculo;
});

$(function()
{
	$('#dg').edatagrid(
	{
		url : '../../webServices/mercadoriasWebService.php?editSave=carregarMercadoria',
		saveUrl : '../../webServices/mercadoriasWebService.php?editSave=incluirMercadoria',
		updateUrl : '../../webServices/mercadoriasWebService.php?editSave=alterarMercadoria',
		destroyUrl : '../../webServices/mercadoriasWebService.php?editSave=deletarMercadoria',
		
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

//Consulta ajax
function consultaAJAXMercadoria( )
{
	var servicoHttp = "../webServices/mercadoriasWebService.php";

	var idCotacao = document.getElementById('idCotacao').value;
	var descricaoMercadoria = document.getElementById('descricao').value;
	var peso = document.getElementById('peso').value;


	jsonParametros = {incluirMercadoria: 'sim',  idCotacoes, descricao, peso};

	var $xhr = $.getJSON(servicoHttp, jsonParametros);


	$xhr.done(function(resultadoXml) {
		alert('Mercadoria inserida com sucesso!');
	});

	$xhr.fail(function(data) {
		alert(data.responseText);
	});
}