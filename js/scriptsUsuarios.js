	//CONSULTA AJAX
	function consultaAJAXPF( ) {	
		var servicoHttp = "../../webServices/usuariosWebService.php";				

		var status = 1;												
		var perfil = document.getElementById('perfil').value;										
		var nomeCompleto = document.getElementById('nomeCompleto').value;								
		var razaoSocial = "NULL"; //document.getElementById('razaoSocial').value;								
		var nomeFantasia = "NULL"; //document.getElementById('nomeFantasia').value;								
		var tipoEmpresa = "NULL"; //document.getElementById('tipoEmpresa').value;								
		var rg = document.getElementById('rg').value;
		var orgaoExpedidor = document.getElementById('orgaoExpedidor').value;
		var cpf = document.getElementById('cpf').value;
		var cnpj = "NULL"; //document.getElementById('cnpj').value;

		var email = document.getElementById('email').value;	
		var telefone1 = document.getElementById('telefone1').value;								
		var telefone2 = document.getElementById('telefone2').value;

		var logradouro = document.getElementById('logradouro').value;								
		var bairro = document.getElementById('bairro').value;
		var numero = document.getElementById('numero').value;								
		var complemento = document.getElementById('complemento').value;																
		var cep = document.getElementById('cep').value;			
		var codCidade = document.getElementById('cidadeDestino').value;
		codCidade = codCidade.substring(0,7);

		var login = document.getElementById('login').value;								
		var senha = document.getElementById('senha').value;							
		
		jsonParametros = {incluirUsuario: 'sim',  status,perfil,nomeCompleto,razaoSocial,nomeFantasia,tipoEmpresa,rg,orgaoExpedidor,cpf,cnpj,email,telefone1,telefone2,logradouro,bairro,numero,complemento,cep,codCidade,login,senha};
	
		var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
		$xhr.done(function(resultadoXml) {
			alert('Usuário inserido com sucesso!');
		});

		$xhr.fail(function(data) {
			alert(data.responseText);
		});	
		
	}	

	//CONSULTA AJAX
	function consultaAJAXPJ( ) {	
		var servicoHttp = "../../webServices/usuariosWebService.php";				
		
		var status = 1;	
		var perfil = document.getElementById('perfil').value;										
		var nomeCompleto = "NULL"; //document.getElementById('nomeCompleto').value;								
		var razaoSocial = document.getElementById('razaoSocial').value;								
		var nomeFantasia = document.getElementById('nomeFantasia').value;								
		var tipoEmpresa = document.getElementById('tipoEmpresa').value;								
		var rg = "NULL"; //document.getElementById('rg').value;
		var orgaoExpedidor = "NULL"; //document.getElementById('orgaoExpedidor').value;
		var cpf = "NULL"; //document.getElementById('cpf').value;
		var cnpj = document.getElementById('cnpj').value;

		var email = document.getElementById('email').value;	
		var telefone1 = document.getElementById('telefone1').value;								
		var telefone2 = document.getElementById('telefone2').value;

		var logradouro = document.getElementById('logradouro').value;								
		var bairro = document.getElementById('bairro').value;
		var numero = document.getElementById('numero').value;								
		var complemento = document.getElementById('complemento').value;																
		var cep = document.getElementById('cep').value;			
		var codCidade = document.getElementById('cidadeDestino').value;
		codCidade = codCidade.substring(0,7);

		var login = document.getElementById('login').value;								
		var senha = document.getElementById('senha').value;							
		
		jsonParametros = {incluirUsuario: 'sim',  status,perfil,nomeCompleto,razaoSocial,nomeFantasia,tipoEmpresa,rg,orgaoExpedidor,cpf,cnpj,email,telefone1,telefone2,logradouro,bairro,numero,complemento,cep,codCidade,login,senha};
	
		var $xhr = $.getJSON(servicoHttp, jsonParametros);		
		
			
		$xhr.done(function(resultadoXml) {
			alert('Usuário inserido com sucesso!');
		});

		$xhr.fail(function(data) {
			alert(data.responseText);
		});	
		
	}	