<?php
session_start();
if (!isset($_SESSION['login']) == true and ! isset($_SESSION['senha']) == true) {
    session_destroy();
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: ../usuario/login.php#login');
} else {
    $logado = $_SESSION['login'];
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SysTransportes</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../css/paginaTemplate.css" />
        <!-- CSS CRUD -->
        <link rel="stylesheet" type="text/css" href="../../css/easyui.css" />
        <link rel="stylesheet" type="text/css" href="../../css/icon.css" />
        <link rel="stylesheet" type="text/css" href="../../css/demo.css" />
        <!--<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />-->
        <!-- JS CRUD -->
        <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
        <script type="text/javascript" src="../../js/datagrid-filter.js"></script>
        <!-- JS CRUD -->
        <script type="text/javascript" src="../../js/validacaoCampo.js"></script>
        <script type="text/javascript" src="../../js/scriptsMotoristas.js"></script>
        <script type="text/javascript" src="../../js/scriptsVeiculos.js"></script>
        <script type="text/javascript" src="../../js/scriptPesquisa.js"></script>

        <!-- SCRIPT ADMIN -->
        <script type="text/javascript">
            var url;

            function editCTE() {
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('setTitle','Editar Veículo');
                $('#fm').form('load',row);
                url = '../../webServices/veiculoWebService.php?editSave=alterarVeiculo&id='+row.id;
                }
            else {
            $.messager.show(
            {
                title: 'Erro!',
                msg: 'Selecione item da tabela!!!'//result.msg
            });
            }
            }
            function saveCTE() {
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
                    <li class="current"><a href="../telaAdminSystem.php">Início Admin</a></li>
                    <li><a href="#"><?php echo "Usuario: ".$logado;?></a></li>
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
    <table id="dg" title="Cadastro de CTES" class="easyui-datagrid" style=" width:1250px;height:495px"
           url="../../webServices/cteWebService.php?editSave=carregarCte"
           toolbar="#toolbar" pagination="true"
           rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="idStatus" width="20">Veículo</th>
                <th field="idUsuario" width="20">Motorista</th>
                <th field="emissao" width="20">Emissão</th>
                <th field="dataEntrega" width="20">Data Entrega</th>
                <th field="horaEntrega" width="20">Hora Entrega</th>
                <th field="Status" width="20">Status</th>
            </tr>
        </thead>
    </table>

    <div id="toolbar">
        <a href="#" class="easyui-linkbutton" iconCls="icon-open-file" plain="true" onclick="editCTE()" title="Alterar Dados da CTE">Abrir CTE</a>
        <label for="pesquisar">Localizar CTE</label>
        <input type="text" id="pesquisar" name="pesquisar" size="30" />
    </div>
</center>

<body>
    <div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:500px;height:300px;padding:10px 20px"
         closed="true" buttons="#dlg-buttons">
        <div class="ftitle"></div>
        <form id="fm" method="post" novalidate>

            <table>
                <tr>
                    <td><b>Emissão</b></td>
                    <td><b>Data da Entrega</b></td>
                    <td><b>Hora da Entrega</b></td>
                    <td><b>Motorista</b></td>
                    <td><b>Veiculo</b></td>
                </tr>
                <tr>
                    <td><input class="form-control" type="text" id="emissao" name="emissao" size="30" maxlength="14" placeholder="Emissao" type="text" ></td>
                    <td><input class="form-control" type="text" id="dataEntrega" name="dataEntrega" size="30" maxlength="14" placeholder="Data da Entrega" type="text" ></td>
                    <td><input class="form-control" type="text" id="horaEntrega" name="horaEntrega" size="30" maxlength="9" placeholder="Hora da Entrega" type="text" onkeypress="javascript: mascara(this, Hora);"></td>
                </tr>
                <tr>
                    <td><b>Status</b></td>
                    <td><b>Motorista</b></td>
                    <td><b>Veículo</b></td>
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
                    <td>
                        <select class="form-control" tabindex="4" id="idUsuario" name="idUsuario" >
                            <option size="35" value="">Escolha o Motorista</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" tabindex="4" id="idVeiculo" name="idVeiculo" >
                            <option size="35" value="">Escolha o Veículo</option>
                        </select>
                    </td>
                </tr>
            </table>
        </form>
        <div id="dlg-buttons">
            <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="save()">Salvar</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
        </div>
        <br><br>
    </div>
</body>
</html>