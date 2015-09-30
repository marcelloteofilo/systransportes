<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SysTransportes</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="../../css/paginaTemplate.css">
        <link rel="stylesheet" type="text/css" href="../../css/easyui.css">
        <link rel="stylesheet" type="text/css" href="../../css/icon.css">
        <link rel="stylesheet" type="text/css" href="../../css/demo.css">
        <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
        <script type="text/javascript" src="../../js/datagrid-filter.js"></script>
        <script type="text/javascript" src="../../js/scriptsMercadoria.js"></script>
        <script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
       
<script>

        <!-- SCRIPT DO GRAFICO -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("visualization", "1", {packages: ["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['status', 'valor'],
                    ['Habilitado', 200],
                    ['Desabilitado', 10]
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
                    <li class="current"><a href="../../php.html">Início</a></li>
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

    <script>
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $("#dg").validate({
            rules: {
                field: {
                        required: peso,
                        number: true
                        }
                mensages:
                        {
                        required: "Informe o peso",
                        number: "Deve conter apenas números" 
                        }
            }
        });
    </script>
    
</head>


<body style="background:#F3F8F7">

<center>
    <table id="dg" style="width:1190px; height:450px; border:1px solid #ccc;" idField="id">
        <thead>
            <tr>
                <th align ="center" field="idCotacoes"width="10" editor="{type:'validatebox',options:{required:true}}">Id Cotacao</th>
                <th onkeyup="validar(this,'num');" align ="center" field="descricao" width="60" editor="{type:'validatebox',options:{required:true}}">Descricao</th>
                <th onkeyup="validar(this,'text');"onblur="" id="peso" name="peso" align ="center" field="peso" width="10" editor="{type:'validatebox',options:{required:true}}">Peso</th>
            </tr>
        </thead>
    </table>

    <div id="toolbar" align="center">
        <a href="#" class="easyui-linkbutton" iconCls="icon-users-add-icon" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">Criar Mercadoria</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" class="easyui-linkbutton" iconCls="icon-save-as-icon" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Salvar</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" class="easyui-linkbutton" iconCls="icon-delete-icon" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Deletar</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancelar</a>
    </div>
</center>

</body>
</html>