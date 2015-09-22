<!DOCTYPE html>
<html lang="en" class="no-js">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>SysTransportes</title>
      <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
 
	  <!-- 
	  
	  -->

	  <link rel="stylesheet" type="text/css" href="../../css/paginaTemplate.css">
      <link rel="stylesheet" type="text/css" href="../../css/easyui.css">
      <link rel="stylesheet" type="text/css" href="../../css/icon.css">
      <link rel="stylesheet" type="text/css" href="../../css/demo.css">
      <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
      <script type="text/javascript" src="../../js/datagrid-filter.js"></script>
	  <script type="text/javascript" src="../../js/scriptsCidades.js"></script>
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
	  
	<!-- SCRIPT DO GRAFICO -->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['status', 'valor'],
          ['Habilitado',     200],
          ['Desabilitado',      10]
        ]);

        var options = {
          title: 'Status de Clientes'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	<!-- FIM SCRIPT DO GRAFICO -->
	  

      <header class="navbar-fixed-top navbar" style="background:#0EB493;"> 
         <div class="container">
             <nav class="collapse navbar-collapse navbar-right" role="navigation">
               <ul  class="nav navbar-nav">
                  <li class="current"><a href="../../index.php">Início</a></li>
                  <li><a href="#graficos">Graficos</a></li>
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
 
		<pre>
	  
        <strong>ATENÇÃO!</strong>
        <strong>Número</strong> de Perfil de Usuário: (1) PF, (2) PJ, (3) Atendente e (4) Motorista.
        <strong>Número</strong> de Status do Usuário: (1) Habilitado e (2) Desabilitado.
        <strong>Número</strong> de Código da Cidade: (2611606) Recife.
        </pre>
		
		
		
		
		
		
		
		
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
		
		
		
		
		
		
		
		
		
		
		
		
      <center>
         <table id="dg" title="Cadastro de Usuários" style="width:1250px;height:450px; border:1px solid #ccc;"
            toolbar="#toolbar" pagination="true" idField="id"
            rownumbers="true" fitColumns="true" resizable="true">
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
            <a href="#" class="easyui-linkbutton" iconCls="icon-users-add-icon" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">Criar Usuário</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-save-as-icon" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Editar/Salvar</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-delete-icon" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Deletar</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancelar</a>
         </div>
         </div>
      </center>
	  
	<br><br>
    <section id="graficos">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">	
			<div id="piechart" style="width: 700px; height: 400px;"></div>
		</div>	
	</section>
	
   </body>
</html>