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

        function carregarAprovados(){
            $("div.easyui-layout").layout();
            $('#dg').edatagrid({
            url:'../../webServices/cargaWebService.php?editSave=carregarAtendimento',
            fitColumns: true
            });
            //$('#dg').datagrid('reload');
         }

         function carregarColetados(){
            $("div.easyui-layout").layout();
            $('#dg').edatagrid({
            url:'../../webServices/cargaWebService.php?editSave=carregarAprovados',
            fitColumns: true
            });
            //$('#dg').datagrid('reload');
         }
    

      function editUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
          $('#dlg').dialog('open').dialog('setTitle','Editar Coleta');
          $('#fm').form('load',row);
          url = '../../webServices/coetaWebService.php?editSave=alterarColeta&id='+row.id;//AGUADAR MUDANÇAS
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
            <li class="current">
              <!--<a href="../../index.php">Início</a></li>-->
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
    <table id="dg" title="Consulta das Coletas" class="easyui-datagrid" style=" width:1250px;height:495px"
      url="../../webServices/coletaWebService.php?editSave=carregarColeta"
      toolbar="#toolbar" pagination="true" 
      rownumbers="true" fitColumns="true" singleSelect="true">
      <thead>

        <tr>
          <th field="codCarga" width="30">Codigo da Carga</th>
          <th field="codMotorista" width="30">Motorista</th>
          <th field="codVeiculo" width="20">Veiculo</th>
          <th field="data" width="30">Data da coleta</th>
          <th field="hora" width="30">Hora da Coleta</th>
          <th field="statusCarga" width="30">Status da Carga</th>
          <th field="telefone" width="20">Telefone</th>
          <th field="logradouro" width="30">Logradouro</th>
          <th field="bairro" width="30">Bairro</th>
          <th field="numero" width="20">Número</th>
          <th field="estado" width="20">Estado</th>
          <th field="cidade" width="30">Cidade</th>
          <th field="observacao" width="30">Observação</th>
        </tr>
      </thead>   
    </table>

    <div id="toolbar">
      <!--<a href="#" class="easyui-linkbutton" iconCls="icon-car-icon" plain="true" onclick="newUser()" title="Adicionar Usuário">Novo Veiculo</a>-->
      <a href="#" class="easyui-linkbutton" iconCls="icon-open-file" plain="true" onclick="editUser()" title="Alterar Dados da Coleta">Visualizar Coleta</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-like-icon" plain="true" onclick="carregarAprovados()" title="">Aprovados</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-box-icon" plain="true" onclick="carregarColetados()" title="">Coletados</a>
      <!--<a href="#" class="easyui-linkbutton" iconCls="icon-delete-icon" plain="true" onclick="removeUser()" title="Remover Dados do Usuário">Remover Coleta</a>-->
      <!--<label for="pesquisar">Localizar Coleta</label>
        &nbsp;&nbsp;
        <input type="text" id="pesquisar" name="pesquisar" size="30" />-->      
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
          <h2>Dados da Coleta</h2>
          <!--Dados Pessoa Física -->
          <tr>
            <td><b>Codigo da Carga</b></td>
            <td><b>Motorista</b></td>
            <td><b>Veiculo</b></td>
            <td><b>Data da Coleta</b></td>
            <td><b>Hora da Coleta</b></td>
            <td><b>Status da Coleta</b></td>
            <td><b>Telefone da Coleta</b></td>
          </tr>

          <tr>
            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="codCarga" 
              name="codCarga" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Codigo da Carga">
            </td>
            <!--maxlength="8" OnKeyPress="formatar(this, '###-####')"-->

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="codMotorista" 
              name="codMotorista" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Motorista">
            </td>
            <!--value="0,00" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"-->

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="codVeiculo" 
              name="codVeiculo" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Veiculo">
            </td>
            <!--value="0,00" 
              onKeyPress="return(MascaraMoeda(this, '.', ',', event))"-->

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="dataColeta" 
              name="dataColeta" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Data da Coleta">
            </td>
             <!--maxlength="4" onkeyup="validar(this,'num');"-->

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="horaColeta" 
              name="horaColeta" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="hora da Coleta">
            </td>

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="statusColeta" 
              name="statusColeta" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="status da Coleta">
            </td>

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="telefone" 
              name="telefone" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Telefone">
            </td>
          </tr>

           <h2>Dados do Endereço da Coleta</h2>
          <!--Dados Pessoa Física -->
          <tr>
            <td><b>Logradouro</b></td>
            <td><b>Bairro</b></td>
            <td><b>Número</b></td>
            <td><b>Estado</b></td>
            <td><b>Cidade</b></td>
            <td><b>Observação</b></td>
          </tr>

          <tr>
            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="logradouro" 
              name="logradouro" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Logradouro">
            </td>

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="bairro" 
              name="bairro" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Bairro">
            </td>

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="numero" 
              name="numero" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Número">
            </td>

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="estado" 
              name="estado" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Estado">
            </td>

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="cidade" 
              name="cidade" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Cidade">
            </td>

            <td><input required="required" 
              class="form-control" 
              type="text" 
              id="observacao" 
              name="observacao" 
              size="23" 
              style="text-transform:uppercase"  
              placeholder="Observações">
            </td>
          </tr> 








          <!--
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

          </tr>-->
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