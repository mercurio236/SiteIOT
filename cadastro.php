<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        #cadastrarCard {
            border-radius: 10%;
            width: 3%;
            border: none;
            background-color: green;
            color: white;
        }
    </style>
	<?php
		//Checa se flag cadastrar foi setada
		if(isset($_POST["cadastrar"])){
			unset($_POST["cadastrar"]);
			//Chama a função para cadastrar usuário
			cadastrarUsuario($conn);
		}
		//Função para cadastrar no banco de dados
		function cadastrarUsuario ($conn){
			$nome = @$_REQUEST["nomeUsuario"];//varivel para armazenar o campo para cadastrar no banco
			$sql = "insert into tb_cadastro (no_usuario) values ('{$nome}')";//insere no banco
			$result = $conn ->query($sql);//faz a conexão com o banco

			if($result==true){//toast de cadastro bem sucessedido no banco
				print"  <div class='toast' data_autohide='false' style='position: absolute; top: 0; right: 0;'>
						   <div class='toast-header'>
							  <strong class='mr-auto'>Cadastro</strong>
							  <small>11 mins ago</small>
							  <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
								  <span aria-hidden='true'>&times;</span>
							  </button>
						   </div>
						   <div class='toast-body'>
							   Cadastro realizado com sucesso!
						   </div>
						</div>";
			}
			
			else{//toast de que não possivel cadastrar no banco
				print"  <div class='toast' data_autohide='false' style='position: absolute; top: 0; right: 0;'>
						   <div class='toast-header'>
							  <strong class='mr-auto'>Cadastro</strong>
							  <small>11 mins ago</small>
							  <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
								  <span aria-hidden='true'>&times;</span>
							  </button>
						   </div>
						   <div class='toast-body'>
							   Não foi possível cadastrar!
						   </div>
						</div>";
			}
		}
	?>
	<!--Script que incializa as toasts-->
	<script>
		$(document).ready(function(){
			//Modifica o tempo de hide das toasts
			$('.toast').toast({delay: 5000});
			$('.toast').toast('show');
		});
	</script>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center; margin-top: 5%;">Cadastro de funcionario</h1>
    </div>

    <!--Formulario-->
    <form style="margin-top: 5%;" method="POST" action="index.php?page=cadastro">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nome completo</label>
                <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" required>
            </div>
        </div>
        <div>
            <h4 style="margin-top: 2%;">Aproxime o cartão</h4>
            <input type="button" id="cadastrarCard" onclick="btnColor()">
        </div>
        <button type="submit" name="cadastrar" class="btn btn-primary" id="btnCard" >Cadastrar</button>
    </form>
    <script src="js/estilo.js"></script>
</body>

</html>