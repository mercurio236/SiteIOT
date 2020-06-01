<?php

    print "
    <h1 style='margin-top:5%; text-align:center;'>Monitoramento de Dados em tempo Real</h1>
    ";
$resultado_pes = "SELECT * FROM `dados`";//select do banco de dados da tabela cadastro
$pesquisa_nome = mysqli_query($conn, $resultado_pes); //conexao com o banco de dados

  $sql = "SELECT * FROM `dados` ORDER BY `app_id`.`dev_id`. `hardware_serial`.`port`.`counter`.`payload_raw`.`rfid` DESC"; //ordenando o select
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
                            <th scope='col' style='width:6%; text-align:center'>$qtd</th>
                            <th scope='col' style='width: 15.2%; text-align:center;'>add_id</th>
                            <th scope='col' style='width: 15.2%; text-align:center;'>dev_id</th>
                            <th scope='col' style='width: 20.8%; text-align:center;'>hardware_serial</th>
                            <th scope='col' style='width:7.6%; text-align:center'>port</th>
                            <th scope='col' style='width:7.6%; text-align:center'>counter</th>
                            <th scope='col' style='width: 12.2%; text-align:center;'>payload_raw</th>
                            <th scope='col' style='text-align:center;'>rfid</th>
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
                <th scope='row' style='width:2%; text-align:center;'>$row[idDado]</th>
                <td scope='row' style='width:10%;text-align:center;'>$row[app_id]</td>
                <td scope='row' style='width:10%; text-align:center;'>$row[dev_id]</td>
                <td scope='row' style='width:10%; text-align:center;'>$row[hardware_serial]</td>
                <td scope='row' style='width:5%; text-align:center;'>$row[port]</td>
                <td scope='row' style='width:5%; text-align:center;'>$row[counter]</td>
                <td scope='row' style='width:8%; text-align:center;'>$row[payload_raw]</td>
                <td scope='row' style='width:10%; text-align:center;'>$row[rfid]</td>
                
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

/*function pegardados($decoded){
    $fp2 = fopen('data2.txt', 'a');//opens file in append mode  
    $app =  $decoded["app_id"];
    $dev =  $decoded["dev_id"];
    $hard = $decoded["hardware_serial"];
    $por =  $decoded["port"];
    $cout = $decoded["counter"];
    $payR = $decoded["payload_raw"];
    fwrite($fp2, "insert into dados (app_id, dev_id, hardware_serial, port, counter, payload_raw) values ('{$app}', '{$dev}', '{$hard}', '{$por}', '{$cout}', '{$payR}')");
        $sql = "insert into dados (app_id, dev_id, hardware_serial, port, counter, payload_raw) values ('{$app}', '{$dev}', '{$hard}', '{$por}', '{$cout}', '{$payR}')";//insere no banco
        $result = $conn ->query($sql);//faz a conexão com o banco
}*/
?>