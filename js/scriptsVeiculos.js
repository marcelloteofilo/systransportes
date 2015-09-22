//Caixa de consultas 
 $(function() {
	var dialogVeiculo;
	dialogGeral = $( "#dialogVeiculo-form" ).dialog({
	autoOpen: false,
	height: 370,
	width: 950,
	modal: true,
	});   	  		 	
});		

//Exibe Veículos
function exibeVeiculo(me) {					
	$("#btnIncluir").show(50);			   												
	$("#btnAlterar").hide(50);	

	var dialogVeiculo;        					
	dialogVeiculo = $( "#dialogVeiculo-form" ).dialog({});   					
	dialogVeiculo.dialog( "open" );			
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
function consultaAJAXVeiculo( ) {	
	var servicoHttp = "../webServices/veiculosWebService.php";				
		
	var placa = document.getElementById('placa').value;	
	var capacidadeKg = document.getElementById('capacidadeKg').value;								
	var capacidadeM3 = document.getElementById('capacidadeM3').value;
	var ano = document.getElementById('ano').value;
	var tipo = document.getElementById('tipo').value;

	jsonParametros = {incluirVeiculo: 'sim',  placa, capacidadeKg, capacidadeM3, ano, tipo};
	
	var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
	$xhr.done(function(resultadoXml) {
		alert('Veículo inserido com sucesso!');
	});

	$xhr.fail(function(data) {
		alert(data.responseText);
	});	
		
}