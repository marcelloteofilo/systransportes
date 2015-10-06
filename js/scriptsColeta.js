    function consultarRemetente(){	 	
        $('#dlg').dialog('open').dialog('setTitle','Consulta Remetente');       
		$("#btnAprovar").show(400);			   								
		var idCotacao = document.getElementById('idCotacao');					  
		$("#btnCancelar").hide("slow");
        url = '../../webServices/usuariosWebService.php?editSave=consultaCotacao&acao=aprovar&acao&id='+idCotacao.value;   
		var tituloConsulta = document.getElementById('tituloConsulta');			
		tituloConsulta.innerHTML = 'CONSULTA REMETENTES PELO CNPJ';				
		var nomesConsulta = document.getElementById('nomesConsulta');		
		nomesConsulta.innerHTML = '<td style="border: 1px solid; color:white;" bgcolor="green">F1 - CNPJ</td><td style="border: 1px solid;">F2 - RAZAO SOCIAL</td>';						
		document.fnota.consultas.value = 'REMETENTE';		
		tipoConsulta = "CNPJ";            	  		
		limparConsultas();		  
	}
	
	function consultarDestinatario(){	 	
        $('#dlg').dialog('open').dialog('setTitle','Consulta Destinatario');       
		$("#btnAprovar").show(400);			   								
		var idCotacao = document.getElementById('idCotacao');					  
		$("#btnCancelar").hide("slow");
        url = '../../webServices/usuariosWebService.php?editSave=consultaCotacao&acao=aprovar&acao&id='+idCotacao.value;   
		var tituloConsulta = document.getElementById('tituloConsulta');			
		tituloConsulta.innerHTML = 'CONSULTA REMETENTES PELO CNPJ';				
		var nomesConsulta = document.getElementById('nomesConsulta');		
		nomesConsulta.innerHTML = '<td style="border: 1px solid; color:white;" bgcolor="green">F1 - CNPJ</td><td style="border: 1px solid;">F2 - RAZAO SOCIAL</td>';						
		document.fnota.consultas.value = 'REMETENTE';		
		tipoConsulta = "CNPJ";            	  		
		limparConsultas();		  
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
			$.getJSON('ajaxCte.php?cliente='+tipoConsulta+'&search=',{'argumento': me.value, ajax: 'true'}, function(j){					
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
						itensConsulta[i]= j[i].cnpj;
						var trInserida = document.createElement("tr");
						trInserida.id = "trInserida"+i;
						trInserida.innerHTML = '<td colspan="2"><table width="100%"><tr  onclick="selecionarConsulta(this);" style="color:white;" bgcolor="black" class="itensConsulta" id="'+j[i].cnpj+'"><td width="100">'+j[i].cnpj+'</td><td width="300">'+j[i].social+'</td></tr></table></td>';
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