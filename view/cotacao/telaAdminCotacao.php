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
	<script type="text/javascript" src="../../js/scriptsCotacoes.js"> </script>		

    <!-- SCRIPT ADMIN -->
    <script type="text/javascript">
      var url;      
	  var acao;      
      function aprovarCotacao(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
          $('#dlg').dialog('open').dialog('setTitle','Aprovar Cotação');
          $('#fm').form('load',row);
		  acao = 'aprovar';
		  $("#btnAprovar").show(400);			   												
		  $("#btnCancelar").hide("slow");
          url = '../../webServices/usuariosWebService.php?editSave=consultaCotacao&acao=aprovar&acao&id='+row.id;
        }
      }
	  function cancelarCotacao(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
          $('#dlg').dialog('open').dialog('setTitle','Cancelar Cotação');
          $('#fm').form('load',row);
		  acao = 'cancelar';
		  $("#btnCancelar").show(400);			   												
		  $("#btnAprovar").hide("slow");
          url = '../../webServices/usuariosWebService.php?editSave=consultaCotacao&acao=cancelar&acao&id='+row.id;
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
      url="../../webServices/cotacaoWebService.php?editSave=consultaCotacao"
      toolbar="#toolbar" pagination="true" 
      rownumbers="true" fitColumns="true" singleSelect="true">
      <thead>
        <tr>
          <th field="nomeUsuario" width="70" editor="{type:'validatebox',options:{required:true}}">Usuario</th>
          <th field="cidadeOrigem" width="80" editor="{type:'validatebox',options:{required:true}}">Origem</th>
          <th field="cidadeDestino" width="80" editor="{type:'validatebox',options:{required:true}}">Destino</th>
          <th field="valorCarga" width="50" editor="{type:'validatebox',options:{required:true}}">Valor</th>
          <th field="valorFrete" width="50" editor="{type:'validatebox',options:{required:true}}">Frete</th>
		  <th field="altura" width="50" editor="{type:'validatebox',options:{required:true}}">Altura</th>
		  <th field="peso" width="50" editor="{type:'validatebox',options:{required:true}}">Peso</th>
		  <th field="comprimento" width="50" editor="{type:'validatebox',options:{required:true}}">Comprimento</th>
		  <th field="prazo" width="20" editor="{type:'validatebox',options:{required:true}}">Prazo</th>
		  <th field="exibeStatus" width="90" editor="{type:'validatebox',options:{required:true}}">Status</th>
        </tr>
      </thead>   
    </table>

    <div id="toolbar">	 
      <a href="#" class="easyui-linkbutton" iconCls="icon-ok"  plain="true" onclick="aprovarCotacao()" title="Adicionar Usuário">Aprovar Cotação</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" plain="true" onclick="cancelarCotacao()" title="Alterar Dados do Usuário">Cancelar Cotação</a>     
    </div>
  </center>
    <!-- FIM TABELA ADMIN PESSOA FÍSICA -->

    <!-- DIALOG ADMIN PESSOA FÍSICA -->
    <div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:1000px;height:610px;padding:10px 20px"
      closed="true" buttons="#dlg-buttons">
      <div class="ftitle"></div>
      <form id="fm" method="post" novalidate>

        <table>
          <!--Dados Pessoais -->
          <h2>Dados Pessoais</h2>
          <!--Dados Pessoa Física -->
          <tr>
		    <td><b>Numero Cotacao</b></td>            
            <td><b>Cliente</b></td>            
          </tr>
          <tr>
			<td><input class="form-control" type="text" id="id" name="id" size="2" maxlength="4" placeholder="id" type="text"></td>
            <td><input class="form-control" type="text" id="nomeuSUARIO" name="nomeUsuario" size="23" style="text-transform:uppercase"  placeholder="Nome Completo" type="text" onkeyup="validar(this,'text');"></td>
          </tr>		  		   

          <!--Dados Pessoa Física -->
          <!--Dados Pessoa Jurídica -->
          <tr>
            <td><b>Cidade Origem</b></td>
            <td><b>Uf</b></td>
            <td><b>Cidade Destino</b></td>
            <td><b>Uf</b></td>
          </tr>
          <tr>
            <td><input class="form-control" type="text" id="cidadeOrigem" name="cidadeOrigem" size="23" style="text-transform:uppercase"  placeholder="cidadeOrigem" type="text" onkeyup="validar(this,'text');"></td>
            <td><input class="form-control" type="text" id="ufOrigem" name="ufOrigem" size="2" maxlength="2" placeholder="ufOrigem" type="text" ></td>
            <td><input class="form-control" type="text" id="cidadeDestino" name="cidadeDestino" size="2" style="text-transform:uppercase"  placeholder="cidadeDestino" type="text" ></td>
            <td><input class="form-control" type="text" id="ufDestino" name="ufDestino" size="2" maxlength="2" placeholder="ufDestino" type="text" ></td>
          </tr>
        </table>
        <br>        
        <br>
        <table>
          <!--Contato -->
          <h2>Dados da Carga</h2>
          <tr>
            <td><b>Valor</b></td>
            <td><b>Frete</b></td>
            <td><b>Altura</b></td>
			<td><b>Peso</b></td>
			<td><b>Comprimento</b></td>
          </tr>
          <tr>
            <td><input class="form-control" type="valorCarga" id="valor" name="valorCarga" style="text-transform:uppercase" size="23" placeholder="valorCarga" type="valorCarga"></td>
            <td><input class="form-control" type="text" id="valorFrete" name="valorFrete" maxlength="15" size="23" maxlength="12" placeholder="valorFrete" type="text" ></td>
            <td><input class="form-control" type="text" id="altura" name="altura" size="23" maxlength="14" placeholder="altura" type="text" ></td>
			<td><input class="form-control" type="text" id="peso" name="peso" size="23" maxlength="14" placeholder="peso" type="text" ></td>
			<td><input class="form-control" type="text" id="comprimento" name="comprimento" size="23" maxlength="14" placeholder="comprimento" type="text" ></td>
          </tr>
        </table>
        <br>        
      </form>
    </div>
    <div id="dlg-buttons">
      <a href="#" class="easyui-linkbutton" id="btnAprovar" iconCls="icon-ok" onclick="atendenteCotacaoAprovar()">Aprovar Cotação</a>
	  <a href="#" class="easyui-linkbutton" id="btnCancelar" iconCls="icon-cancel" onclick="atendenteCotacaoCancelar()">Cancelar Cotação</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-undo" width="200" onclick="javascript:$('#dlg').dialog('close')">Voltar Tela Anterior</a>
    </div>
    <br><br>
    <!-- FIM DIALOG ADMIN PESSOA FÍSICA -->

  </body>
</html>