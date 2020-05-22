<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container" style="margin-top: 8%;">
        <!--foi colocado um style na tag para afastar as tabelas do topo-->
        <div class="row">

            <div class="col">
                <!--Tabela de entrada, aqui defeine a largura do Grid em 50% -->
                <h2 style="text-align:center;">Entrada</h2>
                <!--Titulo da tabela-->
                <table class="table table-striped table-bordered">
                    <!-- aqui inicia a tabela de saída-->
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Setor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="col">
                <!--Tabela de saída, aqui define a largura do Grid em 50% -->
                <h2 style="text-align:center;">Saída</h2>
                <!--titulo da tabela-->
                <table class="table table-striped table-bordered">
                    <!-- aqui inicia a tabela de saída-->
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Setor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php


//$pesquisar = @$_REQUEST['pesquisar'];
$resultado_pes = "SELECT * FROM cadastro";
$pesquisa_nome = mysqli_query($conn, $resultado_pes);

  $sql = "SELECT * FROM `cadastro` ORDER BY `cadastro`.`nomeUsuario`. `setor`. DESC";
  $res = $conn -> query($resultado_pes);
  $qtd = $res -> num_rows;

  while($rows_pesquisa = mysqli_fetch_array($pesquisa_nome)){
    if($qtd > 0){
      while($row = $res -> fetch_assoc()){
        print "foi encontrado " .$row["nomeUsuario"]. $row["setor"];
        print "<tr>
                            <th scope='row'>1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>"
      }
      print "$qtd<p> usuários cadastrados</p>";
    }else{
      print "<p>Resultado não entrado</p>";
    }
  }

?>