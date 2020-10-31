<?php
    if(count($_POST) > 0) {
        // resgatar valores do formulario
        session_start();
        $nome = $_POST["nome_produto"];
        $categoria = $_POST["categoria_produto"];
        $valor = $_POST["valor_produto"];
        $foto = $_POST["foto_produto"];
        $info = $_POST["info_produto"];
        $cod_usuario = $_SESSION["codigo_usuario"];

        try {
            include("conexao.php");
            
    
            //verificação do email e senha no banco de dados
            $sql = "INSERT INTO produto (nome, categoria, valor, foto, info_adicional, codigo_usuario) VALUES (?, ?, ?, ?, ?, ?)";
            $consulta = $conn->prepare($sql);
            // pegar o código do usuário logado
             $consulta->execute([$nome, $categoria, $valor, $foto, $info, $cod_usuario]);                       
      
            $resultado["msg"] = "Item inserido!";
            $resultado["cod"] = 1;
        
        } catch(PDOException $e) {
            echo "Erro ao inserir no banco de dados: " . $e->getMessage();
            $resultado["msg"] = "Item não inserido!";
            $resultado["cod"] = 0;
        }
        $conn = null;
        }
        
        

        header("location: produto.php");


?>