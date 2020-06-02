<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<?php
	if (!empty($_POST)){
		$tipoMov = $_POST["tipoMovimento"];
	}else{
		$tipoMov = "";
	}
	print "<!--Switch de seleção entre entradas e saídas-->
	<form style='margin-top: 5%;' method='POST' action='index.php?page=monitoramento'>
		<div class='container'>";
			//Decide qual label mostrar de acordo com a opção selecionada
			if (strcmp($tipoMov,"entrada") == 0){
				print"<input type='radio' id='entrada' name='tipoMovimento' value='entrada' checked='checked' onchange='this.form.submit();'>
					  <label for='entrada'>Entradas</label>";
			}else{
				print"<input type='radio' id='entrada' name='tipoMovimento' value='entrada' onchange='this.form.submit();'>
					  <label for='entrada'>Entradas</label>";
			}
			if (strcmp($tipoMov,"saida") == 0){
				print"<input type='radio' id='saida' name='tipoMovimento' value='saida' checked='checked' onchange='this.form.submit();'>
					  <label for='saida'>Saídas</label>";
			}else{
				print"<input type='radio' id='saida' name='tipoMovimento' value='saida' onchange='this.form.submit();'>
					  <label for='saida'>Saídas</label>";
			}
			print "</div>";
	//$pesquisar = @$_REQUEST['pesquisar'];
	$resultado_pes_ent = "SELECT C.id_cadastro,C.no_usuario,O.dt_ocorrencia,O.hr_ocorrencia,D.no_localizacao,C.cd_cartao 
						  FROM tb_ocorrencia O, tb_cadastro C, tb_dispositivo D
						  WHERE O.fk_dispositivo = D.id_dispositivo AND
								O.fk_cadastro = C.id_cadastro AND
								O.st_ocorrencia = 'e'
						  ORDER BY C.id_cadastro";//select do banco de dados da tb_ocorrencia com o join nas tabelas
												  //tb_ocorrencia e tb_cadastro
	$pesquisa_nome_ent = mysqli_query($conn, $resultado_pes_ent); //conexao com o banco de dados
	$resultado_pes_sai = "SELECT C.id_cadastro,C.no_usuario,O.dt_ocorrencia,O.hr_ocorrencia,D.no_localizacao,C.cd_cartao 
						  FROM tb_ocorrencia O, tb_cadastro C, tb_dispositivo D
						  WHERE O.fk_dispositivo = D.id_dispositivo AND
								O.fk_cadastro = C.id_cadastro AND
								O.st_ocorrencia = 's'
						  ORDER BY C.id_cadastro";//select do banco de dados da tb_ocorrencia com o join nas tabelas
												  //tb_ocorrencia e tb_cadastro
	$pesquisa_nome_sai = mysqli_query($conn, $resultado_pes_sai); //conexao com o banco de dados
	$sql = "SELECT * FROM `cadastro` ORDER BY `cadastro`.`nomeUsuario`. `setor`. DESC"; //ordenando o select
	$resEnt = $conn -> query($resultado_pes_ent); //resposta do banco de dados para a query de entradas
	$qtdEnt = $resEnt -> num_rows; //exibir a quantidade de entradas
	$resSai = $conn -> query($resultado_pes_sai); //resposta do banco de dados para a query de saidas
	$qtdSai = $resSai -> num_rows; //exibir a quantidade de saidas
	
	//Seta quantidade de entradas ou saídas de acordo com opção selecionada no elemento radio mais acima
	if (strcmp($tipoMov,"entrada") == 0){
		$qtd = $qtdEnt;
	}else{
		$qtd = $qtdSai;
	}

	//Se o usuario tiver escolhido a opção entradas e a quantidade destas forem maiores do que zero ou
	//se ele tiver escohido a opção saídas e a quantidade destas forem maiores do que zero, exibir tabela
	if(($qtdEnt > 0 && strcmp($tipoMov,"entrada")) == 0 ||
	   ($qtdSai > 0 && strcmp($tipoMov,"saida") == 0)){
	//estilo de exibição de pesquisa
	
				if(strcmp($tipoMov,"entrada") == 0){
					print"<h2 style='text-align:center;'>Entradas</h2>";
				}else{
					print"<h2 style='text-align:center;'>Saidas</h2>";
				}
				//pesquisa do banco com resultado de quantidade
	
		
							//print "foi encontrado " .$row["nomeUsuario"]. $row["setor"];
			 print"
                <!--Titulo da tabela-->
                <table class='table table-sm'>
                    <!-- aqui inicia a tabela de saída-->
                    <thead>
                        <tr>
                            <th scope='col' >$qtd</th>
                            <th scope='col' >Nome</th>
                            <th scope='col' >Data</th>
                            <th scope='col' >Hora</th>
                            <th scope='col' >Local</th>
                            <th scope='col'>Card</th>
                        </tr>
                    </thead>";
			
	if (strcmp($tipoMov,"entrada") == 0){
		while($rows_pesquisa = mysqli_fetch_array($pesquisa_nome_ent)){
			while($row = $resEnt -> fetch_assoc()){
		
			print"<tbody>
				<tr>
					<th scope='row'>$row[id_cadastro]</th>
						<td>$row[no_usuario]</td>
						<td>$row[dt_ocorrencia]</td>
						<td>$row[hr_ocorrencia]</td>
						<td>$row[no_localizacao]</td>
						<td>$row[cd_cartao]</td>
				</tr>
			</tbody>
			";
		
					
				
			}//fim do while 2
		}//fim do while 1
	}//fim do if
	else{
		while($rows_pesquisa = mysqli_fetch_array($pesquisa_nome_sai)){
			while($row = $resSai -> fetch_assoc()){
				print"<tbody>
				<tr>
					<th scope='row'>$row[id_cadastro]</th>
						<td>$row[no_usuario]</td>
						<td>$row[dt_ocorrencia]</td>
						<td>$row[hr_ocorrencia]</td>
						<td>$row[no_localizacao]</td>
						<td>$row[cd_cartao]</td>
				</tr>
			</tbody>
			";
			}
		}
	}
	print"			</tr>
			</tbody>
		</table>
    
		</div>
		</div>
		</div>";//fim da lista

   /* print "
    <div class='container' style='margin-top: -1.5%;'>
        <div class='row'>
        <div class='col-6'>
        <table class='table table-striped table-bordered'>
        <tbody>
            <tr>
                <th scope='row'>1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>setor</td>
            </tr>
        </tbody>
    </table>
    
    </div>
    </div>
    </div>";*/
    }else{
		print "<p>Sem registros!</p>";//caso não tenha resultado para ser exibido
	}

?>
	</form>
</body>

</html>