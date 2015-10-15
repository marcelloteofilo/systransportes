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

$valores = $_POST['item'];

if (isset($_POST['cadastrar'])) {
    $conexao = Conexao::getInstance()->getConexao();

    //$total = " ";
    for ($i = 0; $i < count($valores); $i++) {
        $idCotacao = CotacaoSql::ultimo();
        $descricao = $_POST['descricao'][$i];
        $peso = $_POST['peso'][$i];

        //$total += $_POST['peso'][$i];
        $sql = "insert into mercadorias (idCotacoes, descricaoMercadoria, pesoMercadoria) values ('$idCotacao','$descricao', '$peso')";
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
        <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
        <meta name="author" content="Muhammad Morshed">
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
        <script type="text/javascript" src="../../js/scriptsCotacoes.js"></script>
        <script type="text/javascript" src="../../js/scriptsCidades.js"></script>
        <script type="text/javascript" src="../../js/validacoes.js"></script>
        <script type="text/javascript" src="../../js/tabelaDinamica.js"></script>
        <script type="text/javascript" src="../../js/scriptsMercadoria.js"></script>

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
     <!--onload="consultaCotacao('<php echo($idCotacao); ?>')"-->
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
                        <li><a href="login.php#login">Registre-se</a></li>
                        <!--                        <ul class="nav navbar-nav">
                                                    <li class="">
                                                        <a href="#"><php echo" Bem vindo $logado"; ?></a>
                                                    </li>
                                                </ul>-->
                    </ul>
                </nav>
                <!-- /main nav -->
            </div>
        </header>


        <section id="viewCadastro" class="features">
            <div class="container">
                <div class="row">
                    <div class="navbar-wrapper">
                        <nav class="navbar">
                            <div class="navbar-wrapper">
                                <nav class="navbar">
                                    <div class="container">
                                        <div class="container">
                                            <div class="box">
                                                <center>
                                                    <!-- *************************** Form para mercadoria *************************** -->
                                                    <form id="formMercadoria" method="post">
                                                        <br><br>
                                                        <h1>
                                                            Cadastro de Cotações
                                                        </h1>
                                                        <br>
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <table style="border: 1px solid;">
                                                                        <tr>
                                                                            <td colspan="2" style="border: 1px solid;">
                                                                                <b><font size="3" >ORIGEM</font></b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>UF</td>
                                                                            <td><b>*Cidade</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <select tabindex="1" onfocus="focus_Blur(this, 'yellow');" onblur="focus_Blur(this, 'white');" id="ufOrigem" onChange="consultaCidades('cidadeOrigem', 'ufOrigem', '0', 'Escolha a Cidade!')">
                                                                                    <option value="">??</option>
                                                                                    <option value="PE">PE</option>
                                                                                    <option value="AC">AC</option>
                                                                                    <option value="AL">AL</option>
                                                                                    <option value="AM">AM</option>
                                                                                    <option value="AP">AP</option>
                                                                                    <option value="BA">BA</option>
                                                                                    <option value="CE">CE</option>
                                                                                    <option value="DF">DF</option>
                                                                                    <option value="ES">ES</option>
                                                                                    <option value="GO">GO</option>
                                                                                    <option value="MA">MA</option>
                                                                                    <option value="MG">MG</option>
                                                                                    <option value="MS">MS</option>
                                                                                    <option value="MT">MT</option>
                                                                                    <option value="PA">PA</option>
                                                                                    <option value="PB">PB</option>
                                                                                    <option value="PI">PI</option>
                                                                                    <option value="PR">PR</option>
                                                                                    <option value="RJ">RJ</option>
                                                                                    <option value="RN">RN</option>
                                                                                    <option value="RO">RO</option>
                                                                                    <option value="RR">RR</option>
                                                                                    <option value="RS">RS</option>
                                                                                    <option value="SC">SC</option>
                                                                                    <option value="SE">SE</option>
                                                                                    <option value="SP">SP</option>
                                                                                    <option value="TO">TO</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select onfocus="focus_Blur(this, 'yellow');" tabindex="2" onblur="focus_Blur(this, 'white');" id="cidadeOrigem" name="cidadeOrigem"  onChange="juntaCidadeUf();
                                                                                        CalculaDistancia();">
                                                                                    <option size="35" value="">ESCOLHA O ESTADO ORIGEM</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                </td>
                                                                <td>
                                                                    <table style="border: 1px solid;">
                                                                        <tr>
                                                                            <td colspan="2"  style="border: 1px solid;">
                                                                                <b><font size="3">DESTINO</font></b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>UF</td>
                                                                            <td><b>*Cidade</b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <select tabindex="3" onfocus="focus_Blur(this, 'yellow');" onblur="focus_Blur(this, 'white');" id="ufDestino" onChange="consultaCidades('cidadeDestino', 'ufDestino', '0', 'Escolha a Cidade!')" >
                                                                                    <option value="">??</option>
                                                                                    <option value="PE">PE</option>
                                                                                    <option value="AC">AC</option>
                                                                                    <option value="AL">AL</option>
                                                                                    <option value="AM">AM</option>
                                                                                    <option value="AP">AP</option>
                                                                                    <option value="BA">BA</option>
                                                                                    <option value="CE">CE</option>
                                                                                    <option value="DF">DF</option>
                                                                                    <option value="ES">ES</option>
                                                                                    <option value="GO">GO</option>
                                                                                    <option value="MA">MA</option>
                                                                                    <option value="MG">MG</option>
                                                                                    <option value="MS">MS</option>
                                                                                    <option value="MT">MT</option>
                                                                                    <option value="PA">PA</option>
                                                                                    <option value="PB">PB</option>
                                                                                    <option value="PI">PI</option>
                                                                                    <option value="PR">PR</option>
                                                                                    <option value="RJ">RJ</option>
                                                                                    <option value="RN">RN</option>
                                                                                    <option value="RO">RO</option>
                                                                                    <option value="RR">RR</option>
                                                                                    <option value="RS">RS</option>
                                                                                    <option value="SC">SC</option>
                                                                                    <option value="SE">SE</option>
                                                                                    <option value="SP">SP</option>
                                                                                    <option value="TO">TO</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select onfocus="focus_Blur(this, 'yellow');" tabindex="4" onblur="focus_Blur(this, 'white');" id="cidadeDestino" name="cidadeDestino"  onChange="juntaCidadeUf();
                                                                                        CalculaDistancia();">
                                                                                    <option size="35" value="">ESCOLHA O ESTADO DESTINO</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        </br>
                                                        <!-- *************************** Form para mercadoria ***************************
                                                        <form id="formMercadoria" method="post">-->
                                                        <div id="mensagens"></div>
                                                        <table width="50%" id="tabelaItens">
                                                            <thead>
                                                                <tr>
                                                                    <td>Item</td>
                                                                    <td>Descrição</td>
                                                                    <td>Peso</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" name="item[]" id="item" value="1" size="4" readonly="readonly"/></td>
                                                                    <td><input type="text" name="descricao[]" id="descricaoPesoMercadoria" value="" size="60" /></td>
                                                                    <td><input type="text" name="peso[]" id="pesoMercadoria" value="" size="4" /></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <p><a href="#" class="add" style="color: black"><img src="../../img/plus.png" border="0" /></a>Adicionar nova mercadoria</p>
                                                        <!--<p><input name="cadastrar" value="Enviar" type="submit"/></p>
                                                    </form>
                                                        <!-- *************************** Form para mercadoria *************************** -->

                                                        </br>
                                                        <table style="border: 1px solid;">
                                                            <tr>
                                                                <td colspan="20" style="border: 1px solid;">
                                                            <center><font size="4"><b>DADOS DA CARGA:</b></font></center>
                                                            </td>
                                                            </tr>
                                                            <tr style="border: 1px solid;">
                                                                <td width="105">Altura/Mts</td>
                                                                <td width="105">Largura/Mts</td>
                                                                <td width="100"><b>*Peso/Kgs</b></td>
                                                                <td width="130">Comprim/Mts</td>
                                                                <td width="110">QtdVolumes</td>
                                                                <td width="110"><b>*Valor/R$</b></td>
                                                            </tr>
                                                            <tr style="border: 1px solid;">
                                                                <td>
                                                                    <input type="text" size="7" tabindex="7" type="text" onfocus="focus_Blur(this, 'yellow');"onblur="focus_Blur(this, 'white');" value="0,00" id="altura" name="altura"  onKeyPress="return(MascaraMoeda(this, '.', ',', event))">
                                                                </td>
                                                                <td >
                                                                    <input type="text" size="7" tabindex="8" type="text" onfocus="focus_Blur(this, 'yellow');"onblur="focus_Blur(this, 'white');" value="0,00"  id="largura" name="largura"  onKeyPress="return(MascaraMoeda(this, '.', ',', event))">
                                                                </td>
                                                                <td>
                                                                    <input type="text" size="7" tabindex="9" type="text" onfocus="focus_Blur(this, 'yellow');"onblur="focus_Blur(this, 'white');
                                                                            CalculaDistancia();" value="" id="pesoCotacao" name="pesoCotacao"  onKeyPress="return(MascaraMoeda(this, '.', ',', event))">
                                                                </td>
                                                                <td >
                                                                    <input type="text" size="7" tabindex="10" type="text" onfocus="focus_Blur(this, 'yellow');"onblur="focus_Blur(this, 'white');" value="0,00" id="comprimento" name="comprimento"  onKeyPress="return(MascaraMoeda(this, '.', ',', event))">
                                                                </td>
                                                                <td>
                                                                    <input type="text" size="7" tabindex="11" type="text" onfocus="focus_Blur(this, 'yellow');"onblur="focus_Blur(this, 'white');" value="0"  id="qtdCaixas" name="qtdCaixas" onKeyPress="return(mascaraInteiro())">
                                                                </td>
                                                                <td style="border-right: 1px solid;">
                                                                    <input type="text" size="7" tabindex="12" type="text" onfocus="focus_Blur(this, 'yellow');"  value=""  id="valor" name="valor"  onKeyPress="return(MascaraMoeda(this, '.', ',', event))"  onBlur="focus_Blur(this, 'white');
                                                                            CalculaDistancia();">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        </br>
                                                        <table style="border: 1px solid;">
                                                            <tr>
                                                                <td colspan="20" style="border: 1px solid;">
                                                            <center><font size="4"><b>OBSERVAÇÕES:</b></font></center>
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <textarea name="descricaoCotacao"  id="descricaoCotacao" cols="80" rows="5"  tabindex="13" title="Informações sobre o Transporte"></textarea>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        </br>
                                                        <table style="border: 1px solid;"  id="totalGeral">
                                                            <tr>
                                                                <td colspan="20" style="border: 1px solid;">
                                                            <center><font size="4"><b>TOTAL ESTIMADO:</b></font></center>
                                                            </td>
                                                            </tr>
                                                            <tr style="border: 1px solid;" height="20">
                                                                <td width="120" ><center>DISTANCIA</center> </td>
                                                            <td width="130"><center>FRETE</center></td>
                                                            <td  width="120"style="border-right: 1px solid;"><center>PRAZO</center></td>
                                                            <td  width="150" colspan="2" style="border-right: 1px solid;"><center>STATUS</center></td>
                                                            </tr>
                                                            <tr style="border: 1px solid;">
                                                                <td>
                                                                    <input name="distancia" size="8" readonly type="text" id="txtDistancia" value="" />
                                                                </td>
                                                                <td>
                                                                    <input type="text" size="11" readonly tabindex="1" type="text" id="valorFrete" value="">
                                                                </td>
                                                                <td >
                                                            <center><input name="tempo" readonly size="8" type="text" id="txtTempo" value=""  style="border-right: 1px solid;"/></center>
                                                            </td>
                                                            <td>
                                                                <input readonly size="1" type="text" id="idStatus" value="1" />
                                                            </td>
                                                            <td>
                                                                <input readonly size="25" type="text" id="status" value="EM DIGITAÇÃO"  style="border-right: 1px solid;"/>
                                                            </td>
                                                            </tr>
                                                        </table>
                                                        <div><span id="litResultado">&nbsp;</span></div>
                                                        <div  id="mapaGoogle"  style="padding: 10px 0 0; clear: both">
                                                            <iframe width="650" scrolling="no" height="300" frameborder="0" id="map" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?saddr=S&atilde;o Paulo&daddr=Rio de Janeiro&output=embed"></iframe>
                                                        </div>

                                                        <input type="hidden" id="idCotacao" value="<?php echo($idCotacao); ?>">
                                                        <input type="hidden" id="acao" value="<?php echo($acao); ?>">
                                                        <input name="resultadoOrigem" type="hidden" id="txtOrigemResultado" class="field"  value="" />
                                                        <input name="resultadoDestino" type="hidden" id="txtDestinoResultado" class="field" value="" />
                                                        <input name="pesquisaOrigem" type="hidden" id="txtOrigem" class="field" value="S&atilde;o Paulo" />
                                                        <input name="pesquisaDestino" type="hidden" id="txtDestino" class="field" value="Rio de Janeiro" />
                                                        <center><sup><b>*</sup>Campos Obrigatórios</b></center>
                                                        <!--<input type="image" src='../../img/<php echo($acao); ?>Btn.png' id="gravarBtn" onClick="crudCotacao('<php echo($acao); ?>')">
                                                        <input type="image" src='../../img/sairBtn.png' id="btnSair" onClick="irPara('viewConsulta.php', 'consultar')">-->
                                                        </br>
                                                        <input type="submit" onClick="crudCotacao('<?php echo($acao); ?>');
                                                                irPara('viewConsulta.php', 'consultar')" name="cadastrar">
                                                    </form>
                                                    <!-- *************************** Form para mercadoria *************************** -->
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>