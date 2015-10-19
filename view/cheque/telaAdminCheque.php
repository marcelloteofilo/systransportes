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
	 <script type="text/javascript" src="../../js/scriptPesquisa.js"></script>
    <!-- JS CRUD -->

    <script type="text/javascript" src="../../js/validacaoCampo.js"></script>

    <!-- SCRIPT ADMIN -->
    <script type="text/javascript">
      var url;
      function newCheque(){
        $('#dlg').dialog('open').dialog('setTitle','Novo Cheque');
        $('#fm').form('clear');
        url = '../../webServices/chequeWebService.php?editSave=incluirCheque';
      }
      function editCheque(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
          $('#dlg').dialog('open').dialog('setTitle','Editar Cheque');
          $('#fm').form('load',row);
          url = '../../webServices/chequeWebService.php?editSave=alterarCheque&id='+row.id;
        }	else {
          $.messager.show(
            {
                title: 'Erro!',
                msg: 'Selecione item da tabela!!!'//result.msg
            });
        }
      }

      function saveCheque(){
        $('#fm').form('submit',{
          url: url,
            onSubmit: function(){
            return $(this).form('validate');
          },
          success: function(result){
              var result = eval('(' + result + ')');
              if (result.success) {
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



      function removeCheque(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
          $.messager.confirm('Confirm','Tem certeza que deseja remover o Cheque?',function(r){
            if (r){
              $.post('../../webServices/chequeWebService.php?editSave=deletarCheque',{id:row.id},function(result){
                if (result.success){                  
                  $('#dg').datagrid('reload');  // reload the Cheque data
                } else {
                  $.messager.show({ // show error message
                    title: 'Error',
                    msg: result.msg
                  });
                }
              },'json');
            }
          });
        } else {
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
    <table id="dg" title="Cadastro de Cheques" class="easyui-datagrid" style=" width:1250px;height:495px"
      url="../../webServices/chequeWebService.php?editSave=carregarCheque"
      toolbar="#toolbar" pagination="true" 
      rownumbers="true" fitColumns="true" singleSelect="true">
      <thead>

        <tr>
          <th field="parcela" width="46">Parcela</th>
          <th field="numero" width="64">Número</th>
          <th field="valor" width="70">Valor</th>
          <th field="data" width="50">Vencimento</th>
        </tr>
      </thead>   
    </table>

    <div id="toolbar">
      <a href="#" class="easyui-linkbutton" iconCls="icon-check-icon" plain="true" onclick="newCheque()" title="Adicionar Cheque">Novo Cheque</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-save-as-icon" plain="true" onclick="editCheque()" title="Alterar Dados do Cheque">Editar Cheque</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-delete-icon" plain="true" onclick="removeCheque()" title="Remover Dados do Cheque">Remover Cheque</a>
<label for="pesquisar">Localizar Cheques</label>
            &nbsp;&nbsp;
            <input type="text" id="pesquisar" name="pesquisar" size="30" />      
    </div>
  </center>
    <!-- FIM TABELA ADMIN PESSOA FÍSICA -->

    <!-- DIALOG ADMIN PESSOA FÍSICA -->
    <div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:900px;height:200px;padding:10px 20px"
      closed="true" buttons="#dlg-buttons">
      <div class="ftitle"></div>
      <form id="fm" method="post" novalidate>

        <table>
          <!--Dados Pessoais -->
          <h2>Dados do Cheque</h2>
          <!--Dados Pessoa Física -->
          <tr>
            <td><b>Parcela</b></td>
            <td><b>Numero</b></td>
            <td><b>Valor</b></td>
            <td><b>Vencimento</b></td>
          </tr>
          <tr>
            <td>
              <input class="form-control"
               type="text" id="parcela"
               name="parcela" size="23"
               style="text-transform:uppercase"
               placeholder="Parcela">
            </td>
            
            <td>
              <input class="form-control"
               type="text" id="numero" 
               name="numero" size="23"
               style="text-transform:uppercase"
               placeholder="Nº da Parcela">
            </td>
            
            <td>
              <input class="form-control"
               type="num" id="valor" name="valor"
               size="23" style="text-transform:uppercase"
               placeholder="Valor"
               onkeyup="validar(this, 'num');">
            </td>
            
            <td>
              <input class="form-control"
               type="text" 
               id="data"
               name="data" 
               size="23"
               maxlength="10" 
               style="text-transform:uppercase"
               placeholder="Vencimento"
               OnKeyUp="mascaraData(this);">
            </td>
          </tr>
        </table>
       
      </form>
    </div>
    <div id="dlg-buttons">
      <a href="#" class="easyui-linkbutton" iconCls="icon-App-clean-icon" onclick="saveCheque()">Salvar</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-Actions-edit-delete-icon" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
    </div>
    <br><br>
    <!-- FIM DIALOG ADMIN PESSOA FÍSICA -->

  </body>
</html>