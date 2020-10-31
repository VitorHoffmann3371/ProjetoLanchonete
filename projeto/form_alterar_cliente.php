<?php session_start(); ?>
<?php if ( isset($_SESSION["nome_usuario"])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php 
            $cod_cliente = $_GET["cod_cliente"];            
            include("selecionar_cliente.php");             
        ?>    
        <form action="alterar_cliente.php" method="POST">
        <h2>Alterar Cliente</h2><br>
            <div class="form-group">
                <label for="nome_produto"> Codigo do Cliente: </label>
                <input type="text" required readonly value="<?= $produtos[0]['codigo']; ?>" class="form-control" id="cod_cliente" name="cod_cliente">                
            </div>
            <div class="form-group">
                <label for="nome"> Nome: </label>
                <input type="text" required value="<?= $produtos[0]['nome']; ?>" class="form-control" id="nome" name="nome">                
            </div>
            <div class="form-group">
                <label for="endereco"> Endereco: </label>
                <input type="text" required value="<?= $produtos[0]['endereco']; ?>" class="form-control" id="endereco" name="endereco">                
            </div>
            <div class="form-group">
                <label for="numero"> Numero: </label>
                <input type="number" required value="<?= $produtos[0]['numero']; ?>" class="form-control" id="numero" name="numero">                
            </div>
            
            <button type="submit" class="btn btn-primary">Alterar Cliente</button> 
            <a href="cliente.php" type="submit" class="btn btn-primary">Cancelar</a>                   
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