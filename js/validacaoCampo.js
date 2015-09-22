//----------------MASCARA DE CPF COM VALIDAÇÃO--------------------------------
function validarCPF( cpf ){
	var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
	
	if(!filtro.test(cpf))
	{
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById('cpf').focus();			
		document.getElementById('cpf').value ="";		
		return false;
	}
   
	cpf = remove(cpf, ".");
	cpf = remove(cpf, "-");
	
	if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
		cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
		cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
		cpf == "88888888888" || cpf == "99999999999")
	{
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById('cpf').focus();			
		document.getElementById('cpf').value ="";		
		return false;
   }

	soma = 0;
	for(i = 0; i < 9; i++)
	{
		soma += parseInt(cpf.charAt(i)) * (10 - i);
	}
	
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11)
	{
		resto = 0;
	}
	if(resto != parseInt(cpf.charAt(9))){
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById('cpf').focus();			
		document.getElementById('cpf').value ="";		
		return false;
	}
	
	soma = 0;
	for(i = 0; i < 10; i ++)
	{
		soma += parseInt(cpf.charAt(i)) * (11 - i);
	}
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11)
	{
		resto = 0;
	}
	
	if(resto != parseInt(cpf.charAt(10))){
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById('cpf').focus();			
		document.getElementById('cpf').value ="";		
		return false;
	}
	
	return true;
 }
 
function remove(str, sub) {
	i = str.indexOf(sub);
	r = "";
	if (i == -1) return str;
	{
		r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
	}
	
	return r;
}


function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}

function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}

function cpf_mask(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
	v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
	return v
}
//----------------MASCARA DE CPF COM VALIDAÇÃO--------------------------------


//--------------------MASCARA DE RG------------------------------------------
function Rg(v){
        v=v.replace(/\D/g,"");                                     
        v=v.replace(/(\d)(\d{4})$/,"$1.$2");             
        v=v.replace(/(\d)(\d{4})$/,"$1.$2");   
        v=v.replace(/(\d)(\d)$/,"$1-$2");              
      return v
}
//--------------------MASCARA DE RG------------------------------------------


//-------------------MASCARA CEP-------------------------
function mascaraCep(t, mask){
 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 if (texto.substring(0,1) != saida){
 t.value += texto.substring(0,1);
 }
 }
//-------------------MASCARA CEP-------------------------


//--------------------VALIDANDO SENHA------------------------------
function verificacaoSenha(){
	var senha = document.getElementById('senha').value;		
	var confirmaSenha = document.getElementById('confirmaSenha').value;			

	if (senha != confirmaSenha) {
		window.alert('Senhas diferentes');
		//senha.focus();
		document.getElementById('senha').focus();			
		document.getElementById('confirmaSenha').value ="";		
		document.getElementById('senha').value ="";			
		return false;
		
	}
}
//--------------------VALIDANDO SENHA------------------------------

//----------------------VALIDAÇÃO DE LETRAS E NUMEROS--------------------------
function validar(dom,tipo){
	switch(tipo){
		case'num':var regex=/[A-Za-z]/g;break;
		case'text':var regex=/\d/g;break;
	}
	dom.value=dom.value.replace(regex,'');
}
//----------------------VALIDAÇÃO DE LETRAS--------------------------


//------------------------MASCARA PARA TELEFONE RESIDENCIAL E CELULAR-------------------------
function telefoneMascara(telefone){ 
   if(telefone.value.length == 0)
     telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
   if(telefone.value.length == 3)
      telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
 
 if(telefone.value.length == 9)
     telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
  
}
//------------------------MASCARA PARA TELEFONE RESIDENCIAL E CELULAR-------------------------


function MascaraCNPJ(cnpj){
	var cnpj = document.getElementById('cnpj').value;
	
    if(cnpj(cnpj)==""){

        event.returnValue = false;

    }    

    return formataCampo(cnpj, '00.000.000/0000-00', event);

}

