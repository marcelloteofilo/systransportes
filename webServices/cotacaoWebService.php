<?php
	require_once("../modelo/cotacao/cotacaoSql.php");   	
	session_start();   	
	
	extract ($_REQUEST);
	extract ($_SESSION);	
	
	//CARREGA OBJETO COTAÇÃO SE FOR ALTERAR OU INCLUIR
	if (isset($_GET["incluirCotacao"]) || isset($_GET["alterarCotacao"])) {			
		$cotacao = new Cotacao();	
		if (isset($_GET["alterarCotacao"]))
		$cotacao->setId($idCotacao); 
		$cotacao->getObjUsuario()->setId($idUsuario);	
		$cotacao->getObjCidadeOrigem()->setCodigo($codCidadeOrigem);
		$cotacao->getObjCidadeDestino()->setCodigo($codCidadeDestino);
		$cotacao->setPeso($peso); 
		$cotacao->setDistancia($distancia); 
		$cotacao->setDescricao($descricao); 				
		
		//CAMPOS QUE NAUM EXISTEM NO ANDROID
		if (isset($_GET["valorCarga"])){
			$cotacao->setValorCarga($valorCarga); 
		} else {
			$cotacao->setValorCarga('0'); 
		}
		
		if (isset($_GET["valorFrete"])){
			$cotacao->setValorFrete($valorFrete); 
		} else {
			$cotacao->setValorFrete('0'); 
		}
		
		if (isset($_GET["altura"])){
			$cotacao->setAltura($altura); 
		} else {
			$cotacao->setAltura('0'); 
		}
		
		if (isset($_GET["largura"])){
			$cotacao->setLargura($largura); 
		} else {
			$cotacao->setLargura('0'); 
		}
		
		if (isset($_GET["comprimento"])){
			$cotacao->setComprimento($comprimento); 
		} else {
			$cotacao->setComprimento('0'); 
		}
		
		if (isset($_GET["quantidadeCaixas"])){
			$cotacao->setQuantidadeCaixas($quantidadeCaixas); 
		} else {
			$cotacao->setQuantidadeCaixas('0'); 
		}
		
		if (isset($_GET["prazo"])){
			$cotacao->setPrazo($prazo); 
		} else {
			$cotacao->setPrazo('0'); 
		}
		
		if (isset($_GET["incluirCotacao"]))
			$status = 1;
		$cotacao->setStatus($status); 	
	}
		
	if (isset($_GET["incluirCotacao"])){
		if (CotacaoSql::adicionar($cotacao)){
			$resultado[] = array(				
				'resultado'	=>  'ok',						
			);			
		}			
		echo( json_encode( $resultado ) );				
	}			
	
	if (isset($_GET["ultimaCotacao"])){
		$ultimoIdCotacao = CotacaoSql::ultimo();		
		$resultado[] = array(				
			'resultado'	=>  $ultimoIdCotacao,						
		);					
		echo( json_encode( $resultado ) );				
	}			
	
	if (isset($_GET["alterarCotacao"])){
		if (CotacaoSql::alterar($cotacao)){
			$resultado[] = array(				
				'resultado'	=>  'ok',						
			);			
		}			
		echo( json_encode( $resultado ) );				
	}			
	
	if (isset($_GET["statusCotacao"])){
		$cotacao = new Cotacao();				
		$cotacao->setId($idCotacao); 	
		$cotacao->setStatus($status); 	
		if (CotacaoSql::mudarStatus($cotacao)){
			$resultado[] = array(				
				'resultado'	=>  'ok',						
			);			
		}			
		echo( json_encode( $resultado ) );				
	}			
	
	if (isset($_GET["aprovarCotacao"])){
		$cotacao = new Cotacao();				
		$cotacao->setId($idCotacao);
		if (isset($_GET["aprovadoCliente"])){ 		
			$cotacao->setAprovadoCliente(1); 
			$cotacao->setStatus(3);
		}
		if (isset($_GET["aprovadoAtendente"])){ 		
			$cotacao->setAprovadoAtendente(1); 
			$cotacao->setStatus(2);
		}		
		if (CotacaoSql::aprovar($cotacao)){
			$resultado[] = array(				
				'resultado'	=>  'ok',						
			);			
		}			
		echo( json_encode( $resultado ) );				
	}			
	
	//CONSULTAR COTACOES
	if (isset($_GET["consultaCotacao"])) {			
		$resultadoConsulta ='consulta'; 
		$cotacao = new Cotacao();		
		if (isset($_GET["idCotacao"])){ 
			$cotacao->setId($idCotacao); 
			$resultadoConsulta ='idCotacao'; 
		}
		$listaCotacoes = CotacaoSql::consultar($cotacao);
		if ($listaCotacoes==null){	
			$resultado[] = array(				
				'resultado'	=>  'Nada Encontrado!',						
			);							
		}else{				
			for ($i=0; $i<count($listaCotacoes); $i++ ){							
				$valorCarga = number_format($listaCotacoes[$i]->getValorCarga(), 2, ',', '.');				
				$valorFrete = number_format($listaCotacoes[$i]->getValorFrete(), 2, ',', '.');				
				$altura = number_format($listaCotacoes[$i]->getAltura(), 2, ',', '.');				
				$largura = number_format($listaCotacoes[$i]->getLargura(), 2, ',', '.');				
				$peso = number_format($listaCotacoes[$i]->getPeso(), 2, ',', '.');				
				$comprimento = number_format($listaCotacoes[$i]->getComprimento(), 2, ',', '.');				
				$resultado[] = array(				
					'id'	=>  $listaCotacoes[$i]->getId(),					
					'idUsuario'	=>   $listaCotacoes[$i]->getObjUsuario()->getId(),				
					'codCidadeOrigem'	=>   $listaCotacoes[$i]->getObjCidadeOrigem()->getCodigo(),				
					'cidadeOrigem'	=>  $listaCotacoes[$i]->getObjCidadeOrigem()->getDescricao(),				
					'ufOrigem'	=>  $listaCotacoes[$i]->getObjCidadeOrigem()->getUf(),				
					'codCidadeDestino'	=>   $listaCotacoes[$i]->getObjCidadeDestino()->getCodigo(),				
					'cidadeDestino'	=>  $listaCotacoes[$i]->getObjCidadeDestino()->getDescricao(),	
					'ufDestino'	=>  $listaCotacoes[$i]->getObjCidadeDestino()->getUf(),								
					'valorCarga'	=>  $valorCarga,					
					'valorFrete'	=>  $valorFrete,					
					'altura'	=>  $altura,			
					'largura'	=>  $largura,
					'peso'	=>  $peso,
					'comprimento'	=>  $comprimento,
					'quantidadeCaixas'	=>  $listaCotacoes[$i]->getQuantidadeCaixas(),					
					'prazo'	=>  $listaCotacoes[$i]->getPrazo(),					
					'descricao'	=>  $listaCotacoes[$i]->getDescricao(),					
					'aprovadoCliente'	=>  $listaCotacoes[$i]->getAprovadoCliente(),					
					'aprovadoAtendente'	=>  $listaCotacoes[$i]->getAprovadoAtendente(),					
					'status'	=>  $listaCotacoes[$i]->getStatus(),									
					'resultado'	=>  $resultadoConsulta,									
				);
			}
		}
		echo( json_encode( $resultado ) );			
	
	}		
?>
	
	