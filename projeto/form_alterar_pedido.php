<?php session_start(); ?>
<?php if ( isset($_SESSION["nome_usuario"])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php 
            $cod_pedido = $_GET["cod_pedido"];
            include("selecionar_pedido.php");            
        ?>    
        <form action="alterar_pedido.php" method="POST">
        <h2>Alterar Pedido</h2><br>
            <div class="form-group">
                <label for="codigo_pedido"> Codigo do pedido: </label>
                <input type="text" required readonly value="<?= $produtos[0]['codigo']; ?>" class="form-control" id="cod_pedido" name="cod_pedido">                
            </div>
            <div class="form-group">
                <label for="nome_pedido"> Nome do produto: </label>
                <input type="text" required value="<?= $produtos[0]['nome_produto']; ?>" class="form-control" id="nome_pedido" name="nome_pedido" placeholder="Digite o produto">                
            </div>
            <div class="form-group">
                <label for="quantidade_pedido"> Quantidade: </label>
                <input type="text" value="<?= $produtos[0]['quantidade']; ?>" class="form-control" id="quantidade_pedido" name="quantidade_pedido">                
            </div>            
            <div class="form-group">
                <label for="obs_pedido"> Observação: </label>
                <input type="text" class="form-control" id="obs_pedido" name="obs_pedido">                
            </div>            
            <button type="submit" class="btn btn-primary">Alterar Pedido</button>  
            <a href="pedido.php" type="submit" class="btn btn-primary">Cancelar</a>                  
        </form>         
        <?php if(isset($resultado)): ?>
                <?php if($resultado["cod"] == 1): ?>
                <div class="alert alert-sucess">
                    <?php echo $resultado["msg"]; ?>
                </div>    
                <?php endif; ?> 
                <?php if($resultado["cod"] == 0): ?>
                <div class="alert alert-danger">
                    <?php echo $resultado["msg"]; ?>
                </div> 
                <?php endif; ?> 
            <?php endif; ?>   
        <br><br><br>
        
    </div>    
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>

<?php else: ?>
    <div class="alert alert-danger">
        Você precisa fazer o login
    </div> 
<?php endif; ?>