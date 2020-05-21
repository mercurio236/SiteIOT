<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #cadastrarCard {
            border-radius: 10%;
            width: 3%;
            border: none;
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center; margin-top: 5%;">Cadastro de funcionario</h1>
    </div>

    <!--Formulario-->
    <form style="margin-top: 5%;" method="POST" action="index.php?page=info">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nome completo</label>
                <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Setor</label>
                <input type="text" class="form-control" id="setorUsuario">
            </div>
        </div>
        <div>
            <h4 style="margin-top: 2%;">Aproxime o cartão</h4>
            <input type="button" id="cadastrarCard">
        </div>

        <button type="submit" class="btn btn-primary" id="btnCard">Cadastrar</button>
    </form>
    <script src="js/estilo.js"></script>
</body>

</html>