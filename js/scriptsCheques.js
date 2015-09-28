//Caixa de consultas 
 $(function() {
	var dialogCheque;
	dialogGeral = $( "#dialogCheque-form" ).dialog({
	autoOpen: false,
	height: 370,
	width: 950,
	modal: true,
	});   	  		 	
});		

//Exibe Cheque
function exibeCheque(me) {					
	$("#btnIncluir").show(50);			   												
	$("#btnAlterar").hide(50);	

	var dialogCheque;        					
	dialogCheque = $( "#dialogCheque-form" ).dialog({});   					
	dialogCheque.dialog( "open" );			
}

// Muda a cor da caixa de texto e coloca tudo em maiúsculo
function focus_Blur(me, cor) {	 
	me.style.background = cor;	 
	me.style.color = "black";	
	var minusculo = new String(me.value);
	var maiusculo = minusculo.toUpperCase();
	me.value = maiusculo;	  
}	

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
		alert('Cheque inserido com sucesso!');
	});

	$xhr.fail(function(data) {
		alert(data.responseText);
	});	
		
}