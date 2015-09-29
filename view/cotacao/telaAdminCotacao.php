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
	  
      <script type="text/javascript">
         $(function(){
             $("div.easyui-layout").layout();
             $('#dg').edatagrid({
                 url: '../../webServices/cotacaoWebService.php?editSave=consultaCotacao',
                 saveUrl: '../../webServices/cotacaoWebService.php?editSave=incluirCotacao',
                 updateUrl: '../../webServices/cotacaoWebService.php?editSave=alterarCotacao',
                 destroyUrl: '../../webServices/cotacaoWebService.php?editSave=statusCotacao',
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
 
      <center>
         <table id="dg" title="Cadastro de Cotações" style="width:1250px;height:450px; border:1px solid #ccc;"
            toolbar="#toolbar" pagination="true" idField="id"
            rownumbers="true" fitColumns="true" resizable="true">
            <thead>
               <tr>
                  <th field="idUsuario" width="50" editor="{type:'validatebox',options:{required:true}}">idUsuario</th>
                  <th field="codCidadeOrigem" width="70" editor="{type:'validatebox',options:{required:true}}">Origem</th>
                  <th field="codCidadeDestino" width="50" editor="{type:'validatebox',options:{required:true}}">Destino</th>
                  <th field="valorCarga" width="50" editor="{type:'validatebox',options:{required:true}}">Valor</th>
                  <th field="valorFrete" width="50" editor="{type:'validatebox',options:{required:true}}">Frete</th>
				  <th field="altura" width="50" editor="{type:'validatebox',options:{required:true}}">Altura</th>
				  <th field="peso" width="50" editor="{type:'validatebox',options:{required:true}}">Peso</th>
				  <th field="comprimento" width="50" editor="{type:'validatebox',options:{required:true}}">Comprimento</th>
				  <th field="prazo" width="50" editor="{type:'validatebox',options:{required:true}}">Prazo</th>
				  <th field="status" width="50" editor="{type:'validatebox',options:{required:true}}">status</th>
               </tr>
            </thead>
         </table>
         <div id="toolbar">            
            <a href="#" class="easyui-linkbutton" iconCls="icon-save-as-icon" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Editar/Salvar</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Aprovar</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-delete-icon" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancelar</a>
         </div>
         </div>
      </center>
	
   </body>
</html>