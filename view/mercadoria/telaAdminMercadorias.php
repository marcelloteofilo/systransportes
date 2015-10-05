<?php
session_start();
if (!isset($_SESSION['login']) == true and  !isset($_SESSION['senha']) == true) {
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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="stylesheet" type="text/css" href="../../css/easyui.css">
        <link rel="stylesheet" type="text/css" href="../../css/icon.css">
        <link rel="stylesheet" type="text/css" href="../../css/demo.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">

        <style type="text/css">
            #fm{
                margin:0;
                padding:10px 30px;
            }
            .ftitle{
                font-size:14px;
                font-weight:bold;
                color:#666;
                padding:5px 0;
                margin-bottom:10px;
                border-bottom:1px solid #ccc;
            }
            .fitem{
                margin-bottom:5px;
            }
            .fitem label{
                display:inline-block;
                width:80px;
            }
        </style>
        <script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
        <script type="text/javascript" src="../../js/datagrid-filter.js"></script>
        <script type="text/javascript" src="../../js/validacaoCampo.js"></script>
        <script type="text/javascript" src="../../js/scriptsMercadoria.js"></script>

        <script type="text/javascript">
            function id(el)
            {
                return document.getElementById(el);
            }
            window.onload = function ()
            {
                id('#enviar').onclick = function ()
                {
                    if (id('descricao').value === "")
                    {
                        alerta('Informe a descricao!');
                    }
                    if (id('peso').value === "")
                    {
                        alerta('Informe o peso!');
                    }
                }

            }
        </script>

    </head>

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

    <body style="background:#F3F8F7">
    <center>
        <table id="dg" 
               title="Cadastro de Mercadorias" 
               class="easyui-datagrid" 
               style=" width:1250px;height:495px" 
               url="../../webServices/mercadoriasWebService.php?editSave=carregarMercadoria" 
               toolbar="#toolbar" 
               pagination="true"
               rownumbers="true" 
               fitColumns="true" 
               singleSelect="true">
            <thead>
                <tr>
                    <th field="idCotacoes" width="50">Cotação</th>
                    <th field="descricao" width="50">Descricao</th>
                    <th field="peso" width="50">Peso</th>
                </tr>
            </thead>


        </table>

        <div id="toolbar">
            <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" 
               onclick="newMercadoria()" title="Adicionar Mercadoria">Nova Mercadoria</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" 
               onclick="editMercadoria()" title="Alterar Dados da Mercadoria">Editar Mercadoria</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" 
               onclick="removeMercadoria()" title="Remover Dados da Mercadoria">Remover Mercadoria</a>
        </div>

        <div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
             closed="true" buttons="#dlg-buttons">

            <div class="ftitle">Dados da Mercadoria</div>
            <form id="fm" method="post" novalidate>
                <div class="fitem">
                    <label>Cotação:</label>
                    <input name="idCotacoes" class="easyui-validatebox" required="true" onkeyup="validar(this, 'num');">
                </div>
                <div class="fitem">
                    <label>Descrição:</label>
                    <input name="descricao" class="easyui-validatebox" required="true" onkeyup="validar(this, 'text');
                            validarCaracteresEspeciais(this, 'text');">
                </div>
                <div class="fitem">
                    <label>Peso:</label>
                    <input name="peso" class="easyui-validatebox" required="true" onkeyup="validar(this, 'num');">
                </div>
            </form>
        </div>
        <div id="dlg-buttons">
            <a href="#" class="easyui-linkbutton" iconCls="icon-ok" id="enviar" onclick="saveMercadoria()">Salvar</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
        </div>
    </center>

</body>
</html>