<!--
<php
    session_start();
    if(!isset($_SESSION['login']) == true and ! isset($_SESSION['senha']) == true)
    {
        session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: ../usuario/login.php#login');
    }
    else
    {
        $logado = $_SESSION['login'];
    }
?>
-->
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SysTransportes</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="../../../css/paginaTemplate.css" />
        <link rel="stylesheet" type="text/css" href="../../../css/easyui.css" />
        <link rel="stylesheet" type="text/css" href="../../../css/icon.css" />
        <link rel="stylesheet" type="text/css" href="../../../css/demo.css" />
        <!--<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />-->

        <script type="text/javascript" src="../../../js/jquery-1.6.min.js"></script>
        <script type="text/javascript" src="../../../js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../../js/jquery.edatagrid.js"></script>
        <script type="text/javascript" src="../../../js/datagrid-filter.js"></script>
        <script type="text/javascript" src="../../../js/scriptsRastreamento.js"></script>
        <script type="text/javascript" src="../../../js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="../../../js/scriptPesquisa.js"></script>

        <script type = "text/javascript" src = "https://www.google.com/jsapi" ></script>
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
    </head>

    <header id="navigation" class="navbar-fixed-top navbar" style="background:#0EB493;">
        <div class="container">
            <!-- main nav -->
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <ul class="nav navbar-nav">
                    <ul  class="nav navbar-nav">
                        <li class="current"><a href="../../usuario/logout.php">Sair</a></li>
                    </ul>
                </ul>
            </nav>
            <div class="navbar-header">
                <ul  class="nav navbar-nav">
                    <li class=""><a href="#"><?php echo" BEM VINDO CLIENTE."; ?></a></li>
                </ul>
            </div>
        </div>
    </header>


    <body style="background:#F3F8F7">

        <div class="row" border="1"
             style="position: relative;
             border-color: #00ee00; width: 90%;
             margin: 10px 120px 0px 140px">
            <br /><br />

            <div class="row" >
                <div class="col-md-4 col-lg-3"
                     style="position: relative;  width: 60%">
                    <center><h2>Localização</h2></center></div>
                <div class="col-md-2" style="width: 5%"> &nbsp; </div>
                <div class="col-md-4 col-lg-3"
                     style="position: relative;  width: 20%">
                    <center><h2>Data</h2></center></div>
            </div>
            <br /><br />


            <?php
                $url = "http://www.imoveisredebrasil.com.br/SysTRANS/RastreamentoService.php?manifesto=4856";
                $json_file = file_get_contents($url);
                $json_str = json_decode($json_file);

                foreach($json_str->historico as $campo)
                {
                    $local = $campo->local;
                    $data = $campo->data_hora;

                    echo
                    '<div class="row" >
             <div class="col-md-4 col-lg-3" style="position: relative;  width: 60%">';
                    echo $local;
                    echo '</div>
                    <div class="col-md-2" style="width: 5%"> - </div>
                <div class="col-md-4 col-lg-3" style="position: relative;  ;width: 20%">';
                    echo '<center>'.$data.'</center>';
                    echo '
             </div>
             </div>
            ';
                }
            ?>

        </div>
    </body>
</html>