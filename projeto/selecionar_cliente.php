<?php 

    $where_cod = "";
    if(isset($cod_cliente) && $cod_cliente > 0){
        $where_cod = " AND codigo = ".$_GET["cod_cliente"];
    }

    try {
        include("conexao.php");

        //Pegar os produtos no Bando de Dados
        $consulta = $conn->prepare("SELECT * FROM cliente WHERE situacao = 'HABILITADO'" . $where_cod);         
        $consulta->execute();        
        $produtos = $consulta->fetchAll(); 
   } catch(PDOException $e) {
       echo "Erro ao selecionar banco de dados: " . $e->getMessage();
       $resultado["msg"] = "Item não inserido!";
       $resultado["cod"] = 0;
   }
   $conn = null;
?>