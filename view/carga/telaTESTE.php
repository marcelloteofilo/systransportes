<?php
session_start();
extract($_REQUEST);
?>
<?php
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

<?php
require_once '../../modelo/cotacao/cotacaoSql.php';

$valores = @$_POST['item'];

if (isset($_POST['cadastrar'])) {
    $conexao = Conexao::getInstance()->getConexao();

    //$total = " ";
    for ($i = 0; $i < count($valores); $i++) {
        $codCarga = CotacaoSql::ultimo();
        $descricao = $_POST['descricao'][$i];
        $pesoMercadoria = $_POST['pesoMercadoria'][$i];
        $valorMercadoria = $_POST['valorMercadoria'][$i];
        $quantidade = $_POST['quantidade'][$i];

        //$total += $_POST['peso'][$i];
        $sql = "insert into mercadorias (codCarga, descricao, pesoMercadoria, valorMercadoria, quantidade) values ('$codCarga','$descricao', '$pesoMercadoria',$valorMercadoria,$quantidade)";
        mysql_query($sql, $conexao) or die('erro na inserção do banco!!');
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>SysTransportes</title>
      <meta name="description" content="Blue One Page Creative HTML5 Template">
      <!-- <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
         <meta name="author" content="Muhammad Morshed"> -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
      <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
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
      <script type="text/javascript" src="../../js/jquery.js"></script>
      <script type="text/javascript" src="../../js/jquery-ui.js"></script>
      <script type="text/javascript" src="../../js/validacaoCampo.js"></script> 
      <script type="text/javascript" src="../../js/scriptsCidades.js"></script>
      <script type="text/javascript" src="../../js/scriptsMercadoria.js"></script>
      <script type="text/javascript" src="../../js/scriptsCarga.js"></script>
      <script type="text/javascript" src="../../js/tabelaDinamica.js"></script>
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
         var wow = new WOW({
             boxClass: 'wow', // animated element css class (default is wow)
             animateClass: 'animated', // animation css class (default is animated)
             offset: 120, // distance to the element when triggering the animation (default is 0)
             mobile: false, // trigger animations on mobile devices (default is true)
             live: true        // act on asynchronously loaded content (default is true)
         }
         );
         wow.init();
      </script>
     
     
   </head>
   <body>
      <!-- preloader -->
      <!-- end preloader -->
      <!--
         Fixed Navigation
         ==================================== -->
      <header class="navbar-fixed-top navbar" style="background:#0EB493;">
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
                     <img src="../../img/logo.png" alt="Brandi">
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
                  <li><a href="../contato.php#contato">Contato</a></li>
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
      <section id="viewConsulta" class="features" >
         <div class="container">
            <div class="row">
               <div class="navbar-wrapper">
                  <nav class="navbar">
                     <center>
                        <h1>COTAÇÃO CLIENTE</h1>
                        <sup></sup>Dados cadastrais da cotação do cliente SysTransportes!
                        <br><br>
                     </center>
                     <div class="container">
                        <form >
                           <table>
                              <!--Dados Pessoais -->
                              <h2>Plano de Viagem / Dados Cliente</h2>
                              <tr>
                                 <td><b>Estado de Origem</b></td>
                                 <td><b>Estado de Destino</b></td>
                              </tr>
                              <tr>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="UF Origem" tabindex="1" ></td>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="UF Destino" tabindex="1" ></td>
                              </tr>
                              <tr>
                                 <td><b>Cidade de Origem</b></td>
                                 <td><b>Cidade de Destino</b></td>
                              </tr>
                              <tr>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="Cidade Origem" tabindex="1" ></td>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="Cidade Destino" tabindex="1" ></td>
                              </tr>
                           </table>
                           <br>
                           <table width="100%">
                              <!--Dados Pessoais -->
                              <h2>Dados da Coleta</h2>
                              <tr>
                                 <td><b>Telefone</b></td>
                                 <td><b>Logradouro</b></td>
                                 <td><b>Bairro</b></td>
                                 <td><b>Número</b></td>
                                 <td><b>Estado</b></td>
                                 <td><b>Cidade</b></td>
                              </tr>
                              <tr>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="(00)0000-0000" tabindex="1" ></td>
                                 <td><input readonly  type="text" id="logradouro" name="" class="form-control" placeholder="Logradouro" tabindex="1"  ></td>
                                 <td><input readonly  type="text" id="bairro" name="" class="form-control" placeholder="Bairro" tabindex="1"  ></td>
                                 <td><input readonly  type="text" id="numero" name="" class="form-control" placeholder="Número" tabindex="1"  ></td>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="UF" tabindex="1" ></td>
                                 <td><input readonly  type="text" id="telefone" name="" class="form-control" placeholder="Cidade" tabindex="1" ></td>
                              </tr>
                           </table>
                           <table width="100%">
                              <tr>
                                 <td><b>Observação</b></td>
                              </tr>
                              <tr>
                                 <td><textarea readonly  class="form-control"name="observacao"  id="observacao" cols="80" rows="3" ></textarea></td>
                              </tr>
                           </table>
                           <br>
                           <table>
                          
                           <br>
                           <table width="100%">
                              <h2>Dados da Carga</h2>
                              <tr>
                                 <td><b>Altura</b></td>
                                 <td><b>Largura</b></td>
                                 <td><b>Peso</b></td>
                                 <td><b>Comprimento</b></td>
                                 <td><b>Qtd.Volumes</b></td>
                                 <td><b>Valor/R$</b></td>
                              </tr>
                              <tr>
                                 <td><input readonly  type="text" id="altura" name="" class="form-control" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input readonly  type="text" id="largura" name="" class="form-control" maxlength="14" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input readonly  type="text" id="peso" name="" class="form-control" maxlength="9" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input readonly  type="text" id="comprimento" name="" maxlength="8" class="form-control" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"></td>
                                 <td><input readonly  type="text" id="quantidade" name="" class="form-control" maxlength="9" placeholder="0,00" tabindex="1" onKeyPress="return(mascaraInteiro())"></td>
                                 <td><input readonly  type="text" id="valor" name="" maxlength="8" class="form-control" placeholder="0,00" tabindex="1" onKeyPress="return(MascaraMoeda(this, '.', ',', event))"  onBlur="focus_Blur(this, 'white');"></td>
                              </tr>
                              <td><b>Natureza da Carga</b></td>
                              <tr>
                              </tr>
                              <tr>
                                 <td>
                                    <select readonly class="form-control" id="naturezaCarga" name="">
                                       <option value=""> --- Escolha o Tipo --- </option>
                                       <option value="Tipo 1">Tipo 1</option>
                                       <option value="Tipo 2">Tipo 2</option>
                                    </select>
                                 </td>
                              </tr>
                           </table>
                           <br>
                           <table width="100%">
                              <h2>Dados Finais</h2>
                              <tr>
                                 <td><b>Distancia</b></td>
                                 <td><b>Valor Aproximado</b></td>
                                 <td><b>Temdo de Entrega</b></td>
                                 <td><b>Data do Pedido</b></td>
                                 <td><b>Coletada</b></td>
                                 <td><b>Status Carga</b></td>
                              </tr>
                              <tr>
                                 <td><input  type="text" id="distancia" name="distancia" class="form-control" placeholder="Distancia" tabindex="1"  ></td>
                                 <td><input type="text" id="frete" name="" class="form-control" maxlength="14" placeholder="0,00" tabindex="1"></td>
                                 <td><input type="text" id="prazo" name="" class="form-control" maxlength="14" placeholder="0 Dia(as)" tabindex="1"></td>
                                 <td><input type="text" id="dataPedido" name="" maxlength="8" class="form-control" placeholder="00/00/0000" tabindex="1"></td>
                                 <td>
                                    <select class="form-control" id="coletada" name="">
                                       <option value=""> --- Status Coleta --- </option>
                                       <option value="1">Aguardando</option>
                                       <option value="2">Iniciada</option>
                              <option value="3">Finalizada</option>
                                    </select>
                                 </td>
                                 <td>
                                    <select class="form-control" id="statusCarga" name="">
                                       <option value=""> --- Status Carga --- </option>
                                       <option value="1">Despachada</option>
                                       <option value="2">Em Transito</option>
                              <option value="3">Entrege</option>
                                    </select>
                                 </td>
                              </tr>
                           </table>
                        </form>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>

