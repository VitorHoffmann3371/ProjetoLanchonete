<?php
    if(count($_GET) > 0) {
        // resgatar valores do formulario
        $cod_pedido= $_GET["cod_pedido"];
        

        try {
            include("conexao.php");
            
    
            //verificação do email e senha no banco de dados
            $sql = "DELETE FROM item_pedido WHERE codigo = ?";
            $consulta = $conn->prepare($sql);
            // pegar o código do usuário logado
             $consulta->execute([$cod_pedido]);                       
      
            $resultado["msg"] = "Item removido!";
            $resultado["cod"] = 1;
        
        } catch(PDOException $e) {
            echo "Erro ao inserir no banco de dados: " . $e->getMessage();
            $resultado["msg"] = "Item não removido!";
            $resultado["cod"] = 0;
        }
        $conn = null;
        }
        
        

        header("location: pedido.php");


?>