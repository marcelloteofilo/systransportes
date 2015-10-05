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

    <!-- SCRIPT ADMIN -->
    <script type="text/javascript">
      var url;
      function newUser(){
        $('#dlg').dialog('open').dialog('setTitle','Nova Despesas ');
        $('#fm').form('clear');
        url = '../../webServices/despesasWebService.php?editSave=incluirDespesas';
      }
      function editUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
          $('#dlg').dialog('open').dialog('setTitle','Editar Despesas');
          $('#fm').form('load',row);
          url = '../../webServices/despesasWebService.php?editSave=alterarDespesas&id='+row.id;
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
              $.post('../../webServices/despesasWebService.php?editSave=deletarDespesas',{id:row.id},function(result){
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
    <!-- FIM SCRIPT ADMIN -->

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
    
    <!-- TABELA ADMIN PESSOA FÍSICA-->
    <center>
    <table id="dg" title="Cadastro de Despesas" class="easyui-datagrid" style=" width:1250px;height:495px"
      url="../../webServices/despesasWebService.php?editSave=carregarDespesas"
      toolbar="#toolbar" pagination="true" 
      rownumbers="true" fitColumns="true" singleSelect="true">
      <thead>

        <tr>
          <th field="descricao" width="45">Descrição</th>
          <th field="valor" width="45">Valor</th>
          <th field="data" width="70">Data</th>
        </tr>
      </thead>   
    </table>

    <div id="toolbar">
      <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()" title="Adicionar Usuário">Novo Usuário</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()" title="Alterar Dados do Usuário">Editar Usuário</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()" title="Remover Dados do Usuário">Remover Usuário</a>
      
    </div>
  </center>
    <!-- FIM TABELA ADMIN PESSOA FÍSICA -->

    <!-- DIALOG ADMIN PESSOA FÍSICA -->
    <div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:600px;height:220px;padding:10px 20px"
      closed="true" buttons="#dlg-buttons">
      <div class="ftitle"></div>
      <form id="fm" method="post" novalidate>

       <table>
          <h2>Dados Da Despesas</h2>


           <tr>
            <td><b>Descrição</b></td>
            <td><b>Valor</b></td>
            <td><b>Data</b></td>
          </tr>

          <tr>
            <td><input class="form-control" 
              type="text" id="descricao" 
              name="descricao" size="23" 
              style="text-transform:uppercase" 
              placeholder="Descrição" 
              type="text">
            </td>

            <td><input class="form-control" 
              type="text" 
              id="valor" 
              name="valor" 
              size="23" 
              maxlength="14" 
              placeholder="Valor" 
              type="num"
              onkeyup="validar(this,'num');">
            </td>

            <td><input class="form-control" 
              type="text" 
              id="data"
              OnKeyUp="mascaraData(this);" 
              maxlength="10" 
              name="data" 
              size="23" 
              maxlength="9" 
              placeholder="Data" 
              type="text"> 
              </td>
            
          </tr>

       </table>














      </form>
    </div>
    <div id="dlg-buttons">
      <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Salvar</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
    </div>
    <br><br>
    <!-- FIM DIALOG ADMIN PESSOA FÍSICA -->

  </body>
</html>