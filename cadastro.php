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
		.popup {
		    position: relative;
		    display: inline-block;
		    cursor: pointer;
			left: 25%;
		}
		.popup .popuptext {
			visibility: show;
			width: 160px;
        	background-color: red;
			color: #fff;
			text-align: center;
			border-radius: 6px;
			padding: 8px 0;
			position: absolute;
			z-index: 1;
			bottom: 125%;
			left: 50%;
			margin-left: -80px;
		}
		.popup .popuptext::after {
		    content: "";
		    position: absolute;
		    top: 100%;
		    left: 50%;
		    margin-left: -5px;
		    border-width: 5px;
		    border-style: solid;
		    border-color: red transparent transparent transparent;
		}
    </style>
    <?php
		include ("toasts.php");
		//Checa se flag cadastrar foi setada
		if(isset($_POST["btnCard"])){
			//Chama a função para cadastrar usuário
			cadastrarUsuario($conn);
		}
		//Função para cadastrar no banco de dados
		function cadastrarUsuario ($conn){
			
			$nome = @$_REQUEST["nomeUsuario"];//varivel para armazenar o campo para cadastrar no banco
			$cartao = @$_REQUEST["cardUsu"];//varivel para armazenar o campo para cadastrar no banco
			
			if(validarCadastro() == 0){
				$sql = "insert into tb_cadastro (no_usuario,cd_cartao) values ('{$nome}','{$cartao}')";//insere no banco
				$result = $conn ->query($sql);//faz a conexão com o banco
				
				if($result==true){//toast de cadastro bem sucessedido no banco
					print geraToast("Cadastro realizado com sucesso","Cadastro","position: absolute; top: 0; right: 0;");
				}
				
				else{//toast de que não possivel cadastrar no banco
					print geraToast("Não foi possível cadastrar!","Cadastro","position: absolute; top: 0; right: 0;");
				}
			}
		};
		//Função que valida o cadastro de usuários
		function validarCadastro(){
			$nome = @$_REQUEST["nomeUsuario"];//varivel para armazenar o campo a ser validado
			$card = @$_REQUEST["cardUsu"];//varivel para armazenar o campo a ser validado
			
			if (empty($nome)){
				return 1;
			}
			if (empty($card)){
				return 2;
			}
			return 0;
		};
	?>
	<!--Script que incializa as toasts-->
	<script>
		$(document).ready(function() {
			//Modifica o tempo de hide das toasts
			$('.toast').toast({
				delay: 5000
			});
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
				<?php
					if(isset($_POST["btnCard"])){
						if(validarCadastro() == 1){
							print "	<div class='popup'>
										<span class='popuptext' id='myPopup'>Informe o nome do usuário!</span>
									</div>";
						}
					}
				?>	
				<input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" value="<?php echo isset($_POST['nomeUsuario']) ? $_POST['nomeUsuario'] : '' ?>">			
                <label style="margin-top:5%;" for="inputEmail4">Cadastrar Cartão(RFID)</label>
				<?php
					if(isset($_POST["btnCard"])){
						if(validarCadastro() == 2){
							print "	<div class='popup'>
										<span class='popuptext' id='myPopup'>Aproxime o cartão para cadastro!</span>
									</div>";
						}
					}
				?>	
                <input type="text" class="form-control" id="cardUsu" name="cardUsu">
            </div>
            <div class="form-group col-md-6">
                <div class="card" style="margin-top: 6%; height: 78%;">
                    <div class="card-body" style="text-align: center;">
                        Aproxime o Cartão
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" name="btnCard" class="btn btn-primary" id="btnCard">Cadastrar</button>
    </form>
    <script src="js/estilo.js"></script>
</body>

</html>