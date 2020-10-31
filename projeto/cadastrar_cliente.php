<?php
    if(count($_POST) > 0) {
        // resgatar valores do formulario
        session_start();
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];

        try {
            include("conexao.php");
            
    
            //verificação do email e senha no banco de dados
            $sql = "INSERT INTO cliente (nome, endereco, numero) VALUES (?, ?, ?)";
            $consulta = $conn->prepare($sql);
            // pegar o código do usuário logado
             $consulta->execute([$nome, $endereco, $numero]);                       
      
            $resultado["msg"] = "Item inserido!";
            $resultado["cod"] = 1;
        
        } catch(PDOException $e) {
            echo "Erro ao inserir no banco de dados: " . $e->getMessage();
            $resultado["msg"] = "Item não inserido!";
            $resultado["cod"] = 0;
        }
        $conn = null;
        }
        
        

        header("location: cliente.php");


?>