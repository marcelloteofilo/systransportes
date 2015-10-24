<?php
session_start();

if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    session_destroy();
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('');
    $logado = 'Visitante';
} else {
    $logado = $_SESSION['login'];
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <!--<![endif]-->
    <head>
        <!-- meta charec set -->
        <meta charset="utf-8">
        <!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <!-- Page Title -->
        <title>SysTransportes</title>
        <!-- Meta Description -->
        <meta name="description" content="Blue One Page Creative HTML5 Template">
        <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
        <meta name="author" content="Muhammad Morshed">
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Google Font -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!-- CSS
            ================================================== -->
        <!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <!-- Twitter Bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <!-- jquery.fancybox  -->
        <link rel="stylesheet" href="css/jquery.fancybox.css"/>
        <!-- animate -->
        <link rel="stylesheet" href="css/animate.css"/>
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css"/>
        <!-- media-queries -->
        <link rel="stylesheet" href="css/media-queries.css"/>
        <link rel="stylesheet" href="css/index.css"/>
        <!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>
        <!-- Essential jQuery Plugins
            ================================================== -->
        <!-- Main jQuery -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <!-- Single Page Nav -->
        <script src="js/jquery.singlePageNav.min.js"></script>
        <!-- Twitter Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jquery.fancybox.pack -->
        <script src="js/jquery.fancybox.pack.js"></script>
        <!-- jquery.mixitup.min -->
        <script src="js/jquery.mixitup.min.js"></script>
        <!-- jquery.parallax -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
        <!-- jquery.countTo -->
        <script src="js/jquery-countTo.js"></script>
        <!-- jquery.appear -->
        <script src="js/jquery.appear.js"></script>
        <!-- jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
        <!-- jquery easing -->
        <script src="js/wow.min.js"></script>
        <script>
            var wow = new WOW(
                    {
                        boxClass: 'wow', // animated element css class (default is wow)
                        animateClass: 'animated', // animation css class (default is animated)
                        offset: 120, // distance to the element when triggering the animation (default is 0)
                        mobile: false, // trigger animations on mobile devices (default is true)
                        live: true        // act on asynchronously loaded content (default is true)
                    }
            );
            wow.init();


        </script>

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


        <!-- Custom Functions -->
        <script src="js/custom.js"></script>
    </head>
    <body id="body">
        <!-- preloader -->
        <!-- end preloader -->
        <!-- 
            Fixed Navigation
            ==================================== -->
        <header id="navigation" class="navbar-fixed-top navbar">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
                    <!-- /responsive nav button -->
                    <!-- logo -->
                    <a class="navbar-brand" href="#body">
                        <h1 id="logo">
                            <img src="img/logo.png" alt="Brandi">
                        </h1>
                    </a>
                    <!-- /logo -->
                </div>
                <!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="current"><a href="#body">Início</a></li>
                        <li><a href="view/empresa.php#empresa">Empresa</a></li>
                        <li><a href="view/atuacao.php#atuacao">Atuação</a></li>
                        <li><a href="view/cotacao/viewConsulta.php#viewConsulta">Cotação Online</a></li>
                        <li><a href="view/contato.php#contato">Contato</a></li>
                        <li><a href="view/usuario/login.php#login">Registre-se</a></li>
                        <li class="">
                            <a href="#"><?php echo" Bem vindo $logado"; ?></a>
                        </li>
                    </ul>
                </nav>
                <!-- /main nav -->
            </div>
        </header>
        <!--
            End Fixed Navigation
            ==================================== -->
        <!--
            Home Slider
            ==================================== -->
        <section id="slider">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <!-- single slide -->
                    <div class="item active" style="background-image: url(img/volvo_fh_1.jpg);">
                        <div class="carousel-caption">
                            <h2 data-wow-duration="500ms" data-wow-delay="500ms" class="wow bounceInDown animated">Bem<span> Vindo!!</span>!</h2>
                            <h3 data-wow-duration="500ms" class="wow slideInLeft animated"><span class="color">Ao</span> SysTransportes.</h3>
                            <p data-wow-duration="1000ms" class="wow slideInRight animated">We are a team of professionals</p>
                            <ul class="social-links text-center">
                                <li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
                                <li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble fa-lg"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end single slide -->
                </div>
                <!-- End Wrapper for slides -->
            </div>
        </section>

        <section id="features" class="features">
            <div class="container">
                <hr>
                <center>
                    <h1 class="brand-name">SysTransporte</h1>
                    <h2>Nosso Trabalho é com <strong>Rapidez e Confiança!</strong></br>
                    </h2>
                </center>
                <hr>
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge primary"><i class="glyphicon glyphicon-globe"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title"><b>Missão</b></h4>
                            </div>
                            <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge success"><i class="glyphicon glyphicon-eye-open"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title"><b>Visão</b></h4>
                            </div>
                            <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge warning"><i class="glyphicon glyphicon-asterisk"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title"><b>Valores</b></h4>
                            </div>
                            <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </body>
</html>
