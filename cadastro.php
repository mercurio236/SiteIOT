<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #cadastrarCard {
            border-radius: 20px 20px;
            width: 20%;
            height: 30%;
            border: none;
        }
    </style>
</head>

<body>
    <form style="margin-top: 10%;">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nome completo</label>
                <input type="email" class="form-control" id="nomeUsuario">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Setor</label>
                <input type="text" class="form-control" id="setorUsuario">
            </div>
        </div>
        <input type="button" value="Aproxime o cartão" id="cadastrarCard">
        <button type="submit" class="btn btn-primary" id="btnCard">Cadastrar</button>
    </form>
    <script src="js/estilo.js"></script>
</body>

</html>