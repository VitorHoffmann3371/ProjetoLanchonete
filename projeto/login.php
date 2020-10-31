<?php
    if(count($_POST) > 0) {
    // resgatar valores do formulario
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    

    try {
        include("conexao.php");

    //verificação do email e senha no banco de dados
    $consulta = $conn->prepare("SELECT * FROM usuario WHERE situacao='Habilitado' AND email=:email AND senha=md5(:senha)"); 
    $consulta-> bindParam(':email', $email, PDO::PARAM_STR);
    $consulta-> bindParam(':senha', $senha, PDO::PARAM_STR);
    $consulta->execute();
  
    
    $result = $consulta->fetchAll();
    $qtd_usuarios = count($result);
    if($qtd_usuarios == 1){

        session_start();
        $_SESSION["email_usuario"] = $email;
        $_SESSION["nome_usuario"] = $result[0]["nome"];  
        $_SESSION["codigo_usuario"] = $result[0]["codigo"];  
        

        header("Location: pedido.php");
    }else if($qtd_usuarios == 0){
        $resultado["msg"] = "Usuário não encontrado!";
        $resultado["cod"] = 0;
    }
    } catch(PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
    }
    $conn = null;
    
    }
    include("index.php");

?>