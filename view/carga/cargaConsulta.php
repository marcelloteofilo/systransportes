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
      <!-- JS CRUD -->
      <!-- SCRIPT ADMIN -->
      <script type="text/javascript">
         var url;
         
         function editUser(){
           var row = $('#dg').datagrid('getSelected');
           if (row){
             $('#dlg').dialog('open').dialog('setTitle','Editar Cotação');
             $('#fm').form('load',row);
             url = '../../webServices/cargaWebService.php?editSave=alterarCarga&id='+row.id;
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
            url="../../webServices/cargaWebService.php?editSave=carregarTodos"
            toolbar="#toolbar" pagination="true" 
            rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
               <tr>
                  <!--<th field="origem" width="55">Origem</th>-->
                  <!--<th field="destino" width="55">Destino</th>-->
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
            <a href="#" class="easyui-linkbutton" iconCls="icon-open-file" plain="true" onclick="" title="Alterar Dados do Usuário">Abrir Cotação</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-search-icon" plain="true" onclick="" title="Alterar Dados do Usuário">Vis. Todos</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-search-icon" plain="true" onclick="" title="Alterar Dados do Usuário">Vis. Aprovadas</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-search-icon" plain="true" onclick="" title="Alterar Dados do Usuário">Vis. Atendimento</a>
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
                              <h2>Plano de Viagem / Dados Cliente</h2>
                              <tr>
                                 <td><b>Estado de Origem</b></td>
                                 <td><b>Estado de Destino</b></td>
                              </tr>
                              <tr>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="UF Origem" tabindex="1" ></td>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="UF Destino" tabindex="1" ></td>
                              </tr>
                              <tr>
                                 <td><b>Cidade de Origem</b></td>
                                 <td><b>Cidade de Destino</b></td>
                              </tr>
                              <tr>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="Cidade Origem" tabindex="1" ></td>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="Cidade Destino" tabindex="1" ></td>
                              </tr>
                           </table>
                           <br>
                           <table width="100%">
                              <!--Dados Pessoais -->
                              <h2>Dados da Coleta</h2>
                              <tr>
                                 <td><b>Telefone</b></td>
                                 <td><b>Logradouro</b></td>
                                 <td><b>Bairro</b></td>
                                 <td><b>Número</b></td>
                                 <td><b>Estado</b></td>
                                 <td><b>Cidade</b></td>
                              </tr>
                              <tr>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="(00)0000-0000" tabindex="1" ></td>
                                 <td><input readonly  type="text" id="logradouro" name="" class="form-control" placeholder="Logradouro" tabindex="1"  ></td>
                                 <td><input readonly  type="text" id="bairro" name="" class="form-control" placeholder="Bairro" tabindex="1"  ></td>
                                 <td><input readonly  type="text" id="numero" name="" class="form-control" placeholder="Número" tabindex="1"  ></td>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="UF" tabindex="1" ></td>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="Cidade" tabindex="1" ></td>
                              </tr>
                           </table>
                           <table width="100%">
                              <tr>
                                 <td><b>Observação</b></td>
                              </tr>
                              <tr>
                                 <td><textarea readonly  class="form-control"name="observacao"  id="observacao" cols="80" rows="3" ></textarea></td>
                              </tr>
                           </table>
                           <br>
                           <table>
                          
                           <br>
                           <table width="100%">
                              <h2>Dados da Carga</h2>
                              <tr>
                                 <td><b>Altura</b></td>
                                 <td><b>Largura</b></td>
                                 <td><b>Peso</b></td>
                                 <td><b>Comprimento</b></td>
                                 <td><b>Qtd.Volumes</b></td>
                                 <td><b>Valor/R$</b></td>
                              </tr>
                              <tr>
                                 <td><input readonly  type="text" id="altura" name="" class="form-control" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input readonly  type="text" id="largura" name="" class="form-control" maxlength="14" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input readonly  type="text" id="peso" name="" class="form-control" maxlength="9" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input readonly  type="text" id="comprimento" name="" maxlength="8" class="form-control" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input readonly  type="text" id="quantidade" name="" class="form-control" maxlength="9" placeholder="0,00" tabindex="1" onKeyPress="return(mascaraInteiro())"></td>
                                 <td><input readonly  type="text" id="valor" name="" maxlength="8" class="form-control" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"  onBlur="focus_Blur(this, 'white');"></td>
                              </tr>
                              <td><b>Natureza da Carga</b></td>
                              <tr>
                              </tr>
                              <tr>
                                 <td>
                                    <select readonly class="form-control" id="naturezaCarga" name="">
                                       <option value=""> --- Escolha o Tipo --- </option>
                                       <option value="Tipo 1">Tipo 1</option>
                                       <option value="Tipo 2">Tipo 2</option>
                                    </select>
                                 </td>
                              </tr>
                           </table>
                           <br>
                           <table width="100%">
                              <h2>Dados Finais</h2>
                              <tr>
                                 <td><b>Distancia</b></td>
                                 <td><b>Valor Aproximado</b></td>
                                 <td><b>Temdo de Entrega</b></td>
                                 <td><b>Data do Pedido</b></td>
                                 <td><b>Coletada</b></td>
                                 <td><b>Status Carga</b></td>
                              </tr>
                              <tr>
                                 <td><input  type="text" id="distancia" name="distancia" class="form-control" placeholder="Distancia" tabindex="1"  ></td>
                                 <td><input type="text" id="frete" name="" class="form-control" maxlength="14" placeholder="0,00" tabindex="1"></td>
                                 <td><input type="text" id="prazo" name="" class="form-control" maxlength="14" placeholder="0 Dia(as)" tabindex="1"></td>
                                 <td><input type="text" id="dataPedido" name="" maxlength="8" class="form-control" placeholder="00/00/0000" tabindex="1"></td>
                                 <td>
                                    <select class="form-control" id="coletada" name="">
                                       <option value=""> --- Status Coleta --- </option>
                                       <option value="1">Aguardando</option>
                                       <option value="2">Iniciada</option>
                              <option value="3">Finalizada</option>
                                    </select>
                                 </td>
                                 <td>
                                    <select class="form-control" id="statusCarga" name="">
                                       <option value=""> --- Status Carga --- </option>
                                       <option value="1">Despachada</option>
                                       <option value="2">Em Transito</option>
                              <option value="3">Entrege</option>
                                    </select>
                                 </td>
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