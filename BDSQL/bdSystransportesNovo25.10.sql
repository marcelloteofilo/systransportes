select cl.*,
					idMotorista.id as idMotorista,nomeMotorista.nomeCompleto as nomeMotorista,
					idVeiculo.id as idVeiculo,placaVeiculo.placa as placaVeiculo,
					telefone.telefone as telefone,logradouro.logradouro as logradouro,bairro.bairro as bairro,uf.uf as uf,cidade.cidade as cidade,numero.numero as numero,observacao.observacao as observacao,coletada.coletada as coletada
						from coleta as cl
							INNER JOIN usuarios as nomeMotorista ON cl.codMotorista = nomeMotorista.id
							INNER JOIN usuarios as idMotorista ON cl.codMotorista = idMotorista.id
							INNER JOIN veiculos as placaVeiculo ON cl.codVeiculo = placaVeiculo.id
							INNER JOIN veiculos as idVeiculo ON cl.codVeiculo = idVeiculo.id
							INNER JOIN cargas as telefone ON cl.codCarga = telefone.codCarga
							INNER JOIN cargas as logradouro ON cl.codCarga = logradouro.codCarga
							INNER JOIN cargas as bairro ON cl.codCarga = bairro.codCarga
							INNER JOIN cargas as uf ON cl.codCarga = uf.codCarga
							INNER JOIN cargas as cidade ON cl.codCarga = cidade.codCarga
							INNER JOIN cargas as numero ON cl.codCarga = numero.codCarga
							INNER JOIN cargas as observacao ON cl.codCarga = observacao.codCarga
							INNER JOIN cargas as coletada ON cl.codCarga = coletada.codCarga;
							where coletada = "Aprovado"';