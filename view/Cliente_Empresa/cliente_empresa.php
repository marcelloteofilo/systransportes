<?php
    session_start();

    if((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true))
    {
        session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('');
        $logado = 'Visitante';
    } else
    {
        $logado = $_SESSION['login'];
    }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SysTransportes</title>
        <meta name="description" content="Blue One Page Creative HTML5 Template">
        <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
        <meta name="author" content="Muhammad Morshed">
        <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../css/main.css"/>
        <link rel="stylesheet" href="../../css/index.css"/>

        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../css/easyui.css">
        <link rel="stylesheet" type="text/css" href="../../css/icon.css">
        <!-- JS CRUD -->
        <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
        <script type="text/javascript" src="../../js/datagrid-filter.js"></script>
        <script type="text/javascript" src="../../js/validacaoCampo.js"></script>
        <script type="text/javascript" src="../../js/validacoes.js"></script>


        <!--
        <script language="javascript">

            function sistema()

            {

                if (navigator.userAgent.indexOf('Linux') !== -1)

                {
                    var so = "Linuz";
                    var caminho = "/opt/lampp/htdocs/dashboard/systransportes/";
                }
                else
                {
                    var so = "Windows";
                    var caminho = "../../";
                }

                alert(so + ' - ' + caminho)

            }

        </script>
        -->
    </head>

    <body id="body">

        <header id="navigation" class="navbar-fixed-top navbar">
            <div class="container">
                <!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="#"><?php echo" Bem vindo, $logado"; ?></a>
                        </li>
                        <ul  class="nav navbar-nav">
                            <li class="current"><a href="../usuario/logout.php">Sair</a></li>
                        </ul>
                    </ul>
                </nav>
                <!-- /main nav -->
            </div>
        </header>

        <section id="features" class="features">
            <div class="container">
                <center>
                    <h3>Olá!! <?php echo $logado ?>. Este é um espaço no qual constará suas cotações.</h3>
                </center>
                <hr>
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge success"><i class="glyphicon glyphicon-eye-open"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <table id="dg" title="Cotações" class="easyui-datagrid"
                                       style=" width:1020px;height:350px"
                                       url="../../webServices/cargaWebService.php?editSave=carregarTodos"
                                       toolbar="#toolbar" pagination="true"
                                       rownumbers="true" fitColumns="true" singleSelect="true">
                                    <thead>
                                        <tr>
                                            <th field="codCarga" width="4">Id</th>
                                            <th field="origem" width="50">Origem</th>
                                            <th field="destino" width="50">Destino</th>
                                            <th field="valor" width="10">Valor</th>
                                            <th field="naturezaCarga" width="20">Natureza Carga</th>
                                            <th field="dataPedido" width="20">Pedido</th>
                                            <th field="coletada" width="10">Coletada</th>
                                            <th field="statusCarga" width="15">Status</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div id="toolbar">
                                    <a href="#" class="easyui-linkbutton" iconCls="icon-open-file" plain="true" onclick="editUser();" title="Alterar Dados do Usuário">Abrir Cotação</a>
                                    <!--<a href="#" class="easyui-linkbutton" iconCls="icon-Stats-icon" plain="true" onclick="carregarTodos();" title="Alterar Dados do Usuário">Todos</a>-->
                                    <a href="#" class="easyui-linkbutton" iconCls="icon-Customer-service-icon" plain="true" onclick="carregarAtendimento();" title="Alterar Dados do Usuário">Atendimento</a>
                                    <a href="#" class="easyui-linkbutton" iconCls="icon-like-icon" plain="true" onclick="carregarAprovados();" title="Alterar Dados do Usuário">Aprovados</a>
                                    <a href="#" class="easyui-linkbutton" iconCls="icon-Unit-completed-icon" plain="true" onclick="carregarConcluidos();" title="Alterar Dados do Usuário">Concluídos</a>

                                    <label for="pesquisar">Busca Avançada</label>
                                    <input type="text" id="pesquisar" name="pesquisar" size="30" />
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </body>
</html>
