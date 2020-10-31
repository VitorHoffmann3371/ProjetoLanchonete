<?php
    if(count($_POST) > 0) {
        // resgatar valores do formulario
        $nome = $_POST["nome_produto"];
        $categoria = $_POST["categoria_produto"];
        $valor = $_POST["valor_produto"];
        $foto = $_POST["foto_produto"];
        $info = $_POST["info_produto"];

        $cod_prod = $_POST["cod_prod"];
        

        try {
            include("conexao.php");
            
    
            //verificação do email e senha no banco de dados
            $sql = "UPDATE produto SET nome = ?, categoria = ?, valor = ?, foto = ?, info_adicional = ?, data_hora = now()
                    WHERE codigo = ?";
            $consulta = $conn->prepare($sql);            
             $consulta->execute([$nome, $categoria, $valor, $foto, $info, $cod_prod]);                       
      
            $resultado["msg"] = "Item alterado!";
            $resultado["cod"] = 1;
        
        } catch(PDOException $e) {
            echo "Erro ao inserir no banco de dados: " . $e->getMessage();
            $resultado["msg"] = "Item não alterado!";
            $resultado["cod"] = 0;
        }
        $conn = null;
        }       
        

        header("location: produto.php");


?>