//Consulta ajax
function consultaAJAXCheque( ) {	
	var servicoHttp = "../webServices/chequeWebService.php";				
		
	var parcela = document.getElementById('parcela').value;	
	var numero = document.getElementById('numero').value;								
	var valor = document.getElementById('valor').value;
	var vencimento = document.getElementById('vencimento').value;

	jsonParametros = {incluirVeiculo: 'sim',  parcela, numero, valor, vencimento};
	
	var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
	$xhr.done(function(resultadoXml) {
		//alert('Cheque inserido com sucesso!');
	});

	$xhr.fail(function(data) {
		//alert(data.responseText);
	});	
		
}