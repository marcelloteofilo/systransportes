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
    <script type="text/javascript" src="../../js/validacaoCampo.js"></script> 

    <!-- SCRIPT ADMIN -->
    <script type="text/javascript">
      var url;
      function newUser(){
        $('#dlg').dialog('open').dialog('setTitle','Novo Usuário');
        $('#fm').form('clear');
        url = '../../webServices/cteWebService.php?editSave=adicionarCte';
      }
      function editUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
          $('#dlg').dialog('open').dialog('setTitle','Editar CTE');
          $('#fm').form('load',row);
          url = '../../webServices/cteWebService.php?editSave=alterarCte&id='+row.id;
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
          $.messager.confirm('Confirm','Tem certeza que deseja remover o Cte?',function(r){
            if (r){
              $.post('../../webServices/cteWebService.php?editSave=removerCte',{id:row.id},function(result){
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
    <table id="dg" title="Cadastro de Usuários" class="easyui-datagrid" style=" width:1250px;height:495px"
      url="../../webServices/cteWebService.php?editSave=carrefarUsuario"
      toolbar="#toolbar" pagination="true" 
      rownumbers="true" fitColumns="true" singleSelect="true">
      <thead>

        <tr>
          <th field="idStatus" width="45">Cotação</th>
          <th field="idPerfil" width="45">Emissão</th>
          <th field="nomeCompleto" width="70">Data Entrega</th>
          <th field="rg" width="50">Status</th>

        </tr>
      </thead>   
    </table>

    <div id="toolbar">
      <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()" title="Adicionar CTE">Nova CTE</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()" title="Alterar Dados da CTE">Editar CTE</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()" title="Remover Dados da CTE">Remover CTE</a>
      
    </div>
  </center>
    <!-- FIM TABELA ADMIN PESSOA FÍSICA -->

    <!-- DIALOG ADMIN PESSOA FÍSICA -->
    <div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:1000px;height:610px;padding:10px 20px"
      closed="true" buttons="#dlg-buttons">
      <div class="ftitle"></div>
      <form id="fm" method="post" novalidate>

        <table>
          <tr>
            <td><b>Cotação</b></td>
            <td><b>Emissão</b></td>
            <td><b>Data da Entrega</b></td>
          </tr>
          <tr>
            <td><input class="form-control" type="text" id="descricaoCotacao" name="descricaoCotacao" size="23" style="text-transform:uppercase"  placeholder="Nome Completo" type="text" onkeyup="validar(this,'text');"></td>
            <td><input class="form-control" type="text" id="emissao" name="emissao" size="23" maxlength="14" placeholder="CPF" type="text" onblur="javascript: validarCPF(this.value);" onkeypress="javascript: mascara(this, cpf_mask);"></td>
            <td><input class="form-control" type="text" id="dataEntrega" name="dataEntrega" size="23" maxlength="9" placeholder="RG" type="text" onkeypress="javascript: mascara(this, Rg);"></td>
          </tr>
          <tr>
            <td>
                <select class="form-control" id="status" name="status">
                <option value=""> --- Selecione o status --- </option>
                <option value="postado">Postado</option>
                <option value="encaminhado">Encaminhado</option>
                <option value="emTransito">Em Trânsito</option>
                <option value="entregue">Entregue</option>
                </select>
            </td>
          </tr>
        </table>
    <div id="dlg-buttons">
      <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Salvar</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
    </div>
    <br><br>
  </body>
</html>