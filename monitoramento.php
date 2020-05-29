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
	$resultado_pes_ent = "SELECT e.idUsuario,c.nomeUsuario,e.dataEntrada,e.horaEntrada,s.nomeSetor,c.Card_Cad 
						  FROM entrada e, cadastro c, tb_setor s
						  WHERE e.idSetor = s.idSetor AND
								e.idUsuario = c.idUsuario
						  ORDER BY e.idUsuario";//select do banco de dados da tabela entrada com o join nas tabelas tb_setor e cadastro
	$pesquisa_nome_ent = mysqli_query($conn, $resultado_pes_ent); //conexao com o banco de dados
	$resultado_pes_sai = "SELECT sa.idUsuario,c.nomeUsuario,sa.dataSaida,sa.horaSaida,s.nomeSetor,c.Card_Cad 
						  FROM saida sa, cadastro c, tb_setor s
						  WHERE sa.idSetor = s.idSetor AND
								sa.idUsuario = c.idUsuario
						  ORDER BY sa.idUsuario";//select do banco de dados da tabela saida com o join na tabela tb_setor e cadastro
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
	print "
	<div class='container' style='margin-top: 8%;'>
		<!--foi colocado um style na tag para afastar as tabelas do topo-->
        <div class='row'>

            <div class='col'>
               <!--Tabela de entrada, aqui defeine a largura do Grid em 50% -->";
				if(strcmp($tipoMov,"entrada") == 0){
					print"<h2 style='text-align:center;'>Entradas</h2>";
				}else{
					print"<h2 style='text-align:center;'>Saidas</h2>";
				}
				print"
                <!--Titulo da tabela-->
                <table class='table table-striped table-bordered'>
                    <!-- aqui inicia a tabela de saída-->
                    <thead>
                        <tr>
                            <th scope='col'  style='width:3.7%;'>$qtd</th>
                            <th scope='col'  style='width:34.1%;'>Nome</th>
                            <th scope='col'  style='width:11.4%;'>Data</th>
                            <th scope='col'  style='width:11.3%;'>Hora</th>
                            <th scope='col'  style='width:28.4%;'>Setor</th>
                            <th scope='col'>Card</th>
                        </tr>
                    </thead>
                </table>
            </div>
  
	";
	print "
		<div class='container' style='margin-top: -1.5%;'>
			<div class='row'>
			<div class='col-12'>
			<table class='table table-striped table-bordered'>
			<tbody>
				<tr>";
	//pesquisa do banco com resultado de quantidade
    if (strcmp($tipoMov,"entrada") == 0){
		while($rows_pesquisa = mysqli_fetch_array($pesquisa_nome_ent)){
			while($row = $resEnt -> fetch_assoc()){
				//print "foi encontrado " .$row["nomeUsuario"]. $row["setor"];
				print " <th scope='row' style='width:3%;'>$row[idUsuario]</th>
						<td style='width:30%;'>$row[nomeUsuario]</td>
						<td style='width:10%;'>$row[dataEntrada]</td>
						<td style='width:10%;'>$row[horaEntrada]</td>
						<td style='width:25%;'>$row[nomeSetor]</td>
						<td style='width:10%;'>$row[Card_Cad]</td>";
			}
		}
	}else{
		while($rows_pesquisa = mysqli_fetch_array($pesquisa_nome_sai)){
			while($row = $resSai -> fetch_assoc()){
				//print "foi encontrado " .$row["nomeUsuario"]. $row["setor"];
				print " <th scope='row' style='width:3%;'>$row[idUsuario]</th>
						<td style='width:30%;'>$row[nomeUsuario]</td>
						<td style='width:10%;'>$row[dataSaida]</td>
						<td style='width:10%;'>$row[horaSaida]</td>
						<td style='width:25%;'>$row[nomeSetor]</td>
						<td style='width:10%;'>$row[Card_Cad]</td>";
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