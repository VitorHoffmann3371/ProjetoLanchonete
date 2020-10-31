<?php
    if(count($_GET) > 0) {
        // resgatar valores do formulario
        $cod_prod= $_GET["cod_prod"];
        

        try {
            include("conexao.php");
            
    
            //verificação do email e senha no banco de dados
            $sql = "UPDATE produto SET situacao = 'DESABILITADO'
                    WHERE codigo = ?";
            $consulta = $conn->prepare($sql);
            // pegar o código do usuário logado
             $consulta->execute([$cod_prod]);                       
      
            $resultado["msg"] = "Item removido!";
            $resultado["cod"] = 1;
        
        } catch(PDOException $e) {
            echo "Erro ao inserir no banco de dados: " . $e->getMessage();
            $resultado["msg"] = "Item não removido!";
            $resultado["cod"] = 0;
        }
        $conn = null;
        }
        
        

        header("location: produto.php");


?>