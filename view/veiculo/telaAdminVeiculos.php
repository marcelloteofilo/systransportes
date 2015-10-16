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
    <table id="dg" title="Cadastro de Veículos" class="easyui-datagrid" style=" width:1250px;height:495px"
      url="../../webServices/veiculoWebService.php?editSave=carregarVeiculo"
      toolbar="#toolbar" pagination="true" 
      rownumbers="true" fitColumns="true" singleSelect="true">
      <thead>

        <tr>
          <th field="placa" width="46">Placa</th>
          <th field="capacidadeKg" width="64">Capacidade.KG</th>
          <th field="capacidadeM3" width="70">Capacidade.M³</th>
          <th field="ano" width="50">Ano</th>
          <th field="tipo" width="72">Tipo</th>
          <th field="uf" width="70">UF</th>
          <th field="cidade" width="70">Cidade</th>
        </tr>
      </thead>   
    </table>

    <div id="toolbar">
      <a href="#" class="easyui-linkbutton" iconCls="icon-users-add-icon" plain="true" onclick="newUser()" title="Adicionar Usuário">Novo Veiculo</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-save-as-icon" plain="true" onclick="editUser()" title="Alterar Dados do Usuário">Editar Veiculo</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-delete-icon" plain="true" onclick="removeUser()" title="Remover Dados do Usuário">Remover Veiculo</a>
      
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
            <td><input class="form-control" type="text" id="placa" name="placa" size="23" style="text-transform:uppercase"  placeholder="Placa"></td>
            <td><input class="form-control" type="text" id="capacidadeKg" name="capacidadeKg" size="23" style="text-transform:uppercase"  placeholder="Cap. Quilogramas"></td>
            <td><input class="form-control" type="text" id="capacidadeM3" name="capacidadeM3" size="23" style="text-transform:uppercase"  placeholder="Cap. Metros³"></td>
            <td><input class="form-control" type="text" id="ano" name="ano" size="23" style="text-transform:uppercase"  placeholder="Ano"></td>
          </tr>
          <!--Dados Pessoa Jurídica -->
          <tr>
            <td><b>Tipo</b></td>
            <td><b>Estado</b></td>
            <td><b>Cidade</b></td>
          </tr>
          <tr>
            <td><input class="form-control" type="text" id="tipo" name="tipo" size="23" style="text-transform:uppercase"  placeholder="Tipo" type="text"></td>
          <td>
              <select class="form-control" id="uf" name="uf">
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
            <td><input class="form-control" type="text" id="cidade" name="cidade" style="text-transform:uppercase" size="23" placeholder="Cidade"></td>

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