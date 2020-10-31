<?php
    if(count($_POST) > 0) {
        // resgatar valores do formulario
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];    
        
        $cod_cliente = $_POST["cod_cliente"];
        

        try {
            include("conexao.php");            
    
            //verificação do email e senha no banco de dados
            $sql = "UPDATE cliente SET nome = ?, endereco = ?, numero = ?
                    WHERE codigo = ?";
            $consulta = $conn->prepare($sql);            
             $consulta->execute([$nome, $endereco, $numero, $cod_cliente]);                       
      
            $resultado["msg"] = "Item alterado!";
            $resultado["cod"] = 1;
        
        } catch(PDOException $e) {
            echo "Erro ao inserir no banco de dados: " . $e->getMessage();
            $resultado["msg"] = "Item não alterado!";
            $resultado["cod"] = 0;
        }
        $conn = null;
        }       
        

        header("location: cliente.php");


?>