	function consultaAJAX() {	
		var servicoHttp = "../../webServices/usuariosWebService.php";				

		var status = "Habilitado";												
		var perfil = document.getElementById('idPerfil').value;										

		var nomeCompleto = document.getElementById('nomeCompleto').value;								
		var orgaoExpedidor = document.getElementById('orgaoExpedidor').value;
		var cpf = document.getElementById('cpf').value;
		var rg = document.getElementById('rg').value;

		var razaoSocial = document.getElementById('razaoSocial').value;								
		var nomeFantasia = document.getElementById('nomeFantasia').value;								
		var tipoEmpresa = document.getElementById('tipoEmpresa').value;							
		var cnpj = document.getElementById('cnpj').value;

		var email = document.getElementById('email').value;	
		var telefone1 = document.getElementById('telefone1').value;								
		var telefone2 = document.getElementById('telefone2').value;

		var logradouro = document.getElementById('logradouro').value;								
		var bairro = document.getElementById('bairro').value;
		var numero = document.getElementById('numero').value;								
		var complemento = document.getElementById('complemento').value;																
		var cep = document.getElementById('cep').value;		
		var estado = document.getElementById('estado').value;	
		var cidade = document.getElementById('cidade').value;		

		var login = document.getElementById('login').value;								
		var senha = document.getElementById('senha').value;							
		
		//jsonParametros = {incluirUsuario: 'sim',  status,perfil,nomeCompleto,razaoSocial,nomeFantasia,tipoEmpresa,rg,orgaoExpedidor,cpf,cnpj,email,telefone1,telefone2,logradouro,bairro,numero,complemento,cep,codCidade,login,senha};
		jsonParametros = {incluirUsuario: 'sim',  status,perfil,razaoSocial,nomeFantasia,tipoEmpresa,cnpj,nomeCompleto,rg,orgaoExpedidor,cpf,email,telefone1,telefone2,logradouro,bairro,numero,complemento,cep,estado,cidade,login,senha};

		var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
		$xhr.done(function(resultadoXml) {
			//alert('Cadastro realizado com sucesso!');
		});

		$xhr.fail(function(data) {
			//alert('Cadastro realizado com sucesso!');
			//alert(data.responseText);
		});	
		
	}	



function validaCadastroBotao(){
		var aprovado = true;
		
		var perfil = document.getElementById('idPerfil').value;										

		var nomeCompleto = document.getElementById('nomeCompleto').value;								
		var orgaoExpedidor = document.getElementById('orgaoExpedidor').value;
		var cpf = document.getElementById('cpf').value;
		var rg = document.getElementById('rg').value;

		var razaoSocial = document.getElementById('razaoSocial').value;								
		var nomeFantasia = document.getElementById('nomeFantasia').value;								
		var tipoEmpresa = document.getElementById('tipoEmpresa').value;							
		var cnpj = document.getElementById('cnpj').value;

		var email = document.getElementById('email').value;	
		var telefone1 = document.getElementById('telefone1').value;								
		var telefone2 = document.getElementById('telefone2').value;

		var logradouro = document.getElementById('logradouro').value;								
		var bairro = document.getElementById('bairro').value;
		var numero = document.getElementById('numero').value;								
		var complemento = document.getElementById('complemento').value;																
		var cep = document.getElementById('cep').value;		
		var estado = document.getElementById('estado').value;	
		var cidade = document.getElementById('cidade').value;		

		var login = document.getElementById('login').value;								
		var senha = document.getElementById('senha').value;

		if(email == ""){aprovado = false;}
		if(telefone1 == ""){aprovado = false;}
		if(telefone2 == ""){aprovado = false;}
		if(logradouro == ""){aprovado = false;}
		if(bairro == ""){aprovado = false;}
		if(cep == ""){aprovado = false;}
		if(estado == ""){aprovado = false;}
		if(cidade == ""){aprovado = false;}
		if(login == ""){aprovado = false;}
		if(senha == ""){aprovado = false;}
		
		if(perfil == "PF"){
			if(nomeCompleto == "" || orgaoExpedidor == "" || cpf == "" || rg == ""){
				aprovado = false;
			}
		}
		else if(perfil == "PJ"){
			if(razaoSocial == "" || nomeFantasia == "" || tipoEmpresa == "" || cnpj == ""){
				aprovado = false;
			}
		}	
		
		if(aprovado == true){
			consultaAJAX();
			if(perfil == "PF"){
				alert("Parabéns "+nomeCompleto+"! Seu cadastro foi realizado com sucesso!");
			}
			else{
				alert("Parabéns "+razaoSocial+"! Seu cadastro foi realizado com sucesso!");
			}
		}
		else{
			alert("Atenção! Favor verificar o preenchimento de todos os campos obrigatorios!");
		}
}