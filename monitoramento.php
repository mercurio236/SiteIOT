<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
</body>

</html>

<?php


//$pesquisar = @$_REQUEST['pesquisar'];
$resultado_pes = "SELECT * FROM cadastro";//select do banco de dados da tabela cadastro
$pesquisa_nome = mysqli_query($conn, $resultado_pes); //conexao com o banco de dados

  $sql = "SELECT * FROM `cadastro` ORDER BY `cadastro`.`nomeUsuario`. `setor`. DESC"; //ordenando o select
  $res = $conn -> query($resultado_pes); //resposta do banco de dados
  $qtd = $res -> num_rows; //exibir a quantidade de cadastrados

  //estilo de exibição de pesquisa
  print "
  <div class='container' style='margin-top: 8%;'>
        <!--foi colocado um style na tag para afastar as tabelas do topo-->
        <div class='row'>

            <div class='col'>
               <!--Tabela de entrada, aqui defeine a largura do Grid em 50% -->
                <h2 style='text-align:center;'>Entrada</h2>
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
  //pesquisa do banco com resultado de quantidade
  while($rows_pesquisa = mysqli_fetch_array($pesquisa_nome)){
    
    if($qtd > 0){//se o valor for maior que zero vai exibir
      while($row = $res -> fetch_assoc()){
        //print "foi encontrado " .$row["nomeUsuario"]. $row["setor"];
        print "
        <div class='container' style='margin-top: -1.5%;'>
        <div class='row'>
        <div class='col-12'>
        <table class='table table-striped table-bordered'>
        <tbody>
            <tr>
                <th scope='row' style='width:3%;'>$row[idUsuario]</th>
                <td style='width:30%;'>$row[nomeUsuario]</td>
                <td style='width:10%;'>Data</td>
                <td style='width:10%;'>Hora</td>
                <td style='width:25%;'>$row[setor]</td>
                <td style='width:10%;'>$row[Card_Cad]</td>
            </tr>
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
      }
     
    }else{
      print "<p>Resultado não entrado</p>";//caso não tenha resultado para ser exibido
    }
  }

?>