	//VARIAVEIS ULTILIZADAS	
	var contaNumero = 0;
	var tipoConsulta = 'RAZAO';	
	var itensConsulta = [];	
	
	//SELECIONA CONSULTA
	function selecionarConsulta(me){				 
		 var consultas = document.getElementById('consultas');					 
		 var posicaoArray = me.id;
		if (consultas.value=='REMETENTE'){			 
			var idRemetente = document.getElementById('idRemetente');					 
			idRemetente.value = itensConsulta[posicaoArray].id;
			var cnpjRemetente = document.getElementById('cnpjRemetente');					 
			cnpjRemetente.value = itensConsulta[posicaoArray].cnpj;
			var nomeRemetente = document.getElementById('nomeRemetente');					 
			nomeRemetente.value = itensConsulta[posicaoArray].nome;			
		}
		if (consultas.value=='DESTINATARIO'){			 
			var idDestinatario = document.getElementById('idDestinatario');					 
			idDestinatario.value = itensConsulta[posicaoArray].id;
			var cnpjDestinatario = document.getElementById('cnpjDestinatario');					 
			cnpjDestinatario.value = itensConsulta[posicaoArray].cnpj;
			var nomeDestinatario = document.getElementById('nomeDestinatario');					 
			nomeDestinatario.value = itensConsulta[posicaoArray].nome;			
		}
				
		$('#dlg').dialog('close');					
	}
	function incluirRemetente(){	
		$('#dlg').dialog('close'); 	
        $('#dlg_cadastrar').dialog('open').dialog('setTitle','Cadastrar Remetente');       
		$("#btnSalvarRemetente").show(400);			   										
		$("#btnSalvarDestinatario").hide("slow");        				
	}
	
	
    function consultarRemetente(){	 	
        $('#dlg').dialog('open').dialog('setTitle','Consulta Remetente');       
		$("#btnRemetente").show(400);			   								
		var idCotacao = document.getElementById('idCotacao');					  
		$("#btnDestinatario").hide("slow");        
		var tituloConsulta = document.getElementById('tituloConsulta');			
		tituloConsulta.innerHTML = 'CONSULTA REMETENTES PELO CNPJ';				
		var nomesConsulta = document.getElementById('nomesConsulta');		
		nomesConsulta.innerHTML = '<td style="border: 1px solid;  color:white;" bgcolor="green">CNPJ</td><td style="border: 1px solid;  color:white;" bgcolor="green"> RAZAO SOCIAL</td>';		
		var consultas = document.getElementById('consultas');			
		var tempConsultas = document.getElementById('tempConsulta');			
		tempConsulta.focus();
		consultas.value = 'REMETENTE';		
		limparConsultas();		  
	}
	
	function incluirDestinatario(){	 	
		$('#dlg').dialog('close');
        $('#dlg_cadastrar').dialog('open').dialog('setTitle','Cadastrar Destinatario');       
		$("#btnSalvarDestinatario").show(400);			   										
		$("#btnSalvarRemetente").hide("slow");        		
	}		
	
	function consultarDestinatario(){	 	
        $('#dlg').dialog('open').dialog('setTitle','Consulta Destinatario');       
		$("#btnDestinatario").show(400);			   								
		var idCotacao = document.getElementById('idCotacao');					  
		$("#btnRemetente").hide("slow");        
		var tituloConsulta = document.getElementById('tituloConsulta');			
		tituloConsulta.innerHTML = 'CONSULTA REMETENTES PELO CNPJ';				
		var nomesConsulta = document.getElementById('nomesConsulta');		
		nomesConsulta.innerHTML = '<td style="border: 1px solid; color:white;" bgcolor="green">CNPJ</td><td style="border: 1px solid;  color:white;" bgcolor="green">RAZAO SOCIAL</td>';					
		var consultas = document.getElementById('consultas');			
		var tempConsultas = document.getElementById('tempConsulta');			
		tempConsulta.focus();
		consultas.value = 'DESTINATARIO';						
		limparConsultas();		  
	}		
	
	//LIMPAR CONSULTAS
	function limparConsultas(){	 	 
		try{	   			
			for (var z = 0; z < 10; z++) {				
				var trApagada = document.getElementById('trInserida'+z);
				document.getElementById("labConsultas").removeChild(trApagada);								
			}
		} catch(e) {}			 
		var argumentoConsulta = document.getElementById('tempConsulta');		
		argumentoConsulta.value = "";
	}
	
	
	//PESQUISA CLIENTE
	function consultaRemetente(me) {		 
	  var caixaTexto = document.getElementById('tempConsulta'); 
		if (caixaTexto.value.length!=contaNumero){	//COMPARA SE HOUVE AUMENTO OU DIMINUICAO DOS CARACTERES					
			contaNumero = caixaTexto.value.length; 		
			// TENTA LIMPAR A TABELA
			try{	   			
				for (var z = 0; z < 10; z++) {				
					var trApagada = document.getElementById('trInserida'+z);
					document.getElementById("labConsultas").removeChild(trApagada);								
				}
			} catch(e) {}		

			// PREENCHE UMA LINHA INDICANDO QUE ESTÁ PROCURANDO...
			var trInserida = document.createElement("tr");
			var tdCnpj = document.createElement("td");
			var tdRazao = document.createElement("td");
			trInserida.id = "trInserida0";
			tdCnpj.id = "tdCnpj0";
			tdCnpj.style.background ="YELLOW";
			tdCnpj.style.color ="BLACK";
			tdCnpj.innerHTML = '?';
			tdRazao.id = "tdRazao0";
			tdRazao.style.background ="YELLOW";
			tdRazao.style.color ="black";			
			tdRazao.innerHTML = 'CONSULTANDO....';
			trInserida.appendChild(tdCnpj);							
			trInserida.appendChild(tdRazao);				
			document.getElementById("labConsultas").appendChild(trInserida);														
			//PREENCHE A TABELA			
			$.getJSON('../../webServices/usuariosWebService.php?editSave=consultaUsuarios&search=',{'nomeCliente': me.value, ajax: 'true'}, function(j){					
				//	REMOVE LINHA DE ESPERA				
				try{	   			
				for (var z = 0; z < 10; z++) {				
					var trApagada = document.getElementById('trInserida'+z);
					document.getElementById("labConsultas").removeChild(trApagada);								
				}
				} catch(e) {}						
				
				//PREENCHE A CONSULTA
				if (j.length>0){
					for (var i = 0; i < j.length; i++) {									
						var trInserida = document.createElement("tr");
						trInserida.id = "trInserida"+i;						
						trInserida.innerHTML = '<td colspan="2"><table width="100%"><tr  onclick="selecionarConsulta(this);"  class="itens" id="'+i+'"><td width="110">'+j[i].cnpj+'</td><td width="300">'+j[i].nome+'</td></tr></table></td>';
						document.getElementById("labConsultas").appendChild(trInserida);						
						//CARREGA OBJETOS															
						itensConsulta[i] = j[i];
					}				
				} else {
						var trInserida = document.createElement("tr");
						var tdCnpj = document.createElement("td");
						var tdRazao = document.createElement("td");
						trInserida.id = "trInserida0";
						tdCnpj.id = "tdCnpj0";
						tdCnpj.style.background ="RED";
						tdCnpj.style.color ="BLACK";
						tdCnpj.innerHTML = '0';
						tdRazao.id = "tdRazao0";
						tdRazao.style.background ="red";
						tdRazao.style.color ="black";			
						tdRazao.innerHTML = 'NADA ENCONTRADO';
						trInserida.appendChild(tdCnpj);							
						trInserida.appendChild(tdRazao);				
						document.getElementById("labConsultas").appendChild(trInserida);											
				}
			});						
			
		}
	}
		
	//INCLUIR CLIENTE
	function incluirRemetDest() {			
		var razaoSocial = document.getElementById('razaoSocial');								
		var nomeFantasia = document.getElementById('nomeFantasia');										
		var cnpj = document.getElementById('cnpj');	
		var logradouro = document.getElementById('logradouro');										
		var bairro = document.getElementById('bairro');										
		var cidade = document.getElementById('cidade');										
		var estado = document.getElementById('estado');										
		var numero = document.getElementById('numero');				
		var complemento = document.getElementById('complemento');				
		var cep = document.getElementById('cep');						
				
		jsonParametros = {editSave: 'adicionarUsuario',
		idStatus: 1;
		idPerfil: 1;
		nomeCompleto: "",
		razaoSocial: razaoSocial.value,
		nomeFantasia: nomeFantasia.value,
		tipoEmpresa: "",
		rg: "",
		orgaoExpedidor: "",
		cpf: "",
		cnpj: cnpj.value,
		email: "",
		telefone1: "",
		telefone2: "",
		logradouro: logradouro.value, 
		bairro: bairro.value,
		numero: numero.value,
		complemento: complemento.value,
		cidade: cidade.value,
		estado: estado.value,
		numero: numero.value,
		login: "*",		
		senha: "*",
		cep: cep.value};	
		
		acessoWebService(jsonParametros, '../../webServices/usuarioWebService.php');
		
	}
	
	//VALIDA DIGITAÇÃO DO CAMPO DE CONSULTAS DA COTAÇÃO
	function atendenteCotacaoAprovar(acao) {		
		
		var idCotacao = document.getElementById('id');									
		jsonParametros = {editSave: 'aprovarCotacao',
		idCotacao: idCotacao.value,
		aprovadoAtendente: 1};		

		var $xhr = $.getJSON(webServiceCotacao, jsonParametros);			
			
		$xhr.done(function(resultadoXml) {
			alert('Operação Realizada Com Sucesso!');
			$('#dlg').dialog('close');
			location.reload();
		});

		$xhr.fail(function(data) {
			alert(data.responseText);			
		});		
		 
		
	}
	
	//VALIDA DIGITAÇÃO DO CAMPO DE CONSULTAS DA COTAÇÃO
	function atendenteCotacaoCancelar(acao) {		
		
		var idCotacao = document.getElementById('id');									
		jsonParametros = {editSave: 'statusCotacao', 
		status: 0,
		idCotacao: idCotacao.value};					

		var $xhr = $.getJSON(webServiceCotacao, jsonParametros);			
			
		$xhr.done(function(resultadoXml) {
			alert('Operação Realizada Com Sucesso!');
			$('#dlg').dialog('close');
		});

		$xhr.fail(function(data) {
			alert(data.responseText);			
		});		
		 
		
	}
	
	
	