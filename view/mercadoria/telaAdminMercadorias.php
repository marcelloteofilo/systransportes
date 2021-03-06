<?php
    session_start();
    ob_start();

//$login = $_SESSION['login'];
    $userAtual = $_SESSION['login'];
    $senha = $_SESSION['senha'];

    if(!isset($login) == true and ! isset($senha) == true)
    {
        session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: usuario/login.php#login');
    }
    else
    {

        $con = mysql_connect('localhost', 'root', '') or die('Sem conexão com o servidor');
        $select = mysql_select_db('systransportes') or die('Sem acesso ao DB, Entre em contato com o Administrador');

        $sql = "select * from usuarios where login = '$userAtual'";
        $res = mysql_query($sql, $con);
        $user = mysql_fetch_assoc($res);
        $logado = $userAtual;
        $stringIdUser = (int) implode($user);

//    echo '<pre class="user">';
//    print_r($user);
//    print_r('O id  do usuario é: ' . $stringIdUser);
//    echo '</pre>';
    }
?>


<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/paginaTemplate.css">

        <link rel="stylesheet" type="text/css" href="../../css/easyui.css">
        <link rel="stylesheet" type="text/css" href="../../css/icon.css">
        <link rel="stylesheet" type="text/css" href="../../css/demo.css">
        <link rel="stylesheet" type="text/css" href="../../css/usuario.css">

        <script type="text/javascript" src="../../js/scriptsMercadoria.js"></script>
        <script type="text/javascript" src="../../js/scriptPesquisa.js"></script>
        <script type="text/javascript" src="../../js/jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
        <script type="text/javascript" src="../../js/validacaoCampo.js"></script>

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


    </head>

    <header class="navbar-fixed-top navbar" style="background:#0EB493;">
        <div class="container">
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <ul  class="nav navbar-nav">
                    <li class="current"><a href="../telaAdminSystem.php">Início Admin</a></li>
                    <li><a href="#"><?php echo "Usuario: ".$logado." ID: ".$stringIdUser; ?></a></li>
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
               singleSelect="true"
               >
            <thead>
                <tr>
                    <th field="codCarga" width="20">Carga</th>
                    <th field="descricao" width="100">Descricao</th>
                    <th field="pesoMercadoria" width="20">Peso</th>
                    <th field="valorMercadoria" width="20">Valor</th>
                    <th field="quantidade" width="20">Quantidade</th>
                </tr>
            </thead>
        </table>

        <div id="toolbar">
            <!--<a href="#" class="easyui-linkbutton" iconCls="icon-box-icon" plain="true" onclick="newMercadoria()" title="Adicionar Mercadoria">Nova Mercadoria</a>-->
            <a href="#" class="easyui-linkbutton" iconCls="icon-save-as-icon" plain="true"
               onclick="editMercadoria()" title="Alterar Dados da Mercadoria">Editar Mercadoria</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-delete-icon" plain="true"
               onclick="removeMercadoria()" title="Remover Dados da Mercadoria">Remover Mercadoria</a>
            <label for="pesquisar">Localizar Mercadorias</label>
            &nbsp;&nbsp;
            <input type="text" id="pesquisar" name="pesquisar" size="30" />
        </div>

        <div id="dlg" class="easyui-dialog" style="width:600px;height:350px;padding:10px 20px"
             closed="true" buttons="#dlg-buttons">

            <div class="ftitle">Dados da Mercadoria</div>
            <form id="fm" method="post" novalidate>
                <div class="fitem">
                    <label>Cotação:</label>
                    <input name="codCarga" class="easyui-validatebox" size="10" required="true" onkeydown="teclasNumeros()" />
                </div>
                <div class="fitem">
                    <label>Descrição:</label>
                    <input name="descricao" class="easyui-validatebox" size="50" required="true" onkeydown="teclasLetrasNumeros()" />
                </div>
                <div class="fitem">
                    <label>Peso:</label>
                    <input name="pesoMercadoria" class="easyui-validatebox" size="10" required="true" onkeydown="teclasNumeros()" />
                </div>
                <div class="fitem">
                    <label>Valor:</label>
                    <input name="valorMercadoria" class="easyui-validatebox" size="10" required="true" onkeydown="teclasNumeros()" />
                </div>
                <div class="fitem">
                    <label>Quantidade:</label>
                    <input name="quantidade" class="easyui-validatebox" size="10" required="true" onkeydown="teclasNumeros()" >
                </div>
            </form>
        </div>
        <div class="alert" style="display: none"></div>
        <div id="dlg-buttons">
            <a href="#" class="easyui-linkbutton" iconCls="icon-App-clean-icon" id="enviar" onclick="saveMercadoria()">Salvar</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-Actions-edit-delete-icon" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
        </div>
    </center>

</body>
</html>
