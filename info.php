<?php
$nome = @$_REQUEST["nomeUsuario"];
//$setor = $_REQUEST["setorUsuario"];

        $sql = "insert into cadastro (nomeUsuario) values ('{$nome}')";
        $result = $conn ->query($sql);
    
        if($result==true){
            print "<div class='alert alert-success'>Cadastrou com sucesso!</div>";
            echo "<meta http-equiv='refresh' content='1;index.php?page=cadastro'>";//refresh para não ficar na mesma pagina
        }
        
        else{
            print "<div class='alert alert-danger'>Não foi possível cadastrar</div>"; 
            echo "<meta http-equiv='refresh' content='1;index.php?page=cadastro'>";
        }
?>