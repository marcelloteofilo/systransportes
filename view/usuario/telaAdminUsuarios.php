<!DOCTYPE html>
<html lang="en" class="no-js">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>SysTransportes</title>
      <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
 
	    <link rel="stylesheet" type="text/css" href="../../css/paginaTemplate.css">
      
      <!-- CSS CRUD -->
      <link rel="stylesheet" type="text/css" href="../../css/easyui.css">
      <link rel="stylesheet" type="text/css" href="../../css/icon.css">
      <link rel="stylesheet" type="text/css" href="../../css/demo.css">

      <!-- JS CRUD -->
      <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
      <script type="text/javascript" src="../../js/datagrid-filter.js"></script>

      <!-- JS CRUD -->
	    <script type="text/javascript" src="../../js/scriptsCidades.js"></script>
      <script type="text/javascript" src="../../js/validacaoCampo.js"></script> 

        <script type="text/javascript">
    

    var url;
    function newUser(){
      $('#dlg').dialog('open').dialog('setTitle','Novo Cliente');
      $('#fm').form('clear');
      url = '../../webServices/usuariosWebService.php?editSave=incluirUsuarioAdmin';
    }
    function editUser(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
        $('#dlg').dialog('open').dialog('setTitle','Editar Cliente');
        $('#fm').form('load',row);
        url = 'atualizar_cadastroclientes.php?id='+row.id;
      }
    }
    function saveUser(){
      $('#fm').form('submit',{
        url: url,
          onSubmit: function(){
          return $(this).form('validate');
        },
        success: function(result){
          var result = eval('('+result+')');
          if (result.success){
            $('#dlg').dialog('close');    // close the dialog
            $('#dg').datagrid('reload');  // reload the user data
          } else {
            $.messager.show({
              title: 'Erro',
              msg: result.msg
            });
          }
        }
      });
    }
    function removeUser(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
        $.messager.confirm('Confirm','Tem certeza que deseja remover o Cliente?',function(r){
          if (r){
            $.post('../../webServices/usuariosWebService.php?editSave=deletarUsuario',{id:row.id},function(result){
              if (result.success){
                $('#dg').datagrid('reload');  // reload the user data
              } else {
                $.messager.show({ // show error message
                  title: 'Error',
                  msg: result.msg
                });
              }
            },'json');
          }
        });
      }
    }
  </script>




  <!--
      <script type="text/javascript">
         $(function(){
             $("div.easyui-layout").layout();
             $('#dg').edatagrid({
                 url: '../../webServices/usuariosWebService.php?editSave=carregarUsuario',
                 saveUrl: '../../webServices/usuariosWebService.php?editSave=incluirUsuarioAdmin',
                 updateUrl: '../../webServices/usuariosWebService.php?editSave=alterarUsuario',
                 destroyUrl: '../../webServices/usuariosWebService.php?editSave=deletarUsuario',
                 fitColumns: true
             });
             var dg = $('#dg');
             dg.edatagrid();    // create datagrid
             dg.edatagrid('enableFilter');    // enable filter
         });
      </script>
	  -->


	  

      <header class="navbar-fixed-top navbar" style="background:#0EB493;"> 
         <div class="container">
             <nav class="collapse navbar-collapse navbar-right" role="navigation">
               <ul  class="nav navbar-nav">
                  <li class="current"><a href="../../index.php">Início</a></li>
                  <li><a href="../telaAdminSystem.php">Admin</a></li>

               </ul>
            </nav>
			<div class="navbar-header">
			 	<a  class="navbar-brand" href="#">SysTransportes</a>		 
             </div>
		</div>
	  </header>
	  <br><br>
	   
   </head>
   
   
   <body style="background:#F3F8F7">
 

<table id="dg" title="Cadastro de Clientes" class="easyui-datagrid" style="width:1200px;height:450px"
      url="../../webServices/usuariosWebService.php?editSave=carregarUsuario"
      toolbar="#toolbar" pagination="true"
      rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
      <tr>
                  <th field="idStatus" width="45"  editor="{type:'numberbox',options:{required:true}}">Status</th>
                  <th field="idPerfil" width="35" editor="{type:'numberbox',options:{required:true}}">Perfil</th>
                  <th field="nomeCompleto" width="70" editor="text">Nome.C</th>
                  <th field="razaoSocial" width="50" editor="text">Razão.S</th>
                  <th field="nomeFantasia" width="50" editor="text">Nome.F</th>
                  <th field="tipoEmpresa" width="50" editor="text">Tipo.E</th>
                  <th field="rg" width="50" editor="text">RG</th>
                  <th field="orgaoExpedidor" width="50" editor="text">Orgão.E</th>
                  <th field="cpf" width="50" editor="text">CPF</th>
                  <th field="cnpj" width="50" editor="text">CNPJ</th>
                  <th field="email" width="50" editor="{type:'validatebox',options:{validType:'email'}}">E-mail</th>
                  <th field="telefone1" width="50" editor="{type:'validatebox',options:{required:true}}">Tel.1</th>
                  <th field="telefone2" width="50" editor="text">Tel.2</th>
                  <th field="logradouro" width="50" editor="{type:'validatebox',options:{required:true}}">Lograd.</th>
                  <th field="bairro" width="50" editor="{type:'validatebox',options:{required:true}}">Bairro</th>
                  <th field="numero" width="30" editor="{type:'validatebox',options:{required:true}}">Nm</th>
                  <th field="complemento" width="50" editor="text">Compl.</th>
                  <th field="codCidade" width="65" editor="{type:'validatebox',options:{required:true}}">Cod.Cidade</th>
                  <th field="cep" width="50" editor="{type:'validatebox',options:{required:true}}">CEP</th>
                  <th field="login" width="50" editor="{type:'validatebox',options:{required:true}}">Login</th>
                  <th field="senha" width="50" editor="{type:'validatebox',options:{required:true}}">Senha</th>
      </tr>
    </thead>
  </table>
  <div id="toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()" title="Adicionar Cliente">Novo Cliente</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()" title="Alterar Dados do Cliente">Editar Cliente</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()" title="Remover Dados do Cliente">Remover Cliente</a>
  </div>
  
  <div id="dlg" class="easyui-dialog" style="width:1000px;height:610px;padding:10px 20px"
      closed="true" buttons="#dlg-buttons">
    <div class="ftitle">Dados do Cliente</div>
    <form id="fm" method="post" novalidate>
      <tr>
                                 <td>
                                    <b>
                                    Nome Completo
                                    </b>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <input type="text" 
                                       style="text-transform:uppercase"
                                       id="nomeCompleto"                                                                    
                                       name="nomeCompleto" 
                                       size="96" 
                                       class="form-control" 
                                       placeholder="Nome Completo" 
                                       tabindex="1" 
                                       type="text"
                                       onkeyup="validar(this,'text');">    
                                 </td>
                              </tr>
                           </table>
                           <table>
                              <tr>
                                 <td>
                                    <b>
                                    CPF(Somente numeros)
                                    </b>
                                 </td>
                                 <td>
                                    <b>
                                    RG
                                    </b>
                                 </td>
                                 <td>
                                    <b>
                                    Orgão Expedidor
                                    </b>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <input type="text" 
                                       id="cpf" 
                                       name="cpf" 
                                       size="30" 
                                       class="form-control"
                                       maxlength="14"
                                       placeholder="CPF" 
                                       tabindex="1" 
                                       type="text"
                                       onblur="javascript: validarCPF(this.value);" 
                                       onkeypress="javascript: mascara(this, cpf_mask);">
                                 </td>
                                 <td>
                                    <input type="text" 
                                       id="rg" 
                                       name="rg" 
                                       size="30" 
                                       class="form-control"
                                       maxlength="9"
                                       placeholder="RG" 
                                       tabindex="1" type="text"
                                       onkeypress="javascript: mascara(this, Rg);">
                                 </td>
                                 <td>
                                    <input type="text" 
                                       id="orgaoExpedidor" 
                                       name="orgaoExpedidor" 
                                       style="text-transform:uppercase"
                                       size="20" 
                                       maxlength="8"
                                       class="form-control" 
                                       placeholder="Orgão Expedidor" 
                                       tabindex="1" 
                                       type="text"
                                       onkeyup="validar(this,'text');">
                                 </td>
                              </tr>
                           </table>
                           <table>
                              <!--Endereço -->
                              <h2>
                                 Endereço
                              </h2>
                              <tr>
                                 <td>
                                    <b>
                                    CEP
                                    </b>
                                 </td>
                                 <td>
                                    <b>
                                    Logradouro
                                    </b>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <input type="text" 
                                       id="cep" 
                                       name="cep" 
                                       size="30" 
                                       class="form-control"
                                       maxlength="9"
                                       placeholder="CEP" 
                                       tabindex="1"
                                       type="text"
                                       onkeypress="mascaraCep(this, '#####-###')" 
                                       onkeyup="validar(this,'num');">
                                 <td>
                                    <input type="text" 
                                       id="logradouro" 
                                       name="logradouro" 
                                       size="58" 
                                       class="form-control" 
                                       placeholder="Logradouro" 
                                       tabindex="1" 
                                       type="text"
                                       style="text-transform:uppercase">
                                 </td>
                                 </td>
                              </tr>
                           </table>
                           <table>
                              <tr>
                                 <td>
                                    <b>
                                    Número
                                    </b>
                                 </td>
                                 <td>
                                    <b>
                                    Bairro
                                    </b>
                                 </td>
                                 <td>
                                    <b>
                                    Complemento
                                    </b>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <input type="text" 
                                       id="numero" 
                                       name="numero" 
                                       size="30" 
                                       maxlength="5"
                                       class="form-control"
                                       placeholder="Número" 
                                       tabindex="1" 
                                       type="text"
                                       onkeyup="validar(this,'num');">
                                 </td>
                                 <td>
                                    <input type="text" 
                                       id="bairro" 
                                       name="bairro" 
                                       style="text-transform:uppercase"
                                       size="20" 
                                       class="form-control"
                                       placeholder="Bairro" 
                                       tabindex="1" 
                                       type="text"
                                       onkeyup="validar(this,'text');">
                                 </td>
                                 <td>
                                    <input type="text"
                                       id="complemento" 
                                       name="complemento" 
                                       size="30" 
                                       style="text-transform:uppercase"
                                       class="form-control"
                                       placeholder="Complemento"
                                       tabindex="1" type="text">
                                 </td>
                              </tr>
                           </table>
                           <table>
                              <tr>
                                 <td>
                                    <b>
                                    Estado
                                    </b>
                                 </td>
                                 <td>
                                    <b>
                                    Cidade
                                    </b>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <select tabindex="3" class="form-control" id="ufDestino" onChange="consultaCidades('cidadeDestino', 'ufDestino', '0','Escolha a Cidade!')" >
                                       <option value="">Escolha o seu Estado</option>
                                       <option value="PE">PE</option>
                                       <option value="AC">AC</option>
                                       <option value="AL">AL</option>
                                       <option value="AM">AM</option>
                                       <option value="AP">AP</option>
                                       <option value="BA">BA</option>
                                       <option value="CE">CE</option>
                                       <option value="DF">DF</option>
                                       <option value="ES">ES</option>
                                       <option value="GO">GO</option>
                                       <option value="MA">MA</option>
                                       <option value="MG">MG</option>
                                       <option value="MS">MS</option>
                                       <option value="MT">MT</option>
                                       <option value="PA">PA</option>
                                       <option value="PB">PB</option>
                                       <option value="PI">PI</option>
                                       <option value="PR">PR</option>
                                       <option value="RJ">RJ</option>
                                       <option value="RN">RN</option>
                                       <option value="RO">RO</option>
                                       <option value="RR">RR</option>
                                       <option value="RS">RS</option>
                                       <option value="SC">SC</option>
                                       <option value="SE">SE</option>
                                       <option value="SP">SP</option>
                                       <option value="TO">TO</option>
                                    </select>
                                 </td>
                                 <td>
                                    <select tabindex="4" class="form-control" id="cidadeDestino" name="cidadeDestino" >
                                       <option size="35" value="">Escolha a sua Cidade</option>
                                    </select>
                                 </td>
                              </tr>
                           </table>
                           <table>
                              <!--Contato -->
                              <h2>
                                 Contato
                              </h2>
                              <tr>
                                 <td>
                                    <b>
                                    E-mail
                                    </b>
                                 </td>
                                 <td>
                                    <b>
                                    Telefone Resiencial
                                    </b>
                                 </td>
                                 <td>
                                    <b>
                                    Telefone Celular
                                    </b>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <input type="email" 
                                       id="email" 
                                       name="email" 
                                       style="text-transform:uppercase"
                                       size="40" 
                                       class="form-control" 
                                       placeholder="E-mail" 
                                       tabindex="1" 
                                       type="email">
                                 </td>
                                 <td>
                                    <input type="text" 
                                       id="telefone1" 
                                       name="telefone1" 
                                       maxlength="15"
                                       size="20" 
                                       maxlength="12"                                            
                                       class="form-control" 
                                       placeholder="Telefone Residencial" 
                                       tabindex="1" type="text"
                                       onkeyup="validar(this,'num');"
                                       onkeypress="telefoneMascara(this)"
                                       onkeypress="mascara(this, '## ####-####')">
                                 </td>
                                 <td>
                                    <input type="text" 
                                       id="telefone2" 
                                       name="telefone2" 
                                       size="20" 
                                       maxlength="14"
                                       class="form-control"                                     
                                       placeholder="Telefone Celular"
                                       tabindex="1" type="text"
                                       onkeyup="validar(this,'num');"
                                       onkeypress="telefoneMascara(this)"
                                       onkeypress="mascara(this, '## ####-####')">
                                 </td>
                              </tr>
                           </table>
                           <table>
                              <!--Login/Senha -->

                              <h2>
                                 Status usuário
                              </h2>
                              <select class="form-control" id="idStatus" name="idStatus">
                                 <option value="1">Habilitado</option>
                                 <option value="2">Desabilitado</option>
                              </select>

                              <h2>
                                 Login/Senha
                              </h2>
                              <select class="form-control" id="idPerfil" name="idPerfil">
                                 <option value="1">Pessoa Física</option>
                                 <option value="2">Pessoa Jurídica</option>
                                 <option value="3">Atendente</option>
                                 <option value="4">Motorista</option>
                              </select>
                              <tr>
                                 <td>
                                    <b>
                                    Usuário
                                    </b>
                                 </td>
                                 <td>
                                    <b>
                                    Senha
                                    </b>
                                 </td>
          
                              </tr>
                              <tr>
                                 <td>
                                    <input type="text" id="login" name="login" size="30" class="form-control" placeholder="Usuário" tabindex="1" type="text">
                                 </td>
                                 <td>
                                    <input type="password" 
                                       size="25" 
                                       class="form-control" 
                                       id="senha"
                                       name="senha"
                                       placeholder="Senha" 
                                       tabindex="1" 
                                       type="text">
                                 </td>
                              </tr>
    </form>
  </div>
  <div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Salvar</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
  </div>


	  
	<br><br>
	
   </body>
</html>