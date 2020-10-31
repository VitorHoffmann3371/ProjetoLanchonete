<?php
    if(count($_POST) > 0) {        
        // resgatar valores do formulario
        session_start();
        $nome = $_POST["nome_produto"];
        $qtd = $_POST["qtd_produto"];
        $obs = $_POST["obs_produto"];
        $preco = $_POST["preco_produto"];
        $cod_usuario = $_SESSION["codigo_usuario"];
        $cod_cliente = $_POST["cod_cliente"];        
    

    try {
        include("conexao.php");
        if($nome != "Selecione um produto"){
            $sql = "INSERT INTO item_pedido (cod_usuario, nome_produto, observacao, preco_und, quantidade, cod_cliente) VALUES (?, ?, ?, ?, ?, ?)";
            $consulta = $conn->prepare($sql);
            
            $consulta->execute([$cod_usuario, $nome, $obs, $preco, $qtd, $cod_cliente]);
    
            $resultado["msg"] = "Pedido realizado!";
            $resultado["cod"] = 1;
        }
        
    
    } catch(PDOException $e) {
        echo "Inserção no banco de dados falhou: " . $e->getMessage();
        $resultado["msg"] = "O pedido não foi realizado!";
        $resultado["cod"] = 0;
    }
    $conn = null;
    }


    header("location: pedido.php");
?>