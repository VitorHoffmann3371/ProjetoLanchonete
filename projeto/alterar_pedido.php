<?php
    if(count($_POST) > 0) {
        // resgatar valores do formulario
        $nome = $_POST["nome_pedido"];
        $quantidade = $_POST["quantidade_pedido"];
        $observacao = $_POST["obs_pedido"];        

        $cod_pedido = $_POST["cod_pedido"];
        

        try {
            include("conexao.php");
            
    
            //verificação do email e senha no banco de dados
            $sql = "UPDATE item_pedido SET nome_produto = ?, quantidade = ?, observacao = ?
                    WHERE codigo = ?";
            $consulta = $conn->prepare($sql);            
             $consulta->execute([$nome, $quantidade, $observacao, $cod_pedido]);                       
      
            $resultado["msg"] = "Pedido alterado!";
            $resultado["cod"] = 1;
        
        } catch(PDOException $e) {
            echo "Erro ao inserir no banco de dados: " . $e->getMessage();
            $resultado["msg"] = "Pedido não alterado!";
            $resultado["cod"] = 0;
        }
        $conn = null;
        }       
        

        header("location: pedido.php");


?>