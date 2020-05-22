<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    


</body>

</html>

<?php


//$pesquisar = @$_REQUEST['pesquisar'];
$resultado_pes = "SELECT * FROM cadastro";
$pesquisa_nome = mysqli_query($conn, $resultado_pes);

  $sql = "SELECT * FROM `cadastro` ORDER BY `cadastro`.`nomeUsuario`. `setor`. DESC";
  $res = $conn -> query($resultado_pes);
  $qtd = $res -> num_rows;

  print "
  <div class='container' style='margin-top: 8%;'>
        <!--foi colocado um style na tag para afastar as tabelas do topo-->
        <div class='row'>

            <div class='col-6'>
               <!--Tabela de entrada, aqui defeine a largura do Grid em 50% -->
                <h2 style='text-align:center;'>Entrada</h2>
                <!--Titulo da tabela-->
                <table class='table table-striped table-bordered'>
                    <!-- aqui inicia a tabela de saída-->
                    <thead>
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Nome</th>
                            <th scope='col'>Data</th>
                            <th scope='col'>Hora</th>
                            <th scope='col'>Setor</th>
                        </tr>
                    </thead>
                </table>
            </div>
  
  ";
  while($rows_pesquisa = mysqli_fetch_array($pesquisa_nome)){
    
    if($qtd > 0){
      while($row = $res -> fetch_assoc()){
        //print "foi encontrado " .$row["nomeUsuario"]. $row["setor"];
        print "
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
      print "<p>Resultado não entrado</p>";
    }
  }

?>