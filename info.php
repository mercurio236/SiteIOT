<?php
$nome = $_REQUEST[""];
$setor = $_REQUEST[""];

        $sql = "insert into BAnco () values ('{}', '{}')";
        $result = $conn ->query($sql);
    
        if($result==true){
            print "<div class='alert alert-success'>Cadastrou com sucesso!</div>";
            echo "<meta http-equiv='refresh' content='1;index.php?page=perdidos'>";//refresh para não ficar na mesma pagina
        }
        
        else{
            print "<div class='alert alert-danger'>Não foi possível cadastrar</div>"; 
            echo "<meta http-equiv='refresh' content='1;index.php?page=perdidos'>";
        }
?>