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
      <link rel="stylesheet" type="text/css" href="../../css/usuario.css">
      <!-- JS CRUD -->
      <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
      <script type="text/javascript" src="../../js/datagrid-filter.js"></script>
      <script type="text/javascript" src="../../js/validacaoCampo.js"></script>
      <script type="text/javascript" src="../../js/validacoes.js"></script>
      <script type="text/javascript" src="../../js/scriptPesquisa.js"></script>
      <!-- JS CRUD -->
      <!-- SCRIPT ADMIN -->
      <script type="text/javascript">
         var url;
         function newUser(){
           $('#dlg').dialog('open').dialog('setTitle','Novo Veículo');
           $('#fm').form('clear');
           url = '../../webServices/veiculoWebService.php?editSave=incluirVeiculo';
         }
         function editUser(){
           var row = $('#dg').datagrid('getSelected');
           if (row){
             $('#dlg').dialog('open').dialog('setTitle','Editar Veículo');
             $('#fm').form('load',row);
             url = '../../webServices/veiculoWebService.php?editSave=alterarVeiculo&id='+row.id;
           }
         else
         {
           $.messager.show(
               {
                   title: 'Erro!',
                   msg: 'Selecione item da tabela!!!'//result.msg
               });
         }
         }
         function saveUser(){
           $('#fm').form('submit',{
             url: url,
               onSubmit: function(){
               return $(this).form('validate');
             },
             success: function(result){
                 $('#dlg').dialog('close');    // close the dialog
                 $('#dg').datagrid('reload');  // reload the user data
         
             }
           });
         }
         function removeUser(){
           var row = $('#dg').datagrid('getSelected');
           if (row){
             $.messager.confirm('Confirm','Tem certeza que deseja remover o Veículo?',function(r){
               $('#dg').datagrid('reload');
         
               if (r){
                 $.post('../../webServices/veiculoWebService.php?editSave=deletarVeiculo',{id:row.id},function(result){
                   /*if (result.success){
                     
                     $('#dg').datagrid('reload');  // reload the user data
                   } else {
                     $.messager.show({ // show error message
                       title: 'Error',
                       msg: result.msg
                     });
                   }*/
                 },'json');
               }
             });
           }
         else
         {
           $.messager.show(
               {
                   title: 'Erro!',
                   msg: 'Selecione item da tabela!!!'//result.msg
               });
         }
         }
         
      </script>
      <!-- FIM SCRIPT ADMIN -->
      <header class="navbar-fixed-top navbar" style="background:#0EB493;">
         <div class="container">
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
               <ul  class="nav navbar-nav">
                  <li class="current"><a href="../../index.php">Início</a></li>
                  <li><a href="#">Criar Cotação</a></li>
                  <li><a href="#">Rastreamento</a></li>
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
      <center>
         <h1>Consulta de Minhas Cotações</h1>
         <sup></sup>Faça uma consulta rapida de suas cotações na SysTransportes!
         <br><br>
      </center>
      <!-- TABELA ADMIN PESSOA FÍSICA-->
      <center>
         <table id="dg" title="Consulta de Cotações" class="easyui-datagrid" style=" width:1250px;height:350px"
            url="../../webServices/veiculoWebService.php?editSave=carregarVeiculo"
            toolbar="#toolbar" pagination="true" 
            rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
               <tr>
                  <th field="origem" width="55">Origem</th>
                  <th field="destino" width="55">Destino</th>
                  <th field="altura" width="25">Altura</th>
                  <th field="largura" width="30">Largura</th>
                  <th field="peso" width="20">Peso</th>
                  <th field="comprimento" width="50">Comprimento</th>
                  <th field="quantidade" width="45">Quantidade</th>
                  <th field="valor" width="25">Valor</th>
                  <th field="naturezaCarga" width="45">Natureza.C</th>
                  <th field="dataPedido" width="60">Data do Pedido</th>
                  <th field="distancia" width="40">Distancia</th>
                  <th field="frete" width="25">Frete</th>
                  <th field="coletada" width="40">Coletada</th>
                  <th field="statusCarga" width="50">Status da Carga</th>
               </tr>
            </thead>
         </table>
         <div id="toolbar">
		    <a href="#" class="easyui-linkbutton" iconCls="icon-search-icon" plain="true" onclick="editUser()" title="Alterar Dados do Usuário">Abrir Cotação</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-search-icon" plain="true" onclick="editUser()" title="Alterar Dados do Usuário">Vis. Todos</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-search-icon" plain="true" onclick="editUser()" title="Alterar Dados do Usuário">Vis. Aprovadas</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-search-icon" plain="true" onclick="editUser()" title="Alterar Dados do Usuário">Vis. Atendimento</a>
            <!--<label for="pesquisar">Localizar Cotação</label>
               &nbsp;&nbsp;
               <input type="text" id="pesquisar" name="pesquisar" size="30" />  -->    
         </div>
         </div>
      </center>
      <!-- FIM TABELA ADMIN PESSOA FÍSICA -->
      <!-- DIALOG ADMIN PESSOA FÍSICA -->
      <div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:1000px;height:250px;padding:10px 20px"
         closed="true" buttons="#dlg-buttons">
         <div class="ftitle"></div>
         <form id="fm" method="post" novalidate>
            <table>
               <!--Dados Pessoais -->
               <h2>Dados do Veiculo</h2>
               <!--Dados Pessoa Física -->
               <tr>
                  <td><b>Placa</b></td>
                  <td><b>CapacidadeKG</b></td>
                  <td><b>CapacidadeM3</b></td>
                  <td><b>Ano</b></td>
               </tr>
               <tr>
                  <td><input required="required" class="form-control" type="text" id="placa" name="placa" size="23" style="text-transform:uppercase"  placeholder="Placa" maxlength="8" OnKeyPress="formatar(this, '###-####')"></td>
                  <td><input required="required" class="form-control" type="text" id="capacidadeKg" name="capacidadeKg" size="23" style="text-transform:uppercase"  placeholder="Cap. Quilogramas" value="0,00" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                  <td><input required="required" class="form-control" type="text" id="capacidadeM3" name="capacidadeM3" size="23" style="text-transform:uppercase"  placeholder="Cap. Metros³" value="0,00" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                  <td><input required="required" class="form-control" type="text" id="ano" name="ano" size="23" style="text-transform:uppercase"  placeholder="Ano" maxlength="4" onkeyup="validar(this,'num');"></td>
               </tr>
               <!--Dados Pessoa Jurídica -->
               <tr>
                  <td><b>Tipo</b></td>
                  <td><b>Estado</b></td>
                  <td><b>Cidade</b></td>
               </tr>
               <tr>
                  <td>
                     <select required="required" class="form-control" id="tipo" name="tipo">
                        <option value="">Tipo de Caminhão</option>
                        <option value="Tipo 1">Tipo 1</option>
                        <option value="Tipo 2">Tipo 2</option>
                     </select>
                  </td>
                  <td>
                     <select required="required" class="form-control" id="uf" name="uf">
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
                  <td><input required="required" class="form-control" type="text" id="cidade" name="cidade" style="text-transform:uppercase" size="23" placeholder="Cidade"></td>
               </tr>
            </table>
         </form>
      </div>
      <div id="dlg-buttons">
         <a href="#" class="easyui-linkbutton" iconCls="icon-App-clean-icon" onclick="saveUser()">Salvar</a>
         <a href="#" class="easyui-linkbutton" iconCls="icon-Actions-edit-delete-icon" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
      </div>
      <br><br>
      <!-- FIM DIALOG ADMIN PESSOA FÍSICA -->
   </body>
</html>

