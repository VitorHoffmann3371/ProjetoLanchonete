<?php

include("conexao.php");

$nome_produto = filter_input(INPUT_GET, 'nome_produto', FILTER_SANITIZE_STRING);
if(!empty($nome_produto)){
    
    $limit = 1;
    $result_preco = "SELECT * FROM produto WHERE nome =:nome_produto AND situacao='HABILITADO' LIMIT :limit";
    
    $resultado_preco = $conn->prepare($result_preco);
    $resultado_preco->bindParam(':nome_produto', $nome_produto, PDO::PARAM_STR);
    $resultado_preco->bindParam(':limit', $limit, PDO::PARAM_INT);
    $resultado_preco->execute();
    
    $array_valores = array();
    
    if($resultado_preco->rowCount() != 0){
        $row_preco = $resultado_preco->fetch(PDO::FETCH_ASSOC);
        $array_valores['valor'] = $row_preco['valor'];         
    }else{
        $array_valores['valor'] = 'Produto não encontrado';        
    }
    echo json_encode($array_valores);
}