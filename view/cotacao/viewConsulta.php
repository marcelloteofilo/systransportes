<!DOCTYPE html>
<html lang="en" class="no-js">

   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>SysTransportes</title>
      <meta name="description" content="Blue One Page Creative HTML5 Template">
      <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
      <meta name="author" content="Muhammad Morshed">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
      <!-- CSS
      <!-- Fontawesome Icon font -->
      <link rel="stylesheet" href="../../css/font-awesome.min.css">
      <!-- Twitter Bootstrap css -->
      <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <!-- jquery.fancybox  -->
      <link rel="stylesheet" href="../../css/jquery.fancybox.css">
      <!-- animate -->
      <link rel="stylesheet" href="../../css/animate.css">
      <!-- Main Stylesheet -->
      <link rel="stylesheet" href="../../css/main.css">
      <!-- media-queries -->
      <link rel="stylesheet" href="../../css/media-queries.css">
      <!-- Modernizer Script for old Browsers -->
      <script src="../../js/modernizr-2.6.2.min.js"></script>
      <script type="text/javascript" src="../../js/jquery.js"> </script>      
      <script type="text/javascript" src="../../js/jquery-ui.js"></script>
	  <script type="text/javascript" src="../../js/scriptsCotacoes.js"> </script>		
	  <script type="text/javascript" src="../../js/validacoes.js"> </script>		
	  <!-- Essential jQuery Plugins -->
      <!-- Main jQuery -->
      <script src="../../js/jquery-1.11.1.min.js"></script>
      <!-- Single Page Nav -->
      <script src="../../js/jquery.singlePageNav.min.js"></script>
      <!-- Twitter Bootstrap -->
      <script src="../../js/bootstrap.min.js"></script>
      <!-- jquery.fancybox.pack -->
      <script src="../../js/jquery.fancybox.pack.js"></script>
      <!-- jquery.mixitup.min -->
      <script src="../../js/jquery.mixitup.min.js"></script>
      <!-- jquery.parallax -->
      <script src="../../js/jquery.parallax-1.1.3.js"></script>
      <!-- jquery.countTo -->
      <script src="../../js/jquery-countTo.js"></script>
      <!-- jquery.appear -->
      <script src="../../js/jquery.appear.js"></script>
      <!-- jquery easing -->
      <script src="../../js/jquery.easing.min.js"></script>
      <!-- jquery easing -->
      <script src="../../js/wow.min.js"></script>
      <!-- Custom Functions -->
      <script src="../../js/custom.js"></script>
	  <script>
         var wow = new WOW ({
             boxClass:     'wow',      // animated element css class (default is wow)
             animateClass: 'animated', // animation css class (default is animated)
             offset:       120,          // distance to the element when triggering the animation (default is 0)
             mobile:       false,       // trigger animations on mobile devices (default is true)
             live:         true        // act on asynchronously loaded content (default is true)
           }
         );
         wow.init();
      </script>
	  
   </head>
   <body onload="consultaCotacoes('false')">
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
                     <img src="../../img/Xing-50.png" alt="Brandi">
                  </h1>
               </a>
               <!-- /logo -->
            </div>
            <!-- main nav -->
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
               <ul  class="nav navbar-nav">
                  <li class="current"><a href="../../index.php">Início</a></li>
                  <li><a href="../empresa.php#empresa">Empresa</a></li>
                  <li><a href="../atuacao.php#atuacao">Atuação</a></li>
                  <li><a href="#">Cotação Online</a></li>
                  <li><a href="../contato.php#contato">Contato</a></li>
                  <li><a href="login.php#login">Registre-se</a></li>
               </ul>
            </nav>
            <!-- /main nav -->
         </div>
      </header>
      <!--
         End Fixed Navigation
         ==================================== -->      
      <!--
         Features
         ==================================== -->
      <section id="viewConsulta" class="features">
         <div class="container">
            <div class="row">
               <div class="navbar-wrapper">
                  <nav class="navbar">			
				
			        <div class="navbar-wrapper">
            <div class="container-fluid">
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
							<center>                         
									
									<br><br> 
										<center>	
										<h1>
											Consulta Cotações
										</h1>  
											<sup><b>*</b></sup>Selecione uma Cotação para Interagir Com a Mesma
										</center>
									<br>
									<table border="1" width="100%" id="tabelaConsulta">
								
									</table>
									<br><br>
									<input type="image" src='../../img/incluirBtn.png' id="btnIncluir" onClick="irPara('viewCadastro.php','incluir')">
									<input type="image" src='../../img/visualizarBtn.png' id="btnVisualizar" onClick="irPara('viewCadastro.php','visualizar')">
									<input type="image" src='../../img/alterarBtn.png' id="btnAlterar" onClick="irPara('viewCadastro.php','alterar')">
									<input type="image" src='../../img/aprovarBtn.png' id="btnAprovar" onClick="irPara('../coleta/viewCadastro.php', 'aprovar')">
									<input type="image" src='../../img/cancelarBtn.png' id="btnCancelar" onClick="irPara('viewCadastro.php','cancelar')">
									<input type="image" src='../../img/sairBtn.png' id="btnSair" onClick="irPara('../../index.php','index')">
                                                           
							</center>
                        </div>
                    </div>
                </nav>
            </div>
        </div>	
				
				
				
				
				
				
				
				
				
				
				
				
				
				<br><br>
                  </nav>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>