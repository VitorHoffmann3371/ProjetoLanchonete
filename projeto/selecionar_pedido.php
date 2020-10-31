<?php 

    $where_cod = "";
    if(isset($cod_pedido) && $cod_pedido > 0){
        $where_cod = " AND codigo = ".$_GET["cod_pedido"];
    }

    try {
        include("conexao.php");

        //Pegar os produtos no Bando de Dados
        $consulta = $conn->prepare("SELECT * FROM item_pedido WHERE cod_usuario > 0" . $where_cod);         
        $consulta->execute();        
        $produtos = $consulta->fetchAll(); 
   } catch(PDOException $e) {
       echo "Erro ao selecionar banco de dados: " . $e->getMessage();
       $resultado["msg"] = "Erro ao selecionar!";
       $resultado["cod"] = 0;
   }
   $conn = null;
?>