<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Monitoramento</title>
</head>
<body>
<body>

<!-- Imagem e texto do menu -->
<nav class="navbar justify-content-center navbar-dark bg-dark">
  	<a class="nav-link" style="color:white;" href="index.php?page=cadastro">Cadastro</a>
  	<a class="nav-link" style="color:white;" href="index.php?page=monitoramento">Monitoramento</a>
</nav>

<!--Alternação entre as paginas -->
<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php
					
						include("config.php");//responsavel por fazer a conexão no banco
						
						switch(@$_REQUEST["page"]){//responsavel por alternar entre as paginas
							case "cadastro":
								include("cadastro.php");
                            break;
                            
							case "monitoramento":
								include("monitoramento.php");
							break;
							
							case "info":
								include("info.php");
							break;
						}
					?>
				</div>
			</div>
		</div> 
</body>
</html>