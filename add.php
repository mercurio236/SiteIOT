<?php
/* file : connect.php
* autor: Marcos Tonin - 140153233
* descricao : Recebe os dados como parametros e insere no servidor
*/
//include 'dadostratados.php';
$fp = fopen('data.txt', 'a');//opens file in append mode  



//Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    
    fwrite($fp,'Request method must be POST!' );  
    throw new Exception('Request method must be POST!');
    
}
 
//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    fwrite($fp,'Request method must be POST!'.'JSON' ); 
    throw new Exception('Content type must be: application/json');
}
 
//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));
//fwrite($fp, $content);
 
 
//Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);
//organizando dados

$app =  $decoded["app_id"];
$dev =  $decoded["dev_id"];
$hard = $decoded["hardware_serial"];
$por =  $decoded["port"];
$cout = $decoded["counter"];
$payR = $decoded["payload_raw"];

fwrite($fp,PHP_EOL." Valores JSON".PHP_EOL."app_id= ".$app.PHP_EOL. "dev_id= ".$dev.PHP_EOL. "hardware_serial= ".$hard.PHP_EOL. "port= ".$por.PHP_EOL. "counter= ". $cout.PHP_EOL. "payload_raw= ".$payR.PHP_EOL. "Fim");

//fwrite($fp,"insert into dados (app_id, dev_id, hardware_serial, port, counter, payload_raw) values ('{$app}', '{$dev}', '{$hard}', '{$por}', '{$cout}', '{$payR}')");

 
//If json_decode failed, the JSON is invalid.
if(!is_array($decoded)){
    fwrite($fp,'Conteudo'. 'JSON invalido'); 
    throw new Exception('Received content contained invalid JSON!');
}


    
fclose($fp);  

//conexão e inserido dados no sql
    $host = "localhost";
	$user = "id10247564_root";
	$pass = "ArleySouto$123";
	$base = "id10247564_setor";
	
	$conn = new mysqli($host, $user, $pass, $base);
	
	if($conn->connect_error){
		die("Erro: ".$conn->connect_error);
	}
	
    $sql = "insert into dados (app_id, dev_id, hardware_serial, port, counter, payload_raw) values ('{$app}', '{$dev}', '{$hard}', '{$por}', '{$cout}', '{$payR}')";//insere no banco
    $result = $conn ->query($sql);//faz a conexão com o banco
        

   

//file_put_contents('dados.txt',  var_dump($decoded) . PHP_EOL, FILE_APPEND);
?>