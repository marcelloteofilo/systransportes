<?php
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
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SysTransportes</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="../../css/paginaTemplate.css" />
        <link rel="stylesheet" type="text/css" href="../../css/easyui.css" />
        <link rel="stylesheet" type="text/css" href="../../css/icon.css" />
        <link rel="stylesheet" type="text/css" href="../../css/demo.css" />
        <!--<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />-->

        <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
        <script type="text/javascript" src="../../js/datagrid-filter.js"></script>
        <script type="text/javascript" src="../../js/scriptsRastreamento.js"></script>
        <script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="../../js/scriptPesquisa.js"></script>

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
        <!-- FIM SCRIPT DO GRAFICO -->

    <header class="navbar-fixed-top navbar" style="background:#0EB493;">
        <div class="container">
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <ul  class="nav navbar-nav">
                    <li class="current"><a href="../telaAdminSystem.php">Início Admin</a></li>
                    <li><a href="#"><?php echo "Usuario: ".$logado; ?></a></li>
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

    <?php
        $json_file = file_get_contents("http://www.imoveisredebrasil.com.br/SysTRANS/RastreamentoService.php?manifesto=4856");
        $json_str = json_decode($json_file);

        foreach($json_str->historico as $campo)
        {
            $local = $campo->local;
            $data = $campo->data_hora;

//            echo '<pre>';
//            echo "<b>Data:</b>".$local;
//            echo "<b>Data:</b>".$data;
//            echo '</pre>';
        }
    ?>


</body>
</html>