	function consultaAJAX( ) {	
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
			alert('Cadastro realizado com sucesso!');
		});

		$xhr.fail(function(data) {
			alert('Cadastro realizado com sucesso!');
			//alert(data.responseText);
		});	
		
	}	



/*function validaCadastro(){

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


		var valores = [email, telefone1,telefone2,logradouro,bairro,numero,cep,estado,cidade,login,senha];
		var contNotNull=0;

		for (i = 0; i < valores.lenght; i++) {
		   	if(valores[i] != null){
		   		contNotNull = contNotNull+1;
			}	 
		}
	
		if(contNotNull == valores.lenght){

			if(perfil == "Pessoa Fisica"){
				if(nomeCompleto != null && orgaoExpedidor != null && cpf != null && rg != null){


				}
				else{

				}
			}
		}
		else{

		}
}*/
