<?php
    if(count($_GET) > 0) {
        // resgatar valores do formulario
        $cod_cliente= $_GET["cod_cliente"];
        

        try {
            include("conexao.php");
            
    
            //verificação do email e senha no banco de dados
            $sql = "UPDATE cliente SET situacao = 'DESABILITADO'
                    WHERE codigo = ?";
            $consulta = $conn->prepare($sql);
            // pegar o código do usuário logado
             $consulta->execute([$cod_cliente]);                       
      
            $resultado["msg"] = "Cliente removido!";
            $resultado["cod"] = 1;
        
        } catch(PDOException $e) {
            echo "Erro ao inserir no banco de dados: " . $e->getMessage();
            $resultado["msg"] = "Cliente não removido!";
            $resultado["cod"] = 0;
        }
        $conn = null;
        }
        
        

        header("location: cliente.php");


?>