<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container" style="margin-top: 8%;"><!--foi colocado um style na tag para afastar as tabelas do topo-->
        <div class="row">

        <div class="col"><!--Tabela de entrada, aqui defeine a largura do Grid em 50% -->
        <h2 style="text-align:center;">Entrada</h2><!--Titulo da tabela-->
<table class="table table-striped table-bordered"><!-- aqui inicia a tabela de saída-->
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
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
            
        </div>


<div class="col"> <!--Tabela de saída, aqui define a largura do Grid em 50% -->
<h2 style="text-align:center;">Saída</h2><!--titulo da tabela-->
    <table class="table table-striped table-bordered"><!-- aqui inicia a tabela de saída-->
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
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td></td>
    </tr>
  </tbody>
</table>
        </div>
    </div>
    </div>
</body>
</html>