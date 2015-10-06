<!DOCTYPE html>
<?php	
	extract ($_REQUEST);
?>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>SysTransportes</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/paginaTemplate.css">
    <!-- CSS CRUD -->
    <link rel="stylesheet" type="text/css" href="../../css/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../css/icon.css">
    <link rel="stylesheet" type="text/css" href="../../css/demo.css">
    <!-- JS CRUD -->
    <script type="text/javascript" src="../../js/jquery-1.6.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.edatagrid.js"></script>
    <script type="text/javascript" src="../../js/datagrid-filter.js"></script>
    <!-- JS CRUD -->
    <script type="text/javascript" src="../../js/scriptsCidades.js"></script>
    <script type="text/javascript" src="../../js/validacaoCampo.js"></script> 
	<script type="text/javascript" src="../../js/scriptsColeta.js"> </script>		

    <!-- SCRIPT ADMIN -->
    <script type="text/javascript">
      var url;      	
  
	  function cancelarCotacao(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
          $('#dlg').dialog('open').dialog('setTitle','Cancelar Cotação');
          $('#fm').form('load',row);
		  acao = 'cancelar';
		  $("#btnCancelar").show(400);			   												
		  $("#btnAprovar").hide("slow");
          url = '../../webServices/usuariosWebService.php?editSave=consultaCotacao&acao=cancelar&acao&id='+row.id;
        }
      }
      function saveUser(){
        $('#fm').form('submit',{
          url: url,
            onSubmit: function(){
            return $(this).form('validate');
          },
          success: function(result){
            var result = eval('('+result+')');
            if (result.success){
              $('#dlg').dialog('close');    // close the dialog
              $('#dg').datagrid('reload');  // reload the user data
            } else {
              $.messager.show({
                title: 'Erro',
                msg: result.msg
              });
            }
          }
        });
      }      
    </script>
    <!-- FIM SCRIPT ADMIN -->

    <header class="navbar-fixed-top navbar" style="background:#0EB493;">
      <div class="container">
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
          <ul  class="nav navbar-nav">
            <li class="current"><a href="../../index.php">Início</a></li>
            <li><a href="../telaAdminSystem.php">Admin</a></li>
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
    
    <div class="navbar-wrapper">
			<nav class="navbar">
				<div class="container">                        
					<div class="container">        
						<div class="box">         						
							<center>
							<br><br>    
								 <h1>
											Autorização de Coleta de Mercadorias
                                 </h1>
							<br>
							<table>
								<tr>
									<td>
									  <table style="border: 1px solid;">
											<tr>
												<td colspan="2" style="border: 1px solid;">
													<b><font size="3" >Remetente:</font></b> - <a  href="#" onClick="aprovarCotacao();"><font color="blue"><b>Incluir/Consultar</b></a></font>
												</td>																	
											</tr>																				
											<tr>								
												<td>Cnpj</td>			
												<td>Nome</td>																		
											</tr>								
											<tr>
												<td>							
													<input type="text" size="9" tabindex="9" type="text" id="cnpjRemetente" name="cnpjRemetente" readonly> 													
												</td>																	
												<td>							
													<input type="text" size="27" tabindex="19" type="text" id="nomeRemetente" name="nomeRemetente" readonly> 													
												</td>							
											</tr>						
										</table>
									</td>
									<td>
										&nbsp;
									</td>
									<td>
									  <table style="border: 1px solid;">
											<tr>
												<td colspan="2"  style="border: 1px solid;">
													<b><font size="3">Destinatário</font></b> - <a  href="#" onClick="testando();"><font color="blue"><b>Incluir/Consultar</b></a></font>
												</td>																	
											</tr>																				
											<tr>								
												<td>Cnpj</td>			
												<td>Nome</td>																		
											</tr>								
											<tr>								
												<td>							
													<input type="text" size="9" tabindex="9" type="text" id="cnpjDestinatario" name="cnpjDestinatario" readonly> 													
												</td>																	
												<td>							
													<input type="text" size="27" tabindex="19" type="text" id="nomeDestinatario" name="nomeDestinatario" readonly> 													
												</td>																			
											</tr>						
										</table>
									</td>
								</tr>
							</table>							
							</br>	
							<table id="itensMercadoria">
							</table>
							</br>
							<table style="border: 1px solid;">
								<tr>
									<td colspan="20" style="border: 1px solid;"> 
										<center><font size="4"><b>Horário Agendado:</b></font></center>
									</td> 															
									</tr>
									<tr style="border: 1px solid;">			
										<td width="110">ValorMerc./R$</td>			
										<td width="100">Peso/Kgs</td>										
										<td width="110">QtdVolumes</td>						
										<td width="110">Frete/R$</td>			
										<td width="105"><b>*Data</b></td>
										<td width="105"><b>*Hora</b></td>										
									</tr>						
									<tr style="border: 1px solid;">	
										<td >									
											<input type="text" size="7" tabindex="12" type="text" id="valor" name="valor" readonly>
										</td>								
										<td>								
											<input type="text" size="7" tabindex="9" type="text" id="peso" name="peso" readonly>
										</td>															
										<td>								
											<input type="text" size="7" tabindex="11" type="text" id="qtdCaixas" readonly>
										</td>															
										<td >									
											<input type="text" size="7" tabindex="12" type="text" id="frete" name="frete" readonly>
										</td>								
										<td>								
											<input type="text" size="7" tabindex="7" type="text" onfocus="focus_Blur(this, 'yellow');"onblur="focus_Blur(this, 'white');" value="0,00" id="dataAgenda" name="dataAgenda"  onKeyPress="return(MascaraMoeda(this,'.',',',event))">
										</td>					
										<td style="border-right: 1px solid;">													
											<input type="text" size="7" tabindex="8" type="text" onfocus="focus_Blur(this, 'yellow');"onblur="focus_Blur(this, 'white');" value="0,00"  id="horaAgenda" name="horaAgenda"  onKeyPress="return(MascaraMoeda(this,'.',',',event))">
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
										<textarea name="descricao"  id="descricao" cols="80" rows="5"  tabindex="13" title="Informações sobre a Coleta"></textarea>		
									</td>														
								</tr>	
							</table>
							</br>							
							<input type="hidden" id="idCotacao" value="<?php echo($idCotacao);?>">						 	
							<input type="hidden" id="acao" value="<?php echo($acao);?>">						 	
							<input name="resultadoOrigem" type="hidden" id="txtOrigemResultado" class="field"  value="" />
							<input name="resultadoDestino" type="hidden" id="txtDestinoResultado" class="field" value="" />
							<input name="pesquisaOrigem" type="hidden" id="txtOrigem" class="field" value="S&atilde;o Paulo" />
							<input name="pesquisaDestino" type="hidden" id="txtDestino" class="field" value="Rio de Janeiro" />
							<center><sup><b>*</sup>Campos Obrigatórios</b></center>
							<input type="image" src='../../img/<?php echo($acao);?>Btn.png' id="gravarBtn" onClick="crudCotacao('<?php echo($acao);?>')">
							<input type="image" src='../../img/sairBtn.png' id="btnSair" onClick="irPara('viewConsulta.php','consultar')">
							</br>							
							</center>
						</div>
					</div>
                </div>
            </nav>
        </div>

    <!-- DIALOG ADMIN PESSOA FÍSICA -->
    <div id="dlg" class="easyui-dialog" style="background:#F3F8F7; width:580px;height:410px;padding:10px 20px"
      closed="true" buttons="#dlg-buttons">      
					<center>					  
					  <table width="525" id="labConsultas">
						<tr  class="cabecalho_tabelas" style="border: 1px solid;">
							<td colspan="2" id="tituloConsulta" style="border: 1px solid;">
								&nbsp;
							</td>
						</tr>
						<tr class="cabecalho_tabelas">
							<td colspan="2">						
								<input type="text" size="70" tabindex="1" type="text" onfocus="focus_Blur(this, 'yellow');"onblur="focus_Blur(this, 'white');" name="tempConsulta" id="tempConsulta" onKeyUp="consultaRemetente(this)">			
							</td>						
						</tr>				
						<tr class="cabecalho_tabelas" style="border: 1px solid;" id="nomesConsulta">
							
						</tr>
					  </table>					  	  						  					
					</center>				  											
    <div id="dlg-buttons">
      <a href="#" class="easyui-linkbutton" id="btnAprovar" iconCls="icon-ok" onclick="atendenteCotacaoAprovar()">Aprovar Cotação</a>
	  <a href="#" class="easyui-linkbutton" id="btnCancelar" iconCls="icon-cancel" onclick="atendenteCotacaoCancelar()">Cancelar Cotação</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-undo" width="200" onclick="javascript:$('#dlg').dialog('close')">Voltar Tela Anterior</a>
    </div>
    <br><br>
    <!-- FIM DIALOG ADMIN PESSOA FÍSICA -->

  </body>
</html>