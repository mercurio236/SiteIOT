<?php
$nome = @$_REQUEST["nomeUsuario"];//varivel para armazenar o campo para cadastrar no banco
$setor = $_REQUEST["setorUsuario"];//variavel para cadastrar o que está no campo em html

        $sql = "insert into cadastro (nomeUsuario, setor) values ('{$nome}', '{$setor}')";//insere no banco
        $result = $conn ->query($sql);//faz a conexão com o banco
    
        if($result==true){//mensagem de cadastro bem sucessedido no banco
            print "<div class='alert alert-success'>Cadastrou com sucesso!</div>";
            echo "<meta http-equiv='refresh' content='1;index.php?page=cadastro'>";//refresh para não ficar na mesma pagina
        }
        
        else{//mensagem de que não possivel cadastrar no banco
            print "<div class='alert alert-danger'>Não foi possível cadastrar</div>"; 
            echo "<meta http-equiv='refresh' content='1;index.php?page=cadastro'>";
        }
?>