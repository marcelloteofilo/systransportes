<?php
    session_start();

    if((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true))
    {
        session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('');
        $logado = 'Visitante';
    }
    else
    {
        $logado = $_SESSION['login'];
    }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>

        <title>Rota da mercadoria</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Blue One Page Creative HTML5 Template">
        <link rel="stylesheet" href="../../css/main.css" />
        <link rel="stylesheet" href="../../css/index.css"/>

        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/paginaTemplate.css">

        <link rel="stylesheet" type="text/css" href="../../css/easyui.css" />
        <link rel="stylesheet" type="text/css" href="../../css/icon.css" />

        <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../js/scriptsRastreamento.js"></script>
        <script type="text/javascript" src="../../js/scriptPesquisa.js"></script>

    </head>

    <body id="body" style="background:#F3F8F7">

        <header id="navigation" class="navbar-fixed-top navbar" style="background:#0EB493;">
            <div class="container">
                <!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <ul  class="nav navbar-nav">
                            <li class="current"><a href="../usuario/logout.php">Sair</a></li>
                        </ul>
                    </ul>
                </nav>
                <div class="navbar-header">
                    <ul  class="nav navbar-nav">
                        <li class=""><a href="#"><?php echo" BEM VINDO, @$logado"; ?></a></li>
                    </ul>
                </div>
            </div>
        </header>


        <section id="features" class="features">
            <div class="container">
                <center>
                    <h3>Olá!! <?php echo $logado ?>. Informe o código da mercadoria.</h3>
                </center>
                <hr>
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge primary"><i class="glyphicon glyphicon-barcode"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-body">

                                <input required="required" class="form-control" id="codigo"
                                       name="codigo" style="text-transform:uppercase" size="23"
                                       placeholder="código de rastreamento da mercadoria" ></td>
                                <br />
                                <a href="rastreamento/telaAdminRastreamento.php">
                                    <input class="btn btn-success btn-login-submit"
                                           value="Rastrear" type="submit"></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <br>
        </section>
    </body>
</html>
